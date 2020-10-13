

<style><?php include "style/parts/camp.style.css" ?></style>
<style><?php include "style/parts/grid.style.css" ?></style>
<style><?php include "style/elements/picture.style.css" ?></style>

<section class="event">

	<!-- camp event -->
	<div>
		<h4><?php echo $CampSectionChapterTitle?></h4>
		<br>
		<h1><?php echo $MainCampSectionHeadline?></h1>
		<br>
		<p><?php echo $MainCampLongDescription?></p>

		<!-- icon event -->
		<div class="highlight">
			<svg class="small">
				<use xlink:href="#icon_event"></use>
			</svg>
		<h4 class="paint-turquois"><?php echo $MainCampDateStart?> until <?php echo $MainCampDateEnd?></h4>
		</div>

		<!-- icon location -->
		<div class="highlight">
			<svg class="small">
				<use xlink:href="#icon_location"></use>
			</svg>
			<h4 class="paint-turquois"><?php echo $MainCampLocation?></h4>
		</div>
		<br>

		<!-- icon price -->
		<div class="highlight">
			<svg class="small">
				<use xlink:href="#icon_price"></use>
			</svg>
			<h4 class="paint-turquois"><?php echo $MainCampPrice?> CHF / Pers.</h4>
		</div>
		<br>

		<!-- participants -->
		<p><strong>Limit of <?php echo $MainCampPatricipants?> Participants</strong></p>

		<!-- short description -->
		<p><?php echo $MainCampShortDescription?></p>

		<!-- get your tickets -->
		<div class="flexBtn">
		<button><a class="buttonType" href="camps/joinCamp.php">join camp</a></button>
      <p>just  <?php echo $MainCampTickets ?> tickets left</p>
    </div> 
	</div>

	<div>
		<img class="flyerPic" src="<?php echo $imagedata ?>" alt="Flyer event">
	</div>


</section>

