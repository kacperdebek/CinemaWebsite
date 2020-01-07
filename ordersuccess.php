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
<!-- <?php include("navigation.php");?> -->
<div class="container">
    <h3>Zamówienie pomyślne<h3>
    <button type="button" class="btn" id="confirm" style="margin-left: 50%" onClick="redirect()">Confirm</button> 
</div>
</body>
</html>