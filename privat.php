<?php

// session
session_start();

// database connection
require_once("./config/config.inc.php");

// functions
require_once("./inc/functions.inc.php");

// is user logged in?
$user = check_user();

/* HEADER & NAVIGATION * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */

// includes nav template
include ("./inc/header.inc.php"); 
include ("./inc/navPrivat.inc.php"); 

/* MAIN * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */

// Logged in User Name
$userName = $user['name'];

// Main Text Variables
$MainChapterTitle = 'Privat Space';
$MainHeadline = 'Hi '. $userName;
$MainPragraph = 'Welcome to your editing area. Here you can maintain your website.<br><br>
                  <a class="buttonTypeHaze" href="edit.php">Edit</a><br>
                  Here you can update your contact information and the text in your about page.
                  You also can add or delete a admin to the editing area.<br>
                  <a class="buttonTypeHaze" href="createCamp.php">Camps</a><br>
                  Create a new camp and upload it with your flyer to your website.<br>
                  <a class="buttonTypeHaze" href="editTrainings.php">Trainings</a><br>
                  Update all your training information in Trainings.<br>
                  <a class="buttonTypeHaze" href="editEvents.php">Events</a><br>
                  Update all your event information in this section.<br>
                  <a class="buttonTypeHaze" href="logout.php">Logout</a><br>
                  Logout when you are done for savety reasons.<br><br>';
$MainLink = 'logout.php';
$MainButton = 'logout';
$MainPicture = 'img/circle/horse.svg';

include ("./inc/main.inc.php"); 

/* HTML * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */
?>
<body class="dark">
</body>
