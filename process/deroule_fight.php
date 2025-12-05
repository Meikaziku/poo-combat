<?php

require_once('../utils/autoloader.php');
require_once('../utils/db-connect.php');
require_once('../utils/is-connected.php');

$hero = $_SESSION['hero'];
var_dump($hero);
// debut du combat

if ($hero->getHp() > 0) {

    $fightManager = new FightManager($db);
    $monstre = $fightManager->fightCreation();


    var_dump($monstre);

    $combatLogs = $fightManager->fight($hero, $monstre);


    $_SESSION['combatLogs'] = $combatLogs;
    $_SESSION['monstre'] = $monstre;

    $heroRepo = new HeroRepository($db);
    $newHeroStats = $heroRepo->saveStats($hero);

    header('location: ../public/fight.php');
} else {
    header('location: ../public/perso_selection.php');
}


// var_dump($hero);
// var_dump($monstre);

// var_dump($resultatCombat);
