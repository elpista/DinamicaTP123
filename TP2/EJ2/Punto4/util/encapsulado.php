<?php

function encapsulado(){
    if($_POST){
        $respuesta = $_POST;
    }
    if($_GET){
        $respuesta = $_GET;
    }
    return $respuesta;
}

?>