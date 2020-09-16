<?php
// connect to database
    $db_host = 'localhost';
    $db_name = 'VAVE_Sports';
    $db_user = 'root';
    $db_password = 'root';
    $pdo = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_password);
?>