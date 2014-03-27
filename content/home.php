<link href='css/page/home.css' rel='stylesheet' type='text/css'>

<?php 
if(isset($_SESSION["userRole"])) { 
	$userManager = new UserManager();  
	if(isset($_SESSION["userRole"])) { 
?>
		
	<h2>Welcome Back <?php $userManager->getUserName($_SESSION["userEmail"],$db); ?></h2>






<?php 
	}
}
else {
?>
	<h2 class="title">Welcome on CubbyHole</h2>	
	<section id="home">	
		<div class="btn btn-nav" data-uri="Sign">Sign for Free Now</div>
	</section>
<?php
}
?>
