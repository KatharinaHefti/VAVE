<?php 
session_start();

// database connection
require_once("./config/config.inc.php");

// destroy session and remove userid
session_destroy();
unset($_SESSION['userid']);

// remove Cookies
setcookie("identifier","",time()-(3600*24*365)); 
setcookie("securitytoken","",time()-(3600*24*365)); 

/* * * * * * * * * * * * * * * * * * * * header and navigation * * * * * * * * * * * * * * * * * * * */

include ("./inc/header.inc.php"); 
include ("./inc/nav.inc.php"); 

/* * * * * * * * * * * * * * * * * * * * main * * * * * * * * * * * * * * * * * * * */

// Main Text Variables
$MainChapterTitle = 'Logout';
$MainHeadline = 'You have been successfully logged out of your private space.';
$MainPragraph = 'Now you can check on your updates. You should always test if everything worked as expected. Enjoy your Website.';
$MainLink = 'index.php';
$MainButton = 'go to main page';
$MainPicture = 'img/circle/hand.svg';

include ("./inc/main.inc.php"); 

?>

