<link href='css/page/login.css' rel='stylesheet' type='text/css'>
<?php
    if(isset($_POST['email']) && isset($_POST['mdp'])) {
        if(!empty($_POST['email']) && !empty($_POST['mdp'])) {
            $mdp = sha1($_POST['mdp']);
            $userManager = new UserManager();
            $user = new User();
            $user->setEmail($_POST['email']);
            $user->setMdp($mdp);
            $userManager->connectUser($user, $db);
            //header("location:index.php?page=Home");
        } else {
        echo '<div class="alert alert-red">Erreur : Veuillez remplir tous les champs.</div>';
        }
    }
    if(isset($_SESSION["userRole"])) {
?>
    <div class="alert alert-green">
        <p>Welcome ! - You're now log in</p>
    </div>
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
    </section>
<?php 
    } 
?>