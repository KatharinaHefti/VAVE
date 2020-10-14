<?php

// session
session_start();

// database connection
require_once("./config/config.inc.php");

// functions
require_once("./inc/functions.inc.php");

// is user logged in?
$user = check_user();

/* * * * * * * * * * * * * * * * * * * * header and navigation * * * * * * * * * * * * * * * * * * * */

// includes nav template
include ("./inc/header.inc.php"); 
include ("./inc/navPrivat.inc.php"); 

/* * * * * * * * * * * * * * * * * * * * main * * * * * * * * * * * * * * * * * * * */

// Logged in User Name
$userName = $user['name'];

// Main Text Variables
$MainChapterTitle = 'Privat Space';
$MainHeadline = 'Hi '. $userName;
$MainPragraph = 'This is your editing area. You can upload Events, update your content and create gallerys. After you finish please log out for safety.';
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

<body class="dark"></body>
</html>