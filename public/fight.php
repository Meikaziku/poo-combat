<?php
require_once '../utils/autoloader.php';
require_once '../utils/db-connect.php';
session_start();
// var_dump($_SESSION['monstre']->getHp());
/**
 * @var Hero $hero
 */
$hero = $_SESSION['hero'];
$monstre = $_SESSION['monstre'];



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
        @import url('https://fonts.googleapis.com/css2?family=Berkshire+Swash&family=Dancing+Script:wght@400..700&family=Roboto:ital,wght@0,100..900;1,100..900&family=Sriracha&family=Style+Script&display=swap');
    </style>

    <script src="./assets/scripts/fight-actions.js" defer></script>
</head>

<body class="font-['Style_Script'] bg-cover bg-center bg-no-repeat min-h-screen" style="background-image: url('<?= htmlspecialchars($_SESSION['donjon']->getBackgroundUrl(), ENT_QUOTES) ?>')">
    <main class="flex flex-col items-center gap-12 text-white">
        <h1 class="text-4xl">Fight !</h1>
        <p class="text-xl">Voici le résultat du fight contre le <?= $_SESSION['monstre']->getNom() ?></p>


        <div class="flex gap-8 items-center ">
            <div class=" flex flex-col items-center gap-2 p-4">
                <h2 class="text-2xl font-semibold"><?= $hero->getNom() ?></h2>
                <img class="w-80 h-100" src="<?= $hero->getImg() ?>" alt="">
                <div class="flex">
                    <img class="w-8 h-8" src="../public/assets/imgs/heart.png" alt="">
                    <p id="hero-hp" class="text-xl"><?= $hero->getHp() ?></p>
                </div>
            </div>

            <div class="text-center">
                <button id="attackBtn"
                    class="px-6 py-3 bg-red-600 hover:bg-red-700 rounded-lg text-xl text-white">
                    ⚔️ Attaquer
                </button>
            </div>

            <div class="flex gap-8 relative">
                <div class="hidden">
                    <p class="absolute text-xl right-10 text-red-700">- 30</p>
                    <img class="w-8 h-8 absolute right-2" src="../public/assets/imgs/heart.png" alt="">
                </div>
                <div class=" flex flex-col items-center gap-2 p-4">
                    <h2 class="text-2xl font-semibold"><?= $monstre->getNom() ?></h2>
                    <img class="w-80 h-100" src="<?= $monstre->getImg() ?>" alt="">
                    <div class="flex">
                        <img class="w-8 h-8" src="../public/assets/imgs/heart.png" alt="">
                        <p id="monstre-hp" class="text-xl"><?= $monstre->getHp() ?></p>
                    </div>
                </div>
            </div>


            <section class="h-90 overflow-y-auto ">



            </section>
        </div>

        <form action="../process/retour_caserne.php" method="post" class="flex gap-4 items-end">
            <button type="submit" name="idHero" value="1" class="bg-blue-600 h-15 hover:bg-blue-700 text-white font-semibold px-4 py-2 rounded-lg">
                Retour au choix du héros
            </button>
        </form>



        <form id="nextFight" action="../process/deroule_fight.php" method="post" class="hidden">
            <button  type="submit" name="choixJoueur" value="restart" class="bg-green-600 h-15 hover:bg-green-700 text-white font-semibold px-4 py-2 rounded-lg">
                Nouveau combat
            </button>
        </form>







    </main>
</body>

</html>