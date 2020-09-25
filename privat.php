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
?>

<html>
<style>
.dark{
  background-color: #B4DEE7;
}

</style>
<body class="dark">
    <h2>privat</h2>
    
</body>
</html>