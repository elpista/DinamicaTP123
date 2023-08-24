<?php
include "C:/xampp/htdocs/pwd/EJ7/Control/Calculadora.php";
include "C:/xampp/htdocs/pwd/EJ7/util/encapsulado.php";
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