<?php
// connect to database
    $db_host = 'localhost';
    $db_name = 'VAVE_Sports';
    $db_user = 'root';
    $db_password = 'root';

    try {
        // mysql connection
        $pdo = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_password);
    } 
        // Output PDOException if connection failed
        catch ( PDOException $e) {
        echo "Database connection failed!" . $e->getMessage();
    }
?>