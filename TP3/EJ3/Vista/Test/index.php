<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

    <title></title>
</head>

<body>
    <div class="container border border-2 pb-5 mt-5 mb-2" id="container">


        <form class="row needs-validation " novalidate onsubmit="return validarFormulario()" id="miFormulario" method="post" action="Accion\salida.php" enctype = "multipart/form-data">
            <h2 style="color: blue">Cinem@s</h2>
            <div class="col-6">
                <label for="tituloInput" class="form-label mt-3"><strong>Título</strong></label>
                <input type="text" class="form-control" id="tituloInput" placeholder="Título" name="tituloInput" required>

                <label for="directorInput" class="form-label mt-3"><strong>Director</strong></label>
                <input type="text" class="form-control" id="directorInput" placeholder="Director" required name="director">

                <label for="produccionInput" class="form-label mt-3"><strong>Producción</strong></label>
                <input type="text" class="form-control" id="produccionInput" required name="produccion">

                <label for="nacionalidadInput" class="form-label mt-3"><strong>Nacionalidad</strong></label>
                <input type="text" class="form-control" id="nacionalidadInput" required name="nacionalidad">


            </div>

            <div class="col-6">

                <label for="actoresInput" class="form-label mt-3"><strong>Actores</strong></label>
                <input type="text" class="form-control" id="actoresInput" placeholder="Actores" required name="actores">

                <label for="guionInput" class="form-label mt-3"><strong>Guión</strong></label>
                <input type="text" class="form-control" id="guionInput" placeholder="Guión" required name="guion">

                <div class="col-4 position-relative">
                    <label for="anioInput" class="form-label mt-3"><strong>Año</strong></label>
                    <input type="number" class="form-control needs-validation" id="anioInput" required name="anio">
                    <div class="invalid-tooltip">
                        Máximo 4 dígitos.
                    </div>
                </div>


                <div class="col-8">
                    <label for="generoInput" class="form-label mt-3"><strong>Género</strong></label>
                    <select name="genero" id="lang" class="form-control" required>
                        <option value="Comedia">Comedia</option>
                        <option value="Drama">Drama</option>
                        <option value="Terror">Terror</option>
                        <option value="Romanticas">Románticas</option>
                        <option value="Suspenso">Suspenso</option>
                        <option value="Otras">Otras</option>
                    </select>
                </div>



            </div>
            <div class="row">
                <div class="col-4 position-relative mb-3">
                    <label for="duracionInput" class="form-label mt-3"><strong>Duración</strong></label>
                    <input type="number" class="form-control" id="duracionInput" required name="duracion">


                    <div class="invalid-tooltip">
                        Máximo 3 dígitos.
                    </div>
                    <p class="position-absolute ">(minutos)</p>
                </div>

                <div class="col-8">
                    <label for="edadInput" class="form-label mt-3 col-12"><strong>Restricciones de edad</strong></label>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="publico" id="todoPublico" value="option1" required>
                        <label class="form-check-label" for="todoPublico">Todo público</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="publico" id="mayorSiete" value="option2" name="">
                        <label class="form-check-label" for="mayorSiete">Mayores de 7 años</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="publico" id="mayorEdad" value="option3">
                        <label class="form-check-label" for="mayorEdad">Mayores de 18 años</label>
                    </div>

                </div>

            </div>

            <div class="mb-3 mt-4 col-5">
                <label for="formFile" class="form-label"><strong>Portada</strong></label>
                <input class="form-control" type="file" id="formFile" required name="portada" accept="image/png, image/jpeg">
            </div>


            <div class="col-12 pt-3">
                <label for="sipnosisInput" class="form-label  col-12"><strong>Sipnosis</strong></label>
                <textarea class="form-control" id="sipnosisInput" rows="3" required></textarea>
            </div>


            <div class="d-grid  d-md-flex justify-content-md-end mt-4">
                <button class="btn btn-info m-1" style="color:white" type="submit">Enviar</button>
                <button class="btn btn-light m-1" type="button" onclick="borrarFormulario()">Borrar</button>
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
            var contenedor = document.getElementById("container")
            var anio = document.getElementById("anioInput");
            var duracion = document.getElementById("duracionInput");
            var validar = false;
            var validarAnio = false;
            var validarDuracion = false;

            if (/^\d{1,4}$/.test(anio.value)) {
                validarAnio = true;
                anio.style.border = "";
                anio.style = `background-image: '';`;
                anio.nextElementSibling.classList.remove('d-block'); // Ocultamos el mensaje de error
            } else {
                //anio.classList.remove("was-validated");

                anio.style = `background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 12 12' width='12' height='12' fill='none' stroke='%23dc3545'%3e%3ccircle cx='6' cy='6' r='4.5'/%3e%3cpath stroke-linejoin='round' d='M5.8 3.6h.4L6 6.5z'/%3e%3ccircle cx='6' cy='8.2' r='.6' fill='%23dc3545' stroke='none'/%3e%3c/svg%3e"); border-color: var(--bs-form-invalid-border-color);`

                anio.nextElementSibling.classList.add('d-block'); // Mostramos el mensaje de error

            }


            if (/^\d{1,3}$/.test(duracion.value)) {
                validarDuracion = true;
                duracion.style.border = "";
                duracion.nextElementSibling.classList.remove('d-block');
                duracion.style = `background-image: '';`
            } else {
                duracion.style = `background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 12 12' width='12' height='12' fill='none' stroke='%23dc3545'%3e%3ccircle cx='6' cy='6' r='4.5'/%3e%3cpath stroke-linejoin='round' d='M5.8 3.6h.4L6 6.5z'/%3e%3ccircle cx='6' cy='8.2' r='.6' fill='%23dc3545' stroke='none'/%3e%3c/svg%3e"); border-color: var(--bs-form-invalid-border-color);`
                duracion.nextElementSibling.classList.add('d-block');


            }
            if (validarAnio && validarDuracion) {
                validar = true;

            }
            return validar;
        }



        function borrarFormulario() {
            var form = document.getElementById("miFormulario")
            form.reset();
        }
    </script>
</body>

</html>