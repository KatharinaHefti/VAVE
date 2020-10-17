<?php

// session
session_start();

// database connection
require_once("./config/config.inc.php");
  
// functions
require_once("./inc/functions.inc.php");

// include class UserService to validate form inputs
require("class/UserService.class.php");
$userService = new UserService();

/* * * * * * * * * * * * * * * * * * * * login * * * * * * * * * * * * * * * * * * * */

// variables
$emailValue = $passwordValue = $user = $output = " ";

// is form sent ?
if(isset($_POST['submit'])){
    // validate input with class User Service
    $emailValue =  $userService -> validateInput($_POST['email'],true,"E-Mail Adresse","email","must be a valid Email.");
    $passwordValue =  $userService -> validateInput($_POST['password'],true,"password","password","Is not valid. Must contain at least 8 characters, 1 lowercase letter, 1 uppercase letter and 1 number");

    if ($userService -> validationState) {
      // validation state is true
      
/* * * * * * * * * * * * * * * * * * * * selectlogin * * * * * * * * * * * * * * * * * * * */

// import variables form database 
// * USERS *

// email

$sql = "SELECT * FROM users WHERE email = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$_POST['email']]);
$user = $stmt->fetch();

$identifier = random_string(); //create cryptographic string
$token = random_string(); //create cryptographic string

if ($user && password_verify($_POST['password'], $user['password'])){

/* * * * * * * * * * * * * * * * * * * * login * * * * * * * * * * * * * * * * * * * */

// insert variables to database 
// * security *

// userID
// identifier
// token

// save security token to database
$stmt = $pdo->prepare("INSERT INTO security (userID, identifier, token) VALUES (:userID, :identifier, :token)");
$stmt->execute(array('userID' => $user['id'], 'identifier' => $identifier, 'token' => sha1($token)));
      
// set cookie  
setcookie("identifier",$identifier,time()+(3600*24*365)); //Valid for 1 year
setcookie("token",$token,time()+(3600*24*365)); //Valid for 1 year
      
// save user ID to session for user check
$_SESSION["userID"] = $user["id"];
  header("location: privat.php");
    exit;
}else{
  $output = 'Email or Password is wrong.';
}
    }
    else {
      // no
      foreach ($userService -> feedbackArray as $out) {
        $output .=  $out.'<br>';
    }
  }
  
}

/* * * * * * * * * * * * * * * * * * * * header and navigation * * * * * * * * * * * * * * * * * * * */

// includes nav template
include ("./inc/header.inc.php"); 
include ("./inc/nav.inc.php"); 
  
/* * * * * * * * * * * * * * * * * * * * html * * * * * * * * * * * * * * * * * * * */
?>
<html>
<head>
  <link rel="stylesheet" href="style/parts/privat.style.css">
  <link rel="stylesheet" href="style/elements/form.style.css">
  <link rel="stylesheet" href="style/elements/icon.style.css">
  <link rel="stylesheet" href="style/cd/typo.style.css">
</head>

  <body class="dark">
    <div class="center">

      <!-- - - - - - - - - - - - - - - - - - - - login - - - - - - - - - - - - - - - - - - -->
      <form action="login.php" method="post" novalidate>
      <!-- picture -->
      <div class="center"><img class="circle" src="img/valeria/valeria.png" alt=""></div>   
        <h2>login</h2><br>
        <!-- email -->
        <label for="email">E-Mail Adresse</label><br>
        <input type="email" id="email" name="email" value="<?=$emailValue?>"><br>
        <br>
        <!-- password -->
        <label for="password">Password</label><br>
        <input type="password" id="password" name="password" value="<?=$passwordValue?>"><br>

        <!-- output -->
        <br>
        <p class="feedbackNeg"><?php echo $output;?></p>

        <!-- submit -->
        <button type="submit" name="submit"><a class="buttonType">login</a></button>
      </form>

    </div>
  </body>
</html>