<?php include("config.php");?>
<?php session_start(); ?>
<!DOCTYPE html>
 
<html>
<head>
	<?php include("head-tag-contents.php");?>
	<link type="text/css" rel="stylesheet" href="slides.css">
	<style>
		.icon-movies{
			background-image : url(resources/icon1.png);
			background-size: cover;
			display: inline-block;
			height: 100%;
			width: 100%;
		}
		.icon-login{
			background-image : url(resources/icon2.png);
			background-size: cover;
			display: inline-block;
			height: 100%;
			width: 100%;
		}
		.icon-register{
			background-image : url(resources/icon3.png);
			background-size: cover;
			display: inline-block;
			height: 100%;
			width: 100%;
		}
		.btn:hover{
			background-color:#1C4773;
		}
	</style>
</head>
<body>
<!-- <img src="resources/cinema-slide.jpg" style="width:100%"> -->
<?php #include("includes/design-top.php");?>
<?php include("navigation.php");?>
<div class="container-full bg-dark" id="main-content">
	<div class="slideshow-container">
		<div class="mySlides">
			<img src="resources/image1.jpg" style="width:100%">
			<div class="text">Gwiezdne wojny: Skywalker. Odrodzenie</div>
		</div>

		<div class="mySlides fade">
			<img src="resources/image2.jpg" style="width:100%">
			<div class="text">Osierocony Brooklyn </div>
		</div>

		<div class="mySlides fade">
			<img src="resources/image3.jpg" style="width:100%">
			<div class="text">Oficer i szpieg</div>
		</div>
		<a class="prev" onclick="plusSlides(-1)">&#10094;</a>
		<a class="next" onclick="plusSlides(1)">&#10095;</a>
	</div>
	<br>
	<div style="text-align:center">
		<span class="dot" onclick="currentSlide(1)"></span>
		<span class="dot" onclick="currentSlide(2)"></span>
		<span class="dot" onclick="currentSlide(3)"></span>
	</div> 
	<div class="row centered-500" style="margin-bottom:100px;margin-top:60px;">
		<a href="movies.php"><div class="btn div250x250" ><i class="icon-movies"></i></div></a>
		<div class="btn div250x250"></div>
		<div class="w-100"></div>
		<?php if(!(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true)){?>
		<a href="login.php"><div class="btn div250x250"><i class="icon-login"></i></div></a>
		<a href="signup.php"><div class="btn div250x250"><i class="icon-register"></i></div></a>
		<?php }?>
	</div>
</div>
<script src="slides.js"></script>
<!-- <?php include("footer.php");?> -->

</body>
</html>