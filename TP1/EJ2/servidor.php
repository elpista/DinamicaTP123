<?php
    $dias = [];

    $dias["lunes"] = $_GET["form_lunes"];
    $dias["martes"] = $_GET["form_martes"];
    $dias["miercoles"] = $_GET["form_miercoles"];
    $dias["jueves"] = $_GET["form_jueves"];
    $dias["viernes"] = $_GET["form_viernes"];

    $horasPorsemana = ($dias["lunes"] + $dias["martes"] + $dias["miercoles"] + $dias["jueves"] + $dias["viernes"])/5;

    echo "las horas por semana son: ";
    echo $horasPorsemana;
?>