<?php

if($_POST["publico"] == "option1"){
    $publico = "Todo público";
} elseif($_POST["publico"] == "option2"){
    $publico = "Mayores de 7 años";
}elseif($_POST["publico"] == "option3"){
    $publico = "Mayores de 18 años";
}

echo '<div style="background-color: #c0ffa9; height: 30em; width: 50em; position: absolute;
top: 50%;
left: 50%;
transform: translate(-50%, -50%);" class="contenedorSalida">
<h2 class="titulo" style="color: #4d2df7; display:inline-block; font-family: arial; font-size: 1.6em; margin: 1.8em 0.8em 1.0em;">La película introducida es</h2>
<a style="display:inline; text-decoration: none;position: fixed;
top: 1.2em;
right: .8em; font-size: 1.2em; font-family: arial; color: grey; " href="../Vista/Test/index.php">X</a>
<div style="color:green; margin-left: 1em; font-size: 1.2em; font-family: arial; ;"class="datos">
<p style="margin: 0.4em"><strong>Título:</strong> '.$_POST["tituloInput"].'</p>
<p style="margin: 0.4em"><strong>Actores:</strong> ' .$_POST["actores"].' 
<p style="margin: 0.4em"><strong>Director:</strong> ' .$_POST["director"].'
<p style="margin: 0.4em"><strong>Guión:</strong> ' .$_POST["guion"].'
<p style="margin: 0.4em"><strong>Producción:</strong> ' .$_POST["produccion"].'
<p style="margin: 0.4em"><strong>Año:</strong > ' .$_POST["anio"].'
<p style="margin: 0.4em"><strong>Nacionalidad:</strong> ' .$_POST["nacionalidad"].'
<p style="margin: 0.4em"><strong>Género:</strong> ' .$_POST["genero"].'
<p style="margin: 0.4em"><strong>Duración:</strong> ' .$_POST["duracion"].'
<p style="margin: 0.4em"><strong>Restricciones de edad:</strong> ' .$publico.'
</div>
</div>';
