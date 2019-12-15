<title><?php print $PAGE_TITLE;?></title>

<?php if ($CURRENT_PAGE == "Index") { ?>
	<meta name="description" content="" />
	<meta name="keywords" content="" /> 
<?php } ?>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link type="text/css" rel="stylesheet" href="slides.css">
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="/resources/demos/style.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<style>
	body{
		background-color: #343A40;
		color:white;
	}
	#main-content {
		margin-top:20px;
	}
	.footer {
		font-size: 14px;
		text-align: center;
	}
	.nav-right {
		display:-webkit-box;
		display:-ms-flexbox;
		display:flex;
		-ms-flex-wrap:wrap;
		flex-wrap:wrap;
		padding-left:0;
		margin-bottom:0;
		margin-left:55%;
		list-style:none
	}
	.nav-item:hover {
		border: 1px solid #007bff;
		border-radius:.25rem;
	}
	.nav-item-right {
		-webkit-box-flex:1;
		-ms-flex:1 1 auto;
		flex:1 1 auto;
		text-align:center;
		margin-left:55%;
		border: 1px solid #007bff;
		background-color: #343A80;
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
	
</style>