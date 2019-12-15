<?php include("config.php");?>
<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<?php include("head-tag-contents.php");?>
</head>
<body>
<?php include("navigation.php");?>
<?php
    $hour = $_POST['hour'];
    $day = $_POST['day'];
    $film = $_POST['film'];
    $userid = $_POST['userid'];
    $showing = mysqli_query($mysqli,"SELECT id_seansu FROM seans WHERE dzień = '$day' and godzina = '$hour' and id_filmu = (SELECT id_filmu from film where tytuł_filmu = '$film')");
    $my_id_array = mysqli_fetch_assoc($showing);
    $my_id = $my_id_array['id_seansu'];
    $query = mysqli_query($mysqli,"INSERT INTO zamówienie (id_seansu, id_klienta, status_zamówienia) VALUES ($my_id, $userid, 'W realizacji')");
    $seats = json_decode(stripslashes($_POST['seats']));
?>
<script> 
    alert("Zamówiono pomyślnie"); 
    window.location.href = "index.php";
</script>
</body>
</html>