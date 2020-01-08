<title><?php print $PAGE_TITLE;?></title>

<?php if ($CURRENT_PAGE == "Index") { ?>
	<meta name="description" content="" />
	<meta name="keywords" content="" /> 
<?php } ?>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="/resources/demos/style.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<style>
	
	body{
		background-color: #343A40;
		color:white;
		font-family: sans-serif;
	}
	.footer {
		font-size: 14px;
		text-align: center;
	}
	.logo {
		background: url("resources/logo.png") no-repeat;
		width: 50px; 
		height: 50px; 
		display: block;
	}
	.col-centered {
		float: none;
		margin: 0 auto;
	}
	.left-margin-15 {
		margin-left: 15px;
	}
	.white-outline {
		outline: 2px solid #ccc;
	}
	.centered-500{
		margin: 0 auto;
		width: 500px;
		text-align: center;
	}
	.div250x250{
		height: 250px;
		width: 250px;
	}
	
	.center-pills {
		display: flex;
		justify-content: center;
		background-color: #1C4773;
		border-bottom: 2px solid green;
	}
	.container-full {
		margin: 0 auto;
		width: 100%;
	}
	.navbar {
		padding-top: 0;
		padding-bottom: 0;
	}
	.nav-pills .nav-link {
		padding-top: 15px;
		padding-bottom: 15px;
		border-radius: 0;
	}
	a:link {
		font-size: 18px;
	}
	a:visited {
		text-decoration: none;
	}
	a:hover {
		color: green;
		text-decoration: none;
	}
	a:active {
		text-decoration: none;
	}
	.footer {
	position: fixed;
	left: 0;
	bottom: 0;
	width: 100%;
	background-color: gray;
	color: white;
	text-align: center;
	}
</style>