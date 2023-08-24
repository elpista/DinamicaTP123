<?php
include "../../Control/VerificaPass.php";
include "../../util/encapsulado.php";
$servidor = new VerificaPass();
$datos = encapsulado();

$salida = $servidor -> verificar($datos);
?>

<html>
    <head>
        <title>Salida</title>

    </head>
    <body>
        <h3> <?php echo $salida; ?> </h3>
    </body>
</html>