<?php

if ($_SERVER['REQUEST_METHOD'] !== "POST") {
    header('Location: ../public/perso_selection.php?error=1');
    return;
}

if (
    !isset(
        $_POST['idHero'],

    )
) {
    header('Location: ../public/perso_selection.php?error=2');
    return;
}


if (
    empty($_POST['idHero'])

) {
    header('Location: ../public/perso_selection.php?error=3');
    return;
}


$idHero = htmlspecialchars(trim($_POST['idHero']));

session_start();

require_once('../utils/autoloader.php');
require_once('../utils/db-connect.php');

$heroRepositiry = new HeroRepository($db);
$hero = $heroRepositiry->findHeroById($idHero);

$_SESSION['hero'] = $hero;

header('location: ../process/deroule_fight.php');