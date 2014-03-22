<?php
require_once('library/manager/db.php');
require_once('library/manager/UserManager.class.php');
require_once('library/entity/User.class.php');

require_once("layout/header.php");


if(isset($_GET['page'])){
    switch($_GET['page']){

        case 'Home':
            require_once('content/home.php');
            break;
        case 'Profil':
            require_once('content/profil.php');
            break;
        case 'Plans':
            require_once('content/plans.php');
            break;
        case 'Login':
            require_once('content/login.php');
            break;
        default:
            require_once('content/home.php');
    }
}
else require_once('content/home.php');

require_once("layout/footer.php");

?>
