<?php
include ("./inc/header.inc.php"); 
include ("./inc/navPrivat.inc.php"); 

// Main Text Variables
$MainChapterTitle = 'Edit';
$MainHeadline = 'Here you can edit your texts';
$MainPragraph = 'You can always change your texts form the main site here whenever you want. It will upload the text to your database and store it savely. It will be updated imediatly, so make sure that your texts are correct.  ';
$MainLink = 'privat.php';
$MainButton = 'back to privat';
$MainPicture = '../img/shell.svg';

// Contact Variables

$name = $street = $name = $city = $email = $phone = "";

include ("./inc/main.inc.php"); 
?>

<html>
<style>
.dark{
  background-color: #B4DEE7;
}
</style>
<body class="dark">

<section class="event">
  <h4>Edit</h4>
  <br>
  <h2>Update your contact informations</h2>
  <br>

  <form action="">
    <!-- name -->
    <label for="name">Name</label>
	<input type="text" id="name" name="name" value="<?=$name?>"><br>
		
    <!-- street -->
    <label for="street">Street</label>
    <input type="text" id="street" name="street" value="<?=$street?>"><br>
    
    <!-- city -->
    <label for="city">City</label>
    <input type="text" id="city" name="city" value="<?=$city?>"><br>
    
    <!-- email -->
	<label for="email">E-Mail Adresse</label>
	<input type="email" id="email" name="email" value="<?=$email?>"><br>
	
    <!-- phone -->
	<label for="phone">Phone</label>
	<input type="text" id="phone" name="phone" value="<?=$phone?>"><br>

    <!-- submit -->
	<button type="submit" name="submit">update contact</button>

  </form>

</section>


 
</body>
</html>