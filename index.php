
<?php include("config.php");?>
<!DOCTYPE html>
 
<html>
<head>
	<?php include("head-tag-contents.php");?>
	<link type="text/css" rel="stylesheet" href="slides.css">
	
</head>
<body>

<?php #include("includes/design-top.php");?>
<?php include("navigation.php");?>

<div class="container" id="main-content">
	 <!-- Slideshow container -->
	<div class="slideshow-container">

		<!-- Full-width images with number and caption text -->
		<div class="mySlides">
			<div class="numbertext">1 / 3</div>
			<img src="resources/img1.png" style="width:100%">
			<div class="text">Gwiezdne wojny: Skywalker. Odrodzenie</div>
		</div>

		<div class="mySlides fade">
			<div class="numbertext">2 / 3</div>
			<img src="resources/img2.png" style="width:100%">
			<div class="text">Osierocony Brooklyn </div>
		</div>

		<div class="mySlides fade">
			<div class="numbertext">3 / 3</div>
			<img src="resources/img4.jpg" style="width:100%">
			<div class="text">Oficer i szpieg</div>
		</div>
		<!-- Next and previous buttons -->
		<a class="prev" onclick="plusSlides(-1)">&#10094;</a>
		<a class="next" onclick="plusSlides(1)">&#10095;</a>
	</div>
	<br>
	<!-- The dots/circles -->
	<div style="text-align:center">
		<span class="dot" onclick="currentSlide(1)"></span>
		<span class="dot" onclick="currentSlide(2)"></span>
		<span class="dot" onclick="currentSlide(3)"></span>
	</div> 

</div>
<script src="slides.js"></script>
<?php #include("includes/footer.php");?>

</body>
</html>