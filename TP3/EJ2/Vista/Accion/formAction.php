<?php
include "../../Control/Servidor.php";

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
    <textarea rows='4' cols='50'> <?php echo $salida ?> </textarea>
    </body>
</html>