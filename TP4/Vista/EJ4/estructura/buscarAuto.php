<?php
$ejercicio = " Ejercicio 4";
$titulo = "TP4 - " . $ejercicio;
include_once '../../../configuracion.php';
include_once '../../../estructura.php';

?>
        <h2>Buscar auto</h2>
        <br/>
        <form method="get" action="action\accionBuscarAuto.php">
            <div class="col-6">
                <div class="col-4 position-relative">
                    <label for="patente" class="form-label mt-3"><strong>Ingrese el numero de patente del auto:</strong></label>
                    <input type="text" class="form-control needs-validation" id="patente" required name="patente">
                    <div class="invalid-tooltip">
                        Complete este campo
                    </div>
                </div>
            <input type="submit" value="enviar" class="btn btn-info m-1" style="color:white"/>
        </form>

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
                var contenedor = document.getElementById("container")
                var patente = document.getElementById("patente");
                var validar = false;

                if (patente.value != '') {
                    validar = true;
                    patente.style.border = "";
                    patente.style = `background-image: '';`;
                    patente.nextElementSibling.classList.remove('d-block'); // Ocultamos el mensaje de error
                } else {
                    //patente.classList.remove("was-validated");

                    patente.style = `background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 12 12' width='12' height='12' fill='none' stroke='%23dc3545'%3e%3ccircle cx='6' cy='6' r='4.5'/%3e%3cpath stroke-linejoin='round' d='M5.8 3.6h.4L6 6.5z'/%3e%3ccircle cx='6' cy='8.2' r='.6' fill='%23dc3545' stroke='none'/%3e%3c/svg%3e"); border-color: var(--bs-form-invalid-border-color);`

                    patente.nextElementSibling.classList.add('d-block'); // Mostramos el mensaje de error

                }
                
                return validar;
            }
        </script>
    </body>
</html>