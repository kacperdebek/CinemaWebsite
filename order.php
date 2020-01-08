<?php include("config.php");?>
<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<?php include("head-tag-contents.php");?>
</head>
<body>
<?php
    $hour = $_POST['hour'];
    $day = $_POST['day'];
    $film = $_POST['film'];
    $userid = $_POST['userid'];
    $showing = mysqli_query($mysqli,"SELECT id_seansu FROM seans WHERE dzień = '$day' and godzina = '$hour' and id_filmu = (SELECT id_filmu from film where tytuł_filmu = '$film')");
    $my_id_array = mysqli_fetch_assoc($showing);
    $my_id = $my_id_array['id_seansu'];
    $query = mysqli_query($mysqli,"INSERT INTO zamówienie (id_seansu, id_klienta, status_zamówienia) VALUES ($my_id, $userid, 'Oczekiwanie na płatność')");
    $seats = json_decode(stripslashes($_POST['seats']));
    for($i = 0; $i < count($seats); $i++){
        $seats[$i] = str_replace("s", "",$seats[$i]);
        $seat_num = ($seats[$i] + (98*($my_id - 1)));
        $query2 = mysqli_query($mysqli,"UPDATE rezerwacja SET czy_zajęte = 1 WHERE id_rezerwacji = '$seat_num'") or trigger_error("Query Failed!Error: ".mysqli_error($mysqli), E_USER_ERROR);
    }
    
?>
<script> 
    setTimeout(function() {
        window.location.href = "ordersuccess.php";
    }, 2000);
</script>
</body>
</html>