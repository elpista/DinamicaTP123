$(function(){

    $("#form").validate({
        rules:{
            number_form:{
                required: true,
            },
        },
        messages:{
            number_form:{
                required:"Complete este campo."
            }
        }
    });

    $("#boton").click(function(){
        
        if($("form").valid()==false){
            $("#form_number").css("background-color","palevioletred")
        }
    })
});