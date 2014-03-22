<?php 

class UserManager {
	public function createUser(User $user, PDO $db)
	{
		$query = $db->prepare('SELECT * FROM users WHERE email = :email');
		$query->bindValue(':email', $user->getEmail());
		$query->execute();
		$data = $query->fetch();

		if(empty($data)) {
			$query = $db->prepare('INSERT INTO users (email, mdp, role) VALUES (:email, :mdp, :role)');
			$query->bindValue(':email', $user->getEmail());
			$query->bindValue(':mdp', $user->getMdp());
			$query->bindValue(':role', $user->getRole());
			$query->execute();
			echo "<div class=\"alert alert-on alert-green\"> Vous êtes bien inscrit, bienvenue sur CubbyHole</div>";
		} else {
			echo "<div class=\"alert alert-on alert-red\"> Cet email existe déjà.</div>";
		}
	}

	public function connectUser(User $user, PDO $db)
	{
		$query = $db->prepare('SELECT * FROM users WHERE email = :email AND mdp = :mdp');
		$query->bindValue(':email', $user->getEmail());
		$query->bindValue(':mdp', $user->getMdp());
		$query->execute();
		$data = $query->fetch();

		if(!empty($data)) {
			$_SESSION["userEmail"] = $user->getEmail();
			$_SESSION["userRole"] = $user->getRole();
			echo "<div class=\"alert alert-on alert-green\"> Vous êtes connecté.</div>";
		} else {
			echo "<div class=\"alert alert-on alert-red\"> Ces identifiants n'existe pas, veuillez créer un compte.</div>";
		}
	}

	
	public function disconnectUser()
	{
		unset($_SESSION["userEmail"]);
		unset($_SESSION["userRole"]);
	}
}