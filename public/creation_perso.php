<?php



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
    <script src="./assets/scripts/formulaire-stats.js" defer></script>
</head>

<body class="font-[Roboto]">

    <main class="h-screen flex flex-col justify-center items-center gap-16">
        <h1 class="text-5xl font-bold">Legend Figther</h1>
        <a class="bg-blue-500 top-4 right-24 absolute text-white px-4 py-2 rounded-md" href="../public/perso_selection.php">Choix des heros</a>


        <div class="w-1/2 flex flex-col items-center text-center border border-black/30 gap-6 p-5">

            <form enctype="multipart/form-data" class="flex flex-col items-center gap-5" action="../process/creat_charactere.php" method="post">
                <h2 class="text-3xl">Créez votre hero</h2>
                <label for="selectionPhoto" class="block">

                    <span class="sr-only">Choose profile photo</span>
                    <input id="selectionPhoto" name="selectionPhoto" type="file" class="block w-full text-sm font-[Roboto] text-gray-500
                         file:me-4 file:py-2 file:px-4
                        file:rounded-lg file:border-0
                        file:text-sm file:font-semibold
                        file:bg-blue-600 file:text-white
                        hover:file:bg-blue-700
                        file:disabled:opacity-50 file:disabled:pointer-events-none
                        dark:text-neutral-500
                        dark:file:bg-blue-500
                        dark:hover:file:bg-blue-400">
                </label>

                <label class="text-2xl" for="heroName">Nom du hero</label>
                <input class=" border border-black/30 py-2 px-3" type="text" name="heroName" id="heroName" placeholder="Nom">
                
                <?php include './formulaire_stats.php'; ?>
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