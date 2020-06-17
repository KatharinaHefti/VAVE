<?php

// session
session_name('loginSID'); 
session_set_cookie_params ( time()+15*60, '/', 'localhost', FALSE, TRUE); 
session_start();

echo '<pre>';
print_r($_SESSION);
echo '</pre>';



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
    // echo 'you are logged in';   

    header('Location: privat.php');
    exit;
}

if( $email != 'v.verzar@yahoo.com'){
    echo '<pre>';
    echo 'email wrong';
}

if( $password != 'ossBoss20'){
    echo '<pre>';
    echo 'password wrong';
}


?>


<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VAVE sports and camps</title>
    <!-- style -->
    <link rel="stylesheet" href="../style.css">
    <!-- bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <!-- google font PT Sans -->
    <link href="https://fonts.googleapis.com/css2?family=PT+Sans+Caption:wght@400;700&display=swap" rel="stylesheet">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    
</head>
<body class="paint-turquois">

    <div class="container">
        
    <h1>hallo</h1>
        <div class="row">
          <div class="col-lg-3"></div>
          <div class="col-lg-6">
            <div class="container">
                <div class="card">
                    <img id="profile-img" class="roundPic-sm"src="../img/pic/studio.png" />
                    <p id="profile-name" class="profile-name-card"></p>
                    <form class="form-signin" method="post">
                        <span id="reauth-email" class="reauth-email"></span>
                        <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
                        <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
                        <div id="remember" class="checkbox">

                        <button type="submit" name="submitted">Sign in</button>
                    </form><!-- /form -->
                    <a href="#" class="forgot-password">
                        Forgot the password?
                    </a>
                </div>
            </div>
        </div>
        <div class="col-lg-3"></div>
    </div>
</div>
        <!-- jquery -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <!-- bootstrap -->
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
      </body>
    
    </body>
    </html>