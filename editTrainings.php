<?php

// session
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

// includes nav template
include ("./inc/header.inc.php"); 
include ("./inc/navPrivat.inc.php"); 

/* * * * * * * * * * * * * * * * * * * * trainings POST * * * * * * * * * * * * * * * * * * * */

// variables
$title = $text = $output = $outputGinastica = $outputWorkout = $outputThai = "";

// if form sent?
if(isset($_POST['updateTrainings'])){
  // save inputs to variables
  $title = $userService -> validateInput($_POST['titel'],true,"Title","title","Title is not valid");
  $text = $userService -> validateInput($_POST['text'],true,"Text","text","Text is not valid");

  // is everything filled in?
  if (empty( $_POST['titel']) || empty($_POST['text']) ) {
    $output = 'Please fill in all information.';
  }
else{
    $id = 1;

/* * * * * * * * * * * * * * * * * * * * trainings UPDATE * * * * * * * * * * * * * * * * * * * */
  
  // insert variables to database 
  // * TRAININGS * row 1 *

  // title
  // text

  $sql = "UPDATE trainings SET titel = :titel, text = :text WHERE id = :id";
  $stmt = $pdo->prepare($sql);
  // save trainings variables from POST inputs to array
  $data = [ 
    'id' => $id, 
    'titel' => $title, 
    'text' => $text,
  ];
  // replace variables in database contact – row 1
  $stmt->execute($data);

  // feedback
  $output = 'Updated your training informations.';
  }
}
/* * * * * * * * * * * * * * * * * * * * ginastica natural zurich POST * * * * * * * * * * * * * * * * * * * */

// if form sent?
if(isset($_POST['updateGinastica'])){
  // save inputs to variables
  $title = $userService -> validateInput($_POST['titel'],true,"Title","title","Title is not valid");
  $text = $userService -> validateInput($_POST['text'],true,"Text","text","Text is not valid");

  // is everything filled in?
  if (empty( $_POST['titel']) || empty($_POST['text']) ) {
    $outputGinastica = 'Please fill in all information.';
  }
  else{
  $id = 2;

/* * * * * * * * * * * * * * * * * * * * ginastica natural zurich UPDATE * * * * * * * * * * * * * * * * * * * */
  
  // insert variables to database 
  // * TRAININGS * row 2 *

  // title
  // text

  $sql = "UPDATE trainings SET titel = :titel, text = :text WHERE id = :id";
  $stmt = $pdo->prepare($sql);
  // save trainings variables from POST inputs to array
  $data = [
  'id' => $id, 
  'titel' => $title, 
  'text' => $text,
  ];
  // replace variables in database contact – row 2
  $stmt->execute($data);

  // feedback
  $outputGinastica = 'Updated Ginastica Natural Zurich';
}
}
/* * * * * * * * * * * * * * * * * * * * VAVE Workout POST  * * * * * * * * * * * * * * * * * * * */

// if form sent?
if(isset($_POST['updateWorkout'])){
  // save inputs to variables
  $title = $_POST['titel'];
  $text = $_POST['text'];

   // is everything filled in?
   if (empty( $_POST['titel']) || empty($_POST['text']) ) {
    $outputWorkout = 'Please fill in all information.';
  }
  else{
    $id = 3;

/* * * * * * * * * * * * * * * * * * * * VAVE Workout UPDATE * * * * * * * * * * * * * * * * * * * */
  
  // insert variables to database 
  // * TRAININGS * row 3 *

  // title
  // text

  $sql = "UPDATE trainings SET titel = :titel, text = :text WHERE id = :id";
  $stmt = $pdo->prepare($sql);
  // save contact variables from POST inputs to array
  $data = [
    'id' => $id, 
    'titel' => $title, 
    'text' => $text,
  ];
  // replace variables in database contact – row 3
  $stmt->execute($data);

  // feedback
  $outputWorkout = 'updated VAVE Workout';
  }
}

/* * * * * * * * * * * * * * * * * * * * Muay Thai UPDATE * * * * * * * * * * * * * * * * * * * */

// if form sent ?
if(isset($_POST['updateMuayThai'])){
  // save inputs to variables
  $title = $_POST['titel'];
  $text = $_POST['text'];

   // is everything filled in?
   if (empty( $_POST['titel']) || empty($_POST['text']) ) {
    $outputThai = 'Please fill in all information.';
  }
  else{

    $id = 4;

/* * * * * * * * * * * * * * * * * * * * trainings UPDATE * * * * * * * * * * * * * * * * * * * */
  
  // insert variables to database 
  // * TRAININGS * row 4 *

  // title
  // text

  $sql = "UPDATE trainings SET titel = :titel, text = :text WHERE id = :id";
  $stmt = $pdo->prepare($sql);
  $data = [
    'id' => $id, 
    'titel' => $title, 
    'text' => $text,
  ];
  // replace variables in database contact – row 4
  $stmt->execute($data);

  // feedback
  $outputThai = 'updated Muay Thai training';
  }
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

    <!-- - - - - - - - - - - - - - - - - - - - edit trainings - - - - - - - - - - - - - - - - - - -->
    <form action="" method="post">
      <h2>Trainings</h2><br>
      <h4>Edit your training information</h4><br>
      <br>
      <!-- title -->
      <label for="titel">Title</label>
      <input type="text" id="titel" name="titel" value="<?=$title?>"><br><br> 
      <!-- text -->
      <label for="text">Text</label><br><br>
      <textarea name="text" type="text" rows="10" placeholder="Say something about your training"></textarea> 
      <!-- output -->
      <p>The update will take a few seconds. please refresh your browser after updating.</p>
      <p class="feedbackNeg"><?php echo $output;?></p>
      <!-- submit -->
      <div class="center">
        <button class="buttonType" type="submit" name="updateTrainings">update</button>
      </div>
    </form>

    <!-- - - - - - - - - - - - - - - - - - - - second column edit ginastica natural zurich - - - - - - - - - - - - - - - - - - --> 
    <div><img class="hugeIcon" src="img/circle/training.svg" alt=""></div>

  </section>
  

<!--! - ! - ! - ! - ! - ! - ! - ! - ! - ! - ! - SECOND ROW - ! - ! - ! - ! - ! - ! - ! - ! - ! - ! - ! -->
  
  <section class="edit">

<!-- - - - - - - - - - - - - - - - - - - - first column edit ginastica natural zurich - - - - - - - - - - - - - - - - - - -->
    <form action="" method="post">
      <h2>Ginastica Natural</h2><br>
      <!-- title -->
      <label for="titel">Title</label>
      <input type="text" id="titel" name="titel" value="<?=$title?>"><br><br> 
      <!-- text -->
      <label for="text">Text</label><br><br>
      <textarea name="text" type="text" rows="10" placeholder="Say something about your training"></textarea>
      <!-- output -->
      <p>The update will take a few seconds. please refresh your browser after updating.</p>
      <p class="feedbackNeg"><?php echo $outputGinastica;?></p>
      <!-- submit -->
      <div class="center">
        <button class="buttonType" type="submit" name="updateGinastica">update</button>
      </div>
    </form>

<!-- - - - - - - - - - - - - - - - - - - - second column edit VAVE Workout - - - - - - - - - - - - - - - - - - -->
    <form action="" method="post">
      <h2>VAVE Workout</h2><br>
      <!-- title -->
      <label for="titel">Title</label>
      <input type="text" id="titel" name="titel" value="<?=$title?>"><br><br> 
      <!-- text -->
      <label for="text">Text</label><br><br>
      <textarea name="text" type="text" rows="10" placeholder="Say something about your training"></textarea>
      <!-- output -->
      <p>The update will take a few seconds. please refresh your browser after updating.</p>
      <p class="feedbackNeg"><?php echo $outputWorkout;?></p>
      <!-- submit -->
      <div class="center">
        <button class="buttonType" type="submit" name="updateWorkout">update</button>
      </div>
    </form>

<!-- - - - - - - - - - - - - - - - - - - - third column edit muay thai training - - - - - - - - - - - - - - - - - - -->
    <form action="" method="post">
      <h2>Muay Thai Training</h2><br>
      <!-- title -->
      <label for="titel">Title</label>
      <input type="text" id="titel" name="titel" value="<?=$title?>"><br><br> 
      <!-- text -->
      <label for="text">Text</label><br><br>
      <textarea name="text" type="text" rows="10" placeholder="Say something about your training"></textarea>
      <!-- output -->
      <p>The update will take a few seconds. please refresh your browser after updating.</p>
      <p class="feedbackNeg"><?php echo $outputThai;?></p>
      <!-- submit -->
      <div class="center">
        <button class="buttonType" type="submit" name="updateMuayThai">update</button>
      </div>
    </form>
  </section>

</body>
</html>