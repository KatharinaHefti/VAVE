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

/* * * * * * * * * * * * * * * * * * * * events POST * * * * * * * * * * * * * * * * * * * */

// variables
$title = $text = $output = "";

// if form sent?
if(isset($_POST['updateEvents'])){
  // save inputs to variables
  // save inputs to variables
  $title = $userService -> validateInput($_POST['titel'],true,"Title","title","Title is not valid");
  $text = $userService -> validateInput($_POST['text'],true,"Text","text","Text is not valid");

  // is everything filled in?
  if ($userService -> validationState) {

    $id = 1;

/* * * * * * * * * * * * * * * * * * * * events UPDATE * * * * * * * * * * * * * * * * * * * */
  
  // insert variables to database 
  // * EVENTS * row 1 *

  // eventName
  // eventLead

  $sql = "UPDATE events SET eventName = :eventName, eventLead = :eventLead WHERE id = :id";
  $stmt = $pdo->prepare($sql);
  // save trainings variables from POST inputs to array
  $data = [ 
    'id' => $id, 
    'eventName' => $title, 
    'eventLead' => $text,
  ];
  // replace variables in database contact – row 1
  $stmt->execute($data);

  // feedback
  $output = 'Updated your training informations.';
  }
  else {
  // no
    foreach ($userService -> feedbackArray as $out) {
      $output .=  $out.'<br>';
    }
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
      <h2>Events</h2><br>
      <h4>Edit your event informations</h4><br>
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
        <button class="buttonType" type="submit" name="updateEvents">update</button>
      </div>
    </form>

    <!-- - - - - - - - - - - - - - - - - - - - second column edit ginastica natural zurich - - - - - - - - - - - - - - - - - - --> 
    <div><img class="hugeIcon" src="img/circle/events.svg" alt=""></div>

  </section>
  


</body>
</html>