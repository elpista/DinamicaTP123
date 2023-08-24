<?php

class VerificaPass{

    function verificar($datos){

        $salida = '';
        $baseDatos = [];
        $baseDatos[0]["usuario"] = "pista";
        $baseDatos[0]["clave"] = "contrasenia";
        $baseDatos[1]["usuario"] = "ramiro";
        $baseDatos[1]["clave"] = "probando123";
        $baseDatos[2]["usuario"] = "alguien";
        $baseDatos[2]["clave"] = "nosemeocurre";

        $contador = 0;
        $validacion = false;
        while($contador < count($baseDatos) && $validacion == false){
            if($baseDatos[$contador]["usuario"] == $datos["validationCustomUsername"]
            && $baseDatos[$contador]["clave"] == $datos["validationDefaultPassword"]){
                $validacion = true;
            } else{
                $contador = $contador + 1;
            }
        }

        if($validacion == true) {
            $salida = "¡Bienvenido " . $datos["validationCustomUsername"] . "!";
        } else {
            $salida = "Error, los datos ingresados no se encuentran en la base de datos.";
        }
        return $salida;
    }

}

?>