<?php
	// variables
	$CampSectionChapterTitle = 'Camp';
	$CampSectionHeadline = 'Next Camp Promo headline loerum ipsum donor';
	$CampLongDescription = 'Lead text for your event. Loerum Epsom dollar sit amen. Lead text for your event.  Loerum Epsom dollar sit amen. Lead text for your event. Loerum Epsom dollar sit amen.';
	$EventDate = 'Thursday, 23.06.2020';
	$EventLink = 'training.php';
	$EventButton = 'get your tickets';

?>

<style><?php include "style/parts/camp.style.css" ?></style>

<section class="camp">
	<div>
		<h4 class="paint-turquois"><?php echo $CampDateStart?></h4>
		<br>
		<h1><?php echo $CampSectionHeadline?></h1>
		<br>
		<p><?php echo $CampLongDescription?></p>

		<!-- button -->
		<button><a class="buttonType" href="<?php echo $CampLink?>"><?php echo $CampButton?></a></button>
		
		<!-- horizontal ruler -->
		<hr>
	</div>
	
</section>

