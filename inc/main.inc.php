<style><?php include "style/cd/typo.style.css" ?></style>
<style><?php include "style/parts/main.style.css" ?></style>

<main>
  <!-- first column -->
  <div>
    <h4><?php echo $MainChapterTitle?></h4>
    <br>
    <h1><?php echo $MainHeadline?></h1>
    <br>
    <p><?php echo $MainPragraph?></p>
    <button><a class="buttonType" href="<?php echo $MainLink?>"><?php echo $MainButton?></a></button>
  </div>


  <!-- second column -->
  <div>
    <img class="hugeIcon" src="<?php echo $MainPicture ?>" alt="">
  </div>
</main>
