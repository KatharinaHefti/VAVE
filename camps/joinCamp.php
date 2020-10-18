<?php 

// database connection
require_once("../config/config.inc.php");

// include class UserService – to validate form inputs
require("../class/UserService.class.php");
$userService = new UserService();

/* HEADER & NAVIGATION * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */

include ("../inc/headerCamps.inc.php"); 
include ("../inc/navCamps.inc.php"); 

/* CAMP NAMES * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *

   select variables form database 
   CAMPS

   * campHeadline

*/

$sql = "SELECT campHeadline FROM camps";
$stmt = $pdo->prepare($sql);
$stmt->execute();

$CampList = $stmt->fetchAll();

$count = count($CampList);
for ($i = 0; $i < $count; $i++) {
  $camp = $CampList[$i]['campHeadline'];
  $list = array($camp);
}

/* PARTICIPANTS * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */

// variables
$name = $familyname = $email = $output = '';

// if form sent
if(isset($_POST['join'])){
  $name = $userService -> validateInput($_POST['name'],true,
          "Name","name"," Is not a valid name. Contains invalid characters. Only letters allowed.");
  $familyname = $userService -> validateInput($_POST['familyname'],true,
          "Familyname","familyname"," Is not a valid name. Contains invalid characters. Only letters allowed.");
  $email = $userService -> validateInput($_POST['email'],true,
          "E-Mail","email","Email is not valid.");
  $camp = $_POST['camps'];
  $terms = $userService -> validateInput($_POST['terms'],true,
          "Terms","terms","Terms must be accepted.");

  // is everything filled in?
  if ($userService -> validationState) {
  
/* TICKET AVAILABILITY * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *

   select variables form database 
   CAMPS

* campHeadline

*/
   
    $sql = "SELECT * FROM camps WHERE campHeadline = :campHeadline";
    $stmt = $pdo->prepare($sql);
    $data = [
      'campHeadline' => $camp,
    ];
    $stmt->execute($data);

    $PartList = $stmt->fetchAll();

    // Participants allowed
    $participants = $PartList[0]['campPatricipants'];

    // remaining tickets of camp
    $tickets = $PartList[0]['campTickets'];

    // Ampount of Participants - Tickets
    $ticketsLeft = $tickets - 1 ;

    // if there is more than 0 Tickets left
    if ($ticketsLeft > 0){

/* INSERT PARTICIPANTS * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *

   insert variables to database 
   PARTICIPANTS

 * name
 * familyname
 * email
 * camp
 
*/
      $sql = "INSERT INTO participants (name, familyname, email, camps) 
              VALUES (:name, :familyname, :email, :camps)";
      $stmt= $pdo->prepare($sql);
      $data = [
        'name' => $name,
        'familyname' => $familyname,
        'email' => $email,
        'camps' => $camp,
      ];
      $stmt->execute($data);
    
/* UPDATE CAMPNAME * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
   
   update variables in database 
   CAMPS

 * campHeadline
 * campTickets

*/   
      $sql = "UPDATE camps 
              SET campTickets = :campTickets 
              WHERE campHeadline = :campHeadline";
      $stmt = $pdo->prepare($sql);
      $data = [
        'campHeadline' => $camp,
        'campTickets' => $ticketsLeft,
      ];
      $stmt->execute($data);
    
      $output = 'Successfully added '.$name.' '.$familyname.' to the camp '.$camp;
    }
    else {
    // no
    foreach ($userService -> feedbackArray as $out) {
      $output .=  $out.'<br>';
      }
    }
  }else{ // end of tickets left
    $output = 'The camp '.$camp.' is sold out.';
  } 
} // end of User service

/* HMTL * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */
?>
<body class="dark">
  <main class="main">
    
<!-- JOIN CAMP FORM - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - – -->

    <form action="joinCamp.php" method="post">
      <h2>Camp</h2><br>
      <h4>Join our Camps</h4><br><br>
      <!-- select -->
      <label for="camps">Choose your camp:</label><br><br>
      <!-- camps -->
      <select name="camps" id="camps">
        <?php $count = count($CampList);  
          for ($i = 0; $i < $count; $i++) {
          echo '<option value="'.$CampList[$i]['campHeadline'].'">'.$CampList[$i]['campHeadline'].'</option>';
          }
        ?></select><br><br>
      <!-- name -->
      <label for="name">Name</label>
      <input type="text" id="name" name="name" value="<?=$name?>"><br><br>
      <!-- familyname -->
      <label for="familyname">Family Name</label>
      <input type="text" id="familyname" name="familyname" value="<?=$familyname?>"><br><br>
      <!-- email -->
      <label for="email">E-Mail Adresse</label>
      <input type="email" id="email" name="email" value="<?=$email?>"><br><br>
      <!-- terms -->
      <label for="terms">Terms</label>
      <input type="checkbox" id="terms" value="accepted" name="terms"><br>
      <p>I accept the Terms of Service</p>
      <a class="paint-turquois" target="_blank" href="../terms.php">read the terms</a><br><br>
      <!-- output -->
      <p class="feedbackNeg"><?php echo $output;?></p>
      <!-- submit -->
      <div class="center"><button class="buttonType" type="submit" name="join">join</button></div>
    </form>

<!-- end of join camp form - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -->

  </main>
</body>