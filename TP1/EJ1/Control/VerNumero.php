<?php

class VerNumero{

    function verificar($respuesta){
        $salida = '';
        if($respuesta == 0){
            $salida = "El numero ingresado es cero";
        } else if($respuesta % 2 == 0){
            $salida = "El numero ingresado es par";
        } else {
            $salida = "El numero ingresado es impar";
        }

        return $salida;
    }

}
    
?>