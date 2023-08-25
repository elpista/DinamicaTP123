<?php
include "../../Control/Servidor.php";
include "../../util/encapsulado.php";
$servidor = new Servidor();
$datos = encapsulado();

$salida = $servidor -> crearSalida($datos);
?>

<html>
    <head>
        <title>Salida</title>

    </head>
    <body>
        <h3> <?php echo $salida; ?> </h3>
    </body>
</html>