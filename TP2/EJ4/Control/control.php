<?php

class Publico
{
    public function analizarOpciones($opcionElegida){
        
        if($opcionElegida == "option1"){
            $respuesta = "Todo público";
        } elseif($opcionElegida == "option2"){
            $respuesta = "Mayores de 7 años";
        } elseif($opcionElegida == "option3"){
            $respuesta = "Mayores de 18 años";
        }
        return $respuesta;
    }
}


