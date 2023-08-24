<?php

$numero1 = $_GET["numero1"];
$numero2 = $_GET["numero2"];
$operacion = $_GET["operacion"];

if($operacion == "suma"){
    $resultado = $numero1+$numero2;
    echo "se realizo una ".$operacion.
    " con los numeros: ".$numero1." y ".$numero2.
    " el resultado es: ".$resultado;
}
else if($operacion == "resta"){
    $resultado = $numero1-$numero2;
    echo "se realizo una ".$operacion.
    " con los numeros: ".$numero1." y ".$numero2.
    " el resultado es: ".$resultado;
}
else if($operacion == "multiplicacion"){
    $resultado = $numero1*$numero2;
    echo "se realizo una ".$operacion.
    " con los numeros: ".$numero1." y ".$numero2.
    " el resultado es: ".$resultado;
}