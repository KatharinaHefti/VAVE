<?php

// session
session_start();

// database connection
include "./config/config.inc.php";


// functions
require_once("./inc/functions.inc.php");

// is user logged in?
$user = check_user();

// include class UserService to validate form inputs
require("class/UserService.class.php");
$userService = new UserService();

/* HEADER & NAVIGATION * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */

// includes nav template
include ("./inc/header.inc.php"); 
include ("./inc/navPrivat.inc.php"); 

/* MAIN * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */

// variables
$MainChapterTitle = 'Edit';
$MainHeadline = 'Here you can edit your texts';
$MainPragraph = 'You can always change your texts form the main site here whenever you want. It will upload the text to your database and store it savely. It will be updated imediatly, so make sure that your texts are correct.  ';
$MainLink = 'privat.php';
$MainButton = 'go back';
$MainPicture = 'img/circle/octopus.svg';

// includes main template
include ("./inc/main.inc.php"); 



/* IMPORT USER LIST * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *

   import variables form database 
   USERS

 * name
 * familyname
 * email
 
*/

// import variables form database users
$sql = "SELECT name, familyname, email FROM users";
$stmt = $pdo->prepare($sql);
$stmt->execute();

// fetch all
$UserList = $stmt->fetchAll();

// count total files
$count = count($UserList);

// loop all files
for ($i = 0; $i < $count; $i++) {
  $user = $UserList[$i]['name'];
  $list = array($user);
}
/* HTML * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */
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

  <section class="edit">

    <!-- EDIT CONTACT FORM - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - – -->
    <form action="handler/updateContact.php" method="post">
      <h2>Contact</h2><br>
      <h4>Edit your contact information</h4><br><br>
      <!-- name -->
      <label for="name">Name</label>
      <input type="text" id="name" name="name" value="<?=$name?>"><br><br> 
      <!-- street -->
      <label for="street">Street</label>
      <input type="text" id="street" name="street" value="<?=$street?>"><br><br> 
      <!-- city -->
      <label for="city">City</label>
      <input type="text" id="city" name="city" value="<?=$city?>"><br><br>
      <!-- email -->
      <label for="email">E-Mail Adresse</label>
      <input type="email" id="email" name="email" value="<?=$email?>"><br><br>
      <!-- phone -->
      <label for="phone">Phone</label>
      <input type="text" id="phone" name="phone" placeholder="+41774147474" value="<?=$phone?>"><br><br>
      <!-- output -->
      <p class="feedbackNeg"><?php echo $output;?></p>
      <!-- submit -->
      <div class="center">
      <button class="buttonType" type="submit" name="updateContact">update</button>
      </div>
    </form>

    <!-- EDIT ABOUT INFO FORM - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - – -->
    <form id="aboutForm" enctype="multipart/form-data"  action="handler/updateAbout.php" method="post">
      <h2>About</h2><br>
      <h4>Edit your about page</h4><br><br>
      <!-- headline -->
      <label for="titel">Headline</label>
      <input type="text" id="titel" name="titel" value="<?=$titel?>"><br><br> 
      <!-- description -->
      <label for="text">Description</label><br><br>
      <textarea name="text" type="text" rows="5" placeholder="Say something about yourself"></textarea><br><br> 
      <!-- pictures upload -->
      <input class="files" type='file' name='files[]' multiple /><br><br>
      <!-- feedback -->
      <p id="fbAbout" class="feedbackNeg"><?php echo $feedbackAbout;?></p>
      <!-- submit -->
      <div class="center">
      <button id="updateAbout" class="buttonType" type="submit" name="updateAbout">update</button>
      </div>
    </form>
    
    <!-- ADMIN USERS - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - – -->
    <form action="" enctype="multipart/form-data" method="post">
      <h2>Admin Users</h2><br>
      <h4>List of users with admin rights</h4>

      <!-- List of registered users --> 
      <p class="paint-haze"><?php 
      $count = count($UserList);  
        for ($i = 0; $i < $count; $i++) {
        $user = $UserList[$i]['name'];
        $list = array($user);
        echo '- '.$list[0].'<br>';
      }
      ?></p><br>
      
      <p>You can add new user to maintain your webpage.</p>
      <!-- add user  --> 
      <button><a class="buttonType" href="register.php">new user</a></button><br><br>

      <!-- delete user --> 
      <p>You can delete an existing user here.</p>
      <button><a class="buttonType" href="deleteUser.php">delete user</a></button>
    </form>
    
  </section>
<!-- js -->
<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
  <script>

    $(document).ready(function() {

      // UPDATE CONTACT
      $('#updateContact').on( 'click', function(){
        var name  = $('#name').val();
        var street = $('#street').val();
        var city = $('#city').val();
        var email = $('#email').val();
        var phone = $('#phone').val();

        $.post( 'handler/updateContact.php', {
          name: name,
          street: street,
          city: city,
          email: email,
          phone: phone  
        });
        .done(function( data ) {
          
          $('#output').html("updated contact").delay(2000);
                 
          $("#updateContact").val('Add Records');
            setTimeout(function(){
              window.location.reload(1);
            }, 15000);
        });
      });
      // UPDATE ABOUT
      $('#updateAbout').on( 'click', function(){
        var titel  = $('#titel').val();
        var text = $('#text').val();

        $('#fbAbout').html("updated about").delay(6000);
        setTimeout(function(){
          window.location.reload(1);
        }, 15000);
      });



  });
  </script>
</body>
</html>