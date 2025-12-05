<?php

// Vérifie que tous les champs existent
if (
    !isset($_POST['heroName'], $_POST['hp'], $_POST['attaque'])
) {
    header('Location: ../public/creation_perso.php?error=1'); // champs manquants
    exit;
}

// Nettoyage
$heroName = trim($_POST['heroName']);
$hp = intval($_POST['hp']);
$attaque = intval($_POST['attaque']);

// Vérifie que le nom n'est pas vide
if (empty($heroName)) {
    header('Location: ../public/creation_perso.php?error=2'); // nom vide
    exit;
}

// Vérifie que HP et Attaque sont numériques et > 0
if ($hp <= 0 || $attaque <= 0) {
    header('Location: ../public/creation_perso.php?error=3'); // stats invalides
    exit;
}


$hp = htmlspecialchars(trim($_POST['hp']));
$attaque = htmlspecialchars(trim($_POST['attaque']));
$heroName = htmlspecialchars(trim($_POST['heroName']));




require_once('../utils/autoloader.php');
require_once('../utils/db-connect.php');

$hero = new Hero(
    1,
    $heroName,
);


if (($attaque - $hero->getAttaque()) + ($hp - $hero->getHp()) !== 10) {
    header('Location: ../public/creation_perso.php?error=5');
    exit;
}


$imgPath = "";

if (isset($_FILES['selectionPhoto']) && $_FILES['selectionPhoto']['error'] === 0) {
    $tmpName = $_FILES['selectionPhoto']['tmp_name'];
    $name = $_FILES['selectionPhoto']['name'];

    $ext = strtolower(pathinfo($name, PATHINFO_EXTENSION));
    $allowed = ['jpg', 'jpeg', 'png', 'gif'];

    if (!in_array($ext, $allowed)) {
        header('Location: ../public/creation_perso.php?error=5');
        exit;
    }

    $newName = uniqid() . "." . $ext;
    $imgPath = './upload/' . $newName;
    move_uploaded_file($tmpName, '../public/upload/' . $newName);
}


$hero->setAttaque($attaque);
$hero->setHp($hp);
$hero->setMax_hp($hp);
$hero->setImg($imgPath);




$heroRepository = new HeroRepository($db);
$success = $heroRepository->insertHero($hero);

if (!$success) {
    header('Location: ../public/creation_perso.php?hero-already-exists=1');
    exit;
}

header('Location: ../public/perso_selection.php?hero-success=1');
exit;
