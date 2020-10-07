<?php
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
$MainPicture = 'img/circle/octopus.svg';

include ("./inc/main.inc.php"); 

/* * * * * * * * * * * * * * * * * * * * contact * * * * * * * * * * * * * * * * * * * */

// Contact Text Variables
$name = $street = $city = $email = $phone = $output = $picture = "";

/* * * * * * * * * * * * * * * * * * * * about * * * * * * * * * * * * * * * * * * * */

// About Text Variables
$titel = $text = $chapter = "";
$id=1;

/* * * * * * * * * * * * * * * * * * * * contact validation * * * * * * * * * * * * * * * * * * * */

// if form sent
if(isset($_POST['updateContact'])){
  $name = $_POST['name'];
  $city = $_POST['street'];
  $street = $_POST['city'];
  $email =  $userService -> validateInput($_POST['email'],true,"E-Mail","email","Email is not valid");
  $phone = $_POST['phone'];


  // upload updated contact information
  $stmt = $pdo->prepare("UPDATE contact SET name = :name, street = :street, city = :city, email = :email, phone = :phone  WHERE id = :id");
  $stmt->execute(array('id' => 1, 'name' => $name, 'street' => $street, 'city' => $city, 'email' => $email, 'phone' => $phone));

  // feedback
  $picture = '<img class="hugeIcon" src="img/circle/thumbsup.svg" alt="">';
}

/* * * * * * * * * * * * * * * * * * * * about validation * * * * * * * * * * * * * * * * * * * */

// if form sent
if(isset($_POST['updateAbout'])){
  $titel = $_POST['titel'];
  $text = $_POST['text'];

  $data = [
    'chapter' => 'About',
    'titel' => $titel,
    'text' => $text,
    'id' => $id,
  ];
  $stmt= $pdo->prepare("UPDATE about SET chapter = :chapter, titel = :titel, text = :text WHERE id = :id");
  $stmt->execute($data);
    // feedback
    $picture = '<img class="hugeIcon" src="img/circle/thumbsup.svg" alt="">';
  }
?>

<html>
  <head>
    <link rel="stylesheet" href="style/parts/privat.style.css">
    <link rel="stylesheet" href="style/elements/form.style.css">
    <link rel="stylesheet" href="style/elements/button.style.css">
    <link rel="stylesheet" href="style/elements/icon.style.css">
    <link rel="stylesheet" href="style/parts/edit.style.css">
    <link rel="stylesheet" href="style/cd/typo.style.css">
  </head>
  <style><?php include "style/cd/typo.style.css" ?></style>
  <style><?php include "style/elements/form.style.css" ?></style>
  <style><?php include "style/elements/button.style.css" ?></style>

<body class="dark">

<!-- - - - - - - - - - - - - - - - - - - - edit contact info - - - - - - - - - - - - - - - - - - -->
  <section class="edit">
    <form action="" method="post">
      <h2>Contact</h2>
      <br>
      <h4>Edit your contact information</h4>
      <br>
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
        <button class="buttonType" type="submit" name="updateContact">update contact</button>
      </div>
      <?php echo $picture; ?>
    </form>

    <form action="" method="post">
      <h2>About</h2>
      <br>
      <h4>Edit your about page</h4>
      <br>
      <br>
      <!-- name -->
      <label for="titel">Headline</label>
      <input type="text" id="titel" name="titel" value="<?=$titel?>"><br>
      <br> 
      <!-- street -->
      <label for="text">Description</label>
      <input type="text" id="text" name="text" value="<?=$text?>"><br>
      <br> 
      <!-- output -->
      <br>
      <p class="paint-turquois"><?php echo $output;?></p>

      <!-- submit -->
      <div class="center">
        <button class="buttonType" type="submit" name="updateAbout">update about</button>
      </div>
      <?php echo $picture; ?>
    </form>
  </section>
</body>
</html>