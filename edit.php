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
$name = $street = $city = $email = $phone = $output = $picture = $feedbackAbout = "";

/* * * * * * * * * * * * * * * * * * * * about * * * * * * * * * * * * * * * * * * * */

// About Text Variables
$titel = $text = $chapter = "";
// $id=1;

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
  $picture = '<div class="center"><img class="hugeIcon" src="img/circle/thumbsup.svg" alt=""></div>';
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

  // picture upload
  // Count total files
  $countfiles = count($_FILES['files']['name']);
 
  // Prepared statement
  $query = "UPDATE about SET imageName = :imageName, imageData = :imageData, imageType = :imageType WHERE id = :id";

  $stmt = $pdo->prepare($query);

  // Loop all files
  for($i=0;$i<$countfiles;$i++){

    // File name
    $filename = $_FILES['files']['name'][$i];

    // Location
    $target_file = 'img/about/upload/'.$filename;
  
    // file extension
    $imageType = pathinfo($target_file, PATHINFO_EXTENSION);
    $imageType = strtolower($imageType);

    // Valid image extension
    $valid_extension = array("png","jpeg","jpg");

    if(in_array($imageType, $valid_extension)){

      // Upload file
      if(move_uploaded_file($_FILES['files']['tmp_name'][$i],$target_file)){

      // Execute query
	    $stmt->execute(array('id' => 1, 'imageName' => $filename, 'imageData' => $target_file, 'imageType' => $imageType ));
       }
    }
 
  }
  // feedback
  $feedbackAbout = '<img class="iconBig" src="img/circle/thumbsup.svg" alt="">';

}

// import 1 Row from camps
// variables form database camps
$stmt = $pdo->prepare("SELECT name, familyname, email FROM users");
$stmt->execute();

/* Fetch all of the remaining rows in the result set */
echo '<pre>';
print("Fetch all of the remaining rows in the result set:\n");
$UserList = $stmt->fetchAll();
print_r($UserList);

$count = count($UserList);
for ($i = 0; $i < $count; $i++) {
  $user = $UserList[$i]['name'];

  $list = array($user);
  echo '<pre>';
  print_r($list);
}
print_r($user);

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

    <!-- - - - - - - - - - - - - - - - - - - - edit about info - - - - - - - - - - - - - - - - - - -->

    <form action="" enctype="multipart/form-data" method="post">
      <h2>About</h2>
      <br>
      <h4>Edit your about page</h4>
      <br>
      <br>
      <!-- headline -->
      <label for="titel">Headline</label>
      <input type="text" id="titel" name="titel" value="<?=$titel?>"><br>
      <br> 
      <!-- description -->
      <label for="text">Description</label><br>
      <br>
      <textarea name="text" type="text" rows="5" placeholder="Say something about yourself" maxlength="200"></textarea>
      <br> 
      <br> 

      <!-- pictures upload -->
      <input type='file' name='files[]' multiple />
      <input type='submit' value='Submit' name='submit' />

      <!-- output -->
      <br>
      <p class="paint-turquois"><?php echo $output;?></p>

      <!-- submit -->
      <div class="center">
        <button class="buttonType" type="submit" name="updateAbout">update about</button>
      </div>
      <?php echo $feedbackAbout; ?>
    </form>

    
  <!-- - - - - - - - - - - - - - - - - - - - register - - - - - - - - - - - - - - - - - - -->
  <form action="" enctype="multipart/form-data" method="post">
      <h2>Register</h2>
      <br>
      <h4>Add new user to the edit area</h4>
      <br>
      <p>You can add a new user to the edit area of your website</p>
      <br>
      <button><a class="buttonType"href="register.php">register new user</a></button>

      <!-- List of registered users -->
      <hr>
      <p><strong class="paint-haze"> Registered to your edit area</strong></p>
      <?php 
      $countUser = count($user);
      for ($i = 0; $i < $countUser; $i++ ){
        print_r($UserList[$i]['name']);
      }
    


      ?>
      
    <p><?php ?></p>
    </form>
    
  </section>
</body>
</html>