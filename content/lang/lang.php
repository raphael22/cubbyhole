<?php
  	if(isset($_GET['lang'])){
		if ($_GET['lang']=='fr') {
			include('content/lang/fr.php');
		}
		else if ($_GET['lang']=='en') {
			include('content/lang/en.php');
		}
	}
	else {
		include('content/lang/en.php');
	}
  	 
?>