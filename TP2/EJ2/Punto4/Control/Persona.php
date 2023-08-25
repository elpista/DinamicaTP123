<?php
class Persona{   
    public function mostrarDatos($datos){
        if ($datos["edad"] >= 18){
            $res = "Hola, yo soy " . $datos["nombre"] . ", " . $datos["apellido"] . ". Soy mayor de edad, tengo " . $datos["edad"] . " años y vivo en " . $datos["direccion"];
        }
        else{
            $res = "Hola, yo soy " . $datos["nombre"] . ", " . $datos["apellido"] . ". Soy menor de edad, tengo " . $datos["edad"] . " años y vivo en " . $datos["direccion"];
        }
        return $res;
    }
}
