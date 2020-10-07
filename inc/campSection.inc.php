<style><?php include "style/parts/camp.style.css" ?></style>
<style><?php include "style/parts/grid.style.css" ?></style>
<style><?php include "style/elements/picture.style.css" ?></style>

<section class="event">

	<!-- camp event -->
	<div>
		<h4><?php echo $CampSectionChapterTitle?></h4>
		<br>
		<h1><?php echo $CampSectionHeadline?></h1>
		<br>
		<p><?php echo $CampLongDescription?></p>

		<!-- icon event -->
		<div class="highlight">
			<svg class="small">
				<use xlink:href="#icon_event"></use>
			</svg>
		<h4 class="paint-turquois"><?php echo $CampDateStart?> until <?php echo $CampDateEnd?></h4>
		</div>

		<!-- icon location -->
		<div class="highlight">
			<svg class="small">
				<use xlink:href="#icon_location"></use>
			</svg>
			<h4 class="paint-turquois"><?php echo $CampLocation?></h4>
		</div>
		<br>

		<!-- icon location -->
		<div class="highlight">
			<svg class="small">
				<use xlink:href="#icon_price"></use>
			</svg>
			<h4 class="paint-turquois"><?php echo $CampPrice?></h4>
		</div>
		<br>

		<!-- short description -->
		<p><?php echo $CampShortDescription?></p>

		<!-- get your tickets -->
		<div class="flexBtn">
      <button><a href="<?php echo $CampShortDescription?>"></a><?php echo $CampButton?></button>
      <p><?php echo $CampTicketsLeft ?></p>
    </div> 
	</div>

	<div>
		<img class="flyerPic" src="img/event/flyer/event.jpg" alt="Flyer event">
	</div>

</section>

