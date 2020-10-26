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

/* HEADER & NAVIGATION * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */

// includes nav template
include ("./inc/header.inc.php"); 
include ("./inc/navPrivat.inc.php"); 

/* TRAININGS POST * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */

// variables
$title = $text = $output = $outputGinastica = $outputWorkout = $outputThai = "";

// if form sent?
if(isset($_POST['updateTrainings'])){
  // save inputs to variables
  $title = $userService -> validateInput($_POST['titel'],true,"Title","title","Title is not valid");
  $text = $userService -> validateInput($_POST['text'],true,"Text","text","Text is not valid");

  // is everything filled in?
  if ($userService -> validationState) {

    $id = 1;

/* TRAININGS UPDATE * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
  
  update variables in database 
  TRAININGS * row 1 *

 * title
 * text
 * 
  
*/

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
  else {
  // no
    foreach ($userService -> feedbackArray as $out) {
      $output .= $out.'<br>';
    }
  }
}

/* GINASTICA NATURAL * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */

// if form sent?
if(isset($_POST['updateGinastica'])){
  // save inputs to variables
  $title = $userService -> validateInput($_POST['titel'],true,"Title","title","Title is not valid. Not more than 60 characters allowed.");
  $text = $userService -> validateInput($_POST['text'],true,"Text","text","Text is not valid. Not more than 1000 characters allowed.");

  // is everything filled in?
  if ($userService -> validationState) {

  $id = 2;

/* GINASTICA NATURAL UPDATE * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
  
  update variables in database 
  TRAININGS * row 2 *

 * title
 * text
 * 
 
*/

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
  else {
    // no
    foreach ($userService -> feedbackArray as $out) {
      $outputGinastica .= $out.'<br>';
    }
  }
}
/* VAVE WORKOUT POST * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */

// if form sent?
if(isset($_POST['updateWorkout'])){
  // save inputs to variables
  $title = $userService -> validateInput($_POST['titel'],true,"Title","title","Title is not valid. Not more than 60 characters allowed.");
  $text = $userService -> validateInput($_POST['text'],true,"Text","text","Text is not valid. Not more than 1000 characters allowed.");

  // is everything filled in?
  if ($userService -> validationState) {

  $id = 3;

/* VAVE WORKOUT UPDATE * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *

  update variables in database 
  TRAININGS * row 3 *

 * title
 * text

*/

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
  $outputWorkout = 'Updated VAVE Workout';
  }
  else {
    // no
    foreach ($userService -> feedbackArray as $out) {
      $outputWorkout .= $out.'<br>';
    }
  }
}

/* MUAY THAI POST * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */

// if form sent ?
if(isset($_POST['updateMuayThai'])){
  // save inputs to variables
  $title = $userService -> validateInput($_POST['titel'],true,"Title","title","Title is not valid. Not more than 60 characters allowed.");
  $text = $userService -> validateInput($_POST['text'],true,"Text","text","Text is not valid. Not more than 1000 characters allowed.");

  // is everything filled in?
  if ($userService -> validationState) {

    $id = 4;

/* MUAY THAI UPDATE * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
  
  update variables in database 
  TRAININGS * row 4 *

 * title
 * text

*/

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
  $outputThai = 'Updated Muay Thai Training';
  }
  else {
    // no
    foreach ($userService -> feedbackArray as $out) {
      $outputThai .= $out.'<br>';
    }
  }
}

/* HTML * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */
?>
  <head>
    <link rel="stylesheet" href="style/parts/privat.style.css">
    <link rel="stylesheet" href="style/elements/form.style.css">
    <link rel="stylesheet" href="style/elements/button.style.css">
    <link rel="stylesheet" href="style/elements/icon.style.css">
    <link rel="stylesheet" href="style/parts/edit.style.css">
    <link rel="stylesheet" href="style/cd/typo.style.css">
  </head>
<body class="dark">

<!-- FIRST ROW - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - – -->
  <section class="edit">

    <!-- EDIT TRAININGS FORM - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - – -->
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
    <!-- icon -->
    <div><img class="hugeIcon" src="img/circle/training.svg" alt=""></div>
  </section>
  
<!-- SECOND ROW - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - – -->
  
  <section class="edit">

    <!-- EDIT GINASTICA NATURAL FORM - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - – -->
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

    <!-- EDIT VAVE WORKOUT FORM - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - – -->
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

    <!-- EDIT MUAY THAI FORM - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - – -->
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
