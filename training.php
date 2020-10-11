<?php 
  include ("./inc/header.inc.php"); 
  include ("./inc/nav.inc.php"); 

  // database connection
  require_once("./config/config.inc.php");

  /* * * * * * * * * * * * * * * * * * * * main * * * * * * * * * * * * * * * * * * * */

// import variables form database contact
  $sql = "SELECT chapter, titel, text FROM trainings";
  foreach ($pdo->query($sql) as $row) {
  $MainChapterTitle = $row["chapter"];
  $MainHeadline = $row["titel"];
  $MainPragraph = $row["text"];
  }

  // Main Text Variables not changeble
  $MainPicture = './img/training/training_header.jpg';
  $MainLink = '#';
  $MainButton = 'join a training';
  

  


/* * * * * * * * * * * * * * * * * * * * main * * * * * * * * * * * * * * * * * * * */
?>
<style><?php include "style/elements/picture.style.css" ?></style>
<img class="headerPic" src="img/training/training_header.jpg" alt="valeria verzar">
<section class="gallery">
  <!-- chapter title -->
  <h4><?php echo  $MainChapterTitle ?></h4>
  <br>
  <!-- headline -->
  <h2><?php echo $MainHeadline ?></h2>
  <br>
  <!-- paragraph -->
  <p><?php echo $MainPragraph ?></p>
  <!-- button -->
  <button><a class="buttonType" href="<?php echo $MainLink?>"><?php echo $MainButton?></a></button>
</section>
<?php
/* * * * * * * * * * * * * * * * * * * * footer * * * * * * * * * * * * * * * * * * * */

  // include footer template
  include ("./inc/footer.inc.php"); 
?>