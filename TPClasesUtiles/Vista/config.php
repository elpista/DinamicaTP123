<?php

//start session on web page
session_start();

//config.php

//Include Google Client Library for PHP autoload file
require_once '../vendor/autoload.php';

//Make object of Google API Client for call Google API
$google_client = new Google_Client();

//Set the OAuth 2.0 Client ID
$google_client->setClientId('691743210094-abn79b0i03sbfo3johlstqcuck58r5bk.apps.googleusercontent.com');

//Set the OAuth 2.0 Client Secret key
$google_client->setClientSecret('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');

//Set the OAuth 2.0 Redirect URI
$google_client->setRedirectUri('http://localhost/DinamicaTP123/TPClasesUtiles/Vista/index.php');

// to get the email and profile 
$google_client->addScope('email');

$google_client->addScope('profile');

?>