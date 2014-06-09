<?php 

class FileManager {
	public function recordFile(File $file, PDO $db) {

		$query = $db->prepare('SELECT * FROM files WHERE userId = :userId AND name = :name AND isFolder = :isFolder AND paths = :paths');
		$query->bindValue(':userId', $file->getFileUserId());
		$query->bindValue(':name', $file->getFileName());
		$query->bindValue(':isFolder', $file->getFileIsFolder());
		$query->bindValue(':paths', $file->getFilePaths());
		$query->execute();
		$data = $query->fetch();

		if(empty($data)) {
			$query = $db->prepare('INSERT INTO files (userId,name,size,isFolder,folder,paths) VALUES (:userId, :name, :size, :isFolder, :folder, :paths)');
			$query->bindValue(':userId', $file->getFileUserId());
			$query->bindValue(':name', $file->getFileName());
			$query->bindValue(':size', $file->getFileSize());
			$query->bindValue(':isFolder', $file->getFileIsFolder());
			$query->bindValue(':folder', $file->getFileFolder());
			$query->bindValue(':paths', $file->getFilePaths());
			$query->execute();
			if($file->getFileIsFolder()==1){
				mkdir('C:\wamp\www\B3\supcubby\uploads/'.$file->getFileUserId() .'/'. $file->getFilePaths(),7777,true);
			}
			else header('Location: index.php?page=Files&Folder='.$file->getFileFolder());
			
		} 
		else {
			$Alert="<div class='alert alert-red'>This record already exist</div>";
			return $Alert;
		}      
	}

	public function getFiles($userId,$folder, PDO $db) {

		$query = $db->prepare('SELECT * FROM files WHERE userId = :userId AND folder = :folder AND isFolder = :isFolder');
		$query->bindValue(':userId', $userId);
		$query->bindValue(':folder', $folder);
		$query->bindValue(':isFolder', 0);
		$query->execute();
		$data = $query->fetchAll();
		if(!empty($data)) {
			$files="";
			foreach ($data as $file) {
				$files.= '<div class="file" data-link="'. $file[6] .'"><a href="C:\wamp\www\B3\supcubby\uploads\\'.$file[1].'\\'.$file[6].'">' . $file[2] . '</a><span>' . $file[3] . '</span></div>';
			}
			
		} 
		else {
			$files= "<div class='alert'>No File Here</div>";
		}    
		return $files;  
	}
	public function getFolders($userId,$folder, PDO $db) {

		$query = $db->prepare('SELECT * FROM files WHERE userId = :userId AND isFolder = :isFolder ORDER BY paths');
		$query->bindValue(':userId', $userId);
		$query->bindValue(':isFolder', 1);
		$query->execute();
		$data = $query->fetchAll();
		if(!empty($data)) {

			if($folder=="root") $folders= '<div class="folder root actual" data-link="root">//</div>';
			else $folders= '<div class="folder root" data-link="root">//</div>';

			foreach ($data as $file) {
				$dash="|";
				for ($i=0; $i < substr_count($file[6], '/'); $i++) { 
					$dash.='_';
				}
				if($file[6]==$folder) $folders.= '<div class="folder actual depth'. substr_count($file[6], '/') .'" data-link="'. $file[6] .'">' . $dash . $file[2] . '</div>';
				else $folders.= '<div class="folder depth'. substr_count($file[6], '/') .'" data-link="'. $file[6] .'">' . $dash . $file[2] . '</div>';

			}
			
		} 
		else {
			$folders= '<div class="folder root actual" data-link="root">//</div>';
		}
		return $folders;
	}
	public function getAllFiles(PDO $db) {

		$query = $db->prepare('SELECT * FROM files');
		$query->execute();
		$data = $query->fetchAll(PDO::FETCH_CLASS);
		if(!empty($data)) {
			return $data;
		} 
		else {
			return "Error : Empty Row";
		}      
	}


	
}