<?php
session_start();
// print_r($_SESSION);

include ("./inc/header.inc.php"); 
include ("./inc/navPrivat.inc.php"); 

// database connection
require_once("./config/config.inc.php");

// functions
require_once("./inc/functions.inc.php");

// is user logged in?
// $user = check_user();

/* * * * * * * * * * * * * * * * * * * * main * * * * * * * * * * * * * * * * * * * */

// Main Text Variables
$MainChapterTitle = 'Privat';
$MainHeadline = 'Welcome to your private Space';
$MainPragraph = 'Here you can edit your page. ';
$MainLink = 'logout.php';
$MainButton = 'logout';
$MainPicture = '../img/shell.svg';

include ("./inc/main.inc.php"); 

?>



<style>
.dark{
    background-color: #B4DEE7;
  }
</style>
<html>
<body class="dark">
  
    
</body>
</html>