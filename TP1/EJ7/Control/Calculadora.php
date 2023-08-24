<?php
class Calculadora{
    public function calcular($datos){
    if($datos["operacion"] == "suma"){
        $resultado = $datos["numero1"] +$datos["numero2"];
        $res = "se realizo una ".$datos["operacion"].
        " con los numeros: ".$datos["numero1"] ." y ".$datos["numero2"].
        " el resultado es: ".$resultado;
        return $res;
    }
    else if($datos["operacion"] == "resta"){
        $resultado = $datos["numero1"] -$datos["numero2"];
        $res = "se realizo una ".$datos["operacion"].
        " con los numeros: ".$datos["numero1"] ." y ".$datos["numero2"].
        " el resultado es: ".$resultado;
        return $res;
    }
    else if($datos["operacion"] == "multiplicacion"){
        $resultado = $datos["numero1"] *$datos["numero2"];
        $res = "se realizo una ".$datos["operacion"].
        " con los numeros: ".$datos["numero1"] ." y ".$datos["numero2"].
        " el resultado es: ".$resultado;
        return $res;
    }
    }
}