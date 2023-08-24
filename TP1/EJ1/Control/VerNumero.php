<?php

class VerNumero{

    function verificar($respuesta){
        $salida = '';
        if($respuesta == 0){
            $salida = "El numero ingresado es cero";
        } else if($respuesta > 0){
            $salida = "El numero ingresado es positivo";
        } else {
            $salida = "El numero ingresado es negativo";
        }

        return $salida;
    }

}
    
?>