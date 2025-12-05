<?php

require_once '../utils/autoloader.php';

$hero = new Hero(1, "ndsqjidspo");

?>

<div class="flex flex-col justify-center items-center gap-8 bg-[#CDD3D5] p-8 shadow rounded" >
    <form method="POST" action="traitement.php"
        class="w-full max-w-lg bg-white shadow-xl rounded-2xl p-6 space-y-6 ">

        <!-- Points restants -->
        <div class="text-center text-lg font-semibold">
            Points restants :
            <span id="pointsRestants" class="text-blue-600">10</span>
        </div>

        <!-- Paramètre -->
        <div class="space-y-5">

            <!-- HP -->
            <div class="flex justify-between items-center">
                <span class="font-semibold">HP</span>
                <div class="flex items-center gap-3">
                    <button type="button" onclick="changeStat('hp', -1)"
                        class="px-3 py-1 bg-red-500 text-white rounded-lg">-</button>

                    <input id="hp" name="hp" type="number" readonly
                        class="w-20 text-center border rounded-lg p-2 bg-slate-50" value="<?= $hero->getHp() ?>">

                    <button type="button" onclick="changeStat('hp', 1)"
                        class="px-3 py-1 bg-green-500 text-white rounded-lg">+</button>
                </div>
            </div>

            <!-- Attaque -->
            <div class="flex justify-between items-center">
                <span class="font-semibold">Attaque</span>
                <div class="flex items-center gap-3">
                    <button type="button" onclick="changeStat('attaque', -1)"
                        class="px-3 py-1 bg-red-500 text-white rounded-lg">-</button>

                    <input id="attaque" name="attaque" type="number" readonly
                        class="w-20 text-center border rounded-lg p-2 bg-slate-50" value="<?= $hero->getAttaque() ?>">

                    <button type="button" onclick="changeStat('attaque', 1)"
                        class="px-3 py-1 bg-green-500 text-white rounded-lg">+</button>
                </div>
            </div>

        </div>

        <button class="bg-blue-500 text-white px-4 py-2 rounded-md" type="submit">Créer</button>
    </form>
</div>