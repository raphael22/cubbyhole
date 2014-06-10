<link href='css/page/login.css' rel='stylesheet' type='text/css'>
<?php

require_once('library/entity/User.class.php');
require_once('library/manager/UserManager.class.php');

    if(isset($_POST['email']) && isset($_POST['mdp']) && isset($_POST['name'])) {
        if(!empty($_POST['email']) && !empty($_POST['mdp']) && !empty($_POST['name'])) {
            $mdp = sha1($_POST['mdp']);
            $userManager = new UserManager();
            $user = new User();
            $user->setName($_POST['name']);
            $user->setEmail($_POST['email']);
            $user->setMdp($mdp);
            $user->setRole("public");
            $userManager->createUser($user, $db, false);
            //header('Location: index.php?page=Home');
        } else {
        echo '<div class="alert alert-red">Error : Fill all fields.</div>';
        }
    }
    if(isset($_SESSION["userRole"])) {
?>
    <div class="alert alert-on alert-green">
        <p>Welcome ! - You're now log in</p>
    </div>
<?php 
    }
    else{
?>
    <section>
        <form action="?page=Sign" method="post" >
            <span data-holder="Username"><input type="text" name="name" /></span><br />
            <span data-holder="Email"><input type="email" name="email" /></span><br />
            <span data-holder="Password"><input type="password" name="mdp" /></span><br />            
            <input type="radio" name="Plans" value="1">Light - 0$/mo <br/>
            <input type="radio" name="Plans" value="2">Medium - 9.99$/mo <br/>
            <input type="radio" name="Plans" value="3">Heavy - 19.99$/mo <br/>
            <button class="btn" id="connexion" type="submit">Sign In</button>
        </form>
        <div class="btn btn-nav" data-uri='Home'>Back to Home</div>
    </section>
<?php 
    } 
?>