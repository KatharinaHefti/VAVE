<?php
  session_start();

  // database connection
  require_once("./config/config.inc.php");
  
  // variables
  $emailValue = " ";
?>

<html>

  <h2>login</h2>

  <form action="post">
    <!-- email -->
    <label for="inputEmail">Email</label>
    <input type="email" name="email" id="inputEmail" class="form-control"  value="<?php echo $emailValue; ?>" required autofocus><br>

    <!-- password -->
    <label for="inputPassword">Password</label>
    <input type="password" name="password" id="inputPassword" class="form-control"  required><br>

    <!-- submit -->
    <button type="submit">Sign in</button><br>

    <!-- forgot password? -->
    <a href="forgotpassword.php">Forgot password?</a><br>

    <!-- register -->
    <a href="register.php">register</a>

  </form>

</html>