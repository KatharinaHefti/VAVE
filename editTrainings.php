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

/* * * * * * * * * * * * * * * * * * * * trainings * * * * * * * * * * * * * * * * * * * */

// training text variables
$title = $text = $output = "";

// if form sent
if(isset($_POST['updateTrainings'])){
  $title = $_POST['titel'];
  $text = $_POST['text'];

  // upload updated contact information
  $sql = "UPDATE trainings SET titel = :titel, text = :text WHERE id = :id";
  $stmt = $pdo->prepare($sql);
  $stmt->execute(array('id' => 1, 'titel' => $title, 'text' => $text));

  // feedback
  $output = 'updated';
}

/* * * * * * * * * * * * * * * * * * * * ginastica natural zurich * * * * * * * * * * * * * * * * * * * */

// if form sent
if(isset($_POST['updateGinastica'])){
  $title = $_POST['titel'];
  $text = $_POST['text'];

  // upload updated contact information
  $sql = "UPDATE trainings SET titel = :titel, text = :text WHERE id = :id";
  $stmt = $pdo->prepare($sql);
  $stmt->execute(array('id' => 2, 'titel' => $title, 'text' => $text));

  // feedback
  $output = 'updated Ginastica Natural Zurich';
}

/* * * * * * * * * * * * * * * * * * * * VAVE Workout * * * * * * * * * * * * * * * * * * * */

// if form sent
if(isset($_POST['updateWorkout'])){
  $title = $_POST['titel'];
  $text = $_POST['text'];

  // upload updated contact information
  $sql = "UPDATE trainings SET titel = :titel, text = :text WHERE id = :id";
  $stmt = $pdo->prepare($sql);
  $stmt->execute(array('id' => 3, 'titel' => $title, 'text' => $text));

  // feedback
  $output = 'updated VAVE Workout';
}

// if form sent
if(isset($_POST['updateMuayThai'])){
  $title = $_POST['titel'];
  $text = $_POST['text'];

  // upload updated contact information
  $sql = "UPDATE trainings SET titel = :titel, text = :text WHERE id = :id";
  $stmt = $pdo->prepare($sql);
  $stmt->execute(array('id' => 4, 'titel' => $title, 'text' => $text));

  // feedback
  $output = 'updated Muay Thai training';
}

/* * * * * * * * * * * * * * * * * * * * html * * * * * * * * * * * * * * * * * * * */
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
<body class="dark">

  <!-- - - - - - - - - - - - - - - - - - - - first column edit trainings - - - - - - - - - - - - - - - - - - -->
  
  <section class="edit">
    <form action="" method="post">
      <h2>Trainings</h2>
      <br>
      <h4>Edit your training information</h4>
      <br>
      <br>
      <!-- title -->
      <label for="titel">Title</label>
      <input type="text" id="titel" name="titel" value="<?=$title?>"><br>
      <br> 
      <!-- text -->
      <label for="text">Text</label>
      <textarea name="text" type="text" rows="10" placeholder="Say something about your training"></textarea>
      <br> 
      <!-- output -->
      <br>
      <p class="paint-turquois"><?php echo $output;?></p>
      <!-- submit -->
      <div class="center">
        <button class="buttonType" type="submit" name="updateTrainings">update Trainings</button>
      </div>
    </form>

    <!-- - - - - - - - - - - - - - - - - - - - second column edit ginastica natural zurich - - - - - - - - - - - - - - - - - - -->
 
    

    <!-- - - - - - - - - - - - - - - - - - - - third column icon - - - - - - - - - - - - - - - - - - -->
    <div><img class="hugeIcon" src="img/circle/training.svg" alt=""></div>
  </section>
  

<!--! - ! - ! - ! - ! - ! - ! - ! - ! - ! - ! - SECOND ROW - ! - ! - ! - ! - ! - ! - ! - ! - ! - ! - ! -->


<!-- - - - - - - - - - - - - - - - - - - - first column edit ginastica natural zurich - - - - - - - - - - - - - - - - - - -->

  <section class="edit">

    <form action="" method="post">
      <h2>Ginastica Natural</h2>
      <br>
      <!-- title -->
      <label for="titel">Title</label>
      <input type="text" id="titel" name="titel" value="<?=$title?>"><br>
      <br> 
      <!-- text -->
      <label for="text">Text</label>
      <textarea name="text" type="text" rows="10" placeholder="Say something about your training"></textarea>
      <br> 
      <!-- output -->
      <br>
      <p class="paint-turquois"><?php echo $output;?></p>

      <!-- submit -->
      <div class="center">
        <button class="buttonType" type="submit" name="updateGinastica">update Trainings</button>
      </div>
    </form>

<!-- - - - - - - - - - - - - - - - - - - - second column edit VAVE Workout - - - - - - - - - - - - - - - - - - -->

    <form action="" method="post">
      <h2>VAVE Workout</h2>
      <br>
      <!-- title -->
      <label for="titel">Title</label>
      <input type="text" id="titel" name="titel" value="<?=$title?>"><br>
      <br> 
      <!-- text -->
      <label for="text">Text</label>
      <textarea name="text" type="text" rows="10" placeholder="Say something about your training"></textarea>
      <br> 
      <!-- output -->
      <br>
      <p class="paint-turquois"><?php echo $output;?></p>
      <!-- submit -->
      <div class="center">
        <button class="buttonType" type="submit" name="updateWorkout">update Trainings</button>
      </div>
    </form>

<!-- - - - - - - - - - - - - - - - - - - - third column edit muay thai training - - - - - - - - - - - - - - - - - - -->
 
    <form action="" method="post">
      <h2>Muay Thai Training</h2>
      <br>
      <!-- title -->
      <label for="titel">Title</label>
      <input type="text" id="titel" name="titel" value="<?=$title?>"><br>
      <br> 
      <!-- text -->
      <label for="text">Text</label>
      <textarea name="text" type="text" rows="10" placeholder="Say something about your training"></textarea>
      <br> 
      <!-- output -->
      <br>
      <p class="paint-turquois"><?php echo $output;?></p>

      <!-- submit -->
      <div class="center">
        <button class="buttonType" type="submit" name="updateMuayThai">update Trainings</button>
      </div>
    </form>
  </section>

</body>
</html>