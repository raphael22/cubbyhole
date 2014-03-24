<?php 

class UserManager {
	public function createUser(User $user, PDO $db) {

		$query = $db->prepare('SELECT * FROM users WHERE email = :email');
		$query->bindValue(':email', $user->getEmail());
		$query->execute();
		$data = $query->fetch();

		if(empty($data)) {
			$query = $db->prepare('INSERT INTO users (name,email, mdp, role) VALUES (:name, :email, :mdp, :role)');
			$query->bindValue(':name', $user->getName());
			$query->bindValue(':email', $user->getEmail());
			$query->bindValue(':mdp', $user->getMdp());
			$query->bindValue(':role', $user->getRole());
			$query->execute();
        	$_SESSION["userRole"] = $user->getRole();
        	$_SESSION["userEmail"] = $user->getEmail();
        	header('Location: index.php?page=Home');
        	echo "<div class='alert alert-green'> Vous êtes connecté.</div>";
		} 
		else {
			echo "<div class='alert alert-red'> Cet email existe déjà.</div>";
		}        
	}

	public function connectUser(User $user, PDO $db) {

		$query = $db->prepare('SELECT * FROM users WHERE email = :email AND mdp = :mdp');
		$query->bindValue(':email', $user->getEmail());
		$query->bindValue(':mdp', $user->getMdp());
		$query->execute();
		$data = $query->fetch();

		if(!empty($data)) {

			$_SESSION["userEmail"] = $data[2];
			$_SESSION["userRole"] = $data[4];
			header('Location: index.php?page=Home');
			echo "<div class='alert alert-green'> Vous êtes connecté.</div>";
		} else {
			echo "<div class='alert alert-red'> Ces identifiants n'existe pas, veuillez créer un compte.</div>";
		}
	}

	public function getUserName($userEmail, PDO $db) {

		$query = $db->prepare('SELECT * FROM users WHERE email = :email');
		$query->bindValue(':email', $userEmail);
		$query->execute();
		$data = $query->fetch();

		if(!empty($data)) {
			echo $data[1];
		} else {
			//echo "<div class='alert alert-red'> Ces identifiants n'existe pas, veuillez créer un compte.</div>";
		}
	}
	
	public function disconnectUser() {

		unset($_SESSION["userEmail"]);
		unset($_SESSION["userRole"]);
		session_destroy();
	}
}