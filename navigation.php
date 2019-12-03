<div class="container">
	<ul class="nav nav-pills">
	    <li class="nav-item">
	    	<a class="nav-link <?php if ($CURRENT_PAGE == "Index") {?>active<?php }?>" href="index.php">Home</a>
	  	</li>	
		<?php session_start(); ?>
		<?php if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){?>
			<li class="nav-item">
				<a class="nav-link" href="logout.php">Logout</a>
			</li> 
		<?php }else{?>
			<li class="nav-item">
				<a class="nav-link <?php if ($CURRENT_PAGE == "Login") {?>active<?php }?>" href="login.php">Login</a>
			</li> 
			<li class="nav-item">
	    		<a class="nav-link <?php if ($CURRENT_PAGE == "Signup") {?>active<?php }?>" href="signup.php">Sign Up</a>
	    	</li>
		<?php } ?>		
	</ul>
</div>