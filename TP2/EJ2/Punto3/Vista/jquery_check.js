$(function(){

    $("#form").validate({
        rules:{
            form_nombre:{
                required: true,
            },
            form_apellido:{
                required: true,
            },
            form_edad:{
                required: true,
            },
            form_direccion:{
                required: true,
            }
        }
    });

    $("#boton").click(function(){
        if($("#form").valid() == false){
            $("#form_nombre").css("border-color","pink")
            $("#form_apellido").css("border-color","pink")
            $("#form_edad").css("border-color","pink")
            $("#form_direccion").css("border-color","pink")
        }
    });

})