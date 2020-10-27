<?php 

// database connection
require_once("../config/config.inc.php");

/* HEADER & NAVIGATION * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */

// includes nav template
include ("../inc/headerCamps.inc.php"); 
include ("../inc/navCamps.inc.php"); 

/* MAIN * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */
?>
<html>
  <head>
    <!-- bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous"> 
    <link rel="stylesheet" href="../style/cd/typo.style.css">
    <link rel="stylesheet" href="../style/parts/main.style.css">
    <link rel="stylesheet" href="../style/elements/button.style.css">
  </head>
<body>
  
<main>
  <!-- first column -->
  <div>
    <h4>Gallery</h4>
    <br>
    <h1>Impressions of my Trainings</h1>
    <br>
    <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.</p>
  </div>
  <!-- second column -->
  <div>
    <img class="hugeIcon" src="../img/circle/training.svg" alt="">
  </div>
</main>

<main class="main">
     <div class="row">
       <div class="col-lg-4 col-sm-6">
          <img src="../img/gallery/training/_F0A7749@elianeduerst.jpg" class="img-thumbnail">
       </div>
       <div class="col-lg-4 col-sm-6">
          <img src="../img/gallery/training/_F0A7763@elianeduerst.jpg" class="img-thumbnail">
       </div>
       <div class="col-lg-4 col-sm-6">
          <img src="../img/gallery/training/_F0A7767@elianeduerst.jpg" class="img-thumbnail">
       </div>
       <div class="col-lg-4 col-sm-6">
          <img src="../img/gallery/training/_F0A7854@elianeduerst.jpg" class="img-thumbnail">
       </div>
       <div class="col-lg-4 col-sm-6">
          <img src="../img/gallery/training/_F0A7952@elianeduerst.jpg" class="img-thumbnail">
       </div>
       <div class="col-lg-4 col-sm-6">
          <img src="../img/gallery/training/_F0A8016@elianeduerst.jpg" class="img-thumbnail">
       </div>
    </div>
   </div>
   <br>
   <button><a class="buttonType" href="../index.php">go back</a></button>

</main>
  </body>
</html>