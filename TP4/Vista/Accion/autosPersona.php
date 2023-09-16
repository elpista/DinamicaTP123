<?php 
include_once("../../configuracion.php");
include_once('../../../estructura.php');
$datos = data_submitted();
$objPers = new AbmPersona();
$objAutos = new AbmAuto();
$autos = $objAutos->buscarDniDuenio($datos);
$listaPersonas = $objPers->buscar($datos);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Autos de cliente</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <?php
        if(count($listaPersonas) == 1){
            echo '<div class="card">
                <div class="card-body">
                    <h4 class="card-title">Detalles de la Persona</h4>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><strong>Nombre:</strong> '. $listaPersonas[0]->getNombre() .'</li>
                        <li class="list-group-item"><strong>Apellido:</strong> '. $listaPersonas[0]->getApellido() . '</li>
                        <li class="list-group-item"><strong>DNI:</strong> '. $listaPersonas[0]->getNroDni() . '</li>
                        <li class="list-group-item"><strong>Fecha de Nacimiento:</strong> '. $listaPersonas[0]->getFechaNac() . '</li>
                        <li class="list-group-item"><strong>Teléfono:</strong> '. $listaPersonas[0]->getTelefono() . '</li>
                        <li class="list-group-item"><strong>Domicilio:</strong> '. $listaPersonas[0]->getDomicilio() . '</li>
                    </ul>
                </div>
            </div>';

            echo '<h4 class="mt-4">Lista de Autos</h4>';
            echo '<table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Patente</th>
                            <th>Marca</th>
                            <th>Modelo</th>
                        </tr>
                    </thead>
                    <tbody>';
            if(count($autos) > 0){
                foreach($autos as $objAuto){
                    echo '<tr>';
                    echo '<td>'.$objAuto->getPatente().'</td>';
                    echo '<td>'.$objAuto->getMarca().'</td>';
                    echo '<td>'.$objAuto->getModelo().'</td>';
                    echo '</tr>'; 
                }
            }else{
                echo '<tr><td colspan="3">No se encontró ningún auto registrado con el DNI ingresado</td></tr>';
            }
            echo '</tbody>
                </table>';
        }else{
            echo '<h4>No se encontró ninguna persona con este DNI.</h4>';
        }
        ?>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

