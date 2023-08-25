<?php
include "../../Control/Calculadora.php";
include "../../util/encapsulado.php";
$server = new Calculadora();
$datos = encapsulado();

$salida = $server -> calcular($datos);
?>

<html>
    <head>
        <title>Salida</title>
    </head>
    <body>
        <h3> <?php echo $salida; ?> </h3>
    </body>
</html>