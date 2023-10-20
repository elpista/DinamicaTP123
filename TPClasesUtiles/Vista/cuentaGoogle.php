<div class="container" style="background-color: #fff; width: 90%; margin-top: 3em; border: 2px solid grey; height: 80%;">
<div style="position: relative;">
  <div class="btn-group dropstart" style="width: 3em; position:absolute; top: 1em; right: 2em;">
    <button style="text-decoration: none;" class="btn dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
      <?php echo '<img src="' . $imageGmail . '" style="width:3em; margin-rigth: 1em;" />'; ?>
    </button>

    <ul class="dropdown-menu">
      <li><a class="dropdown-item" href="logout.php">Cerrar Sesión</a></li>
    </ul>
  </div>
</div>
  <h2 style="position:relative; text-align: center; margin-top: 1.5em">Bienvenido <?php echo $nombre ?></h2>
  
  <div style="margin-top: 5em; margin-left: 1em" class="datos">
    <h4>Datos de la cuenta:</h4>
    <p style="margin-top: 1em;"><b>Nombre completo: </b><?php echo $nombre . ' ' . $apellido ?>.</p>
    <p><b>Correo Electrónico: </b><?php echo $gmail ?></p>

    <?php
    
    $login_buttonSteam = '<div id="vincular" class="col-md-30" style="margin: 4em 2em">
<a class="btn btn-outline-dark" href="init-openId.php" style="text-transform:none; margin:0 auto;">
  <img width="40px" style="margin-bottom:3px; margin-right:5px" alt="Google sign-in" src="https://logos-world.net/wp-content/uploads/2020/10/Steam-Emblem.png" />
  Vincular con Steam
</a>
</div>
</div>';
    if (isset($_SESSION['logged_in'])) {

      $username = $_SESSION['userData']['name'];
      $avatar = $_SESSION['userData']['avatar'];
      $profileurl = $_SESSION['userData']['profileurl'];

      $datosCuenta = '<div id="datos"><div style="margin-top: 3em;" class="text-2xl"><b><h5>Cuenta de Steam vinculada</h5></b></div><div class="text-4xl mt-3 flex items-center font-medium"><a target="_blank" style="text-decoration: none; color:black;" href="' . $profileurl . '"><img src=' . $avatar . ' class="rounded-full w-12 h-12 mr-3"/>' . $username . '</a></div></div>';
      echo $datosCuenta;
      echo '<div id="desvincular" class="col-md-30" style="margin: 1em 2em">
      <form method="post" action="Accion/desvincular.php">
      <button type="submit" name="desvincular" id="logoutButton" class="btn btn-outline-danger" style="text-transform:none; margin:0 auto;">
          <img width="40px" style="margin-bottom:3px; margin-right:5px" alt="Google sign-in" src="https://logos-world.net/wp-content/uploads/2020/10/Steam-Emblem.png" />
          Desvincular cuenta
      </button>
  </form>
      </div>
    </div>
';
    } else {
      /*echo '<a href="init-openId.php" class="bg-steam-lightGray  text-xl px-5 py-3 rounded-md font-bold flex items-center space-x-4 hover:bg-gray-600 transition duration-75">';
      echo '<i class="fa-brands fa-steam text-2xl"></i>';
      echo '<span>Iniciar sesion con Steam</span></a>';
      $login_buttonSteam = '<div class="row">*/
      echo $login_buttonSteam;
    }
    ?>
  </div>


</div>