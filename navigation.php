<div class="container">
	<ul class="nav nav-pills">	
		<ul class="nav nav-pills">
			<li class="nav-item">
				<a class="nav-link <?php if ($CURRENT_PAGE == "Index") {?>active<?php }?>" href="index.php">Strona główna</a>
			</li>	
			<li class="nav-item">
				<a class="nav-link <?php if ($CURRENT_PAGE == "Movies") {?>active<?php }?>" href="movies.php">Repertuar</a>
			</li>
		</ul>
		<?php session_start(); ?>
		<?php if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){?>
			<li class="nav-item-right">
				<a class="nav-link" href="logout.php">Wyloguj</a>
			</li> 
		<?php }else{?>
		<ul class="nav-right nav-pills">
			<li class="nav-item">
				<a class="nav-link" href="login.php">Zaloguj się</a>
			</li> 
			<li class="nav-item">
				<a class="nav-link" href="signup.php">Zarejestruj się</a>
			</li>
		</ul>
	</ul>
	<?php } ?>	
</div>