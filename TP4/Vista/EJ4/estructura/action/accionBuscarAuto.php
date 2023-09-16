<?php
$ejercicio = " Ejercicio 4";
$titulo = "TP4 - " . $ejercicio;
include_once '../../../../configuracion.php';
include_once '../../../../../estructura.php';

$param["patente"] = $_GET["patente"];
$auto = new AbmAuto();
$busqueda = $auto->buscar($param);
$respuesta = "";
if(!empty($busqueda)){

    $patente = $busqueda[0]->getPatente();
    $marca = $busqueda[0]->getMarca();
    $modelo = $busqueda[0]->getModelo();

    //cambiar por $busqueda[0]->getObjDuenio();
    $dniDuenio = $busqueda[0]->getObjDuenio()->getNroDni();

    $respuesta = 
" <h3>Datos del auto:</h3>
<br/>
<table>
<tr>
    <td>Patente</td>
    <td>" . $patente . "</td>
</tr>
<tr>
    <td>Marca</td>
    <td>" . $marca . "</td>
</tr>
<tr>
    <td>Modelo</td>
    <td>" . $modelo . "</td>
</tr>
<tr>
    <td>DNI del duenio</td>
    <td>" . $dniDuenio . "</td>
</tr>
</table>";

} else{

    $respuesta = "<h3>No se ha encontrado un auto con la patente especificada</h3>";

}

?>

<html>
    <head>
        <title> Respuesta </title>
        <link rel="stylesheet" href="../bootstrap-5.1.3-dist/css/bootstrap.min.css"/>
        <link rel="stylesheet" href="../../css/tablas.css"/>
        <script src="bootstrap-5.1.3-dist/js/bootstrap.min.js"></script>
    </head>
    <body>
        <?php
            echo $respuesta;
        ?>
    </body>
</html>