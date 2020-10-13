<?php $campHeadline = "Ginastica Natural & Surfcamp";$campDescription = "sdf";$campStart = "2020-10-23";$campEnd = "2020-10-30";$campLocation = "sdf";$campPrice = "800";$campShortDescription = "sdaf";$campPatricipants = "30";$campButton = "sdf";$imagedata = "../img/camp/2020-10-23-Ginastica-Natural-&-Surfcamp/dendy-darma-XFMjz4X3hGs-unsplash.jpg";$campLink = "joinCamp.php";$campTickets = "30";
    include ("../inc/headerCamps.inc.php"); 
    include ("../inc/navCamps.inc.php"); 

    // database connection
    require_once("../config/config.inc.php");
  
    $CampSectionChapterTitle = "Camps";    
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
          <br>
          <!-- icon event -->
          <div class="highlight">
            <svg class="small">
              <use xlink:href="#icon_event"></use>
            </svg>
          <h4 class="paint-turquois">From: <?php echo $campStart?> Until: <?php echo $campEnd?></h4>
          </div>
      
          <!-- icon location -->
          <div class="highlight">
            <svg class="small">
              <use xlink:href="#icon_location"></use>
            </svg>
            <h4 class="paint-turquois"> Location: <?php echo $campLocation?></h4>
          </div>
          <br>
      
          <!-- icon price -->
          <div class="highlight">
            <svg class="small">
              <use xlink:href="#icon_price"></use>
            </svg>
            <h4 class="paint-turquois"> Price: <?php echo $campPrice?> CHF / Pers.</h4>
          </div>
          <br>
      
          <!-- participants -->
          <p><strong>Limit of <?php echo $campPatricipants?> Participants</strong></p>
      
          <!-- short description -->
          <p><?php echo $campShortDescription?></p>
      
          <!-- get your tickets -->
          <div class="flexBtn">
            <button><a class="buttonType" href="<?php echo $campLink?>"><?php echo $campButton?></a></button>
          </div> 
        </div>
      
        <div>
          <img class="flyerPic" src="<?php echo $imagedata ?>" alt="Flyer event">
        </div>
      </section>