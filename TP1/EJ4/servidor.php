<?php

$nombre = $_GET['nombre'];
$apellido = $_GET['apellido'];
$edad = $_GET['edad'];
$direccion = $_GET['direccion'];

    if ($edad >= 18){
        echo "Hola, yo soy " . $nombre . ", " . $apellido . ". Soy mayor de edad, tengo " . $edad . " años y vivo en " . $direccion;
    }
    else{
        echo "Hola, yo soy " . $nombre . ", " . $apellido . ". Soy menor de edad, tengo " . $edad . " años y vivo en " . $direccion;
    }