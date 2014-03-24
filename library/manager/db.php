<?php
$local=true;
if($local==false){
	try{
		$url=parse_url(getenv("CLEARDB_DATABASE_URL"));
	    $server = $url["host"];
		$db = new PDO('mysql:host='.$server.';dbname=heroku_7d0cbf23e0e57a1', 'b50637b0a0e28d', '9ce391b5');
	}
	catch (Exception $e){
		die("Error : " . $e->getMessage());
	}
}
else{
	try{
		$db = new PDO('mysql:host=localhost;dbname=cubbyhole', 'root', '');
	}
	catch (Exception $e){
		die("Error : " . $e->getMessage());
	}
}
?>
	
