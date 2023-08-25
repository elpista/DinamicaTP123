<?php




class Publico
{
    public function analizarOpciones($opcionElegida)
    {

        if ($opcionElegida == "option1") {
            $respuesta = "Todo público";
        } elseif ($opcionElegida == "option2") {
            $respuesta = "Mayores de 7 años";
        } elseif ($opcionElegida == "option3") {
            $respuesta = "Mayores de 18 años";
        }
        return $respuesta;
    }
}

class Servidor
{




    public function verificarArchivo()
    {
        $dir = 'archivos/';
        $link = 'C:\xampp\htdocs\Trabajos\Tp2-ej4\tp2-ej4\Vista\Test';
        $tipoPNG = 'image/png';
        $tipoJPEG = 'image/jpeg';
        $salida = '';


        if ($_FILES["portada"]["type"] == $tipoPNG || $_FILES["portada"]["type"] == $tipoJPEG) {
            if (!copy($_FILES["portada"]["tmp_name"], $dir . $_FILES["portada"]["name"])) {

                $salida = "Error, no se ha podido enviar el archivo!";
                /* echo "
                <p style='color: red; font-size: 2em; margin: 25% 25%; display:relative; text-align: center;'>Error no se ha podido enviar el archivo!</p>";*/
            } else {
                $fp = fopen("archivos/" . $_FILES["portada"]["name"], "r");
            }
        } else {
            /*echo "<p style='color: red; font-size: 2em; margin: 25% 25%; display:relative; text-align: center;'>Error: El tipo de archivo debe ser .png o .jpeg</p>";*/
            $salida = "Error: El tipo de archivo debe ser .png o .jpeg";
        }

        return $salida;
    }
}
