<?php
include "../../Control/servidor.php";

$salida = '';
$server = new Servidor();

if($_FILES["inputFile"]["error"] <= 0){

    $salida = $server->verificar($_FILES["inputFile"]);

}else {
    $salida = "Error: no se ha podido cargar el archivo";
}
?>

<html>
    <head>
        <title>Salida</title>

    </head>
    <body>
        <h3> <?php echo $salida; ?> </h3>
    </body>
</html>