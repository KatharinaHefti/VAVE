<?php
  // database connection
  require_once("./config/config.inc.php");

  // import variables form database contact
  $sql = "SELECT name, street, city, email, phone FROM contact";
  foreach ($pdo->query($sql) as $row) {
    $contactName = $row["name"];
    $contactStreet = $row["street"];
    $contactCity = $row["city"];
    $contactEmail = $row["email"];
    $contactPhone = $row["phone"];
  }
?>

<style><?php include "style/cd/typo.style.css" ?></style>
<style><?php include "style/parts/footer.style.css" ?></style>
<style><?php include "style/parts/grid.style.css" ?></style>

<footer class="footer">
  <!-- first column Contact -->
  <div class="box">
    <h4 class="paint-white">contact</h4>
    <br>
    <h2 class="paint-white">VAVE</h2>    
    <br>
		<p class="paint-white"><?php echo $contactName ?></p>
		<p class="paint-white"><?php echo $contactStreet ?></p>
		<p class="paint-white"><?php echo $contactCity ?></p>
		<p class="paint-white">Email: <?php echo $contactEmail ?></p>
    <p class="paint-white">Phone: <?php echo $contactPhone ?></p>
  </div>

  <!-- second column Links -->
  <div class="box">
    <a class="paint-white" href="about.php">About</a></br>
    <a class="paint-white" href="training.php">Training</a></br>
    <a class="paint-white" href="events.php">Events</a></br>
    <a class="paint-white" href="camps.php">Camps</a></br>
    <a class="paint-white" href="terms.php">Terms & Condition</a>
  </div>

  <!-- third column social media -->
    <div class="box">
      <!-- youtube -->
      <a href="https://www.youtube.com/channel/UC5MMAPA-e-DRb7n2s_dVyng">
        <svg class="small">
          <use xlink:href="#icon-social_youtube"></use>
        </svg> 
      </a>   
      <!-- facebook -->
      <a href="https://www.facebook.com/bjjsurfcamp18">
        <svg class="small">
          <use xlink:href="#icon-social_facebook"></use>
        </svg> 
      </a>
      <!-- instagram -->
      <a href="https://www.instagram.com/surfbjjcamps/?hl=de">
        <svg class="small">
          <use xlink:href="#icon-social_insta"></use>
        </svg> 
      </a>
    </div>





</footer>

</body>
</html>