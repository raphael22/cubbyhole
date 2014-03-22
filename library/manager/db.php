<?php

	try{
		$db = new PDO('pgsql:dbname=d2ni6f5uvtc435;												
						user=igmqhmhbitdyon;
						password=Uy8MJmzLjZ3iWTqgzGL0thYzbf;
						host=ec2-50-19-219-235.compute-1.amazonaws.com;
						port=5432');
	}
	catch (Exception $e){
		die('Erreur : ' . $e->getMessage());
	}
?>
