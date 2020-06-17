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
$name = 'Valeria';
$password = 'ossBoss20';


$formSent = isset($_POST['name']) && isset($_POST['password']);

if( $formSent == true){

    $name = $_POST['name'];
    $password = $_POST['password'];

    if ( isset($_POST['check']) ){
       $check = $_POST['check'];
    }
    
    /*
    echo '<pre>';
    echo 'NAME: ';
    print_r($name);
    echo '<pre>';
        
    echo 'PASSWORD: ';
    print_r($password);
    echo '<pre>';

    echo 'CHECK: ';
    print_r($check);
    echo '</pre>';
   */
}

 


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
    <!-- google font varela round -->
    <link href="https://fonts.googleapis.com/css2?family=Varela+Round&display=swap" rel="stylesheet">
</head>
<body>

    <main>

        <div class="container">
            <img id="logo" src="img/logo.svg" alt="coral reef brand">
            <h2>Login</h2>
            <p>Hidden beneath the ocean waters, coral reefs teem with life. Login to learn more about marine life.</p>
                
            <form action="" method="post">
                <!-- name -->
                <label for="name">Benutzername</label><br>
                <input type="text" name="name" id="name" placeholder="your name" value=""><br>

                <!-- password -->
                <img class="icon" src="img/show.svg" alt="icon show password"><br>
                <label for="password">Passwort</label><br>
                <input type="password" name="password" id="password" placeholder="*****" value=""> 

                <div class="choose">
                    <!-- checkbox -->
                    <div class="check"> 
                        <input type="checkbox" name="check" id="check" value="true">
                        <label for="check">keep me logged in</label><br>
                    </div>
                    
                    <!-- forgot password -->
                    <a href="#">forgot password</a>
                </div> 

                <!-- login-->
                <button type="submit">login</button>

            </form>
             <!-- register-->
            <p>Don't have an account yet? <a href="#">sign up</a></p>
        </div>
    </main>

    <!-- illustation -->
    <aside>
        <img src="img/kugi.svg" alt="kugi">
    </aside>
    
</body>
</html>