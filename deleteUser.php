<?php
  session_start();
  
  // database connection
  require_once("./config/config.inc.php");

  // include class UserService to validate form inputs
  require("class/UserService.class.php");
  $userService = new UserService();


/* * * * * * * * * * * * * * * * * * * * existing user * * * * * * * * * * * * * * * * * * * */

// import 1 Row from users
// variables form database users
$stmt = $pdo->prepare("SELECT name, familyname, email FROM users");
$stmt->execute();

/* Fetch all users */
$UserList = $stmt->fetchAll();
// print_r($UserList);

$count = count($UserList);
for ($i = 0; $i < $count; $i++) {
  $user = $UserList[$i]['name'];

  $list = array($user);
    //print_r($list[0]);
}

$output = " ";

// if form sent
if(isset($_POST['submit']) && !empty($_POST['name'])){
    $name = $_POST['name'];


    // delete user
    $stmt = $pdo->prepare( "DELETE FROM users WHERE name =:name" );
    $stmt->bindParam(':name', $name);
    $stmt->execute();

    $output = "You deleted this user form your database.";
     
    }
  

    /* * * * * * * * * * * * * * * * * * * * header and navigation * * * * * * * * * * * * * * * * * * * */

    include ("./inc/header.inc.php"); 
    include ("./inc/navPrivat.inc.php"); 
  
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
      <form action="deleteUser.php" method="post" novalidate>
      <!-- picture -->
      <div class="center"><img class="circle" src="img/valeria/valeria.png" alt=""></div>   
        

        <!-- delete user -->
        <h2>Delete user</h2><br>
        <label for="deleteUser">delete user</label>
        <select name="name" id="name">
        <?php
        $count = count($UserList);  
            for ($i = 0; $i < $count; $i++) {
            echo '<option value="'.$UserList[$i]['name'].'">'.$UserList[$i]['name'].'</option>';
        }
        ?>
       </select>

        <!-- output -->
        <br>
        <p class="paint-turquois"><?php echo $output;?></p>

        <!-- submit -->
        <button type="submit" name="submit"><a class="buttonType">delete user</a></button>

      </form>
    </div>
  </body>
</html>