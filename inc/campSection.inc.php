<section class="event">

	<!-- camp event -->
	<div>
		<img src="img/event/flyer/event.jpg" alt="Flyer event">
	</div>


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
		<h4 class="paint-turquois"><?php echo $CampDateStart?></h4>
		</div>

		<!-- icon time -->
		<div class="highlight">
			<svg class="small">
        <use xlink:href="#icon_time"></use>
    	</svg>                        
			<h4 class="paint-turquois"><?php echo $CampDateEnd ?></h4>
		</div>

		<!-- icon location -->
		<div class="highlight">
			<svg class="small">
				<use xlink:href="#icon_location"></use>
			</svg>
			<h4 class="paint-turquois"><?php echo $CampLocation?></h4>
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

</section>

