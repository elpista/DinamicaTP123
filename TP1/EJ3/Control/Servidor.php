<?php
class Servidor {

    function crearSalida($datos){

        return "Hola, yo soy " . $datos["form_nombre"] . ", " . $datos["form_apellido"] . " tengo " . $datos["form_edad"] .
        " anios y vivo en " . $datos["form_direccion"];

    }

}

?>