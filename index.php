<?php
require_once('library/manager/db.php');
require_once("content/lang/lang.php");

if(isset($_GET['Get']) || isset($_GET['Create']) || isset($_GET['Update']) || isset($_GET['Delete'])){

    require_once('library/query.php');
}
else {
    require_once("layout/header.php");

    if(isset($_GET['page'])){
        $page = $_GET['page'];
        if($page!="Sign" && $page!="Login"){
            require_once("layout/nav.php");
        }
    }
    else require_once("layout/nav.php");

    ?>
    <div id="main-section">
<?php

if(isset($_GET['page'])){
    switch($page){

        case 'Home':
            require_once('content/home.php');
            break;
        case 'Profil':
            require_once('content/profil.php');
            break;
        case 'Plans':
            require_once('content/plans.php');
            break;
        case 'Files':
            require_once('content/files.php');
            break;
        case 'Sign':
            require_once('content/sign.php');
            break;
        case 'Login':
            require_once('content/login.php');
            break;
        case 'Disconnect':
            require_once('content/disconnect.php');
            break;
        default:
            require_once('content/404.php');
    }
}
else require_once('content/home.php');

?>
    </div>
<?php

    if(isset($_GET['page'])){
        if($page!='Sign' && $page!='Login'){
            require_once("layout/footer.php");
        }
    }
    else require_once("layout/footer.php");
?>
    <div id="footer-earth"></div>
    <canvas id="canvas"></canvas>
    
    <link href='css/media.css' rel='stylesheet' type='text/css'>
   
    <script src='js/jquery-ui.js' type='text/javascript'></script>      
    <script src='js/canvas.js' type='text/javascript'></script>
    <script src='js/script.js' type='text/javascript'></script>  
  </body>
</html>
<?php
}
?>
        