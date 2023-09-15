<?php
include_once '../../configuracion.php';
$ejercicio = " Ejercicio 5";
$titulo = "TP4 - " . $ejercicio;
include_once '../../estructura.php';

$persona = new AbmPersona;
$auto = new AbmAuto;

$datos = data_submitted();

$arrayDni = array('DniDuenio' => $datos['DniDuenio']);
$objPersona = $persona->buscar($arrayDni);

$objAuto = $auto->buscar($datos);
$existeAuto = false;
foreach($objAuto as $autos){
    if($autos->getPatente() == $datos['Patente']){
        $existeAuto = true;
    } 
}


foreach($objPersona as $duenio){
    if($duenio->getNroDni() == $datos['DniDuenio']){
        $arrayPersona = $duenio;
        $datos['DniDuenio'] = $arrayPersona;
    }
}



if($existeAuto){
    ?>
    <p style='color: red; text-align: center; '>El auto ya se encuentra ingresado en el sistema.</p>;
    <?php
} else{
    if(isset($arrayPersona)){
        $resp = $auto->alta($datos);
        if($resp){
            ?>
            <p style='color: green; text-align: center;'>El auto fue cargado al sistema con éxito.</p>;
            <?php
        }else{
            ?>
            <p style='color: red; text-align: center; '>Ocurrio un error y el auto no pudo ser cargado.</p>;
            <?php
        }
    } else{
        ?>
        <p style='color: red; text-align: center; '>El propietario ingresado no se encuentra en el sistema <a href="../NuevaPersona.php">registrese aquí</a></p>";
    <?php
    }
    
}



?>