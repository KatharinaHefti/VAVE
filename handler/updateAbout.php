<?php

// database connection
require_once('../config/config.inc.php');

// include class UserService to validate form inputs
require("../class/UserService.class.php");
$userService = new UserService();

/* ABOUT POST * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */

// variables
$titel = $text = $chapter = "";
$id = 1;

// is form sent?
if(isset($_POST['updateAbout'])){
  $titel = $userService -> validateInput($_POST['titel'],true,"Title","title","Title is not valid");
  $text = $userService -> validateInput($_POST['text'],true,"Text","text","Text is not valid");

  // is everything filled in?
  if (empty( $_POST['titel']) || empty($_POST['text'])  ) {
    $feedbackAbout = 'Please fill in all information.';
  }
  else{

/* ABOUT UPDATE * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *

  update variables in database 
  ABOUT 

 * chapter 
 * title
 * text

*/

  $sql = "UPDATE about SET chapter = :chapter, titel = :titel, text = :text WHERE id = :id";
  $stmt= $pdo->prepare($sql);
  // save about variables from POST inputs to array
  $data = [
    'chapter' => 'About',
    'titel' => $titel,
    'text' => $text,
    'id' => $id,
  ];
  $stmt->execute($data);

/* PICTURE UPLOAD * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */

// count total files
$countfiles = count($_FILES['files']['name']);
 
/* ABOUT IMAGE INFORMATION UPDATE * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *

  update variables to database 
  ABOUT *

 * imageName 
 * imageData
 * imageType

*/

  // Prepared statement
  $sql = "UPDATE about SET imageName = :imageName, imageData = :imageData, imageType = :imageType WHERE id = :id";
  $stmt = $pdo->prepare($sql);

  // loop all files
  for($i=0;$i<$countfiles;$i++){
    // File name
    $filename = $_FILES['files']['name'][$i];

    // Location
    $target_file = 'img/about/upload/'.$filename;
  
    // file extension
    $imageType = pathinfo($target_file, PATHINFO_EXTENSION);
    $imageType = strtolower($imageType);

    // Valid image extension
    $valid_extension = array("png","jpeg","jpg");

    if(in_array($imageType, $valid_extension)){
      // Upload file
      if(move_uploaded_file($_FILES['files']['tmp_name'][$i],$target_file)){
      // Execute query
	    $stmt->execute(array('id' => 1, 'imageName' => $filename, 'imageData' => $target_file, 'imageType' => $imageType ));
       }
    }
  }
  }
}
 
    header('Location: ../about.php'.$feedbackAbout);
    exit;
    
?>