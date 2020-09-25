<?php

  // database connection
  require_once("./config/config.inc.php");

  // include class UserService to validate form inputs
  require("class/UserService.class.php");
  $userService = new UserService();

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
      $output = "<div class=\"feedback_positiv\">";
      $output .= "All inputs are valid.";
      $output .=  "</div>\n";

      // hash password
      $passwordHash = password_hash($passwordValue, PASSWORD_DEFAULT);

      // upload form inputs to database
      $stmt = $pdo->prepare("INSERT INTO users (name, familyname, email, password) VALUES (:name, :familyname, :email, :password)");
      $result = $stmt->execute(array('name' => $nameValue, 'familyname' => $familynameValue, 'email' => $emailValue, 'password' => $passwordHash));
      
      // if upload to database was succesfull, leave to login page
      if($result == true)
      {
        header("location: login.php");
        exit;
      }
      // if upload to database did not work.
      else {
        $output = "<div class=\"feedback_negativ\">";
        $output .= "Upload to database did not work.";
        $output .=  "</div>\n";
      }
    }

    // Validation was NOT succecfull
    else {
        $output = "<div class=\"feedback_negativ\">";
      foreach ($userService -> feedbackArray as $out) {
        $output .=  $out."<br>";
      }
      $output .= "</div>\n";
    }
  }
  else {
    $output = "";
    $nameValue = "";
    $familynameValue = "";
    $emailValue = "";
    $passwordValue = "";
  }


?>
<!DOCTYPE html>
<head>
	<meta charset="utf-8" />
	<title>register form</title>
	<link rel="stylesheet" href="../../generalstyles.css">
</head>
<body>
<?php
echo $output;
?>
	<form action="register.php" method="post" novalidate>
    <h2>register</h2>

    <!-- name -->
		<label for="name">Name</label>
		<input type="text" id="name" name="name" value="<?=$nameValue?>"><br>
		
    <!-- familyname -->
    <label for="familyname">Familyname</label>
		<input type="text" id="familyname" name="familyname" value="<?=$familynameValue?>"><br>

		<!-- email -->
		<label for="email">E-Mail Adresse</label>
		<input type="email" id="email" name="email" value="<?=$emailValue?>"><br>
	
    <!-- password -->
		<label for="password">Password</label>
		<input type="password" id="password" name="password" value="<?=$passwordValue?>"><br>
	
    <!-- submit -->
		<button type="submit" name="submit">register</button>

    <!-- login -->
    <a href="login.php">login</a><br>
	</form>

</body>
</html>
