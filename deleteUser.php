<?php

// session
session_start();

// database connection
require_once("./config/config.inc.php");

// functions
require_once("./inc/functions.inc.php");

// is user logged in?
$user = check_user();

// include class UserService – to validate form inputs
require("class/UserService.class.php");
$userService = new UserService();

/* * * * * * * * * * * * * * * * * * * * header and navigation * * * * * * * * * * * * * * * * * * * */

// includes nav template
include ("./inc/header.inc.php"); 
include ("./inc/navPrivat.inc.php"); 

/* * * * * * * * * * * * * * * * * * * * existing user * * * * * * * * * * * * * * * * * * * */

// import variables form database 
// * USERS *

// name
// familyname
// email

// variables form database users
$sql = "SELECT name, familyname, email FROM users";
$stmt = $pdo->prepare($sql);
$stmt->execute();

// fetch all from users
$UserList = $stmt->fetchAll();

// count user from Userlist and 
// save it to variables
$count = count($UserList);
for ($i = 0; $i < $count; $i++) {
  // usernames of database
  $user = $UserList[$i]['name'];
  $list = array($user);
  //print_r($list[0]);
}

/* * * * * * * * * * * * * * * * * * * * user name POST * * * * * * * * * * * * * * * * * * * */

// variables
$output = '';

// if form sent
if(isset($_POST['submit']) && !empty($_POST['name'])){
    //save variable
    $name = $_POST['name'];
    // delete user
    $stmt = $pdo->prepare( "DELETE FROM users WHERE name =:name" );
    $stmt->bindParam(':name', $name);
    $stmt->execute();
    // feedback 
    $output = "You deleted this user form your database.";
  }

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

      <!-- - - - - - - - - - - - - form POST delete user - - - - - - - - - - - - -->
      <form action="deleteUser.php" method="post" novalidate>
        <!-- picture -->
        <div class="center"><img class="circle" src="img/valeria/valeria.png" alt=""></div>   
        <!-- delete user -->
        <h2>Delete user</h2><br>
        <label for="deleteUser">choose username to delete from database.</label><br><br>
        <select name="name" id="name">

        <!-- get userlist from database -->
        <?php $count = count($UserList);  
              for ($i = 0; $i < $count; $i++) {
              echo '<option value="'.$UserList[$i]['name'].'">'.$UserList[$i]['name'].'</option>';
          }?></select><br>

        <!-- output -->
        <p class="paint-turquois"><?php echo $output;?></p>
        <!-- submit -->
        <button type="submit" name="submit"><a class="buttonType">delete user</a></button>
      </form>

    </div>
  </body>
</html>