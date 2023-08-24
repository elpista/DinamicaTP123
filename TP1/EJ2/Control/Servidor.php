<?php

class Servidor{

    function calcularHoras($datos){

        $dias = [];

        $dias["lunes"] = $datos["form_lunes"];
        $dias["martes"] = $datos["form_martes"];
        $dias["miercoles"] = $datos["form_miercoles"];
        $dias["jueves"] = $datos["form_jueves"];
        $dias["viernes"] = $datos["form_viernes"];

        $horasPorsemana = ($dias["lunes"] + $dias["martes"] + $dias["miercoles"] + $dias["jueves"] + $dias["viernes"])/5;

        $inicio = "las horas por semana son: ";
        return $inicio . $horasPorsemana;
    }
}
?>