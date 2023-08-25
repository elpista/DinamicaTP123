<?php

class VerNumero {
    function verificar($respuesta){
        $resultado = '';
    if($respuesta == 0){
        $resultado = "El numero ingresado es cero";
    } else if($respuesta > 0){
        $resultado = "El numero ingresado es positivo";
    } else if ($respuesta < 0){
        $resultado = "El numero ingresado es negativo";
    } else if($respuesta == '') {
        $resultado = "ERROR: Debe ingresar un numero valido.";
    }
    return $resultado;
    }
}
?>
<a href="../index.php">Ingresar otro numero</a>