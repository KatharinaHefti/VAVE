<?php

include ("../inc/headerCamps.inc.php"); 
include ("../inc/navCamps.inc.php"); 

// database connection
require_once("../config/config.inc.php");

/* * * * * * * * * * * * * * * * * * * * main * * * * * * * * * * * * * * * * * * * */
?>
<style><?php include "../style/style.css" ?></style>
<?php

/* * * * * * * * * * * * * * * * * * * * camp section * * * * * * * * * * * * * * * * * * * */



// Main Chapter Variabl not changeble
$CampSectionChapterTitle = 'Camp';

// import 1 Row from camps
$sql = "SELECT campHeadline, campDescription, campStart, campEnd, campLocation, campPrice, campPatricipants, campShortDescription, campLink, campButton, campTicketsLeft, imageData FROM camps WHERE id=1";
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
$MainImageData = $row["imageData"];
include ("../inc/campSection.inc.php"); 
}

echo '<pre>';
echo 'filename: ';
print_r($MainCampLink);

?>

