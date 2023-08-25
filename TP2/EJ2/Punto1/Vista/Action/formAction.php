<?php
include "../../Control/VerNumero.php";
include "../../util/encapsulado.php";
$servidor = new VerNumero();

$datos = encapsulado();

$salida = $servidor -> verificar($datos["form_number"]);
?>

<html>
    <head>
        <title>Salida</title>

    </head>
    <body>
        <h3> <?php echo $salida; ?> </h3>
    </body>
</html>