<link href='css/page/home.css' rel='stylesheet' type='text/css'>

<?php 
if(isset($_SESSION["userRole"])) { 
	$userManager = new UserManager();  
	if(isset($_SESSION["userRole"])) { 
?>
		
	<h2><?php 
		echo Welcome.' ';
		$userManager->getUserName($_SESSION["userEmail"],$db); 
	?></h2>
	<section>
		<h2>Update 0.1</h2>
		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magnam, ipsam corporis laudantium eaque accusamus aperiam consectetur deserunt iure quos at! Eligendi, est quis delectus ut aperiam odit voluptate! Officia, adipisci!</p>
		<div class="btn">See Details</div>
	</section>

	<section>
		<h2>Update 0.09</h2>
		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus, possimus, praesentium inventore deleniti perferendis obcaecati odit neque placeat animi nam dolorem laudantium odio nulla debitis ipsum tempore consectetur. Nesciunt, tempora.</p>
		<div class="btn">See Details</div>
	</section>





<?php 
	}
}
else {
?>
	<h1 class="title"><?php echo WelcomeCubby; ?></h1>	
	<section>	

		<ul id="home-service" class="ul-icon">
			<li>
				<p>Download & Upload Everywhere</p>
			</li>
			<li>
				<p>Anonymous File Sharing</p>
			</li>
			<li>
				<p>Community Share</p>
			</li>
			<li>
				<p>Bitcoin Currency Allowed</p>
			</li>
		</ul>


		
	</section>

	<section>		
		<ul id="home-device" class="ul-icon">
			<li></li>
			<li>
				
			</li>
			<li></li>
		</ul>
		<h2>Responsive Design & Retina Ready</h2>
	</section>

	<section>
		<ul id="home-mobile" class="ul-icon">
			<li>
				<div class="btn">Android</div>
			</li>
			<li>
				<div class="btn">Iphone</div>
			</li>
			<li>
				<div class="btn">Windows</div>
			</li>
		</ul>
	</section>

	<section>
		
		<div class="btn btn-nav" data-uri="Sign">Sign Up for Free Now</div>
	</section>
<?php
}
?>
