<link href='css/page/login.css' rel='stylesheet' type='text/css'>
<?php

require_once('library/entity/User.class.php');
require_once('library/manager/UserManager.class.php');

    if(isset($_POST['email']) && isset($_POST['mdp'])) {
        if(!empty($_POST['email']) && !empty($_POST['mdp'])) {
            $mdp = sha1($_POST['mdp']);
            $userManager = new UserManager();
            $user = new User();
            $user->setEmail($_POST['email']);
            $user->setMdp($mdp);
            $userManager->connectUser($user, $db, false, false);
            //header("location:index.php?page=Home");
        } else {
        echo '<div class="alert alert-red">Error : Fill all fields.</div>';
        }
    }
    if(isset($_SESSION["userRole"])) {
?>
<section>
    <div class="alert alert-green">Welcome Back ! - You're log in</div>

    <div class="btn btn-nav" data-uri="Home">Back to Home</div>
</section>
<?php 
    }
    else{
?>
    <section>
        <form action="?page=Login" method="post" >
            <span data-holder="Email"><input type="email"  name="email" /> </span><br />
            <span data-holder="Password"><input type="password" data-holder="Password" name="mdp" /></span><br />
            <button class="btn" id="connexion" type="submit">Log In</button>
        </form>
        <div class="btn btn-nav" data-uri='Home'>Back to Home</div>
    </section>
<?php 
    } 
?>