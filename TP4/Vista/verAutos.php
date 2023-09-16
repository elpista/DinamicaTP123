<?php
include_once("../configuracion.php");
$ejercicio = " Ejercicio 3";
$titulo = "TP4 - " . $ejercicio;
include_once '../estructura.php';
$objAbmAuto = new AbmAuto();
$listaAuto = [];
$listaAuto = $objAbmAuto->buscar(null);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Autos</title>
</head>

<body>
    <div class="container mt-5">
        <h1 class="text-center">Autos</h1>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Patente</th>
                        <th>Marca</th>
                        <th>Modelo</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (count($listaAuto) > 0) {
                        foreach ($listaAuto as $auto) {
                            echo '<tr>';
                            echo '<td>' . $auto->getPatente() . '</td>';
                            echo '<td>' . $auto->getMarca() . '</td>';
                            echo '<td>' . $auto->getModelo() . '</td>';
                            echo '<td>' . $auto->getObjDuenio()->getNombre() . '</td>';
                            echo '<td>' . $auto->getObjDuenio()->getApellido() . '</td>';
                            echo '</tr>';
                        }
                    } else {
                        echo '<tr><td colspan="5">No hay datos cargados.</td></tr>';
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>