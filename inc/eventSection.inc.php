<section class="event">
	
	<!-- flyer event -->
	<img class="flyerPic" src="img/event/flyer/event.jpg" alt="Flyer event">
	<div>
		<h4><?php echo $EventSectionChapterTitle?></h4>
		<br>
		<h1><?php echo $EventSectionHeadline?></h1>
		<br>
		<p><?php echo $EventLongDescription?></p>

		<!-- icon event -->
		<div class="highlight">
			<svg class="small">
				<use xlink:href="#icon_event"></use>
			</svg>
		<h4 class="paint-turquois"><?php echo $EventDate?></h4>
		</div>

		<!-- icon time -->
		<div class="highlight">
			<svg class="small">
        <use xlink:href="#icon_time"></use>
    	</svg>                        
			<h4 class="paint-turquois"><?php echo $EventTime ?></h4>
		</div>

		<!-- icon location -->
		<div class="highlight">
			<svg class="small">
				<use xlink:href="#icon_location"></use>
			</svg>
			<h4 class="paint-turquois"><?php echo $EventLocation?></h4>
		</div>
		<br>

		<!-- short description -->
		<p><?php echo $EventShortDescription?></p>

		<!-- get your tickets -->
		<div class="flexBtn">

      <button><a class="buttonType" href="<?php echo $EventLink ?>"><?php echo $EventButton?></a></button>
      <p><?php echo $EventTicketsLeft ?></p>
    </div> 
	</div>

</section>

