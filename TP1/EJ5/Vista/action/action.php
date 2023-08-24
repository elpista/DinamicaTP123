<?php
include "C:/xampp/htdocs/pwd/EJ5/Control/Persona.php";
include "C:/xampp/htdocs/pwd/EJ5/util/encapsulado.php";
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