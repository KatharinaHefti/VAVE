<?php

  // database connection
  require_once("./config/config.inc.php");

  // class form Validation
  require("./class/ValidateForm.class.php");
  $int = new ValidateForm();
  
  // variables
  $nameValue = $familynameValue = $emailValue = $passwordValue = $createdAt = " ";

  // form validation
  if(isset($_POST['submit'])){
    $nameValue = $_POST['name'];
    $familynameValue = $_POST['familyname'];
    $emailValue = $_POST['email'];
    $passwordValue = $_POST['password'];
    
    $options = array("cost"=>4);
    $hashPassword = password_hash($password,PASSWORD_BCRYPT,$options);
    
    $sql = "INSERT INTO users (name, familyname, email, password) value('".$nameValue."', '".$familynameValue."', '".$emailValue."','".$passwordValue."')";
    $result = mysqli_query($pdo, $sql);
    if($result)
    {
      echo "Registration successfully";
      header("location: login.php");
      exit;
    }
  }
?>

<html>
  <h2>register</h2>

  <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">

    <!-- name -->
    <label for="inputName">Name</label>
    <input type="text" name="name" id="name" value="<?php echo $nameValue; ?>" required autofocus><br>

    <!-- family name -->
    <label for="inputName">Family Name</label>
    <input type="text" name="familyname" id="familyname" value="<?php echo $familynameValue; ?>" required autofocus><br>

    <!-- email -->
    <label for="inputEmail">Email</label>
    <input type="email" name="email" id="email" value="<?php echo $emailValue; ?>" required autofocus><br>

    <!-- password -->
    <label for="inputPassword">Password</label>
    <input type="password" name="password" id="inputPassword" required autofocus><br>

    <!-- submit -->
    <button type="submit">Sign up</button><br>

    <!-- register -->
    <a href="login.php">login</a>

  </form>

</html>