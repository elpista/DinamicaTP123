<?php
include_once '../../configuracion.php';
$ejercicio = " Ejercicio 9";
$titulo = "TP4 - " . $ejercicio;
include_once '../../../estructura.php';

$persona = new AbmPersona;
$auto = new AbmAuto;

$datos = data_submitted();




if ($persona->modificacion($datos)) {
?>
    <p style="text-align: center;">Los datos fueron actualizados correctamente.</p>
<?php
} else {
?>
    <p style='color: red; text-align: center; '>No se realizaron cambios</p>

<?php
}
