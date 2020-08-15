
<link rel="stylesheet" href="style/style.css">
<?php 
include ("./inc/header.inc.php"); 
include ("./inc/nav.inc.php"); 
/* * * * * * * * * * * * * * * * * * * * main * * * * * * * * * * * * * * * * * * * */

// Main Text Variables
$MainChapterTitle = 'Sports and camps';
$MainHeadline = 'This is an inspirational sporty intro to your page lorem.';
$MainPragraph = 'Try to finde one sentence or two to describe the concept of your page. Sports and camps describe a mood to make people feel whatever bla bla.';
$MainLink = '#';
$MainButton = 'join a training';

include ("./inc/main.inc.php"); 

/* * * * * * * * * * * * * * * * * * * * gallery section * * * * * * * * * * * * * * * * * * * */

$GallerySectionChapterTitle = 'Gallery';
$GallerySectionHeadline = 'Something about your Gallery Loerum ipsum dolor sit.';
include ("./inc/gallerySection.inc.php"); 

/* * * * * * * * * * * * * * * * * * * * event section * * * * * * * * * * * * * * * * * * * */

$EventSectionChapterTitle = 'Event';
$EventSectionHeadline = 'Next Event Promo headline loerum ipsum donor';
$EventLongDescription = 'Lead text for your event. Loerum Epsom dollar sit amen. Lead text for your event.  Loerum Epsom dollar sit amen. Lead text for your event. Loerum Epsom dollar sit amen.';
$EventDate = 'Thursday, 23.06.2020';
$EventTime = '12:00 until 14:00';
$EventLocation = '8003 Zürich, Street 33';
$EventShortDescription = 'Get your tickets before it’s too late. Loerum ipsum dolor sit amen.  Loerum ipsum dolor sit amen.  Loerum ipsum dolor sit ame ipsum dolor sit amen.';
$EventLink = '#';
$EventButton = 'get your tickets';
$EventTicketsLeft = 'just 3 tickets left';

include ("./inc/eventSection.inc.php"); 

/* * * * * * * * * * * * * * * * * * * * xxx section * * * * * * * * * * * * * * * * * * * */

include ("./inc/main.inc.php"); 

/* * * * * * * * * * * * * * * * * * * * footer * * * * * * * * * * * * * * * * * * * */


include ("./inc/footer.inc.php"); 
?>
