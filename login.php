<?php
  session_start();
  
  // database connection
  require_once("./config/config.inc.php");

  // include class UserService to validate form inputs
  require("class/UserService.class.php");
  $userService = new UserService();

  // variables
  $emailValue = $passwordValue =  " ";

  // if form sent
  if(isset($_POST['submit'])){

    // validate input with class User Service
    $emailValue =  $userService -> validateInput($_POST['email'],true,"E-Mail","email","Email is not in Database");
    $passwordValue =  $userService -> validateInput($_POST['password'],true,"password","password","Is not valid. Must contain at least 8 characters, 1 lowercase letter, 1 uppercase letter and 1 number");

    // check if user email is in databasex
    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$_POST['email']]);
    $user = $stmt->fetch();

    if ($user && password_verify($_POST['password'], $user['password']))
    {
      // save security token into database
      $insert = $pdo->prepare("INSERT INTO security (userID, identifier, token) VALUES (:userID, :identifier, :token)");
			$insert->execute(array('userID' => $user['id'], 'identifier' => $identifier, 'token' => sha1($token)));
			setcookie("identifier",$identifier,time()+(3600*24*365)); //Valid for 1 year
      setcookie("token",$token,time()+(3600*24*365)); //Valid for 1 year

      $_SESSION["userID"] = $user["id"];
      
        // echo "valid!";
        header("location: privat.php");
        exit;
    } else {
        $output = "<div class=\"feedback_negativ\">";
        foreach ($userService -> feedbackArray as $out) {
          $output .=  $out."<br>";
        }
        $output .= "</div>\n";
      }     
    }
    else {
      $output = "";
      $emailValue = "";
      $passwordValue = "";
    }

    /* * * * * * * * * * * * * * * * * * * * header and navigation * * * * * * * * * * * * * * * * * * * */

    include ("./inc/header.inc.php"); 
    include ("./inc/nav.inc.php"); 
  
    /* * * * * * * * * * * * * * * * * * * * body * * * * * * * * * * * * * * * * * * * */
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
        <p class="paint-turquois"><?php echo $output;?></p>

        <!-- submit -->
        <button type="submit" name="submit">login</button>

        <!-- register -->
        <a class="paint-turquois" href="register.php">register</a><br>
      </form>
    </div>
  </body>
</html>