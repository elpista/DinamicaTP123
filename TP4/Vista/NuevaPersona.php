<?php
$ejercicio = " Ejercicio 6";
$titulo = "TP4 - " . $ejercicio;
include_once '../configuracion.php';
include_once '../estructura.php';

?>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
    <title>Ejercicio 6</title>
</head>

<body>
    <div class="container border border-3 border-primary pb-5 mt-5 mb-2 row m-auto" id="container">
        <div>
            <form id="form" action="accion/accionNuevaPersona.php" method="get" class="row g-3 needs-validation" novalidate>
                <h3 class="text-center" style="color: blue">Nueva persona</h3>
                <div class="col-6">
                    <label for="Nombre" class="form-label">Nombre</label>
                    <input type="text" class="form-control border-secondary" id="nombre" name="nombre" required>
                    <div class="valid-feedback">
                        Nombre válido.
                    </div>
                    <div class="invalid-feedback">
                        Ingrese un nombre válido.
                    </div>
                </div>

                <div class="col-6">
                    <label for="Apellido" class="form-label">Apellido</label>
                    <input type="text" class="form-control border-secondary" id="apellido" name="apellido" required>
                    <div class="valid-feedback">
                        Apellido válido
                    </div>
                    <div class="invalid-feedback">
                        Ingrese un apellido válido
                    </div>
                </div>

                <div class="col-6">
                    <label for="NroDni" class="form-label">DNI</label>
                    <input type="text" class="form-control border-secondary" pattern="[0-9]+" id="NroDni" name="NroDni" required />
                    <div class="valid-feedback">
                        DNI válido
                    </div>
                    <div class="invalid-feedback">
                        Ingrese un número de DNI válido
                    </div>
                </div>

                <div class="col-6">
                    <label for="Telefono" class="form-label">Teléfono</label>
                    <input class="form-control border-secondary" pattern="[0-9]+" type="text" name="telefono" id="telefono" required>
                    <div class="valid-feedback">
                        Teléfono válido
                    </div>
                    <div class="invalid-feedback">
                        Ingrese un teléfono válido
                    </div>
                </div>

                <div class="col-6">
                    <label for="fechaNac" class="form-label">Fecha de nacimiento</label>
                    <input type="date" class="form-control border-secondary" id="fechaNac" name="fechaNac" required>
                    <div class="valid-feedback">
                        Fecha válida
                    </div>
                    <div class="invalid-feedback">
                        Ingrese una fecha válida
                    </div>
                </div>

                <div class="col-6">
                    <label for="Domicilio" class="form-label">Dirección</label>
                    <input type="text" class="form-control border-secondary" id="domicilio" name="domicilio" required>
                    <div class="valid-feedback">
                        Dirección válida
                    </div>
                    <div class="invalid-feedback">
                        Ingrese una dirección válida
                    </div>
                </div>
                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary rounded">Enviar</button>
                </div>
            </form>
            <div id="error">
            </div>
        </div>
    </div>
</body>

</html>