<div class="container-full">
	<ul class="nav nav-pills center-pills">
		<li class="nav-itemn">
			<a class="nav-link <?php if ($CURRENT_PAGE == "Index") {?>active<?php }?>" href="index.php">Strona główna</a>
		</li>	
		<li class="nav-item">
			<a class="nav-link <?php if ($CURRENT_PAGE == "Movies") {?>active<?php }?>" href="movies.php">Repertuar</a>
		</li>
		<?php if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){?>
		<li class="nav-item">
			<a class="nav-link" href="logout.php">Wyloguj</a>
		</li> 
		<?php }else{?>
		<li class="nav-item">
			<a class="nav-link" href="login.php">Zaloguj się</a>
		</li> 
		<li class="nav-item">
			<a class="nav-link" href="signup.php">Zarejestruj się</a>
		</li>
		<?php } ?>	
	</ul>
</div>