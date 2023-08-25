$(function(){

    $("#form").validate({
        rules:{
            nombre:{
                required: true,
            },
            apellido:{
                required: true,
            },
            edad:{
                required: true,
            },
            direccion:{
                required: true,
            }
        }
    });

    ($("#form").submit())

    $("#boton").click(function(){
        if($("#form").valid()==false && (function () {

            let radioEstudios = $(".nivelEstudios:checked");
            let radioGenero = $(".generoPersona:checked");
            if (!radioEstudios) {
                $('#errorEstudios').text("Por favor, elige un nivel de estudio.");
                return false;
            }

            if (!radioGenero) {
                $('#errorEstudios').text("Por favor, elige un género.");
                return false;
            }


        })){
            $("#nombre").css("border-color","pink")
            $("#apellido").css("border-color","pink")
            $("#edad").css("border-color","pink")
            $("#direccion").css("border-color","pink")
        }

    });

})