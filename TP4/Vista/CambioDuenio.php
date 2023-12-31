<?php
$ejercicio = " Ejercicio 8";
$titulo = "TP4 - " . $ejercicio;
include_once '../configuracion.php';
include_once '../../estructura.php';

?>

<h4 style="text-align: center; margin-bottom: 1em;">Cambiar dueño de un auto</h4>
<div style="margin: auto; border: 1px solid grey; padding: 1em; width: 40%;">
    <form class="row g-3 needs-validation" method="post" action="./Accion/accionCambioDuenio.php" enctype="multipart/form-data" novalidate onsubmit="validarFormulario()">
        <div class="col-md-12">
            <label for="patente" class="form-label">Patente</label>
            <input type="text" class="form-control" id="patente" required name="Patente">
            <div id="patenteInvalid" class="invalid-feedback">
                Ingrese una patente válida
            </div>
        </div>
        <div class="col-md-12">
            <label for="NroDni" class="form-label">DNI del nuevo propietario</label>
            <input type="text" class="form-control" id="NroDni" required name="DniDuenio">
            <div id="dniNum" class="invalid-feedback">
                Ingrese un DNI válido
            </div>
        </div>
        <div class="col-md-12 d-md-flex justify-content-md-center">
            <button class="btn btn-primary " type="submit">Cambiar dueño</button>
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

    function validarFormulario() {
        var patente = document.getElementById("patente");
        var patenteInvalid = document.getElementById("patenteInvalid");
        var dniNumero = document.getElementById("dniNum");
        var dni = document.getElementById("NroDni");
        var validar = false;
        var validarPatente = false;
        var validarDni = false;


        if (isNaN(dni.value) || dni.value > 60000000 || dni.value < 999999) {
            dni.style = `background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 12 12' width='12' height='12' fill='none' stroke='%23dc3545'%3e%3ccircle cx='6' cy='6' r='4.5'/%3e%3cpath stroke-linejoin='round' d='M5.8 3.6h.4L6 6.5z'/%3e%3ccircle cx='6' cy='8.2' r='.6' fill='%23dc3545' stroke='none'/%3e%3c/svg%3e"); border-color: var(--bs-form-invalid-border-color);`
            dniNumero.classList.add('d-block');
            event.preventDefault()
                    event.stopPropagation()
            validarDni = false;
        } else {
            dni.style.border = "";
            dniNumero.classList.remove('d-block');
            dni.style = `background-image: '';`
            validarDni = true;
        }

        if(validarPatente == true && validarDni == true){
            validar = true;
        }
        return validar;
    }

    function borrarFormulario() {
        var form = document.getElementById("miFormulario")
        form.reset();
    }
</script>