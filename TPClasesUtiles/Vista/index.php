<?php

//Include Configuration File
include('config.php');

include_once '../configuracion.php';
$login_button = '';


if (isset($_GET["code"])) {

  $token = $google_client->fetchAccessTokenWithAuthCode($_GET["code"]);


  if (!isset($token['error'])) {

    $google_client->setAccessToken($token['access_token']);


    $_SESSION['access_token'] = $token['access_token'];


    $google_service = new Google_Service_Oauth2($google_client);


    $data = $google_service->userinfo->get();


    if (!empty($data['given_name'])) {
      $_SESSION['user_first_name'] = $data['given_name'];
    }

    if (!empty($data['family_name'])) {
      $_SESSION['user_last_name'] = $data['family_name'];
    }

    if (!empty($data['email'])) {
      $_SESSION['user_email_address'] = $data['email'];
    }

    if (!empty($data['gender'])) {
      $_SESSION['user_gender'] = $data['gender'];
    }

    if (!empty($data['picture'])) {
      $_SESSION['user_image'] = $data['picture'];
    }



    $abmGoogle = new AbmGoogle;
    $cuenta['email'] = $data['email'];

    //echo print_r($abmGoogle->buscar($cuenta));
    if ($abmGoogle->buscar($cuenta) == []) {
      $cuenta['name'] = $data['given_name'] . ' ' . $data['family_name'];
      $cuenta['picture'] = $data['picture'];
      $abmGoogle->alta($cuenta);
    }
  }
}


if (!isset($_SESSION['access_token'])) {
  $login_button = '<div class="row">
  <div class="col-md-30" style="margin: 0 auto 2em">
    <a class="btn btn-outline-dark" href=' . $google_client->createAuthUrl() . ' style="text-transform:none; margin:0 auto;">
      <img width="20px" style="margin-bottom:3px; margin-right:5px" alt="Google sign-in" src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/53/Google_%22G%22_Logo.svg/512px-Google_%22G%22_Logo.svg.png" />
      Login with Google
    </a>
  </div>
</div>';
} //else {
// Consultar al control si la cuenta ya se encuentra cargada en la DB, de lo contrario, agregarla
//}

?>
<html>

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>PHP Login using Google Account</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" src="css/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body class="body">
  <?php
  if ($login_button == '') {
    $nombre = $_SESSION['user_first_name'];
    $apellido = $_SESSION['user_last_name'];

    $gmail = $_SESSION['user_email_address'] ;
    $imageGmail = $_SESSION['user_image'];
    include_once 'cuentaGoogle.php';
    
    // Comprobar si la cuenta ya tiene una cuenta de steam enlazada, mostrar la informacion de la cuenta o
    // un boton para loguear con steam
  } else {
    echo '<div class="container" style="background-color: #fff; width: 30%; margin-top: 5em; border: 2px solid grey; text-align: center;">
        <br />';
    echo '<h2>GoogleAuth-Steam Login</h2>';
    echo $login_button;
    echo '<br />';
    echo '<h3>Integrantes:</h3>';
    echo '<p>Axel Nicolas Maldonado</p>';
    echo '<p>Marco Pistagnesi</p>';
    echo '<p>Thomas Maximiliano Rifo</p>';
    echo '<p>Julian Blanco</p>';
  }
  ?>
  </div>
  </div>
</body>

</html>