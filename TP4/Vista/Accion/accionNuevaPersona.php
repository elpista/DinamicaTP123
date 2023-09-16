<?php
include_once '../../configuracion.php';
include_once '../../util/funciones.php';

$param = data_submitted();
$abmPersona = new AbmPersona();
$personas = $abmPersona->buscar($param);
$existe = false;
$i = 0;
    while (!$existe && $i < count($personas)) {
        if ($personas[$i]->getNroDni() == $dni) {
            $existe = true;
        }
        $i++;
    }
    if ($existe) {
        $salida = "Ya existe una persona con este DNI.";
    } else {
        $respuesta = $abmPersona->alta($param);
        if ($respuesta) {
            $salida = "La persona fue cargada con éxito.";
        } else {
            $salida = "Error al cargar la persona.";
        }
    }

?>

<html>
    <head>
        <title>Ejercicio 6 | salida</title>

    </head>
    <body>
        <h3> <?php echo $salida; ?> </h3>
    </body>
</html>