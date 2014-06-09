<?php

require_once('library/entity/User.class.php');
require_once('library/manager/UserManager.class.php');
require_once('library/entity/File.class.php');
require_once('library/manager/FileManager.class.php');	

$userManager = new UserManager();
$fileManager = new FileManager();

if(isset($_GET['Get'])){
	
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
else if(isset($_GET['Create'])){

	if($_GET['Create']=='User'){
		$user = new User();
        $user->setName($_GET['Name']);
        $user->setEmail($_GET['Email']);
        $user->setMdp($_GET['Password']);
        $user->setRole("public");
		$users = $userManager->createUser($user,$db);
	}

	
}
else if(isset($_GET['Update'])){

	if($_GET['Update']=='User'){
		$email=$_GET['Email'];
		$user = new User();
        $user->setName($_GET['Name']);
        $user->setEmail($_GET['NewEmail']);
        $user->setMdp($_GET['Password']);
		$users = $userManager->updateUser($user,$db,$email);
	}	
}
else if(isset($_GET['Delete'])){

	if($_GET['Delete']=='User'){
		$user = new User();
        $user->setEmail($_GET['Email']);
		$users = $userManager->createUser($user,$db);
	}

	
}
else die("Error");

?>