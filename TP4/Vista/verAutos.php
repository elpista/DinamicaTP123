<?php
    include_once("../configuracion.php");
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
    <div class="contenido">
        <h1>Autos</h1>
        <div>
            <table>
                <tr>
                    <th>Patente</th>
                    <th>Marca</th>
                    <th>Modelo</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                <tbody>
                <?php
                    if (count($listaAuto) > 0) {
                    for ($i=0; $i<count($listaAuto); $i++) {
                        echo '<tr>';
                        echo '<td>' . $listaAuto[$i]->getPatente() . '</td>';
                        echo '<td>' . $listaAuto[$i]->getMarca() . '</td>';
                        echo '<td>' . $listaAuto[$i]->getModelo() . '</td>';
                        echo '<td>' . $listaAuto[$i]->getObjDuenio()->getNombre() . '</td>';
                        echo '<td>' . $listaAuto[$i]->getObjDuenio()->getApellido(). '</td>';
                        echo '</tr>';
                    }
                    } else {
                        echo '<tr><td colspan="7">No hay datos cargados.</td></tr>';
                    }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>