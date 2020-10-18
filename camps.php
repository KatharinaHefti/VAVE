<?php 

// database connection
require_once("./config/config.inc.php");

/* HEADER & NAVIGATION * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */

// includes nav template
include ("./inc/header.inc.php"); 
include ("./inc/nav.inc.php"); 

/* HTML * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */
?>

<!-- camps header picture -->
<img class="headerPic" src="img/camp/tim-marshall-y74zvFZ5mSU-unsplash.jpg" alt="camp">

<?php
/* MAIN CAMP * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *

   select variables form database 
   CAMPS 

 * campHeadline
 * campDescription
 * campStart
 * campEnd 
 * campLocation
 * campPrice
 * campPatricipants
 * campShortDescription
 * campButton
 * campTickets
 * imageData

*/

$sql = "SELECT * FROM camps WHERE id=1";

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

/* SECTIONS CAMPS * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
   
   select variables form database 
   CAMPS 

 * campHeadline
 * campDescription
 * campStart
 * campEnd 
 * campLocation
 * campShortDescription
 * campButton

*/
$sql = "SELECT * FROM camps WHERE id!=1";

foreach ($pdo->query($sql) as $row) {
  $CampSectionHeadline = $row["campHeadline"];
  $CampSectionLongDescription = $row["campDescription"];
  $CampSectionDateStart = $row["campStart"];
  $CampSectionDateEnd = $row["campEnd"];
  $CampSectionLocation = $row["campLocation"];
  $CampSectionLink = $row["campLink"];
  $CampSectionButton = $row["campButton"];
  
  //include campSection template
  include ("./inc/campSectionShort.inc.php"); 
}
?>