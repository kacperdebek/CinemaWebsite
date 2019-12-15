<?php include("config.php");?>
<?php session_start(); ?>
<?php 
	$result = mysqli_query($mysqli,"SELECT * FROM film"); 
	while($row = mysqli_fetch_array($result)) {
		$table[]=$row["tytuł_filmu"]; 
		$table2[]=$row["czas_trwania"]; 
		$table3[]=$row["kategoria_wiekowa"]; 
		$table4[]=$row["rok_premiery"]; 
	}
?>
<!DOCTYPE html>
<html>
<head>
	<?php include("head-tag-contents.php");?>
	<script type="text/javascript">
	$( document ).ready(function changeText() {
		var now = new Date();
		var weekday = new Array();
		weekday[0] = "Niedziela";
		weekday[1] = "Poniedziałek";
		weekday[2] = "Wtorek";
		weekday[3] = "Środa";
		weekday[4] = "Czwartek";
		weekday[5] = "Piątek";
		weekday[6] = "Sobota";
		weekday[now.getDay()] = "Dzisiaj";
		for(var i = 1; i < 8; i++){
			document.getElementById(i.toString()).innerText = weekday[(now.getDay() + (i-1)) % 7];
		}
	})
	</script>
	<script>
		function generateMovies(arr) {
			var button;
			if(event === undefined) {
				button = "1";
			}
			else{
				button = event.target.id;
			}
			var i = 0;
			if(document.querySelector('.btn.btn-primary.active') != null) {
				document.querySelector('.btn.btn-primary.active').classList.remove('active');
			}
			document.getElementById(button).classList.add('active');
			var j = 0;
			var k = 0;
			var l = 0;
			var title_array = <?php echo json_encode($table);?>;
			var duration_array = <?php echo json_encode($table2);?>;
			var age_array = <?php echo json_encode($table3);?>;
			var year_array = <?php echo json_encode($table4);?>;
			for(i = 1; i < ((arr.length + 1)*6) - 5; i++){
				document.getElementById("col" + i).innerHTML = "";
			}
			for(i = 1, k = 0; i < arr.length + 1, k < (arr.length + 1)*6; i++, k += 6, l+=2){
				if(k==24)break;
				document.getElementById("col" + (k + 1)).innerHTML += "<img src=" + "resources/mov" + arr[i-1] + ".png" + ">"
				document.getElementById("col" + (k + 2)).innerHTML += "<h3>" + title_array[arr[i-1]] + "</h3>"
				document.getElementById("col" + (k + 3)).innerHTML += "<p>Czas trwania: " + "</p>"
				document.getElementById("col" + (k + 3)).innerHTML += "<p>" + duration_array[arr[i-1]] + "</p>"
				document.getElementById("col" + (k + 4)).innerHTML += "<p>Kategoria wiekowa: " + "</p>"
				document.getElementById("col" + (k + 4)).innerHTML += "<p>" + age_array[arr[i-1]] + "</p>"
				document.getElementById("col" + (k + 5)).innerHTML += "<p>Rok premiery: " + "</p>"
				document.getElementById("col" + (k + 5)).innerHTML += "<p>" + year_array[arr[i-1]] + "</p>"
				document.getElementById("col" + (k + 6)).innerHTML += "<button type=" + " button" + " class=" + " btn" + " id=" + "button" + l +">15:30</button>"
				document.getElementById("col" + (k + 6)).innerHTML += "<button type=" + " button" + " class=" + " btn" + " id=" + "button" + (l + 1) +">19:30</button>"
			}
		}
	</script>
</head>
<body>
<?php include("navigation.php");?>

<div class="container" id="main-content">
	<div class="col text-center">
		<div class="btn-group ">
			<button type="button" class="btn btn-primary active" id="1" onClick="generateMovies([1,2,3,4])">Pon</button>
			<button type="button" class="btn btn-primary" id="2" onClick="generateMovies([5,6,0,2])">Wt</button>
			<button type="button" class="btn btn-primary" id="3" onClick="generateMovies([6,1,4,0])">Śr</button>
			<button type="button" class="btn btn-primary" id="4" onClick="generateMovies([4,3,1,2])">Czw</button>
			<button type="button" class="btn btn-primary" id="5" onClick="generateMovies([2,4,5,6])">Pt</button>
			<button type="button" class="btn btn-primary" id="6" onClick="generateMovies([3,0,2,1])">Sob</button>
			<button type="button" class="btn btn-primary" id="7" onClick="generateMovies([0,5,6,3])">Ndz</button>
		</div>
		<div class="col" id="movie-content">
				<div class="row align-items-center" id="mov1">
					<div class="col" id="col1"></div>
					<div class="col" id="col2"></div>
					<div class="col" id="col3"></div>
					<div class="col" id="col4"></div>
					<div class="col" id="col5"></div>
					<div class="col" id="col6"></div>
				</div>
				<div class="row mt-2 align-items-center" id="mov2">
					<div class="col" id="col7"></div>
					<div class="col" id="col8"></div>
					<div class="col" id="col9"></div>
					<div class="col" id="col10"></div>
					<div class="col" id="col11"></div>
					<div class="col" id="col12"></div>
				</div>
				<div class="row mt-2 align-items-center" id="mov3">
					<div class="col" id="col13"></div>
					<div class="col" id="col14"></div>
					<div class="col" id="col15"></div>
					<div class="col" id="col16"></div>
					<div class="col" id="col17"></div>
					<div class="col" id="col18"></div>
				</div>
				<div class="row mt-2 align-items-center" id="mov4">
					<div class="col" id="col19"></div>
					<div class="col" id="col20"></div>
					<div class="col" id="col21"></div>
					<div class="col" id="col22"></div>
					<div class="col" id="col23"></div>
					<div class="col" id="col24"></div>
				</div>
		</div>
	</div> 
</div>
<script>generateMovies([1,2,3,4]);</script>
<script>
		$('[id^=col]').on('click','[id^=button]', {} ,function(){
			var hour = $(this).text();
			var movie = $(this).parent().parent().children().eq(1).text();	
			var day = $('.btn.btn-primary.active').text();
			<?php 
				if(isset($_SESSION["username"])){
			?>	
			window.location.href = "seats.php?hour="+hour+"&movie="+movie+"&day="+day;
			<?php
				}   
			?>
			
		})
</script>
</body>
</html>