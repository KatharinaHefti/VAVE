<?php 

// includes nav template
include ("./inc/header.inc.php"); 
include ("./inc/nav.inc.php"); 

// database connection
require_once("./config/config.inc.php");

/* * * * * * * * * * * * * * * * * * * * camps * * * * * * * * * * * * * * * * * * * */
?>

<!-- camps header picture -->
<img class="headerPic" src="img/camp/tim-marshall-y74zvFZ5mSU-unsplash.jpg" alt="camp">

<?php
/* * * * * * * * * * * * * * * * * * * * main camp * * * * * * * * * * * * * * * * * * * */

// import variables form database 
// * CAMPS *

// campHeadline
// campDescription
// campStart
// campEnd 
// campLocation
// campPrice
// campPatricipants
// campShortDescription
// campButton
// campTickets
// imageData

$sql = "SELECT * FROM camps WHERE id=1";
// fetch row form camps
// ID=1
foreach ($pdo->query($sql) as $row) {
  $MainCampSectionHeadline = $row["campHeadline"];
  $MainCampLongDescription = $row["campDescription"];
  $MainCampDateStart = $row["campStart"];
  $MainCampDateEnd = $row["campEnd"];
  $MainCampLocation = $row["campLocation"];
  $MainCampPrice = $row["campPrice"];
  $MainCampPatricipants = $row["campPatricipants"];
  $MainCampShortDescription = $row["campShortDescription"];
  $MainCampButton = $row["campButton"];
  $MainCampTickets = $row["campTickets"];
  $imagedata = $row["imageData"]; 

  // fixed variables
  $CampSectionChapterTitle = 'Camp';

  //include campSection template
  include ("inc/campSection.inc.php");
}

/* * * * * * * * * * * * * * * * * * * * camp short sections * * * * * * * * * * * * * * * * * * * */

$sql = "SELECT * FROM camps WHERE id!=1";
// fetch row form camps
// ID=! 1
foreach ($pdo->query($sql) as $row) {
  $CampSectionHeadline = $row["campHeadline"];
  $CampSectionLongDescription = $row["campDescription"];
  $CampSectionDateStart = $row["campStart"];
  $CampSectionDateEnd = $row["campEnd"];
  $CampSectionLocation = $row["campEnd"];
  $CampSectionLink = $row["campLink"];
  $CampSectionButton = $row["campButton"];
  
  //include campSection template
  include ("./inc/campSectionShort.inc.php"); 
}
?>