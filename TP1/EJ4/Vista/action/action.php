<?php
include "servidor.php";
$server = new Persona();
$salida = $server -> mostrarDatos();
?>

<html>
    <head>
        <title>Salida</title>
    </head>
    <body>
        <h3> <?php echo $salida; ?> </h3>
    </body>
</html>