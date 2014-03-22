<?php
	try{
		$url=parse_url(getenv("CLEARDB_DATABASE_URL"));

	    $server = $url["host"];
	    $username = $url["user"];
	    $password = $url["pass"];
	    $db = substr($url["path"],1);

		$db = new PDO('mysql:'+$server+';dbname='+$db, $username, $password);
	}
	catch (Exception $e){
		die('Erreur : ' . $e->getMessage());
	}
?>
