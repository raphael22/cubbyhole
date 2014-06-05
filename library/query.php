<?php



	
if(isset($_GET['Get'])){
	require_once('library/entity/User.class.php');
	require_once('library/manager/UserManager.class.php');
	require_once('library/entity/File.class.php');
	require_once('library/manager/FileManager.class.php');

	$userManager = new UserManager();
	$fileManager = new FileManager();
	
	if($_GET['Get']=='Users'){
		$users = $userManager->getAllUsers($db);
	    header('Content-type: application/json');
	    die(json_encode($users));
	}
	if($_GET['Get']=='Username'){
		if(isset($_GET['UserId'])){
			$username = $userManager->getUserName($_GET['UserId'],$db);
		    die($username);
		}
	}
	if($_GET['Get']=='Usermail'){
		if(isset($_GET['UserId'])){
			$usermail = $userManager->getUserMail($_GET['UserId'],$db);
		    die($usermail);
		}
	}
	if($_GET['Get']=='Files'){
		$files = $fileManager->getAllFiles($db);
	    header('Content-type: application/json');
	    die(json_encode($files));
	}
	
}

else die("Error");

?>