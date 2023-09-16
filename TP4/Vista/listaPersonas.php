<?php
    include_once("../configuracion.php");
    $abmPersona= new AbmPersona();
    $personas = array();
    $personas = $abmPersona->buscar(null);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista Personas</title>
</head>
<body>
    <div class="contenido">
        <h1>Lista de Personas</h1>
        <div>
            <table>
                <tr>
                    <th>DNI</th>
                    <th>Apellido</th>
                    <th>Nombre</th>
                    <th>Fecha Nacimiento</th>
                    <th>Teléfono</th>
                    <th>Domicilio</th>
                    <th>Autos</th>
                </tr>
                <tbody>
                    <?php
                    if (count($personas) > 0) {
                        for ($i = 0; $i < count($personas); $i++) {
                            echo "<tr>";
                            echo "<td>" . $personas[$i]->getNroDni() . "</td>";
                            echo "<td>" . $personas[$i]->getApellido() . "</td>";
                            echo "<td>" . $personas[$i]->getNombre() . "</td>";
                            echo "<td>" . $personas[$i]->getFechaNac() . "</td>";
                            echo "<td>" . $personas[$i]->getTelefono() . "</td>";
                            echo "<td>" . $personas[$i]->getDomicilio() . "</td>";
                            echo '<td><form action="./accion/autosPersona.php" method="post">
                                    <input type="hidden" name="NroDni" value="' . $personas[$i]->getNroDni() . '">
                                    <button type="submit" class="btn btn-link">Ver Autos</button>
                                    </form></td>';
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td>No hay Personas</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>