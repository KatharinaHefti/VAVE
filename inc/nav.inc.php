<style><?php include "../style/cd/typo.style.css" ?></style>
<style><?php include "../style/parts/nav.style.css" ?></style>

<nav>
  <!-- brand -->
  <a href="./index.php"><img class="brand" src="./img/brand.svg" alt="VAVE logo"></a>
  <!-- dropdown menu -->
  <svg id="menuIcon" class="small"><use xlink:href="#icon_menu"></use></svg>
</nav>

<!-- menu wave background picture -->
<img class="waveBg" src="img/wave/waveNav.svg" alt="wave">

<!-- dropdown Menu -->
<ul class="hiddenLinks">
  <li><a class="buttonType" href="about.php">ABOUT</a></li>
  <li><a class="buttonType" href="training.php">TRAINING</a></li>
  <li><a class="buttonType" href="events.php">EVENTS</a></li>
  <li><a class="buttonType" href="camps.php">CAMPS</a></li>
  <li><a class="buttonType" href="login.php">LOGIN</a></li>
</ul>

<!------------------------------------- javascript ------------------------------------->

<!-- jquery -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<!-- js for dopdown menu -->
<script src="js/nav.dropdown.js"></script>
