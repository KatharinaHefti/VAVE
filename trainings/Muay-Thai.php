<?php 
include ("../inc/headerCamps.inc.php"); 
include ("../inc/navCamps.inc.php"); 

// database connection
require_once("../config/config.inc.php");

/* * * * * * * * * * * * * * * * * * * * ginastica natural zürich * * * * * * * * * * * * * * * * * * * */

// Main Chapter Variabl not changeble
$id = 4;
$TrainingChapterTitle = 'Training';
$TrainingPicture = '../img/training/Muay-Thai/Muay-Thai_header.jpg';

$TrainingHeadline = $TrainingParagraph = "";

$sql = "SELECT * FROM trainings WHERE id = $id";
foreach ($pdo->query($sql) as $row) {
    $TrainingHeadline =$row['titel'];
    $TrainingParagraph =$row['text'];

}


/* * * * * * * * * * * * * * * * * * * * main * * * * * * * * * * * * * * * * * * * */
?>
<style><?php include "../style/elements/picture.style.css" ?></style>
<img class="headerPic" src="<?php echo $TrainingPicture ?>" alt="valeria verzar">
<main class="main">
  <!-- chapter title -->
  <h4><?php echo $TrainingChapterTitle ?></h4>
  <br>
  <!-- headline -->
  <h2><?php echo $TrainingHeadline ?></h2>
  <br>
  <!-- paragraph -->
  <p><?php echo $TrainingParagraph ?></p>

</main>
