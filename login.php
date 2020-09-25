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

<!DOCTYPE html>
<html lang="de">
<head>
	<meta charset="utf-8" />
	<title>Login form</title>
	<link rel="stylesheet" href="../../generalstyles.css">
</head>
<body>
<?php
  echo $output;
?>
	<form action="login.php" method="post" novalidate>
    <h2>login</h2>

		<!-- email -->
		<label for="email">E-Mail Adresse</label>
		<input type="email" id="email" name="email" value="<?=$emailValue?>"><br>

    <!-- password -->
		<label for="password">Password</label>
		<input type="password" id="password" name="password" value="<?=$passwordValue?>"><br>

    <!-- submit -->
		<button type="submit" name="submit">login</button>

    <!-- register -->
    <a href="register.php">register</a><br>
	</form>

</body>
</html>