<style><?php include "style/cd/typo.style.css" ?></style>
<style><?php include "style/parts/nav.style.css" ?></style>

<nav>
  <!-- brand -->
  <a href="./index.php"><img class="brand" src="./img/brandDark.svg" alt="VAVE logo"></a>

  <!-- dropdown menu -->
  <svg id="menuIcon" class="small"><use xlink:href="#icon_menu_dark"></use></svg>
</nav>

<!-- menu wave background picture -->
<img class="waveBg" src="img/wave/waveNavPrivat.svg" alt="wave">

<!-- dropdown Menu -->
<ul class="hiddenLinks">
  <li><a class="paint-turquois" href="edit.php">EDIT</a></li>
  <li><a class="paint-turquois" href="editTrainings.php">TRAININGS</a></li>
  <li><a class="paint-turquois" href="createCamp.php">CAMPS</a></li>
  <li><a class="paint-turquois" href="editEvents.php">EVENTS</a></li>
  <li><a class="paint-turquois" href="logout.php">LOGOUT</a></li>
</ul>

<!------------------------------------- javascript ------------------------------------->

<!-- jquery -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<!-- js for dopdown menu -->
<script src="js/nav.dropdown.js"></script>
