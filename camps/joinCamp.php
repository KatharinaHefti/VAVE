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

$name = $email = $output = $terms = $camps = $count = '';


// import variables form database contact

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
<main class="main">
    <form action="joinCamp.php" method="post">
      <h2>Camp</h2>
      <br>
      <h4>Join our Camps</h4>
      <br>
      <br>
      <!-- camp -->
      <label for="camps">Choose your camp:</label><br>
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
        <button class="buttonType" type="submit" name="joinEvent">join</button>
      </div>
      <?php echo $output; ?>
    </form>
</main>

</body>