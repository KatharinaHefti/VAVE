<?php
session_start();

// database connection
require_once("./config/config.inc.php");

// functions
require_once("./inc/functions.inc.php");

// is user logged in?
$user = check_user();

/* * * * * * * * * * * * * * * * * * * * header and navigation * * * * * * * * * * * * * * * * * * * */

include ("./inc/header.inc.php"); 
include ("./inc/navPrivat.inc.php"); 

/* * * * * * * * * * * * * * * * * * * * main * * * * * * * * * * * * * * * * * * * */

// Main Text Variables
$MainChapterTitle = 'Privat';
$MainHeadline = 'Welcome to your private Space';
$MainPragraph = 'Here you can edit your page. ';
$MainLink = 'logout.php';
$MainButton = 'logout';
$MainPicture = 'img/circle/horse.svg';

include ("./inc/main.inc.php"); 

/* * * * * * * * * * * * * * * * * * * * body * * * * * * * * * * * * * * * * * * * */
?>
<head>
  <link rel="stylesheet" href="style/parts/privat.style.css">
</head>
<html>
<body class="dark">
  
    
</body>
</html>