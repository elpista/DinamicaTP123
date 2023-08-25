<?php
include "C:/xampp/htdocs/pwd/EJ8/Control/Cine.php";
include "C:/xampp/htdocs/pwd/EJ8/util/encapsulado.php";
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