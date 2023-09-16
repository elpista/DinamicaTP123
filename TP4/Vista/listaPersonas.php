<?php
include_once("../configuracion.php");

$ejercicio = " Ejercicio 5";
$titulo = "TP4 - " . $ejercicio;
include_once '../../estructura.php';
$abmPersona = new AbmPersona();
$personas = array();
$personas = $abmPersona->buscar(null);
?>

<div class="container mt-5">
    <h1 class="text-center">Lista de Personas</h1>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>DNI</th>
                    <th>Apellido</th>
                    <th>Nombre</th>
                    <th>Fecha Nacimiento</th>
                    <th>Teléfono</th>
                    <th>Domicilio</th>
                    <th>Autos</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (count($personas) > 0) {
                    foreach ($personas as $persona) {
                        echo "<tr>";
                        echo "<td>" . $persona->getNroDni() . "</td>";
                        echo "<td>" . $persona->getApellido() . "</td>";
                        echo "<td>" . $persona->getNombre() . "</td>";
                        echo "<td>" . $persona->getFechaNac() . "</td>";
                        echo "<td>" . $persona->getTelefono() . "</td>";
                        echo "<td>" . $persona->getDomicilio() . "</td>";
                        echo '<td>
                                    <form action="./accion/autosPersona.php" method="post">
                                        <input type="hidden" name="NroDni" value="' . $persona->getNroDni() . '">
                                        <button type="submit" class="btn btn-link">Ver Autos</button>
                                    </form>
                                </td>';
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='7'>No hay Personas</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>
</body>

</html>