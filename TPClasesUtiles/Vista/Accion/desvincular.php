<?php
session_start();

if (isset($_POST['desvincular'])) {
    // Realiza la desvinculación
    unset($_SESSION['logged_in']);

    // Redirige de vuelta a la página principal o realiza cualquier otra acción necesaria
    header("Location: ../index.php");
    exit();
}