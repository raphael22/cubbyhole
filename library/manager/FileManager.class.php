<?php 

class FileManager {
	public function recordFile(File $file, PDO $db) {

		$query = $db->prepare('SELECT * FROM files WHERE userId = :userId AND name = :name');
		$query->bindValue(':userId', $file->getUserId);
		$query->bindValue(':name', $file->getFileName());
		$query->execute();
		$data = $query->fetch();

		if(empty($data)) {
			$query = $db->prepare('INSERT INTO files (userId,name,size) VALUES (:userId, :name, :size)');
			$query->bindValue(':name', $file->getFileName());
			$query->bindValue(':email', $file->getFileSize());
			$query->bindValue(':mdp', $file->getMdp());
			$query->execute();
        	$_SESSION["userRole"] = $user->getRole();
        	$_SESSION["userEmail"] = $user->getEmail();
        	header('Location: index.php?page=Home');
		} 
		else {
			echo "<div class='alert alert-red'>This file already record</div>";
		}      
	}

/*	public function connectUser(User $user, PDO $db) {

		$query = $db->prepare('SELECT * FROM users WHERE email = :email AND mdp = :mdp');
		$query->bindValue(':email', $user->getEmail());
		$query->bindValue(':mdp', $user->getMdp());
		$query->execute();
		$data = $query->fetch();

		if(!empty($data)) {

			$_SESSION["userEmail"] = $data[2];
			$_SESSION["userRole"] = $data[4];
			header('Location: index.php?page=Home');
		} else {
			echo "<div class='alert alert-red'>please check your email and password</div>";
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
	}*/
	
	
}