<?php
include "../../Control/Persona.php";
include "../../util/encapsulado.php";
$server = new Persona();
$datos = encapsulado();

$salida = $server -> mostrarDatos($datos);
?>

<html>
    <head>
        <title>Salida</title>
    </head>
    <body>
        <h3> <?php echo $salida; ?> </h3>
    </body>
</html>
