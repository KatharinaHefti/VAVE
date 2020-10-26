<?php 

// database connection
require_once("./config/config.inc.php");

/* HEADER & NAVIGATION * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */

// includes nav template
include ("./inc/header.inc.php"); 
include ("./inc/nav.inc.php"); 

/* EVENTS  * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
  import variables form database 
  EVENTS

 * eventName
 * eventLead

*/

// variables
$id = 1;
$eventChapterTitle = "Events";

$sql = "SELECT eventName, eventLead FROM events";
// fetch row form about
foreach ($pdo->query($sql) as $row) {
  $eventHeadline = $row["eventName"];
  $eventPragraph = $row["eventLead"];
}

/* HTML * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */
?>

<!-- header picture -->
<img class="headerPic" src="img/event/event_header.jpg" alt="surfer">

<!-- gallery icons -->
<section class="event">
  <h4><?php echo $eventChapterTitle; ?></h4><br>
  <h2><?php echo $eventHeadline; ?></h2><br>
  <p><?php echo $eventPragraph; ?></p>
</section>
