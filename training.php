<?php 
  include ("./inc/header.inc.php"); 
  include ("./inc/nav.inc.php"); 

  // database connection
  require_once("./config/config.inc.php");

  /* * * * * * * * * * * * * * * * * * * * main * * * * * * * * * * * * * * * * * * * */

// import variables form database trainings
  $sql = "SELECT chapter, titel, text FROM trainings WHERE id=1";
  foreach ($pdo->query($sql) as $row) {
  $MainChapterTitle = $row["chapter"];
  $MainHeadline = $row["titel"];
  $MainPragraph = $row["text"];
  }

  // Main Text Variables not changeble
  $MainPicture = './img/training/training_header.jpg';
  $MainLink = 'trainings/Ginastica-Natural-Zurich.php';
  $MainButton = 'Ginastica Natural';

  $WorkoutLink = 'trainings/VAVE-Workout.php';
  $WorkoutButton ='VAVE Workout';

  $WorkoutLink = 'trainings/VAVE-Workout.php';
  $WorkoutButton ='VAVE Workout';

  $MuayThaiLink = 'trainings/Muay-Thai.php';
  $MuayThaiButton = 'Muay Thai Training ';
  
/* * * * * * * * * * * * * * * * * * * * main * * * * * * * * * * * * * * * * * * * */
?>
<style><?php include "style/elements/picture.style.css" ?></style>
<img class="headerPic" src="img/training/training_header.jpg" alt="valeria verzar">
<main class="main">
  <!-- chapter title -->
  <h4><?php echo  $MainChapterTitle ?></h4>
  <br>
  <!-- headline -->
  <h2><?php echo $MainHeadline ?></h2>
  <br>
  <!-- paragraph -->
  <p><?php echo $MainPragraph ?></p>
  <!-- button -->
  <div class="flexer">
  <button><a class="buttonType" href="<?php echo $MainLink?>"><?php echo $MainButton?></a></button>
  <button><a class="buttonType" href="<?php echo $WorkoutLink?>"><?php echo $WorkoutButton?></a></button>
  <button><a class="buttonType" href="<?php echo $MuayThaiLink?>"><?php echo $MuayThaiButton?></a></button>
  </div>
</main>


<?php
/* * * * * * * * * * * * * * * * * * * * section * * * * * * * * * * * * * * * * * * * */

$SectionChapterTitle = 'Qualifications';
$SectionHeadline = 'Health specialist EFZ; Fitness instructor';
$SectionParagraph = 'SOMIT course association management (University of Friborg); Over 10 years of competitive sport experience in martial arts & competition training.';
$SectionLanguages = 'Languages:';
$Languages = 'German & English';
$Help = 'Where i can help you:';

$trainings = array(
  'Strength training',
  'Endurance training',
  'H.I.I.T. (High intensity intervall training)',
  'TRX suspension training',
  'Regression training',
  'Ginastica Natural Training',
  'Sport training (Snowboarding, Surfing etc.)',
  'Martial arts training (Muay Thai; Kickboxing & boxing)'
);
// var_dump($trainings);
?>

<style><?php 
include "style/parts/main.style.css";
include "style/parts/grid.style.css";
include "style/elements/picture.style.css"; 
?></style>
<main class="main">

  <h4><?php echo $SectionChapterTitle?></h4>
  <br>
  <h3><?php echo $SectionHeadline?></h3>
  <br>
  <div class="left">
  <strong><?php echo $SectionLanguages?></strong>
  <p><?php echo $Languages?></p>
  <br>
  <p><?php echo $SectionParagraph?></p>
  <br>
  <strong><?php echo $Help?></strong>
  <p><?php

  $amount = count($trainings);
  // print_r($amount);

  for ($i = 0; $i < $amount; $i++) {
    $value = $trainings[$i];
    echo '<strong class="paint-haze"><php?>- '.$trainings[$i].'</strong><br>';
}
  
  
  ?></p>
  </div>

</main>



<?php


/* * * * * * * * * * * * * * * * * * * * footer * * * * * * * * * * * * * * * * * * * */

  // include footer template
  include ("./inc/footer.inc.php"); 
?>