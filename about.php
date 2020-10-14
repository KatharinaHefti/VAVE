<?php 

// includes nav template
include ("./inc/header.inc.php"); // header links 
include ("./inc/nav.inc.php"); // navigation 

// database connection
require_once("./config/config.inc.php");

/* * * * * * * * * * * * * * * * * * * * about * * * * * * * * * * * * * * * * * * * */

// import variables form database 
// * ABOUT *

// chapter
// titel
// text
// imageData 

$sql = "SELECT chapter, titel, text, imageData FROM about";
// fetch row form about
foreach ($pdo->query($sql) as $row) {
  $MainChapterTitle = $row["chapter"];
  $MainHeadline = $row["titel"];
  $MainPragraph = $row["text"];
  $MainPicture = $row["imageData"];
  }

// fixed variables
$MainLink = 'training.php';
$MainButton = 'join a training';

//include main template
include ("./inc/main.inc.php"); 

/* * * * * * * * * * * * * * * * * * * * footer * * * * * * * * * * * * * * * * * * * */

// include footer template
include ("./inc/footer.inc.php"); 
?>