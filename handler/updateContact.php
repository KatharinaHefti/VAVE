<?php

// database connection
require_once('../config/config.inc.php');

// include class UserService to validate form inputs
require("../class/UserService.class.php");
$userService = new UserService();

/* CONTACT POST * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */

// variables
$name = $street = $city = $email = $phone = $output = $picture = $feedbackAbout = "";

// is form sent ?
if(isset( $_POST['updateContact'] )){

  // save inputs to variables
  $name = $userService -> validateInput($_POST['name'],true,"Name","name"," Is not a valid name. Contains invalid characters. Only letters allowed.");
  $street = $userService -> validateInput($_POST['street'],true,"Street","street"," Is not a valid street.");
  $city = $userService -> validateInput($_POST['city'],true,"City","city","City is not valid");
  $email = $userService -> validateInput($_POST['email'],true,"E-Mail","email","Email is not valid.");
  $phone = $userService -> validateInput($_POST['phone'],true,"Phone","phone","Phone is not valid swiss number. No space allowed.");

  // is everything filled in?
  if ($userService -> validationState) {
  
/* CONTACT UPDATE * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
  
  update variables in database 
  CONTACT

 * name
 * street
 * city
 * email
 * phone

*/

  $sql = "UPDATE contact SET name = :name, street = :street, city = :city, email = :email, phone = :phone WHERE id = :id";
  $stmt = $pdo->prepare($sql);
  // save contact variables from POST inputs to array
  $data = [
    'id' => 1, 
    'name' => $name, 
    'street' => $street, 
    'city' => $city, 
    'email' => $email, 
    'phone' => $phone,
  ];
  // replace variables in database contact – row 1
  $stmt->execute($data);
  // feedback
  $output = 'Updated your contacts.';
  }
  else {
    // no
    foreach ($userService -> feedbackArray as $out) {
      $output .=  $out.'<br>';
  }
}
}

    header('Location: ../index.php');
    exit;
    
?>