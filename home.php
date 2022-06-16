<div class="card">
	<div class="card-header bg-primary text-light">
		<h1 class="text-center">Bienvenue sur le site de gestion de vaccins !</h1>
	</div>
</div>

<style type="text/css">
	.carousel-inner > .carousel-item > img {
  		height: 500px;
	}
	.carousel {
  		width: 800px;
  		height: 500px;
	}
</style>

<div class="container mt-4">
	<div class="row d-flex justify-content-center">
		<div id="sliderImage" class="carousel slide mt-4" data-bs-ride="carousel">
		  	<div class="carousel-inner">
		    	<div class="carousel-item active">
		      		<img src="images/covid.jpg" class="d-block w-100" alt="">
		    	</div>
		    	<div class="carousel-item">
		      		<img src="images/covid2.jpg" class="d-block w-100" alt="">
		    	</div>
		    	<div class="carousel-item">
		      		<img src="images/covid4.png" class="d-block w-100" alt="">
		    	</div>
		  	</div>
		  	<button class="carousel-control-prev" type="button" data-bs-target="#sliderImage" data-bs-slide="prev">
		    	<span class="carousel-control-prev-icon" aria-hidden="true"></span>
		    	<span class="visually-hidden">Précédent</span>
		  	</button>
		  	<button class="carousel-control-next" type="button" data-bs-target="#sliderImage" data-bs-slide="next">
		    	<span class="carousel-control-next-icon" aria-hidden="true"></span>
		    	<span class="visually-hidden">Suivant</span>
		  	</button>
		</div>
	</div>
</div>

<div class="d-flex justify-content-center mt-4 mb-3">
	<?php require_once("vue/tableaudebord.php"); ?>
</div>

<div class="d-flex justify-content-center mt-4 mb-3">
	<?php require_once("vue/nbTypesCentres.php"); ?>
</div>

