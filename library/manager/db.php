<?php
try
	{
		$db = new PDO('mysql:host=localhost;dbname=cubbyhole', 'root', '');
	}
	catch (Exception $e)
	{
		die('Erreur : ' . $e->getMessage());
	}
?>
