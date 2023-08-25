<html>
<head>

</head>
<body>
    <form name="form" id="form" method="post" action="action/action.php">
        <label>Nombre: </label> <input name="nombre" id="nombre" type="text"><br>
        <label>Apellido: </label> <input name="apellido" id="apellido" type="text"><br>
        <label>Edad: </label> <input name="edad" id="edad" type="text"><br>
        <label>Direccion: </label> <input name="direccion" id="direccion" type="text"><br>

            Seleccione su nivel de estudios:
            <div>
                <input id="estudios" name="estudios" class="nivelEstudios" value="No tiene estudios" type="radio" />
                <label>No tiene estudios</label>
            </div>
            <div>
                <input id="estudios" name="estudios" class="nivelEstudios" value="Estudios primarios" type="radio" />
                <label>Estudios primarios</label>
            </div>
            <div>
                <input id="estudios" name="estudios" class="nivelEstudios" value="Estudios secundarios" type="radio" />
                <label>Estudios secundarios</label>
            </div>
        

        
            Seleccione su genero
            <div>
                <input id="genero" name="genero" class="genero" value="Femenino" type="radio" />
                <label>Femenino</label>
                <input id="genero" name="genero" class="genero" value="Masculino" type="radio" />
                <label>Masculino</label>
                <input id="genero" name="genero" class="genero" value="No binari" type="radio" />
                <label>No binario</label>
                <input id="genero" name="genero" class="genero" value="Sin especificar" type="radio" />
                <label>Sin especificar</label>
            </div>
        

        
        Seleccione los deportes que realiza
            <div>
                <input id="deportes[]" name="deportes[]" value="Futbol" type="checkbox"/>
                <label>Futbol</label>
                <input id="deportes[]" name="deportes[]" value="Basquet" type="checkbox"/>
                <label>Basquet</label>
                <input id="deportes[]" name="deportes[]" value="Tennis" type="checkbox"/>
                <label>Tennis</label>
                <input id="deportes[]" name="deportes[]" value="Voley" type="checkbox"/>
                <label>Voley</label>
            </div>
        <input type="submit" value="Enviar">
    </form>
</body>

</html>