<?php



	
if(isset($_GET['query'])){
	require_once('library/entity/User.class.php');
	require_once('library/manager/UserManager.class.php');
	
	$userManager = new UserManager();
	
	switch($_GET['query']){
		case 'users':
		    $users = $userManager->getAllUser($db);
		    header('Content-type: application/json');
		    echo json_encode($users);
		    break;
	}
}

else die("Error");

?>