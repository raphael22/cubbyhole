<?php
    if(isset($_POST['email']) && isset($_POST['mdp'])) {
        if(!empty($_POST['email']) && !empty($_POST['mdp'])) {
            $mdp = sha1($_POST['mdp']);
            $userManager = new UserManager();
            $user = new User();
            $user->setEmail($_POST['email']);
            $user->setMdp($mdp);
            $user->setRole("public");
            $userManager->createUser($user, $db);
        } else {
        echo '<div class="alert alert-error">Erreur : Veuillez remplir tous les champs.</div>';
        }
    }
?>

    <section>
        <h1>Sign Up</h1>
        <form action="" method="post" >
            <input type="email" placeholder="Email" name="email" /><br />
            <input type="password" placeholder="Password" name="mdp" /><br />
            <button class="btn" id="connexion" type="submit">Connexion</button>
        </form>
    </section>