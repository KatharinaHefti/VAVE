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
?>
<html>

<h1>loggedout</h1>
</html>