<?php include("config.php");?>
<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<?php include("head-tag-contents.php");?>
    <script>  
    function redirect(){
        window.location.href = "index.php";
    }
</script>
</head>
<body>
<div class="container">
    <h3>Zamówienie złożone pomyślnie<h3>
    <button type="button" class="btn" id="confirm" style="margin-left: 50%" onClick="redirect()">Confirm</button> 
</div>
</body>
</html>