	

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



    <div id="footer-earth"></div>
    <canvas id="canvas"></canvas>
    <link href='css/media.css' rel='stylesheet' type='text/css'>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src='js/jquery-ui.js' type='text/javascript'></script>      
    <script src='js/canvas.js' type='text/javascript'></script>
    <script src='js/script.js' type='text/javascript'></script>  
  </body>
</html>

    
	
