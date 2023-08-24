<html>
<head>
</head>
<body>
    <form name="form" id="form" method="get" action="servidor.php">
        <input name="numero1" id="numero1" type="text"><br>
        <input name="numero2" id="numero2" type="text"><br>
        <select name="operacion" id="operacion">
            <option value="" hidden>Seleccione una operacion</option>
            <option value="suma">suma</option>
            <option value="resta">resta</option>
            <option value="multiplicacion">multiplicacion</option>
        </select>
        <input type="submit" value="Enviar">
    </form>
</body>
</html>