<?php
$local=false;
if($local==false){
	try{
		/*$url=parse_url(getenv("CLEARDB_DATABASE_URL"));
	    $server = $url["host"];*/
		$db = new PDO('mysql:host=us-cdbr-east-05.cleardb.net;dbname=heroku_7d0cbf23e0e57a1', 'b50637b0a0e28d', '9ce391b5');
		//$db = new PDO('mysql:host=http://10.14.78.69;port=3306;dbname=Cubbyhole', 'cubbyhole', 'cubbyhole');
	}
	catch (Exception $e){
		die("Error : " . $e->getMessage());
	}
}
else{
	try{
		$db = new PDO('mysql:host=localhost;dbname=localdbcubbyhole', 'root', '');
		// 10.14.78.69
	}
	catch (Exception $e){
		die("Error : " . $e->getMessage());
	}
}
?>
	
