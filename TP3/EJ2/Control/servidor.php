<?php

class Servidor{

    function verificar($archivo){

        $salida = '';
        $dir = 'archivos/';
        $link = 'C:\xampp\htdocs\web dinamica\TP3\EJ2\Vista\Accion\archivos/';
        $tipoTXT = 'text/plain';

        if($archivo["error"] <= 0){
        
            if($archivo["type"] == $tipoTXT){
                    if(!copy($archivo["tmp_name"], $dir.$archivo["name"])){
                        $salida = "Error: no se ha podido subir el archivo";
                    } else{
                        $fp = fopen("archivos/" . $archivo["name"], "r");
                        $linea = fgets($fp);
                        $salida =  $linea;
                    }
                } else {
                $salida = "Error: El tipo de archivo debe ser .doc o pdf";
            }
        
        } else {
            $salida = "Error: no se ha podido cargar el archivo";
        }

        return $salida;
    }
}
?>