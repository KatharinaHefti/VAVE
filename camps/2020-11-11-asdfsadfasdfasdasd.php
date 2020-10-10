<?php 
    include ("../inc/headerCamps.inc.php"); 
    include ("../inc/navCamps.inc.php"); 
      
    // database connection
    require_once("../config/config.inc.php");
  
    $CampSectionChapterTitle = "Camps";
    $campHeadline;
    $campDescription;
    $campStart;
    $campEnd;
    $campLocation;
    $campPrice;
    $campShortDescription;
    $campPatricipants;
    $campButton;
    $campTicketsLeft;

    include ("../inc/campSection.inc.php"); 
    
  ?>
  
      <style><?php include "../style/parts/camp.style.css" ?></style>
      <style><?php include "../style/parts/grid.style.css" ?></style>
      <style><?php include "../style/elements/picture.style.css" ?></style>
      
      <section class="event">
      
        <!-- camp event -->
        <div>
          <h4><?php echo $CampSectionChapterTitle?></h4>
          <br>
          <h1><?php echo $campHeadline?></h1>
          <br>
          <p><?php echo $campDescription?></p>
      
          <!-- icon event -->
          <div class="highlight">
            <svg class="small">
              <use xlink:href="#icon_event"></use>
            </svg>
          <h4 class="paint-turquois"><?php echo $campStart?> until <?php echo $campEnd?></h4>
          </div>
      
          <!-- icon location -->
          <div class="highlight">
            <svg class="small">
              <use xlink:href="#icon_location"></use>
            </svg>
            <h4 class="paint-turquois"><?php echo $campLocation?></h4>
          </div>
          <br>
      
          <!-- icon price -->
          <div class="highlight">
            <svg class="small">
              <use xlink:href="#icon_price"></use>
            </svg>
            <h4 class="paint-turquois"><?php echo $campPrice?> CHF / Pers.</h4>
          </div>
          <br>
      
          <!-- participants -->
          <p><strong>Limit of <?php echo $campPatricipants?> Participants</strong></p>
      
          <!-- short description -->
          <p><?php echo $campShortDescription?></p>
      
          <!-- get your tickets -->
          <div class="flexBtn">
            <button><a href="<?php echo $campShortDescription?>"></a><?php echo $campButton?></button>
            <p>just  <?php echo $campTicketsLeft ?> tickets left</p>
          </div> 
        </div>
      
        <div>
          <img class="flyerPic" src="../<?php $imagedata ?>" alt="Flyer event">
        </div>
      
      
      </section>