
<style><?php 
include "style/parts/gallery.style.css";
include "style/parts/grid.style.css";
include "style/elements/picture.style.css"; 
?></style>

<section class="gallery">

  <h4 class="paint-white"><?php echo $GallerySectionChapterTitle?></h4>
  <br>
  <h2 class="paint-white"><?php echo $GallerySectionHeadline?></h2>
  <br>
  

  <!-- gallery icons -->
  <div class="flexer">
    <a class="circle" href="gallery/gallery-training.php">
      <svg class="iconBig">
        <use xlink:href="#icon_sport"></use>
      </svg>
    </a>

    <a class="circle" href="gallery/gallery-training.php">
      <svg class="iconBig">
        <use xlink:href="#icon_camp"></use>
      </svg>
    </a>

    <a class="circle" href="gallery/gallery-training.php">
      <svg class="iconBig">
        <use xlink:href="#icon_event"></use>
      </svg>
    </a>
  </div>
</section>

