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

    $("#boton").click(function(){
        if($("#form").valid() == false){
            $("#nombre").css("border-color","pink")
            $("#apellido").css("border-color","pink")
            $("#edad").css("border-color","pink")
            $("#direccion").css("border-color","pink")

        }
    });

});