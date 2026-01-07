<?php



?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Legend Fighter</title>
    <link rel="stylesheet" href="./assets/styles/output.css">
    <link rel="shortcut icon" type="image/png" href="../public/assets/imgs/epee.png"/>
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Manrope:wght@200..800&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Roboto:ital,wght@0,100..900;1,100..900&family=Rokkitt:ital,wght@0,100..900;1,100..900&family=Varela+Round&display=swap");
    </style>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Berkshire+Swash&family=Dancing+Script:wght@400..700&family=Roboto:ital,wght@0,100..900;1,100..900&family=Sriracha&family=Style+Script&display=swap');
    </style>

    <script src="./assets/scripts/formulaire-stats.js" defer></script>
</head>

<body class="font-['Berkshire_Swash'] bg-[url('../imgs/decors-jeu-combat-124.gif')] bg-cover">


    <main class="h-screen flex flex-col justify-center items-center gap-12 text-[#000000]">
        <img src="assets/imgs/Logo.gif" alt="Logo">
        <h1 class="text-5xl font-bold  text-[#cccfd8] transform-3d [text-shadow:2px_2px_0_#000,4px_4px_0_#444]">Legend Figther</h1>
        <a class="bg-blue-500 top-4 right-24 absolute text-white px-4 py-2 rounded-md" href="../public/perso_selection.php">Choix des heros</a>


        <div class="flex flex-col items-center text-center border border-black/30 gap-6  shadow-xl shadow-black/30">

            <form enctype="multipart/form-data" class="flex flex-col items-center shadow p-4" action="../process/creat_charactere.php" method="post">

                <label for="selectionPhoto" class="block">

                    <span class="sr-only">Choose profile photo</span>
                    <div class="flex gap-4">

                        <!-- Perso 1 -->
                        <label class="cursor-pointer">
                            <input
                                type="radio"
                                name="idPerso"
                                value="assets/imgs/perso1.gif"
                                class="hidden peer">
                            <img
                                src="assets/imgs/perso1.gif"
                                class="h-80 rounded-lg
                                border-4 border-transparent
                                transition-all duration-200
                                hover:scale-105
                                 peer-checked:border-green-500"
                                alt="">
                        </label>

                        <!-- Perso 2 -->
                        <label class="cursor-pointer">
                            <input
                                type="radio"
                                name="idPerso"
                                value="assets/imgs/perso2.gif"
                                class="hidden peer">
                            <img
                                src="assets/imgs/perso2.gif"
                                class="h-80 rounded-lg
                                border-4 border-transparent
                                transition-all duration-200
                                hover:scale-105
                                peer-checked:border-green-500"
                                alt="">
                        </label>

                        <!-- Perso 3 -->
                        <label class="cursor-pointer">
                            <input
                                type="radio"
                                name="idPerso"
                                value="assets/imgs/perso3.gif"
                                class="hidden peer">
                            <img
                                src="assets/imgs/perso3.gif"
                                class="h-80 rounded-lg
                                border-4 border-transparent
                                transition-all duration-200
                                hover:scale-105
                                peer-checked:border-green-500"
                                alt="">
                        </label>

                    </div>



                    <?php include './formulaire_stats.php'; ?>
                    <div>

            </form>
            <?php if (isset($_GET['hero-already-exists'])) { ?>

                <div class="bg-red-500/10 p-4 mb-4 rounded border border-red-500 w-9/10 sm:w-7/10 lg:w-4/10 xl:w-3/10 2xl:w-4/20 text-center">
                    <p class="text-red-500">Ce Hero existe déja ! </p>
                </div>

            <?php } ?>
        </div>
    </main>

</body>

</html>