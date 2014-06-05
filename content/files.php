<?php

?>
<link href='css/page/profil.css' rel='stylesheet' type='text/css'>

<section>
	<!-- <div class="meter">
		<span></span>
	</div> -->
<?php	  
	require_once('library/entity/File.class.php');
	require_once('library/manager/FileManager.class.php');
	$fileManager = new FileManager();
    if(isset($_FILES['file']['size']) && $_FILES['file']['size'] > 0 && $_FILES['file']['error'] == 0){    	

		

        $file = new File();
        $file->setFileUserId($_SESSION["userId"]);
        $file->setFileName($_FILES["file"]["name"]); 
        if($_FILES["file"]["size"] < 1024){
	        $file->setFileSize(round($_FILES["file"]["size"] / 4) . " Bytes");
	    }
	    else if(($_FILES["file"]["size"] / 1024) < 1024){
	    	$file->setFileSize(round($_FILES["file"]["size"] / 1024) . " Kb");
	    }
	    else $file->setFileSize(round($_FILES["file"]["size"] / 1048576) . " Mb");

        //die("Size : " .  $file->getFileSize() . " Id : " . $file->getFileUserId());
        $fileManager->recordFile($file,$db);    
	}
	else if(isset($_FILES['file']['size']) && $_FILES['file']['error'] > 0){
		echo '<div class="alert alert-red">Erreur '. $_FILES['file']['error'] .'</div>';
	}
	
    
    if(isset($_SESSION["userRole"])) {
?>

		<div class="center">
			<form action="?page=Files" method="post" enctype="multipart/form-data">
				<input type="file" name="file" id="file"><br>
				<button class="btn" id="upload" type="submit">Upload</button>
			</form>
		</div>

<?php
	$fileManager->getFiles($_SESSION["userId"],$db);
	}
	else {
?>

		<div class="alert alert-red">Sign Up or Login</div>

<?php
	}
?>
	
</section>