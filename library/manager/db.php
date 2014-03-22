<?php
	try{
		$url=parse_url(getenv("CLEARDB_DATABASE_URL"));

	    $server = $url["host"];
	    $username = $url["user"];
	    $password = $url["pass"];
	    $dbname = substr($url["path"],1);
		$db = new PDO('mysql:host='.$server.';dbname=heroku_7d0cbf23e0e57a1', 'b50637b0a0e28d', '9ce391b5');
	}
	catch (Exception $e){
		die('Erreur : ' . $e->getMessage());
		echo "<script>console.log(".$server.");</script>";
	}
?>
