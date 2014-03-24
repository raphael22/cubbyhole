<link href='css/page/profil.css' rel='stylesheet' type='text/css'>

	<section>
		<!-- <div class="meter">
			<span></span>
		</div> -->
		<?php $userManager = new UserManager();  ?>
		<div id="user-info">
			<span>Username : <?php $userManager->getUserName($_SESSION["userEmail"],$db); ?></span><br>
			<span>Email : <?php echo $_SESSION["userEmail"]; ?></span><br>
			<span>Status : <?php echo $_SESSION["userRole"]; ?></span>
		</div>
		
	</section>
	

   
