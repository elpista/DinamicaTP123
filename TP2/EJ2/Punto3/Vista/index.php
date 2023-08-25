<html>
    <head>
        <title>Ejercicio 3</title>
    <script src="jquery_es.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>
    <script src="jquery_check.js"></script>
    </head>
    <body>
        <form name="form" id="form" method="get" action="action/formAction.php">
            <h2>Nombre: </h2>
            <input type="text" name="form_nombre" id="form_nombre"/>
            <br/>
            <h2>Apellido: </h2>
            <input type="text" name="form_apellido" id="form_apellido"/>
            <br/>
            <h2>Edad: </h2>
            <input type="number" name="form_edad" id="form_edad"/>
            <br/>
            <h2>Direccion: </h2>
            <input type="text" name="form_direccion" id="form_direccion"/>
            <br/>
            <br/>
            <input id="boton" type="submit" value="Enviar"/>
        </form>
    </body>
</html>