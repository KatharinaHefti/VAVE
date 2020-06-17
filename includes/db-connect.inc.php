<?php

include 'includes/config.inc.php';

// DB Connection
$conn = mysqli_connect('DBSERVER', 'DBNAME', 'DBPASSWORT');
var_dump( $conn );

if($conn === false){
	// abbrechen bei Verbindungsfehler, und wenn man die SQL Fehlermeldung sehen möchte, kann diese noch ausgegeben werden
	die('Verbindung zur Datenbank fehlgeschlagen: '.mysqli_connect_error());
}

?>