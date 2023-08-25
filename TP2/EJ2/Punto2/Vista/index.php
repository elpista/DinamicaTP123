<html>
    <head>
        <title>Ejercicio 2</title>
        <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>
        <script src="jquery_es.js"></script>
        <script src="diasInvalidos.js"></script>

    </head>
    <body>
        
        <form name="form" id="form" method="get" action="action/formAction.php">
            <h3> Ingrese las horas cursadas por cada dia de la semana </h3>
            <br/>
            <h3> Lunes </h3>
            <input type="number" id="form_lunes" name="form_lunes"/>
            <br/>
            <h3> Martes </h3>
            <input type="number" id="form_martes" name="form_martes"/>
            <br/>
            <h3> Miercoles </h3>
            <input type="number" id="form_miercoles" name="form_miercoles"/>
            <br/>
            <h3> Jueves </h3>
            <input type="number" id="form_jueves" name="form_jueves"/>
            <br/>
            <h3> Viernes </h3>
            <input type="number" id="form_viernes" name="form_viernes"/>
            <br/>
            <input id="boton" type="submit" value="enviar"/>
        </form>
        
        
    </body>
</html>