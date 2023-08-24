<?php

class Servidor{

    public function verificar($archivo){
        $salida = '';
        $dir = "archivos/";
        $link = 'C:\xampp\htdocs\web dinamica\TP3\EJ1\Control\archivos/';
        $tipoDOC = "application/vnd.openxmlformats-officedocument.wordprocessingml.document";
        $tipoPDF = "application/pdf";

        if($archivo["type"] == $tipoDOC ||
        $archivo["type"] == $tipoPDF){
            if((int)$archivo["size"] < 2000000000){
                if(!copy($archivo["tmp_name"], $dir.$archivo["name"])){
                    $salida = "Error: no se ha podido cargar el archivo";
                } else{
                    $salida = "El archivo ha sido copiado con exito, 
                    link del archivo: ". $link . $archivo["name"];
                }
            } else {
                $salida = "Error: El archivo no puede pesar mas de 2mb";
            }
        } else {
            $salida = "Error: El tipo de archivo debe ser .doc o pdf";
        }
        
        return $salida;
    }

}



// Array ( [inputFile] => Array ( [name] => Abuela JoJo D.mp3 [full_path] => Abuela JoJo D.mp3 [type] => audio/mpeg [tmp_name] => C:\xampp\tmp\phpBE63.tmp [error] => 0 [size] => 291872 ) ) 1

// C:\xampp\htdocs\web dinamica\TP3\EJ1\Control\archivos\Informe_de_ascensor.docx

?>