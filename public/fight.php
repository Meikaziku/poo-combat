<?php
require_once '../utils/autoloader.php';
require_once '../utils/db-connect.php';
session_start();

/**
 * @var Hero $hero
 */
$hero = $_SESSION['hero'];
$combatLogs = $_SESSION['combatLogs'];
$monstre = $_SESSION['monstre']


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./assets/styles/output.css">
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Manrope:wght@200..800&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Roboto:ital,wght@0,100..900;1,100..900&family=Rokkitt:ital,wght@0,100..900;1,100..900&family=Varela+Round&display=swap");
    </style>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Sriracha&family=Style+Script&display=swap');
    </style>
</head>

<body class="font-[Roboto]">
    <main class="flex flex-col items-center gap-12">
        <h1 class="text-4xl">Fight !</h1>
        <p class="text-xl">Voici le résultat du fight contre le <?= $_SESSION['monstre']->getNom() ?></p>


        <div class="flex gap-8 ">
            <div class=" flex flex-col items-center border border-black/50 gap-2 p-4">
                <h2 class="text-2xl font-semibold"><?= $hero->getNom() ?></h2>
                <img class="w-60 h-60" src="<?= $hero->getImg() ?>" alt="">
                <div class="flex">
                    <img class="w-8 h-8" src="../public/assets/imgs/heart.png" alt="">
                    <p class="text-xl"><?= $hero->getHp() ?> HP</p>
                </div>
            </div>

            <div class="flex gap-8 ">
                <div class=" flex flex-col items-center border border-black/50 gap-2 p-4">
                    <h2 class="text-2xl font-semibold"><?= $monstre->getNom() ?></h2>
                    <img class="w-60 h-60" src="<?= $monstre->getImg() ?>" alt="">
                    <div class="flex">
                        <img class="w-8 h-8" src="../public/assets/imgs/heart.png" alt="">
                        <p class="text-xl"><?= $monstre->getHp() ?> HP</p>
                    </div>
                </div>
            </div>


            <section class="h-90 overflow-y-auto ">

                <?php foreach ($combatLogs as $combatLog) { ?>

                    <div class="bg-<?= $combatLog->getColor() ?>-500/10 p-4 mb-4 rounded border border-<?= $combatLog->getColor() ?>-500 w-full text-center">
                        <p class="text-<?= $combatLog->getColor() ?>-500"> <?= $combatLog->getMessage() ?> </p>
                    </div>
                <?php } ?>

            </section>
        </div>

        <form action="../process/retour_caserne.php" method="post" class="flex gap-4 items-end">
                    <button type="submit" name="idHero" value="1" class="bg-blue-600 h-15 hover:bg-blue-700 text-white font-semibold px-4 py-2 rounded-lg">
                        Retour au choix du héros
                    </button>
                </form>

                <form action="../process/deroule_fight.php" method="post">
                    <button type="submit" name="choixJoueur" value="restart" class="bg-green-600 h-15 hover:bg-green-700 text-white font-semibold px-4 py-2 rounded-lg">
                        Nouveau combat
                    </button>
                </form>





    </main>
</body>

</html>