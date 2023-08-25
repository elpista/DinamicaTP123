<?php
include "../../Control/Cine.php";
include "../../util/encapsulado.php";
$server = new Cine();
$datos = encapsulado();

$salida = $server -> calcularEntrada($datos);
?>

<html>
    <head>
        <title>Salida</title>
    </head>
    <body>
        <h3> <?php echo $salida; ?> </h3>
    </body>
</html>