<?php

//Include Configuration File
include('config.php');

include_once '../configuracion.php';
include_once '../../estructura.php';

$login_button = '';


if(isset($_GET["code"]))
{

 $token = $google_client->fetchAccessTokenWithAuthCode($_GET["code"]);


 if(!isset($token['error']))
 {
 
  $google_client->setAccessToken($token['access_token']);

 
  $_SESSION['access_token'] = $token['access_token'];


  $google_service = new Google_Service_Oauth2($google_client);

 
  $data = $google_service->userinfo->get();

 
  if(!empty($data['given_name']))
  {
   $_SESSION['user_first_name'] = $data['given_name'];
  }

  if(!empty($data['family_name']))
  {
   $_SESSION['user_last_name'] = $data['family_name'];
  }

  if(!empty($data['email']))
  {
   $_SESSION['user_email_address'] = $data['email'];
  }

  if(!empty($data['gender']))
  {
   $_SESSION['user_gender'] = $data['gender'];
  }

  if(!empty($data['picture']))
  {
   $_SESSION['user_image'] = $data['picture'];
  }

  

  $abmGoogle = new AbmGoogle;
  $cuenta['email'] = $data['email'];

  //echo print_r($abmGoogle->buscar($cuenta));
  if($abmGoogle->buscar($cuenta) == []){
    $cuenta['name'] = $data['given_name'] . ' ' . $data['family_name'];
    $cuenta['picture'] = $data['picture'];
    $abmGoogle->alta($cuenta);
  } 
 }
}


if(!isset($_SESSION['access_token']))
{
 $login_button = '<a href="'.$google_client->createAuthUrl().'">Login With Google</a>';
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
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <!--<link href="css/output.css" rel="stylesheet"> Agrega estilos predefinidos que pueden sobreponerse con otros.-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
 
 </head>
 <body>
  <div class="container">
   <br />
   <h2 align="center">PHP Login using Google Account</h2>
   <br />
   <div class="panel panel-default">
   <?php
   if($login_button == '')
   {
    echo '<div class="panel-heading">Welcome User</div><div class="panel-body">';
    echo '<img src="'.$_SESSION["user_image"].'" class="img-responsive img-circle img-thumbnail" />';
    echo '<h3><b>Name :</b> '.$_SESSION['user_first_name'].' '.$_SESSION['user_last_name'].'</h3>';
    echo '<h3><b>Email :</b> '.$_SESSION['user_email_address'].'</h3>';
    echo '<h3><a href="logout.php">Logout</h3></div></a>';

    if(isset($_SESSION['logged_in'])){
      
      $username = $_SESSION['userData']['name'];
      $avatar = $_SESSION['userData']['avatar'];
      $profileurl = $_SESSION['userData']['profileurl'];

      echo '<div class="text-2xl">Bienvenido,</div>';
      echo '<div class="text-4xl mt-3 flex items-center font-medium">';
      echo '<img src='.$avatar.' class="rounded-full w-12 h-12 mr-3"/>';
      echo $username. '</div>';
      echo '<a href='.$profileurl.'>Enlace del perfil</a><br>'; 
      echo '<a href="logout.php" class="text-sm mt-5">Cerrar sesion de Steam</a>';
    } else {
      echo '<a href="init-openId.php" class="bg-steam-lightGray  text-xl px-5 py-3 rounded-md font-bold flex items-center space-x-4 hover:bg-gray-600 transition duration-75">';
      echo '<i class="fa-brands fa-steam text-2xl"></i>';
      echo '<span>Iniciar sesion con Steam</span></a>';
    }
    // Comprobar si la cuenta ya tiene una cuenta de steam enlazada, mostrar la informacion de la cuenta o
    // un boton para loguear con steam
   }
   else
   {
    echo '<div align="center">'.$login_button . '</div>';
   }
   ?>
   </div>
  </div>
 </body>
</html>