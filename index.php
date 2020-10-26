<?php 

// database connection
require_once("./config/config.inc.php");

/* HEADER & NAVIGATION * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */

// includes nav template
include ("./inc/header.inc.php"); 
include ("./inc/nav.inc.php"); 

/* MAIN * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */

$sql = "SELECT mainTitle, mainHeadline, mainPragraph, mainLink, mainButton, mainPicture FROM main WHERE id=1";
foreach ($pdo->query($sql) as $row) {
  $MainChapterTitle = $row["mainTitle"];
  $MainHeadline = $row["mainHeadline"];
  $MainPragraph = $row["mainPragraph"];
  $MainLink = $row["mainLink"];
  $MainButton = $row["mainButton"];
  $MainPicture = $row["mainPicture"];
}
include ("./inc/main.inc.php"); 

/* GALLERY SECTION * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */

$sql = "SELECT mainTitle, mainHeadline FROM gallery WHERE id=1";
foreach ($pdo->query($sql) as $row) {
  $GallerySectionChapterTitle = $row["mainTitle"];
  $GallerySectionHeadline = $row["mainHeadline"];
}
include ("./inc/gallerySection.inc.php"); 

/* EVENT SECTION * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */

$EventSectionChapterTitle = 'Event';
$EventSectionHeadline = 'Next Event Promo headline loerum ipsum donor';
$EventLongDescription = 'Lead text for your event. Loerum Epsom dollar sit amen. Lead text for your event.  Loerum Epsom dollar sit amen. Lead text for your event. Loerum Epsom dollar sit amen.';
$EventDate = 'Thursday, 23.06.2020';
$EventTime = '12:00 until 14:00';
$EventLocation = '8003 Zürich, Street 33';
$EventShortDescription = 'Get your tickets before it’s too late. Loerum ipsum dolor sit amen.  Loerum ipsum dolor sit amen.  Loerum ipsum dolor sit ame ipsum dolor sit amen.';
$EventLink = 'event_signUp.php';
$EventButton = 'get your tickets';
$EventTicketsLeft = '';

include ("./inc/eventSection.inc.php"); 

/* LOCATION SECTION * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */

$sql = "SELECT locationTitle, locationHeadline, locationParagraph FROM location WHERE id=1";
foreach ($pdo->query($sql) as $row) {
  $LocationSectionChapterTitle = $row["locationTitle"];
  $LocationSectionHeadline = $row["locationHeadline"];
  $LocationPragraph = $row["locationParagraph"];
}

include ("./inc/location.inc.php"); 

/* FOOTER * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */

include ("./inc/footer.inc.php"); 
?>