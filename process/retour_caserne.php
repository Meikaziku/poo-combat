<?php


if ($_SERVER['REQUEST_METHOD'] !== "POST") {
    header('Location: ../public/fight.php?error=1');
    return;
}

if (
    !isset(
        $_POST['idHero'],

    )
) {
    header('Location: ../public/fight.php?error=2');
    return;
}


if (
    empty($_POST['idHero'])

) {
    header('Location: ../public/fight.php?error=3');
    return;
}

$idHero = htmlspecialchars(trim($_POST['idHero']));

require_once('../utils/autoloader.php');
require_once('../utils/db-connect.php');

session_start();

header('Location: ../public/perso_selection.php');



