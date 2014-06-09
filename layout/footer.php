	

  	<footer>
      <?php 
      if(isset($_SESSION["userRole"])) { 
      	if($_SESSION["userRole"]=="admin"){
      ?>
      	<div id="debug-css" class="btn">Debug</div>
      <?php
      	}
      } 
      ?>
    </footer>



    

    
	
