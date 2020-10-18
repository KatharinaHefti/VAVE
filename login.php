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

/* LOGIN * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */

// variables
$emailValue = $passwordValue = $output = '';

// is form sent ?
if(isset($_POST['submit'])){

    // validate input with class User Service
    $emailValue = $userService -> validateInput($_POST['email'],true,
                  "E-Mail Adresse","email","must be a valid Email.");
    $passwordValue =  $userService -> validateInput($_POST['password'],true,
                  "password","password","Is not valid. Must contain minimum of 
                  8 characters, 1 lower-case letter, 1 upper-case letter and 1 number");
    
    // If Validation is succecfull
    if ($userService -> validationState) {
       
/* LOGIN EMAIL * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *

   select variables form database 
   USERS 

 * email
 
*/
    $sql = "SELECT * FROM users WHERE email = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$_POST['email']]);
    $user = $stmt->fetch();

    $identifier = random_string(); //create cryptographic string
    $token = random_string(); //create cryptographic string

    if ($user && password_verify($_POST['password'], $user['password'])){

/* LOGIN SECURITY * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *

   insert variables to database 
   SECURITY

 * userID
 * identifier
 * token
 
*/
      // save security token to database
      $stmt = $pdo->prepare("INSERT INTO security (userID, identifier, token) 
                            VALUES (:userID, :identifier, :token)");
      $data = [
        'userID' => $user['id'], 
        'identifier' => $identifier, 
        'token' => sha1($token),
      ];
      $stmt->execute($data);
            
      // set cookie  
      setcookie("identifier",$identifier,time()+(3600*24*365)); // Valid for 1 year
      setcookie("token",$token,time()+(3600*24*365)); // Valid for 1 year
            
      // save userID to session for user check
      $_SESSION["userID"] = $user["id"];

      // got to private.php
      header("location: privat.php");
      exit;
    }
    else{ // password or email was wrong
      $output = 'Email or Password is wrong.';
    }
  }
  else { // Validation was NOT succecfull
    foreach ($userService -> feedbackArray as $out) {
      $output .=  $out.'<br>';
    }
  }
} // end of form sent

/* HEADER & NAVIGATION * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */

// includes nav template
include ("./inc/header.inc.php"); 
include ("./inc/nav.inc.php"); 
  
/* HTML * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */
?>
<html>
  <body class="dark">
    <div class="center">

<!-- LOGIN FORM - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - – -->

      <form action="login.php" method="post" novalidate>
        <!-- picture -->
        <div class="center"><img class="circle" src="img/valeria/valeria.png" alt="Valeria Verzar"></div>
        <h2>Login</h2><br>
        <!-- email -->
        <label for="email">E-Mail Adress</label><br>
        <input type="email" id="email" name="email" value="<?=$emailValue?>"><br><br>
        <!-- password -->
        <label for="password">Password</label><br>
        <input type="password" id="password" name="password" value="<?=$passwordValue?>"><br><br>
        <!-- output -->
        <p class="feedbackNeg"><?php echo $output;?></p>
        <!-- submit -->
        <div class="center"><button type="submit" name="submit"><a class="buttonType">login</a></button></div>
      </form>

<!-- end of login form - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -->

    </div>
  </body>
</html>