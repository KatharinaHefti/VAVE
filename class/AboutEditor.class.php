<?php

/**
 * ABOUT EDITOR CLASS
 * --------------------------------------------------------------------------------------
 * 
 * xxxx 
 *  
 **/

// database connection
$db_host = 'localhost';
$db_name = 'VAVE_Sports';
$db_user = 'root';
$db_password = 'root';

try {
  // mysql connection
  $pdo = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_password);
} 
// output error if connection failed
catch ( PDOException $e) {
  echo "Database connection failed!" . $e->getMessage();
}

class AboutEditor {

  public function setAbout($titel, $text, $id) {

  $sql = "UPDATE about SET chapter = :chapter, titel = :titel, text = :text WHERE id = :id";
  $stmt= $pdo->prepare($sql);
  // save about variables from POST inputs to array
  $data = [
    'chapter' => 'About',
    'titel' => $titel,
    'text' => $text,
    'id' => 1,
  ];
  $stmt->execute($data);
  return $this->titel;
  }

}


?>