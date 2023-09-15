<?php
include_once '../../configuracion.php';
$ejercicio = " Ejercicio 6";
$titulo = "TP4 - " . $ejercicio;
include_once '../../estructura.php';

$persona = new AbmPersona;
$auto = new AbmAuto;

$datos = data_submitted();

$datos["NroDni"]=$datos["DniDuenio"];

$arrayPersona = $persona->buscar($datos);
$arrayAuto = $auto->buscar($datos);
$autoElegido = null;
$personaElegida = null;
$existeAuto = false;
//var_dump($arrayPersona);
foreach($arrayPersona as $personas){
    if($personas->getNroDni() == $datos['NroDni']){
        $existePersona;
        $personaElegida = $personas;
    }
}

foreach($arrayAuto as $autos){
    if($autos->getPatente() == $datos['Patente']){
        $existeAuto = true;
        $autoElegido = $autos;
    } 
}
//var_dump($arrayAuto);

if($existeAuto){
    if(isset($arrayPersona)){
        $nuevosDatos['Patente'] = $autoElegido->getPatente();
        $nuevosDatos['Marca'] = $autoElegido->getMarca();
        $nuevosDatos['Modelo'] = $autoElegido->getModelo();
        $nuevosDatos['DniDuenio']=$personaElegida->getNroDni();

        //Ayuda para los que corrigen y para acordarme despues, falta verificar si el auto ya pertenece a la persona ingresada.
        if($auto->modificacion($nuevosDatos)){
            ?>
            <p style="text-align: center;">El auto de patente: <?php echo $datos['Patente'] ?> ahora pertenece a la persona con DNI: <?php echo $datos['DniDuenio'] ?>.</p>
            <?php
        } else{
            ?>
            <p style='color: red; text-align: center; '>Hubo problemas con la modificación del propietario. (Probablemente el dni ingresado corresponda al dueño actual)</p>
            <?php
        }
    } else {
        ?> 
        <p style='color: red; text-align: center; '>El documento ingresado no se encuentra en el sistema, <a href="../NuevaPersona.php">registrese aquí.</a></p>
        <?php
    }
} else{
    ?>
    <p style='color: red; text-align: center; '>El auto ingresado no se encuentra en el sistema, <a href="../NuevoAuto.php">registrelo aquí.</a></p>
    <?php
}

/*$existeAuto = false;
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
    if(isset($arrayPersona)){
        //$resp = $auto->alta($datos);
        if($resp){
            ?>
            <p style='color: green; text-align: center;'>El auto <?php $datos['Patente'] ?> ahora pertenece a <?php '{$arrayPersona["Apellido"]} {$arrayPersona["Apellido"]}'?>.</p>";
            <?php
        }else{
            echo "<p style='color: red; text-align: center; '>Ocurrio un error y el auto no pudo ser cargado.</p>";
        }
    } else{
        
        echo "<p style='color: red; text-align: center; '>El propietario ingresado no se encuentra en el sistema <a aqui va el href>registrese aquí</a></p>";
    }
} 
    */