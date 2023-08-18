<?php
    $respuesta = $_POST["form_number"];
    if($respuesta == 0){
        echo "El numero ingresado es cero";
    } else if($respuesta % 2 == 0){
        echo "El numero ingresado es par";
    } else {
        echo "El numero ingresado es impar";
    }
?>