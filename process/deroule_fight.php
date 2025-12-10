<?php

require_once('../utils/autoloader.php');
require_once('../utils/db-connect.php');
require_once('../utils/is-connected.php');

$hero = $_SESSION['hero'];


if ($hero->getHp() <= 0) {
    header('location: ../public/perso_selection.php');
    exit;
}

try {
    $fightManager = new FightManager($db);

    

    // Initialiser le donjon (gère la session currentDonjonId)
    $donjon = $fightManager->initializeHeroDonjon();
    if (!$donjon) {
        throw new Exception("Impossible d'initialiser le donjon");
    }
    $_SESSION['donjon'] = $donjon;
    
    // Créer le monstre suivant
    $monstre = $fightManager->fightCreation();
    
    $_SESSION['monstre'] = $monstre;

    header('location: ../public/fight.php');
} catch (Exception $e) {
    header('location: ../public/fight.php');
    exit;
}