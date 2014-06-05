<link href='css/page/profil.css' rel='stylesheet' type='text/css'>

<section>
	<!-- <div class="meter">
		<span></span>
	</div> -->
	<?php	

require_once('library/entity/User.class.php');
require_once('library/manager/UserManager.class.php');
	 
		if(isset($_SESSION["userRole"])) {
			$userManager = new UserManager(); 
	?>
		<div class="center">
			<p>User Rank : <?php echo $_SESSION["userId"]; ?></p>
			<p>Username : <?php $userManager->getUserName($_SESSION["userId"],$db); ?></p>
			<p>Email : <?php $userManager->getUserMail($_SESSION["userId"],$db); ?></p>
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
	

   
