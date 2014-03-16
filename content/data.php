<?php
    $page = $_GET['page'];
    switch($page){

        case 'Home':
            require_once('home.php');
            break;
        case 'Profil':
            require_once('profil.php');
            break;
        case 'Plans':
            require_once('plans.php');
            break;
        default:
            require_once('404.php');
    }

?>
