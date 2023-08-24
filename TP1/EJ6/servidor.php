<?php

$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$edad = $_POST['edad'];
$direccion = $_POST['direccion'];
$estudios = $_POST['estudios'];
$genero = $_POST['genero'];
$deporte = $_POST['deportes'];


    if ($edad >= 18 && key_exists('deportes', $_POST)){
        echo "Hola, yo soy " . $nombre . ", " . $apellido . ". Soy mayor de edad, tengo " . $edad . " años y vivo en " . $direccion. "Me identifico con el genero " . $genero . " y mi nivel de estudios es: " . $estudios. "\nPractico " . count($_POST['deportes']) . " deportes";
    }
    else if ($edad >= 18){
        echo "Hola, yo soy " . $nombre . ", " . $apellido . ". Soy mayor de edad, tengo " . $edad . " años y vivo en " . $direccion. "Me identifico con el genero " . $genero . " y mi nivel de estudios es: " . $estudios. "\nNo practico deportes";
    }
    else if ($edad < 18 && key_exists('deportes', $_POST)){
        echo "Hola, yo soy " . $nombre . ", " . $apellido . ". Soy menor de edad, tengo " . $edad . " años y vivo en " . $direccion. "Me identifico con el genero " . $genero . " y mi nivel de estudios es: " . $estudios. "\nPractico " . count($_POST['deportes']) . " deportes";
    }
    else if ($edad < 18){
        echo "Hola, yo soy " . $nombre . ", " . $apellido . ". Soy menor de edad, tengo " . $edad . " años y vivo en " . $direccion. "Me identifico con el genero " . $genero . " y mi nivel de estudios es: " . $estudios. "\nNo practico deportes";
    }

