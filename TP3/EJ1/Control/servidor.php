<?php

$dir = "archivos/";
$link = 'C:\xampp\htdocs\web dinamica\TP3\EJ1\Control\archivos/';
$tipoDOC = "application/vnd.openxmlformats-officedocument.wordprocessingml.document";
$tipoPDF = "application/pdf";

if($_FILES["inputFile"]["error"] <= 0){


    if($_FILES["inputFile"]["type"] == $tipoDOC || 
    $_FILES["inputFile"]["type"] == $tipoPDF){
        if((int)$_FILES["inputFile"]["size"] < 2000000000){
            if(!copy($_FILES["inputFile"]["tmp_name"], $dir.$_FILES["inputFile"]["name"])){
                echo "Error: no se ha podido cargar el archivo";
            } else{
                echo "El archivo ha sido copiado con exito <br/>
                Link del archivo: ". $link . $_FILES["inputFile"]["name"];
            }
        } else {
            echo "Error: El archivo no puede pesar mas de 2mb";
        }
    } else {
        echo "Error: El tipo de archivo debe ser .doc o pdf";
    }

} else {
    echo "Error: no se ha podido cargar el archivo";
}

// Array ( [inputFile] => Array ( [name] => Abuela JoJo D.mp3 [full_path] => Abuela JoJo D.mp3 [type] => audio/mpeg [tmp_name] => C:\xampp\tmp\phpBE63.tmp [error] => 0 [size] => 291872 ) ) 1

// C:\xampp\htdocs\web dinamica\TP3\EJ1\Control\archivos\Informe_de_ascensor.docx
?>