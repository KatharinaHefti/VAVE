<?php 
include ("../inc/headerCamps.inc.php"); 
include ("../inc/navCamps.inc.php"); 

// database connection
require_once("../config/config.inc.php");

/* * * * * * * * * * * * * * * * * * * * main * * * * * * * * * * * * * * * * * * * */
?>
<!-- <style><?php include "../style/parts/grid.style.css" ?></style> -->

<?php
/* * * * * * * * * * * * * * * * * * * * join camp * * * * * * * * * * * * * * * * * * * */

//variables

$name = $familyname = $email = $output = $terms = $camps = $count = $id = '';

/* * * * * * * * * * * * * * * * * * * * join camp validation * * * * * * * * * * * * * * * * * * * */

// if form sent
if(isset($_POST['join'])){
  $name = $_POST['name'];
  $familyname = $_POST['familyname'];
  $email = $_POST['email'];
  $camps = $_POST['camps'];

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

  $output = 'successfully added '.$name.$familyname.' to the camp';

}

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
      <select class name="camps" id="camps">
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
      <input type="checkbox" id="terms" name="terms"><br>
      <p>by accepting terms and conditions</p>
      
      <!-- output -->
      <br>
      <p class="paint-turquois"><?php echo $output;?></p>
      <!-- submit -->
      <div class="center">
        <button class="buttonType" type="submit" name="join">join</button>
      </div>
    </form>
</main>

</body>