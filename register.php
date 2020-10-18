<?php

// session
session_start();

// database connection
require_once("./config/config.inc.php");
  
// functions
require_once("./inc/functions.inc.php");

// is user logged in?
$user = check_user();

// include class UserService to validate form inputs
require("class/UserService.class.php");
$userService = new UserService();

/* REGISTER INPUTS * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */

// variables
$nameValue = $familynameValue = $emailValue = $passwordValue = " ";

// is form sent?
if (isset($_POST['submit'])) {
  // validate input with class User Service
  $nameValue = $userService -> validateInput($_POST['name'],true,"Name","min_length-1|max_length-100","Must contain minimum 1 letter and maximum 100.");
  $familynameValue =  $userService -> validateInput($_POST['familyname'],true,"Familyname","min_length-1|max_length-100","Must contain minimum 1 letter and maximum 100.");
  $emailValue =  $userService -> validateInput($_POST['email'],true,"E-Mail","email","is not a valid Email");
  $passwordValue =  $userService -> validateInput($_POST['password'],true,"password","password","Is not valid. Must contain at least 8 characters, 1 lowercase letter, 1 uppercase letter and 1 number");
    
  // Validation was succecfull
  if ($userService -> validationState) {
      $output = "All inputs are valid.";

      // hash password
      $passwordHash = password_hash($passwordValue, PASSWORD_DEFAULT);

/* REGISTER * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *

   insert variables to database 
   USERS 

 * name
 * familyname
 * email
 * password

*/

      $stmt = $pdo->prepare("INSERT INTO users (name, familyname, email, password) 
                            VALUES (:name, :familyname, :email, :password)");
      $data = [
        'name' => $nameValue, 
        'familyname' => $familynameValue, 
        'email' => $emailValue, 
        'password' => $passwordHash
      ];
      $result = $stmt->execute($data);
      
      // if upload to database was succesfull, leave to login page
      if($result == true)
      {
        header("location: login.php");
        exit;
      }
      // if upload to database did not work.
      else {
        $output = "Upload to database did not work.";
      }
    }

    // Validation was NOT succecfull
    else {
      foreach ($userService -> feedbackArray as $out) {
        $output .=  $out."<br>";
      }     
    }
  }
  else {
    $output = "";
    $nameValue = "";
    $familynameValue = "";
    $emailValue = "";
    $passwordValue = "";
  }

/* HEADER & NAVIGATION * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */

// includes nav template
include ("./inc/header.inc.php"); 
include ("./inc/nav.inc.php"); 
  
/* HTML * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */
?>
<body class="dark">
  <div class="center">

<!-- REGISTER FORM - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - – -->

    <form action="register.php" method="post" novalidate>
      <!-- picture -->
      <div class="center"><img class="circle" src="img/circle/person.svg" alt=""></div>   
      <h2>register</h2><br><br>
      <!-- name -->
      <label for="name">Name</label>
      <input type="text" id="name" name="name" value="<?=$nameValue?>"><br><br>
      <!-- familyname -->
      <label for="familyname">Familyname</label>
      <input type="text" id="familyname" name="familyname" value="<?=$familynameValue?>"><br><br>
      <!-- email -->
      <label for="email">E-Mail Adresse</label>
      <input type="email" id="email" name="email" value="<?=$emailValue?>"><br><br>
      <!-- password -->
      <label for="password">Password</label>
      <input type="password" id="password" name="password" value="<?=$passwordValue?>"><br><br>
      <!-- output -->
      <p class="feedbackNeg"><?php echo $output;?></p>
      <!-- submit -->
      <button type="submit" name="submit">register</button>
      <!-- login -->
      <a href="login.php">login</a><br>
    </form>

<!-- end of register form - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -->
 
  </div>
</body>
