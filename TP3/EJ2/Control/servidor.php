<?php

$dir = 'archivos/';
$link = 'C:\xampp\htdocs\web dinamica\TP3\EJ2\Control\archivos/';
$tipoTXT = 'text/plain';

if($_FILES["inputFile"]["error"] <= 0){

    if($_FILES["inputFile"]["type"] == $tipoTXT){
            if(!copy($_FILES["inputFile"]["tmp_name"], $dir.$_FILES["inputFile"]["name"])){
                echo "Error: no se ha podido subir el archivo";
            } else{
                $fp = fopen("archivos/" . $_FILES["inputFile"]["name"], "r");
                $linea = fgets($fp);
                echo "<textarea rows='4' cols='50'> " . $linea . " </textarea>";
            }
        } else {
        echo "Error: El tipo de archivo debe ser .doc o pdf";
    }

} else {
    echo "Error: no se ha podido cargar el archivo";
}

?>