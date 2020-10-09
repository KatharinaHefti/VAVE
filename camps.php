<?php 
include ("./inc/header.inc.php"); 
include ("./inc/nav.inc.php"); 

// database connection
require_once("./config/config.inc.php");

/* * * * * * * * * * * * * * * * * * * * main * * * * * * * * * * * * * * * * * * * */
?>
<style><?php include "style/parts/grid.style.css" ?></style>

<!-- Header Picture -->
<img class="headerPic" src="img/camp/tim-marshall-y74zvFZ5mSU-unsplash.jpg" alt="camp">
<?php

/* * * * * * * * * * * * * * * * * * * * camp section * * * * * * * * * * * * * * * * * * * */

// Main Chapter Variabl not changeble
$CampSectionChapterTitle = 'Camp';

// import 1 Row from camps
// variables form database camps
$sql = "SELECT campHeadline, campDescription, campStart, campEnd, campLocation, campPrice, campPatricipants, campShortDescription, campLink, campButton, campTicketsLeft FROM camps WHERE id=1";
foreach ($pdo->query($sql) as $row) {
$MainCampSectionHeadline = $row["campHeadline"];
$MainCampLongDescription = $row["campDescription"];
$MainCampDateStart = $row["campStart"];
$MainCampDateEnd = $row["campEnd"];
$MainCampLocation = $row["campEnd"];
$MainCampPrice = $row["campPrice"];
$MainCampPatricipants = $row["campPatricipants"];
$MainCampShortDescription = $row["campShortDescription"];
$MainCampLink = $row["campLink"];
$MainCampButton = $row["campButton"];
$MainCampTicketsLeft = $row["campTicketsLeft"];
include ("./inc/campSection.inc.php"); 
}

/* * * * * * * * * * * * * * * * * * * * camp short sections * * * * * * * * * * * * * * * * * * * */

$sql = "SELECT campHeadline, campDescription, campStart, campEnd, campLocation, campPrice, campPatricipants, campShortDescription, campLink, campButton, campTicketsLeft FROM camps WHERE id !=1";
foreach ($pdo->query($sql) as $row) {
$CampSectionHeadline = $row["campHeadline"];
$CampSectionLongDescription = $row["campDescription"];
$CampSectionDateStart = $row["campStart"];
$CampSectionDateEnd = $row["campEnd"];
$CampSectionLocation = $row["campEnd"];
$CampSectionLink = $row["campLink"];
$CampSectionButton = $row["campButton"];
include ("./inc/campSectionShort.inc.php"); 
}

?>