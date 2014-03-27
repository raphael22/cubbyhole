<link href='css/page/profil.css' rel='stylesheet' type='text/css'>

	<section>
		<!-- <div class="meter">
			<span></span>
		</div> -->
		<?php 
		$userManager = new UserManager();  
		if(isset($_SESSION["userRole"])) { 
		?>
		<div id="user-info">
			<p>Username : <?php $userManager->getUserName($_SESSION["userEmail"],$db); ?></p>
			<p>Email : <?php echo $_SESSION["userEmail"]; ?></p>
			<p>Status : <?php echo $_SESSION["userRole"]; ?></p>
		</div>
		<?php
		}
		else {
		?>
		<div class="alert alert-red">Sign Up or Login</div>
		<?php
		}
		?>
		
	</section>
	

   
