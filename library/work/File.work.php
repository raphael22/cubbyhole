<!DOCTYPE html>
<?php
require_once('../manager/db.php');
require_once('../entity/File.class.php');
require_once('../manager/FileManager.class.php');
$fileManager = new FileManager();
$Alert="";
if(isset($_GET['Work'])){
	if($_GET['Work']=="GetFile"){
		copy('C:\wamp\www\B3\supcubby\uploads/' . $_GET['UserId']  .'/'. $_GET['File'],'C:\wamp\www\B3\supcubby\uploads/' . $_GET['UserId']  .'/'. $_GET['File'] . '.new');
		if(!@copy('C:\wamp\www\B3\supcubby\uploads/' . $_GET['UserId']  .'/'. $_GET['File'],'C:\wamp\www\B3\supcubby\uploads/' . $_GET['UserId']  .'/'. $_GET['File'] . '.new'))
		{
		    $errors= error_get_last();
		    $Alert.= addslashes("COPY ERROR: ".$errors['type']);
		    $Alert.= addslashes("<br />\n".$errors['message']);
		} else {
		    $Alert.= addslashes("File copied from remote!");
		}
	}

	if($_GET['Work']=="ShowFile"){
		$Files = addslashes($fileManager->getFiles($_GET['UserId'],$_GET['Folder'],$db));
		$Folders = addslashes($fileManager->getFolders($_GET['UserId'],$_GET['Folder'],$db));
	}
	if($_GET['Work']=="RecordFile"){
		if(isset($_FILES['file']['size']) && $_FILES['file']['size'] > 0 && $_FILES['file']['error'] == 0){ 			

	        $file = new File();
	        $file->setFileUserId($_GET["UserId"]);
	        $file->setFileName($_FILES["file"]["name"]);
	        $file->setFileIsFolder(0);	        
        	$file->setFileFolder($_GET["Folder"]);
        	if($_GET["Folder"]=="root") $file->setFilePaths('/' . $_FILES["file"]["name"]);
        	else $file->setFilePaths($_GET["Folder"] . '/' . $_FILES["file"]["name"]);

	        if($_FILES["file"]["size"] < 1024){
		        $file->setFileSize(round($_FILES["file"]["size"] / 4) . " Bytes");
		    }
		    else if(($_FILES["file"]["size"] / 1024) < 1024){
		    	$file->setFileSize(round($_FILES["file"]["size"] / 1024) . " Kb");
		    }
		    else $file->setFileSize(round($_FILES["file"]["size"] / 1048576) . " Mb");

			
			move_uploaded_file($_FILES['file']['tmp_name'],'C:\wamp\www\B3\supcubby\uploads/'.$_GET["UserId"].'/'.$file->getFilePaths());
	        //die("Size : " .  $file->getFileSize() . " Id : " . $file->getFileUserId());
	        $fileManager->recordFile($file,$db);

	        $Files = addslashes($fileManager->getFiles($_GET['UserId'],$_GET['Folder'],$db));
			$Folders = addslashes($fileManager->getFolders($_GET['UserId'],$_GET['Folder'],$db));   
		}
		else if(isset($_FILES['file']['size']) && $_FILES['file']['error'] > 0){
			$Alert.= addslashes("<div class='alert alert-red'>Error (". $_FILES['file']['error'] . ") : contact admin</div>");

			$Files = addslashes($fileManager->getFiles($_GET['UserId'],$_GET['Folder'],$db));
			$Folders = addslashes($fileManager->getFolders($_GET['UserId'],$_GET['Folder'],$db));
		}
		else{
			$Alert.= addslashes("<div class='alert alert-red'>Error : contact admin</div>");
			$Files = addslashes($fileManager->getFiles($_GET['UserId'],$_GET['Folder'],$db));
			$Folders = addslashes($fileManager->getFolders($_GET['UserId'],$_GET['Folder'],$db));
		}
	}
	if($_GET['Work']=="RecordFolder"){
		if(isset($_GET['FolderName'])){
				$file = new File();
		        $file->setFileUserId($_GET['UserId']);
		        $file->setFileName($_GET['FolderName']);
		        $file->setFileSize(0);
		        $file->setFileIsFolder(1);
	        	$file->setFileFolder($_GET['Folder']);
	        	if($_GET["Folder"]=="root") $file->setFilePaths('/' . $_GET['FolderName']);
        		else $file->setFilePaths($_GET["Folder"] . '/' . $_GET['FolderName']);

		        $Alert.=addslashes($fileManager->recordFile($file,$db));
		        $Files = addslashes($fileManager->getFiles($_GET['UserId'],$_GET['FolderName'],$db));
				$Folders = addslashes($fileManager->getFolders($_GET['UserId'],$_GET['Folder'],$db));
		}
		else $Alert.= addslashes("<div class='alert alert-red'>Please fill field</div>");
	}
}
else if(isset($_GET['UserId']) && isset($_GET['Folder'])){
	$Files = addslashes($fileManager->getFiles($_GET['UserId'],$_GET['Folder'],$db));
	$Folders = addslashes($fileManager->getFolders($_GET['UserId'],$_GET['Folder'],$db));
}
else{
	$Files = addslashes($fileManager->getFiles($_GET['UserId'],"root",$db));
	$Folders = addslashes($fileManager->getFolders($_GET['UserId'],"root",$db));
}
?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	</head>
	<body>
		<script>

		top.document.getElementById('Files').innerHTML='<?php echo $Files; ?>';
		top.document.getElementById('Folders').innerHTML='<?php echo $Folders; ?>';
		top.document.getElementById('Alert').innerHTML='<?php echo $Alert; ?>';
		</script>
	</body>
</html>
