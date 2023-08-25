<html>
<head>
<script src="jquery_es.js"></script>
<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>
<script src="jquery_check.js"></script>
</head>
<body>
    <form name="form" id="form" method="get" action="action/action.php">
        <label>Nombre: </label> <input name="nombre" id="nombre" type="text"><br>
        <label>Apellido: </label> <input name="apellido" id="apellido" type="text"><br>
        <label>Edad: </label> <input name="edad" id="edad" type="text"><br>
        <label>Direccion: </label> <input name="direccion" id="direccion" type="text"><br>
        
        Seleccione su nivel de estudios:
            <div>
                <input id="estudios" class="nivelEstudios" name="estudios" value="No tiene estudios" type="radio" />
                <label>No tiene estudios</label>
            </div>
            <div>
                <input id="estudios" class="nivelEstudios" name="estudios" value="Estudios primarios" type="radio" />
                <label>Estudios primarios</label>
            </div>
            <div>
                <input id="estudios" class="nivelEstudios" name="estudios" value="Estudios secundarios" type="radio" />
                <label>Estudios secundarios</label>
            </div>

            Seleccione su genero
            <div>
                <input id="genero" class="generoPersona" name="genero" value="Femenino" type="radio" />
                <label>Femenino</label>
                <input id="genero" class="generoPersona" name="genero" value="Masculino" type="radio" />
                <label>Masculino</label>
                <input id="genero" class="generoPersona" name="genero" value="No binari" type="radio" />
                <label>No binario</label>
                <input id="genero" class="generoPersona" name="genero" value="Sin especificar" type="radio" />
                <label>Sin especificar</label>
            </div>
        <input id="boton" type="submit" value="Enviar">
        <br>
        <div id="errorEstudios"></div><br>
        <div id="errorGenero"></div>
    </form>
</body>

</html>