<?php

// Vérifie que tous les champs existent
if (
    !isset($_POST['heroName'], $_POST['hp'], $_POST['attaque'])
) {
    header('Location: ../public/creation_perso.php?error=1'); // champs manquants
    exit;
}

// Nettoyage et cast
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

// Protection basique des valeurs (surtout pour affichage)
$hp = htmlspecialchars((string)$hp);
$attaque = htmlspecialchars((string)$attaque);
$heroName = htmlspecialchars($heroName);

require_once('../utils/autoloader.php');
require_once('../utils/db-connect.php');

// Image du personnage : uniquement l'une des images prédéfinies choisies via les radios
$allowedPresetImages = [
    'assets/imgs/perso1.gif',
    'assets/imgs/perso2.gif',
    'assets/imgs/perso3.gif',
];

if (isset($_POST['idPerso']) && in_array($_POST['idPerso'], $allowedPresetImages, true)) {
    $imgPath = $_POST['idPerso'];
} else {
    // Aucun choix valide — on refuse la création
    header('Location: ../public/creation_perso.php?error=6'); // image non sélectionnée ou invalide
    exit;
}

// Instancie un Hero avec les valeurs par défaut puis ajuste
$hero = new Hero(
    1,
    $heroName
);

// Vérifie la répartition des points (logique existante)
if ((intval($attaque) - $hero->getAttaque()) + (intval($hp) - $hero->getHp()) !== 10) {
    header('Location: ../public/creation_perso.php?error=5');
    exit;
}

$hero->setAttaque((int)$attaque);
$hero->setHp((int)$hp);
$hero->setMax_hp((int)$hp);
$hero->setImg($imgPath);

$heroRepository = new HeroRepository($db);
$success = $heroRepository->insertHero($hero);

if (!$success) {
    header('Location: ../public/creation_perso.php?hero-already-exists=1');
    exit;
}

header('Location: ../public/perso_selection.php?hero-success=1');
exit;
