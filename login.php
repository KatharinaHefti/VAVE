<?php
  session_start();

  // database connection
  require_once("./config/config.inc.php");

  include ("./inc/header.inc.php"); 
  include ("./inc/nav.inc.php"); 

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
?>

<html>

<style>

.output{
  width: 400px;
  padding: 3em;
  margin-bottom: 3em;
}

.center{
  display:flex;
  flex-direction: column;
  justify-content: center;
  align-items:center;
  padding: 3em;
}

form{
  background: pink;
  width: 400px;
  padding: 3em;
  border-radius: 30px;
}

input{
  width: 100%;
}

</style>
  <div class="center">

  <!-- output -->
  <div class="output"><?php echo $output;?></div>

	<form action="login.php" method="post" novalidate>
    <h2>login</h2><br>

		<!-- email -->
		<label for="email">E-Mail Adresse</label><br>
		<input type="email" id="email" name="email" value="<?=$emailValue?>"><br>
    <br>
    <!-- password -->
		<label for="password">Password</label><br>
		<input type="password" id="password" name="password" value="<?=$passwordValue?>"><br>

    <!-- submit -->
		<button type="submit" name="submit">login</button>

    <!-- register -->
    <a href="register.php">register</a><br>
	</form>
  </div>
</body>
</html>