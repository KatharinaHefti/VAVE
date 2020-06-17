<?php

// konfiguration
define('DBSERVER', 'localhost'); // localhost = gleicher Server wie mein Script
define('DBNAME', 'VAVE');
define('DBUSER', 'root');
define('DBPASSWORT', 'root'); // MAMP: root

// DB Connection - PHP verbindet sich mit dem Datenbankserver
$link = mysqli_connect(DBSERVER, DBUSER, DBPASSWORT, DBNAME);
// var_dump( $link );

if($link === false){
    die('Verbindung zur Datenbank fehlgeschlagen');
};


?>


