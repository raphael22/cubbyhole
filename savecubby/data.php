<?php
    $page = $_GET['page'];
    switch($page){

        case 'home':
            require_once('home.php');
            break;
        case 'profil':
            require_once('profil.php');
            break;
        case 'plans':
            require_once('plans.php');
            break;
        default:
            require_once('404.php');
    }

?>
