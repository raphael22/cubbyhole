<header>
  <?php 
    if(isset($_SESSION["userRole"])) {
  ?>
  <div class='btn cursor-on mw640' id='nav-menu'></div>
  <ul id='menu'>
    <li class='btn btn-nav' data-uri="Home"></li>
    <li class='btn btn-nav' data-uri="Profil"></li>
    <li class='btn btn-nav' data-uri="Plans"></li>
  </ul>
  <?php 
    }
  ?>
  <div id="header-logo-container" class="btn-nav cursor-on" data-uri="Home">
      <span>C</span>
      <span>U</span>
      <span>B</span>
      <span>B</span>
      <span>Y</span>
      <span>H</span>
      <span>O</span>
      <span>L</span>
      <span>E</span>
  </div>
  <?php 
    if(isset($_SESSION["userRole"])) {
      $userManager = new UserManager();    
             
  ?>
    <div data-uri='Disconnect' id='nav-exit' class="btn btn-nav"></div>
    <div data-uri="Profil" id='nav-user-info' class="btn btn-nav">
      <div>
        <span id="nav-user-name"><?php $userManager->getUserName($_SESSION["userEmail"],$db); ?></span>
      </div>
      <div >
        <span id="nav-user-stockage">100Gb</span>
      </div>
    </div>  
  <?php 
    } else {
  ?>
    <h4 class="btn btn-nav" data-uri="Sign"></h4>
    <h4 class="btn btn-nav" data-uri="Login"></h4>
  <?php
    }
  ?>
</header>