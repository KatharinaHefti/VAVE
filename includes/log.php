<?php

// session
session_name('loginSID'); 
session_set_cookie_params ( time()+15*60, '/', 'localhost', FALSE, TRUE); 
session_start();

echo '<pre>';
print_r($_SESSION);
echo '</pre>';


include 'includes/db-connect.inc.php';
include 'includes/config.inc.php';

// error
$error = false;
$errorMsg = array();

// variables
$email = 'v.verzar@yahoo.com';
$password = 'ossBoss20';


$formSent = isset($_POST['email']) && isset($_POST['password']);

if( $formSent == true){

    $email = $_POST['email'];
    $password = $_POST['password'];

    echo 'you are logged in';
    
   
}