<?php

require_once('../../utils/autoloader.php');
require_once('../../utils/db-connect.php');
require_once('../../utils/is-connected.php');

/**
 * @var Hero $hero
 */
$hero = $_SESSION['hero'];

/**
 * @var Monstre $monstre
 */
$monstre = $_SESSION['monstre'];

$heroDegat = $hero->attaque($monstre);
$monstreDegat = $monstre->attaque($hero);

$heroRepo = new HeroRepository($db);
$heroRepo->saveStats($hero);

$result = json_encode([
    "heroHp" => $hero->getHp(),
    "monstreHp" => $monstre->getHp(),
    "heroDegat" => $heroDegat,
    "monstreDegat" => $monstreDegat

]);

error_log($result);

echo $result;