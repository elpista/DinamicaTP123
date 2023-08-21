<html>
    <head>
        <title>Ejercicio 3</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="../bootstrap-5.1.3-dist/css/bootstrap.min.css"/>
        <script src="../bootstrap-5.1.3-dist/js/bootstrap.min.js"></script>
    </head>
    <body>
        <form onsubmit="return validar();" class="row g-3" method="post" action="../../Control/verificaPass.php">
            <h3> Member login</h3>
            <div class="col-md-4 mb-3">
                <label for="validationCustomUsername" class="form-label">Username</label>
                <div class="input-group has-validation">
                    <input type="text" class="form-control" name="validationCustomUsername" id="validationCustomUsername"  aria-describedby="inputGroupPrepend2" required>
                    <div class="valid-feedback">
                      Looks good!
                    </div>
                    <div class="invalid-feedback">
                        Please choose a username.
                    </div>
                </div>
            </div>
            <div class="col-md-4">
              <label for="validationDefaultPassword" class="form-label">Password</label>
              <div class="input-group">
                <input type="password" class="form-control" name="validationDefaultPassword" id="validationDefaultPassword"  aria-describedby="inputGroupPrepend2" required>
              </div>
            </div>
            <div class="col-12">
              <button class="btn btn-primary" type="submit">Login</button>
            </div>
            
        </form>
        <script>
            function validar(){
                
                let resp = true
                let usuario = document.getElementById('validationCustomUsername').value
                let clave = document.getElementById('validationDefaultPassword').value
                if(clave.length < 8){
                    alert("la clave debe tener 8 caracteres como minimo")
                    resp = false
                }
                else if(usuario == clave){
                    alert("el usuario y la clave no pueden ser iguales")
                    resp = false;
                }
                return resp;
            }
            /*
            (function () {
                'use strict'
                window.addEventListener('load', function() {
                    // Fetch all the forms we want to apply custom Bootstrap validation styles to
                    var forms = document.getElementsByClassName('needs-validation');
                    
                    var validation = Array.prototype.filter.call(forms, function(form){
                        form.addEventListener('submit', function(event) {
                            if(form.checkValidity() === false){
                                event.preventDefault();
                                event.stopPropagation();
                            }
                            form.classList.add('was-validated');
                        }, false);
                    });
                }, false);
            })();
            */

        </script>
    </body>
</html>