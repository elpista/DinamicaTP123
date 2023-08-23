<html>
    <head>
        <title> Ejercicio 2 </title>
    </head>
    <body>
        <form enctype="multipart/form-data" method="post" action="../Control/servidor.php">
            <div>
                <label for="inputFile">Seleccione un archivo</label>
                <input type="file" id="inputFile" name="inputFile"/>
            </div>
            <input type="submit" value="enviar"/>
        </form>
    </body>
</html>