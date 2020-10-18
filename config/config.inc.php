<?php
// connect to database localhost
$db_host = 'localhost';
$db_name = 'VAVE_Sports';
$db_user = 'root';
$db_password = 'root';

// connect to database of 000webhostapp
// https://vave-sports-and-camps.000webhostapp.com/

// $db_host = 'localhost';
// $db_name = 'id15117272_vave_sports';
// $db_user = 'id15117272_valeria';
// $db_password = 'VAVEvave2020?';

try {
  // mysql connection
  $pdo = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_password);
} 
// output error if connection failed
catch ( PDOException $e) {
  echo "Database connection failed!" . $e->getMessage();
}
?>