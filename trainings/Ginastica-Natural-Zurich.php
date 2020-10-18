<?php 

// database connection
require_once("../config/config.inc.php");

/* HEADER & NAVIGATION * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */

include ("../inc/headerCamps.inc.php"); 
include ("../inc/navCamps.inc.php"); 

// variables 
$TrainingHeadline = $TrainingParagraph = '';
$id = 2;
$TrainingChapterTitle = 'Training';
$TrainingPicture = '../img/training/Ginastica-Natural-Zurich/Ginastica-Natural-Zurich_header.jpg';
$TraininLink = 'trainings/Ginastica-Natural-Zurich.php';
$TrainingButton = 'Train Ginastica Natural';

/* GINASTICA NATURAL ZURICH * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *

   select variables form database 
   TRAININGS 

* titel
* text

*/
$sql = "SELECT * FROM trainings WHERE id = $id";
foreach ($pdo->query($sql) as $row) {
    $TrainingHeadline =$row['titel'];
    $TrainingParagraph =$row['text'];
}

/* HTML * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */
?>
<img class="headerPic" src="<?php echo $TrainingPicture ?>" alt="VAVE Training Ginastica Natural Zurich">
<main class="main">
  <!-- chapter title -->
  <h4><?php echo $TrainingChapterTitle ?></h4><br>
  <!-- headline -->
  <h2><?php echo $TrainingHeadline ?></h2><br>
  <!-- paragraph -->
  <p><?php echo $TrainingParagraph ?></p>
</main>
