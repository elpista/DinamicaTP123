<?php
class Cine{
    public function calcularEntrada($datos){
        $res = "";
        if($datos["estudia"] == "Si" || $datos["edad"]<12){
            $res = "$160";
        }
        else{
            $res = "$300";
        }
        if ($datos["estudia"] == "Si" && $datos["edad"]>=12){
            $res = "$180";
        }
        return $res;
    }
}