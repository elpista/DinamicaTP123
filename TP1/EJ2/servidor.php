<?php
    $lunes = $_GET["form_lunes"];
    $martes = $_GET["form_martes"];
    $miercoles = $_GET["form_miercoles"];
    $jueves = $_GET["form_jueves"];
    $viernes = $_GET["form_viernes"];

    $horasPorsemana = ($lunes + $martes + $miercoles + $jueves + $viernes)/5;

    echo "las horas por semana son: ";
    echo $horasPorsemana;
?>