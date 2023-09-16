<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $titulo; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
</head>

<body>
    <nav class="navbar bg-body-tertiary fixed-top">
        <div class="container-fluid">
            <button class="material-symbols-outlined" onclick="volverAtras()">
arrow_back
</button>
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Menú</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="../../index.php">Home</a>
                        </li>
                        
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                TP4
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="/TP4/Vista/VerAutos.php">Ejercicio 3</a></li>
                                <li><a class="dropdown-item" href="/TP4/Vista/EJ4/estructura/buscarAuto.php">Ejercicio 4</a></li>
                                <li><a class="dropdown-item" href="/TP4/Vista/listaPersonas.php">Ejercicio 5</a></li>
                                <li><a class="dropdown-item" href="/TP4/Vista/NuevaPersona.php">Ejercicio 6</a></li>
                                <li><a class="dropdown-item" href="/TP4/Vista/NuevoAuto.php">Ejercicio 7</a></li>
                                <li><a class="dropdown-item" href="/TP4/Vista/CambioDuenio.php">Ejercicio 8</a></li>
                                <li><a class="dropdown-item" href="/TP4/Vista/BuscarPersona.php">Ejercicio 9</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <!-- Contenido de la página -->
    <div class="container" style="margin-top: 4em;">

    </div>
    <script>
 function volverAtras() {
            window.history.back();
        }
</script>

</body>

</html>