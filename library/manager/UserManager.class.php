<?php 

class UserManager {
	public function createUser(User $user, PDO $db, $isQuery) {

		$query = $db->prepare('SELECT * FROM users WHERE email = :email');
		$query->bindValue(':email', $user->getEmail());
		$query->execute();
		$data = $query->fetch();

		if(empty($data)) {
			$query = $db->prepare('INSERT INTO users (name,email, mdp,role) VALUES (:name, :email, :mdp, :role)');
			$query->bindValue(':name', $user->getName());
			$query->bindValue(':email', $user->getEmail());
			$query->bindValue(':mdp', $user->getMdp());
			$query->bindValue(':role', $user->getRole());
			$query->execute();
			$data = $query->fetch();

			$userManager = new UserManager();
        	$userManager->connectUser($user,$db,true,$isQuery);
		} 
		else {
			echo "<div class='alert alert-red'>This email is already register</div>";
		}        
	}

	public function connectUser(User $user, PDO $db, $newUser, $isQuery) {

		$query = $db->prepare('SELECT * FROM users WHERE email = :email AND mdp = :mdp');
		$query->bindValue(':email', $user->getEmail());
		$query->bindValue(':mdp', $user->getMdp());
		$query->execute();
		$data = $query->fetch();

		if(!empty($data)) {

			$_SESSION["userId"] = $data[0];
			$_SESSION["userRole"] = $data[4];
			if($newUser==true){
				mkdir('C:\wamp\www\B3\supcubby\uploads/'. $data[0],7777,true);
				if($isQuery==false)header('Location: index.php?page=Home');
			}		
			else header('Location: index.php?page=Home');

		} else {
			echo "<div class='alert alert-red'>please check your email and password</div>";
		}
	}

	public function getUserName($userId, PDO $db) {

		$query = $db->prepare('SELECT * FROM users WHERE id = :id');
		$query->bindValue(':id', $userId);
		$query->execute();
		$data = $query->fetch();

		if(!empty($data)) {
			return $data[1];
		} else {
			return "empty";
		}
	}

	public function getUserMail($userId, PDO $db) {

		$query = $db->prepare('SELECT * FROM users WHERE id = :id');
		$query->bindValue(':id', $userId);
		$query->execute();
		$data = $query->fetch();

		if(!empty($data)) {
			return $data[2];
		} else {
			return "empty";
		}
	}

	public function getUserPassword($userId, PDO $db) {

		$query = $db->prepare('SELECT * FROM users WHERE id = :id');
		$query->bindValue(':id', $userId);
		$query->execute();
		$data = $query->fetch();

		if(!empty($data)) {
			echo $data[3];
		} else {
			return "empty";
		}
	}

	public function getAllUsers(PDO $db) {

		$query = $db->prepare('SELECT * FROM users');
		$query->execute();
		$data = $query->fetchAll(PDO::FETCH_CLASS);

		if(!empty($data)) {
			return $data;
		} else {
			//echo "<div class='alert alert-red'> Ces identifiants n'existe pas, veuillez créer un compte.</div>";
		}
	}
	
	public function updateUser(User $user, PDO $db, $email) {

		$query = $db->prepare('SELECT * FROM users WHERE email = :email');
		$query->bindValue(':email', $email);
		$query->execute();
		$data = $query->fetch();

		$query = $db->prepare('SELECT * FROM users WHERE email = :email');
		$query->bindValue(':email', $user->getEmail());
		$query->execute();
		$newData = $query->fetch();

		if(!empty($data) && empty($newData)) {
			$query = $db->prepare('UPDATE users SET name = :name, mdp = :mdp, email = :newEmail WHERE email = :email');
			$query->bindValue(':email', $email);
			$query->bindValue(':newEmail', $user->getEmail());
			$query->bindValue(':name', $user->getName());
			$query->bindValue(':mdp', $user->getMdp());
			$query->execute();
			$data = $query->fetch();
		}
		else die('error');
	}

	public function deleteUser($email, PDO $db) {

		$query = $db->prepare('SELECT * FROM users WHERE email = :email');
		$query->bindValue(':email', $email);
		$query->execute();
		$data = $query->fetch();

		if(!empty($data)) {
			$query = $db->prepare('DELETE FROM users WHERE email = :email');
			$query->bindValue(':email', $email);
			$query->execute();
			$data = $query->fetch();
		}
		else die("error - user doesn't exist");
	}
	public function disconnectUser() {

		unset($_SESSION["userId"]);
		unset($_SESSION["userRole"]);
		session_destroy();
	}
}