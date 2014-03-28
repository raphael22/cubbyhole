<header>
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
    <div class='btn cursor-on mw640' id='nav-menu'></div>
    <ul id='menu'>
      <li class='btn btn-nav' data-uri="Home">Home</li>
      <li class='btn btn-nav' data-uri="Profil">Profil</li>
      <li class='btn btn-nav' data-uri="Plans">Our Plans</li>
      <li class='btn btn-nav' data-uri="Disconnect">Log out</li>
    </ul>
  <?php 
    } else {
  ?>
    <div class='btn cursor-on mw640' id='nav-menu'></div>
    <ul id='menu'>
      <li class='btn btn-nav' data-uri="Home">Home</li>
      <li class='btn btn-nav' data-uri="Plans">Our Plans</li>
      <li class="btn btn-nav" data-uri="Sign">Sign Up</li>
      <li class="btn btn-nav" data-uri="Login">Log In</li>
    </ul>
    

  <?php
    }
  ?>
</header>