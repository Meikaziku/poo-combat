<?php
require_once __DIR__ . '/../utils/autoloader.php';
require_once __DIR__ . '/../utils/db-connect.php';

/**
 * Seeder minimaliste : insère des className pour donjon et monstre s'ils n'existent pas.
 * Tables ciblées (voir BDD/drawSQL-mysql-export-2025-12-05.sql) :
 *  - donjon (className)
 *  - monstre (className)
 */

// Mapping donjon => monstres (plus facile à étendre)
$donjonMonstres = [
    'DonjonGoblin' => [
        'GoblinCombattant', // src/Entities/GoblinCombattant.php
        'GoblinArcher',     // src/Entities/GoblinArcher.php
        'GoblinMage',       // src/Entities/GoblinMage.php
    ],
    'DonjonSquelette' => [
        'SqueletteWarrior',
        'SqueletteArcher',
        'SqueletteNecromancer',
    ],
    'DonjonZombie' => [
        'ZombieWalker',
        'ZombieBrute',
        'ZombieShaman',
    ],
    'DonjonDragon' => [
        'DragonWhelp',
        'DragonDrake',
        'DragonElder',
    ],
];

// Bosses : donjon => bossClassName (un boss par donjon)
$bossesByDonjon = [
    'DonjonGoblin' => 'GoblinBoss', // src/Entities/GoblinBoss.php
    'DonjonSquelette' => 'SqueletteBoss',
    'DonjonZombie' => 'ZombieBoss',
    'DonjonDragon' => 'DragonBoss',
];





try {
    $db->beginTransaction();

    // Prépare les requêtes
    $selectDonjon = $db->prepare('SELECT id FROM `donjon` WHERE className = :cn LIMIT 1');
    $insertDonjon = $db->prepare('INSERT INTO `donjon` (className) VALUES (:cn)');

    $selectMonstre = $db->prepare('SELECT id FROM `monstre` WHERE className = :cn LIMIT 1');
    $insertMonstre = $db->prepare('INSERT INTO `monstre` (className) VALUES (:cn)');

    $selectBoss = $db->prepare('SELECT id FROM `boss` WHERE className = :cn LIMIT 1');
    $insertBoss = $db->prepare('INSERT INTO `boss` (className, donjon_id) VALUES (:cn, :donjon_id)');

    $selectDonjonMonstre = $db->prepare('SELECT id FROM `donjon_monstre` WHERE donjon_id = :donjon_id AND monstre_id = :monstre_id LIMIT 1');
    $insertDonjonMonstre = $db->prepare('INSERT INTO `donjon_monstre` (donjon_id, monstre_id) VALUES (:donjon_id, :monstre_id)');

    // Boucle principale : pour chaque donjon du mapping, s'assurer que le donjon existe,
    // insérer les monstres si besoin et créer les liens dans la table pivot.
    foreach ($donjonMonstres as $donjonClass => $monstresList) {
        // Vérifie / crée le donjon
        $selectDonjon->execute(['cn' => $donjonClass]);
        $donjonRow = $selectDonjon->fetch(PDO::FETCH_ASSOC);
        if ($donjonRow === false) {
            $insertDonjon->execute(['cn' => $donjonClass]);
            $donjonId = (int)$db->lastInsertId();
            echo "Inserted donjon: $donjonClass (id=$donjonId)\n";
        } else {
            $donjonId = (int)$donjonRow['id'];
            echo "Exists donjon: $donjonClass (id=$donjonId)\n";
        }
       

        foreach ($monstresList as $monstre) {
            $selectMonstre->execute(['cn' => $monstre]);
            $monstreRow = $selectMonstre->fetch(PDO::FETCH_ASSOC);
            // Si le monstre n'existe pas déjà en BDD

            if ($monstreRow === false) {
                $insertMonstre->execute(['cn' => $monstre]);
                $monstreId = (int)$db->lastInsertId();
                echo "Inserted monstre: $monstre (id=$monstreId)\n";
            } else {
                $monstreId = (int)$monstreRow['id'];
                echo "Exists donjon: $monstre (id=$monstreId)\n";
            }

            // link to donjon
            $selectDonjonMonstre->execute(['donjon_id' => $donjonId, 'monstre_id' => $monstreId]);
            if ($selectDonjonMonstre->fetch() === false) {
                $insertDonjonMonstre->execute(['donjon_id' => $donjonId, 'monstre_id' => $monstreId]);
                echo "Linked monstre instance id=$monstreId to $donjonClass (id=$donjonId)\n";
            }
        }

        // Si un boss est défini pour ce donjon, s'assurer qu'il existe et qu'il référence le donjon
        if (isset($bossesByDonjon[$donjonClass])) {
            $bossClass = $bossesByDonjon[$donjonClass];
            $selectBoss->execute(['cn' => $bossClass]);
            $bossRow = $selectBoss->fetch(PDO::FETCH_ASSOC);
            if ($bossRow === false) {
                $insertBoss->execute(['cn' => $bossClass, 'donjon_id' => $donjonId]);
                echo "Inserted boss: $bossClass for donjon $donjonClass (id=$donjonId)\n";
            } else {
                echo "Exists boss: $bossClass (id={$bossRow['id']})\n";
            }
        }
    }

    $db->commit();
    echo "Seeder terminé.\n";
} catch (Exception $e) {
    if ($db->inTransaction()) {
        $db->rollBack();
    }
    echo "Erreur seeder : " . $e->getMessage() . "\n";
    exit(1);
}
