<?php
require_once '../utils/autoloader.php';
require_once '../utils/db-connect.php';
$heroRepository = new HeroRepository($db);
$allHero = $heroRepository->findAllHero();


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

</head>

<body class=" px-4  bg-[url('../imgs/decors-jeu-combat-038.gif')] bg-cover ">

    <main class="w-full flex flex-col items-center gap-8 py-6 font-['Berkshire_Swash']">
        <div class="flex static">
            <h1 class="text-6xl font-bold [text-shadow:2px_2px_0_#000,4px_4px_0_#444] text-[#cccfd8]">Choix d'un hero</h1>
            <a class="bg-blue-500 right-20 absolute text-white px-4 py-2 rounded-md" href="../public/creation_perso.php">Creer un hero</a>
        </div>
        <form action="../process/select_charactere.php" method="post" class="flex flex-wrap items-center gap-6 w-screen">
            <?php foreach ($allHero as $key => $hero) {  ?>



                <div class=" flex flex-col items-center gap-4 p-4 font-['Berkshire_Swash'] text-white">
                    <h2 class="text-2xl  font-semibold">
                        <?= ($hero['hp'] <= 0) ? 'Héros mort' : 'Héros en vie' ?>
                    </h2>
                    <h3 class="text-xl font-semibold "><?= $hero['nom'] ?></h3>
                    <img class="h-45 w-45" src="<?= $hero['img'] ?>" alt="">
                    <div class="flex gap-2">
                        <img class="w-8 h-8" src="../public/assets/imgs/heart.png" alt="coeur">
                        <p class="text-xl"><?= $hero['hp'] ?></p>
                    </div>
                    <?php if ($hero['hp'] > 0): ?>
                        <button class="bg-blue-500 text-white px-4 py-2 rounded-md" type="submit" name="idHero" value="<?= $hero['id'] ?>">Choisir</button>
                    <?php else: ?>
                        <p class="text-red-500">Impossible de sélectionner ce héros</p>
                    <?php endif; ?>

                </div>
            <?php } ?>
        </form>
    </main>

</body>

</html>