<?php
session_start();

// database connection
require_once("./config/config.inc.php");

// functions
require_once("./inc/functions.inc.php");

// is user logged in?
$user = check_user();

/* * * * * * * * * * * * * * * * * * * * header and navigation * * * * * * * * * * * * * * * * * * * */

include ("./inc/header.inc.php"); 
include ("./inc/navPrivat.inc.php"); 

/* * * * * * * * * * * * * * * * * * * * main * * * * * * * * * * * * * * * * * * * */

// Main Text Variables
$MainChapterTitle = 'Edit';
$MainHeadline = 'Here you can edit your texts';
$MainPragraph = 'You can always change your texts form the main site here whenever you want. It will upload the text to your database and store it savely. It will be updated imediatly, so make sure that your texts are correct.  ';
$MainLink = 'privat.php';
$MainButton = 'go back';
$MainPicture = '../img/circle/octopus.svg';

include ("./inc/main.inc.php"); 

// Contact Variables
$name = $street = $city = $email = $phone = $output = "";

// if form sent
if(isset($_POST['submit'])){
  $name = $_POST['name'];
  $city = $_POST['street'];
  $street = $_POST['city'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];

  $stmt = $pdo->prepare("INSERT INTO contact ( name, street, city, email, phone) VALUES (:name, :street, :city, :email, :phone)");
  $result = $stmt->execute(array('name' => $name, 'street' => $street, 'city' => $city, 'email' => $email, 'phone' => $phone));
  $stmt->execute();

}
?>

<html>
  <head>
    <link rel="stylesheet" href="style/parts/privat.style.css">
    <link rel="stylesheet" href="style/elements/form.style.css">
    <link rel="stylesheet" href="style/elements/icon.style.css">
    <link rel="stylesheet" href="style/cd/typo.style.css">
  </head>

<body class="dark">

<!-- - - - - - - - - - - - - - - - - - - - edit contact info - - - - - - - - - - - - - - - - - - -->
  <section class="event">
    <h4>Edit your contact information</h4>
    <br>
    <form action="" method="post">
      <br>
      <h2>Contact</h2>
      <br>
      <!-- name -->
      <label for="name">Name</label>
      <input type="text" id="name" name="name" value="<?=$name?>"><br>
      <br> 
      <!-- street -->
      <label for="street">Street</label>
      <input type="text" id="street" name="street" value="<?=$street?>"><br>
      <br> 
      <!-- city -->
      <label for="city">City</label>
      <input type="text" id="city" name="city" value="<?=$city?>"><br>
      <br>
      <!-- email -->
      <label for="email">E-Mail Adresse</label>
      <input type="email" id="email" name="email" value="<?=$email?>"><br>
      <br>
      <!-- phone -->
      <label for="phone">Phone</label>
      <input type="text" id="phone" name="phone" value="<?=$phone?>"><br>
      <!-- output -->
      <br>
      <p class="paint-turquois"><?php echo $output;?></p>

      <!-- submit -->
      <div class="center">
        <button type="submit" name="submit">update contact</button>
      </div>
    </form>
  </section>




 
</body>
</html>