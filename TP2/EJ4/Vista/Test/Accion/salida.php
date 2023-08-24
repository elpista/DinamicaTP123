<?php
include_once '../../../Control/control.php';

$publico = new Publico();

$aptoPara = $publico->analizarOpciones($_POST["publico"]);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div style="background-color: #c0ffa9; height: 30em; width: 50em; position: absolute;
top: 50%;
left: 50%;
transform: translate(-50%, -50%);" class="contenedorSalida">
<h2 class="titulo" style="color: #4d2df7; display:inline-block; font-family: arial; font-size: 1.6em; margin: 1.8em 0.8em 1.0em;">La película introducida es</h2>
<a style="display:inline; text-decoration: none;position: fixed;
top: 1.2em;
right: .8em; font-size: 1.2em; font-family: arial; color: grey; " href="../Vista/Test/index.php">X</a>
<div style="color:green; margin-left: 1em; font-size: 1.2em; font-family: arial; ;"class="datos">
<p style="margin: 0.4em"><strong>Título:</strong> <?php echo $_POST["tituloInput"] ?></p>
<p style="margin: 0.4em"><strong>Actores:</strong> <?php echo $_POST["actores"] ?>
<p style="margin: 0.4em"><strong>Director:</strong> <?php echo $_POST["director"] ?>
<p style="margin: 0.4em"><strong>Guión:</strong> <?php echo $_POST["guion"] ?>
<p style="margin: 0.4em"><strong>Producción:</strong> <?php echo $_POST["produccion"] ?>
<p style="margin: 0.4em"><strong>Año:</strong > <?php echo $_POST["anio"] ?>
<p style="margin: 0.4em"><strong>Nacionalidad:</strong> <?php echo $_POST["nacionalidad"] ?>
<p style="margin: 0.4em"><strong>Género:</strong> <?php echo $_POST["genero"] ?>
<p style="margin: 0.4em"><strong>Duración:</strong> <?php echo $_POST["duracion"] ?>
<p style="margin: 0.4em"><strong>Restricciones de edad:</strong> <?php echo $aptoPara ?>
</div>
</div>
</body>
</html>