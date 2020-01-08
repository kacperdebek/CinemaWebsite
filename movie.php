<?php include("config.php");?>
<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<?php include("head-tag-contents.php");?>
	<?php
		$datafromlink = $_SERVER['QUERY_STRING'];
		$moviename = str_replace("%20", " ",$datafromlink);
		$moviename = str_replace("%C5%9B", "ś",$moviename);
		$moviename = str_replace("%C4%87", "ć",$moviename);
		$filename = str_replace("%20", "_",$datafromlink);
		$filename = str_replace("?", "",$filename);
		$result = mysqli_query($mysqli,"SELECT * FROM film WHERE tytuł_filmu = '$moviename'"); 
		$row = mysqli_fetch_array($result);
		$title = $row["tytuł_filmu"]; 
		$length = $row["czas_trwania"]; 
		$age = $row["kategoria_wiekowa"]; 
		$year = $row["rok_premiery"]; 
		$desc = $row["opis"]; 
	?>
	
</head>
<body>
<?php include("navigation.php");?>

<div class="container" id="main-content">
	<div class="row" id="img">
	</div>
	<div class="row" id = "title">
	</div>
	<div class="row" id = "length">
	</div>
	<div class="row" id = "age">
	</div>
	<div class="row" id = "year">
	</div>
	<div class="row" id = "desc">
	</div>
</div>
<script>
		var title = <?php echo json_encode($title); ?>;
		var length = <?php echo json_encode($length); ?>;
		var age = <?php echo json_encode($age); ?>;
		var year = <?php echo json_encode($year); ?>;
		var desc = <?php echo json_encode($desc); ?>;
		var filename = <?php echo json_encode($filename); ?>;
		document.getElementById("img").innerHTML += "<img src=resources/" + filename + ".png" + ">"
		document.getElementById("title").innerHTML += "<h3> Tytuł filmu: " + title + "</h3>";
		document.getElementById("length").innerHTML += "<h3> Czas trwania: " + length + "</h3>";
		document.getElementById("age").innerHTML += "<h3> Kategoria wiekowa: " + age + "</h3>";
		document.getElementById("year").innerHTML += "<h3> Rok premiery: " + year + "</h3>";
		document.getElementById("desc").innerHTML += "<h5>" + desc + "</h5>";
	</script>
</body>
</html>