<?php

$nombre = $_GET['nombre'];
$apellido = $_GET['apellido'];
$edad = $_GET['edad'];
$direccion = $_GET['direccion'];
$estudios = $_GET['estudios'];
$genero = $_GET['genero'];

    if ($edad >= 18){
        echo "Hola, yo soy " . $nombre . ", " . $apellido . ". Soy mayor de edad, tengo " . $edad . " años y vivo en " . $direccion. "Me identifico con el genero " . $genero . " y mi nivel de estudios es: " . $estudios;
    }
    else{
        echo "Hola, yo soy " . $nombre . ", " . $apellido . ". Soy menor de edad, tengo " . $edad . " años y vivo en " . $direccion. "Me identifico con el genero " . $genero . " y mi nivel de estudios es: " . $estudios;
    }