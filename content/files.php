<link href='css/page/profil.css' rel='stylesheet' type='text/css'>

<section>
	<!-- <div class="meter">
		<span></span>
	</div> -->
	<?php		  
	if(isset($_SESSION["userRole"])) { 
		if(!empty($_POST['file'])) {
			$fileManager = new FileManager();
            $file = new File();
            $file->setFileName($_FILES["file"]["name"]);
            
            $userManager->connectUser($user, $db);
		} 
		else {
        	echo '<div class="alert alert-red">Erreur : Veuillez remplir tous les champs.</div>';
        }
	?>
		<div id="user-info">
			<form action="?page=Files" method="post" enctype="multipart/form-data">
				<input type="file" name="file" id="file"><br>
				<input type="submit" name="submit" value="Submit">
			</form>
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