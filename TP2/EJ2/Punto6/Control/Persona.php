<?php
class Persona{   
    public function mostrarDatos($datos){
        if ($datos["edad"] >= 18){
            $res = "Hola, yo soy " . $datos["nombre"] . ", " . $datos["apellido"] . ". Soy mayor de edad, tengo " . $datos["edad"] . " años y vivo en " . $datos["direccion"].
            " Me identifico como: " . $datos["genero"] . " y mi nivel de estudios es: " . $datos["estudios"]. "\nPractico: " . count($datos["deportes"])." deportes";
        }
        else{
            $res = "Hola, yo soy " . $datos["nombre"] . ", " . $datos["apellido"] . ". Soy menor de edad, tengo " . $datos["edad"] . " años y vivo en " . $datos["direccion"].
            " Me identifico como: " . $datos["genero"] . " y mi nivel de estudios es: " . $datos["estudios"]. "\nPractico: " . count($datos["deportes"])." deportes";
        }
        return $res;
    }
}
