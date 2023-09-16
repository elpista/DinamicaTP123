<?php
include_once '../../configuracion.php';
$ejercicio = " Ejercicio 9";
$titulo = "TP4 - " . $ejercicio;
include_once '../../estructura.php';

$persona = new AbmPersona;
$auto = new AbmAuto;

$datos = data_submitted();

$datos["NroDni"]=$datos["DniDuenio"];

$arrayPersona = $persona->buscar($datos);
$personaElegida = null;

foreach($arrayPersona as $personas){
    if($personas->getNroDni() == $datos['NroDni']){
        $personaElegida = $personas;
    }
}

if($personaElegida !== null) {
?>
<h4 style="text-align: center; margin-bottom: 1em;">Modificar datos</h4>
<div style="margin: auto; border: 1px solid grey; padding: 1em; width: 40%; height: auto;">
    <form class="row g-3 needs-validation" method="post" action="actualizarDatosPersona.php" enctype="multipart/form-data" novalidate onsubmit="validarFormulario()">
        <div class="col-md-12">

            <label for="NroDni" class="form-label">Documento</label>
            <input readonly style="background-color: #bcbcbc;" type="text" class="form-control" id="NroDni" required name="NroDni" value="<?php echo $personaElegida->getNroDni() ?>">
        </div>
        <div class="col-md-12">
            <label for="Nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="Nombre" required name="Nombre" value="<?php echo $personaElegida->getNombre() ?>">
        </div>
        <div class="col-md-12">
            <label for="Apellido" class="form-label">Apellido</label>
            <input type="text" class="form-control" id="Apellido" required name="Apellido" value="<?php echo $personaElegida->getApellido() ?>">
        </div>
        <div class="col-md-12">
            <label for="Telefono" class="form-label">Teléfono</label>
            <input type="text" class="form-control" id="Telefono" required name="Telefono" value="<?php echo $personaElegida->getTelefono() ?>">
            <div id="telefonoNum" class="invalid-feedback">
                Ingrese un teléfono válido
            </div>
        </div>
        <div class="col-md-12">
            <label for="Domicilio" class="form-label">Dirección</label>
            <input type="text" class="form-control" id="Domicilio" required name="Domicilio" value="<?php echo $personaElegida->getDomicilio() ?>">
        </div>
        <div class="col-md-12">
            <label for="fechaNac" class="form-label">Fecha de nacimiento</label>
            <input type="text" class="form-control" id="fechaNac" required name="fechaNac" value="<?php echo $personaElegida->getFechaNac() ?>">
            <div id="fechaValida" class="invalid-feedback">
                Ingrese una fecha válida
            </div>
        </div>
        <div class="col-md-12 d-md-flex justify-content-md-center">
            <button class=" btn btn-primary" type="submit">Modificar datos</button>
        </div>
    </form>
</div>
<script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (() => {
        'use strict'

        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        const forms = document.querySelectorAll('.needs-validation')

        // Loop over them and prevent submission
        Array.from(forms).forEach(form => {
            form.addEventListener('submit', event => {
                if (!form.checkValidity()) {
                    event.preventDefault()
                    event.stopPropagation()
                }

                form.classList.add('was-validated')
            }, false)
        })
    })()

</script>
<?php
} else{
    ?>
    <p style='color: red; text-align: center; '>El documento ingresado no se encuentra en el sistema, <a style="text-decoration: none;"  href="../NuevaPersona.php">registrese aquí.</a></p>
<?php
}

