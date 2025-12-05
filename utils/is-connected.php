<?php

session_start();

if (
    empty($_SESSION['hero'])

) {
    header('Location: ../public/creation_perso.php');
    return;
}

?>