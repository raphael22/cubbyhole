<?php 

class FileManager {
	public function recordFile(File $file, PDO $db) {

		$query = $db->prepare('SELECT * FROM files WHERE userId = :userId AND name = :name');
		$query->bindValue(':userId', $file->getFileUserId());
		$query->bindValue(':name', $file->getFileName());
		$query->execute();
		$data = $query->fetch();

		if(empty($data)) {
			$query = $db->prepare('INSERT INTO files (userId,name,size) VALUES (:userId, :name, :size)');
			$query->bindValue(':userId', $file->getFileUserId());
			$query->bindValue(':name', $file->getFileName());
			$query->bindValue(':size', $file->getFileSize());
			$query->execute();
			
		} 
		else {
			echo "<div class='alert alert-red'>This file is already record</div>";
		}      
	}

	public function getFiles($userId, PDO $db) {

		$query = $db->prepare('SELECT * FROM files WHERE userId = :userId');
		$query->bindValue(':userId', $userId);
		$query->execute();
		$data = $query->fetchAll();
		if(!empty($data)) {

			foreach ($data as $file) {
				echo $file[2] . ' - ' . $file[3] . '<br>';
			}



		   
			
		} 
		else {
			echo "<div class='alert'>You don't have file yet</div>";
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