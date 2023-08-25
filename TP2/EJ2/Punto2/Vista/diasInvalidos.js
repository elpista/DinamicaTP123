$(function(){

    $("#form").validate({

        rules:{
            form_lunes:{
                required: true,
            },
            form_martes:{
                required: true,
            },
            form_miercoles:{
                required: true,
            },
            form_jueves:{
                required: true,
            },
            form_viernes:{
                required: true,
            }
        }

    });

    $("#boton").click(function(){

        if($("#form").valid()==false){
            $("#form_lunes").css("border-color","pink")
            $("#form_martes").css("border-color","pink")
            $("#form_miercoles").css("border-color","pink")
            $("#form_jueves").css("border-color","pink")
            $("#form_viernes").css("border-color","pink")
        }
    });

});