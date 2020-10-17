<?php 
include ("../inc/headerCamps.inc.php"); 
include ("../inc/navCamps.inc.php"); 

// database connection
require_once("../config/config.inc.php");

// include class UserService – to validate form inputs
require("../class/UserService.class.php");
$userService = new UserService();

/* * * * * * * * * * * * * * * * * * * * main * * * * * * * * * * * * * * * * * * * */
?>
<!-- <style><?php include "../style/parts/grid.style.css" ?></style> -->

<?php

/* * * * * * * * * * * * * * * * * * * * download camps * * * * * * * * * * * * * * * * * * * */

// import variables form database camps
$sql = "SELECT campHeadline FROM camps";
$stmt = $pdo->prepare($sql);
$stmt->execute();

/* Fetch all of the remaining rows in the result set */
$CampList = $stmt->fetchAll();
// print_r($UserList);

$count = count($CampList);
for ($i = 0; $i < $count; $i++) {
  $camp = $CampList[$i]['campHeadline'];
  $list = array($camp);
}

/* * * * * * * * * * * * * * * * * * * * add participants * * * * * * * * * * * * * * * * * * * */

//variables
$name = $familyname = $email = $output = $terms = $camps = $count = $id = '';
$campTickets =1;

// if form sent
if(isset($_POST['join'])){
  $name = $userService -> validateInput($_POST['name'],true,"Name","name"," Is not a valid name. Contains invalid characters. Only letters allowed.");
  $familyname = $userService -> validateInput($_POST['familyname'],true,"Familyname","familyname"," Is not a valid name. Contains invalid characters. Only letters allowed.");
  $email = $userService -> validateInput($_POST['email'],true,"E-Mail","email","Email is not valid.");
  $camps = $_POST['camps'];
  $camps = $userService -> validateInput($_POST['terms'],true,"Terms","terms","Terms must be accepted.");

  // is everything filled in?
  if ($userService -> validationState) {

  $data = [
    'name' => $name,
    'familyname' => $familyname,
    'email' => $email,
    'camps' => $camps,
  ];

  // upload data to participants
  $sql = "INSERT INTO participants (name, familyname, email, camps) VALUES (:name, :familyname, :email, :camps)";
  $stmt= $pdo->prepare($sql);
  $stmt->execute($data);
  $output = 'successfully added '.$name.' '.$familyname.' to the camp';


/* * * * * * * * * * * * * * * * * * * * get participants * * * * * * * * * * * * * * * * * * * */

// import variables form database camps
$sql = "SELECT campTickets FROM camps WHERE id = 1";
$stmt = $pdo->prepare($sql);
$stmt->execute();

$PartList = $stmt->fetch();
echo '<pre>';
$allowedParticipantcs = $PartList['campTickets'];
// print_r($allowedParticipantcs);

$amount = $allowedParticipantcs - 1;
print_r($amount);

/* * * * * * * * * * * * * * * * * * * * update campheadline participants in camps * * * * * * * * * * * * * * * * * * * */

$sql = "UPDATE camps SET campTickets=? WHERE id=1";
$stmt = $pdo->prepare($sql);
$stmt->execute([$amount]);

$output = 'Welcome to the camp.';
}
else {
  // no
  foreach ($userService -> feedbackArray as $out) {
    $output .=  $out.'<br>';
}
}
}

?>
<body class="dark">

<style><?php include "../style/elements/form.style.css" ?></style>

<main class="main">
    <form action="joinCamp.php" method="post">
      <h2>Camp</h2>
      <br>
      <h4>Join our Camps</h4>
      <br>
      <br>
      <!-- camp -->
      <label for="camps">Choose your camp:</label><br>
      <br>
      <select name="camps" id="camps">
        <?php
        $count = count($CampList);  
            for ($i = 0; $i < $count; $i++) {
            echo '<option value="'.$CampList[$i]['campHeadline'].'">'.$CampList[$i]['campHeadline'].'</option>';
        }
        ?>
       </select>
  <br><br>
      <!-- name -->
      <label for="name">Name</label>
      <input type="text" id="name" name="name" value="<?=$name?>"><br>
      <br> 
      <!-- familyname -->
      <label for="familyname">Family Name</label>
      <input type="text" id="familyname" name="familyname" value="<?=$familyname?>"><br>
      <br> 
      <!-- email -->
      <label for="email">E-Mail Adresse</label>
      <input type="email" id="email" name="email" value="<?=$email?>"><br>
      <br>
      <!-- checkbox -->
      <label for="terms">Terms</label>
      <input type="checkbox" id="terms" value="accepted" name="terms"><br>
      <p>I accept the Terms of Service</p>
      <a class="paint-turquois" target="_blank" href="../terms.php">read the terms</a><br>
      
      <!-- output -->
      <br>
      <p class="feedbackNeg"><?php echo $output;?></p>
      <!-- submit -->
      <div class="center">
        <button class="buttonType" type="submit" name="join">join</button>
      </div>
    </form>
</main>

</body>