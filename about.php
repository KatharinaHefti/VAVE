<?php 
  include ("./inc/header.inc.php"); 
  include ("./inc/nav.inc.php"); 

  // database connection
  require_once("./config/config.inc.php");

  /* * * * * * * * * * * * * * * * * * * * main * * * * * * * * * * * * * * * * * * * */

// import variables form database contact
  $sql = "SELECT chapter, titel, text FROM about";
  foreach ($pdo->query($sql) as $row) {
  $MainChapterTitle = $row["chapter"];
  $MainHeadline = $row["titel"];
  $MainPragraph = $row["text"];
  }

  // Main Text Variables not changeble
  $MainLink = 'training.php';
  $MainButton = 'join a training';
  $MainPicture = 'img/valeria/valeria.png';

  // include main template
  include ("./inc/main.inc.php"); 

  /* * * * * * * * * * * * * * * * * * * * footer * * * * * * * * * * * * * * * * * * * */

  // include footer template
  include ("./inc/footer.inc.php"); 

?>