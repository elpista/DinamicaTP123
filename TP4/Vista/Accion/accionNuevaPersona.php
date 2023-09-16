<?php
$ejercicio = " Ejercicio 6";
$titulo = "TP4 - " . $ejercicio;
include_once '../../configuracion.php';
include_once '../../../estructura.php';

$param = data_submitted();
$abmPersona = new AbmPersona();
$personas = $abmPersona->buscar($param);
$existe = 0;
$i = 0;
    while (!$existe && $i < count($personas)) {
        if ($personas[$i]->getNroDni() == $param['NroDni']) {
            $existe = 1;
        }
        $i++;
    }
    if ($existe == 1) {
        $salida = "Ya existe una persona con este DNI.";
    } else {
        $resultado = $abmPersona->alta($param);

        if ($resultado) {
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