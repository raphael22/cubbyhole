
<link href='css/page/files.css' rel='stylesheet' type='text/css'>

<section>
	<!-- <div class="meter">
		<span></span>
	</div> -->
<?php	  
	require_once('library/entity/File.class.php');
	require_once('library/manager/FileManager.class.php');
	$fileManager = new FileManager();
    if(isset($_FILES['file']['size']) && $_FILES['file']['size'] > 0 && $_FILES['file']['error'] == 0){    	

		

        /*$file = new File();
        $file->setFileUserId($_SESSION["userId"]);
        $file->setFileName($_FILES["file"]["name"]);
        $file->setFileIsFolder(0);
        if(isset($Folder)){
        	$file->setFileFolder($Folder);
        	$file->setFilePaths($Folder . '/' . $_FILES["file"]["name"]);
        }
        else{
        	$file->setFileFolder("root");
        	$file->setFilePaths($_FILES["file"]["name"]);
        }

        if($_FILES["file"]["size"] < 1024){
	        $file->setFileSize(round($_FILES["file"]["size"] / 4) . " Bytes");
	    }
	    else if(($_FILES["file"]["size"] / 1024) < 1024){
	    	$file->setFileSize(round($_FILES["file"]["size"] / 1024) . " Kb");
	    }
	    else $file->setFileSize(round($_FILES["file"]["size"] / 1048576) . " Mb");

		
		move_uploaded_file($_FILES['file']['tmp_name'],'C:\wamp\www\B3\supcubby\uploads/'.$_SESSION["userId"].'/'.$file->getFilePaths());
        //die("Size : " .  $file->getFileSize() . " Id : " . $file->getFileUserId());
        $fileManager->recordFile($file,$db); */   
	}
	else if(isset($_FILES['file']['size']) && $_FILES['file']['error'] > 0){
		echo "<div class='alert alert-red'>Error (". $_FILES['file']['error'] . ") : contact admin</div>";
	}


	
    
    if(isset($_SESSION["userRole"])) {
?>
		<div id="Alert"></div>
		<div class="center">
			<form enctype="multipart/form-data">			
				<input type="file" name="file"><br>
				<button id="btnFile" class="btn" type="submit">Upload</button>
			</form>

			<form method="post">
				<input id="inputFolder" type="text" name="folder"><br>
				<button id="btnFolder" class="btn" type="submit">Create folder</button>
			</form>

		</div>

	<div id="Files">
		<?php
			/*if(isset($_GET['Folder'])){
				$fileManager->getFiles($_SESSION["userId"],$_GET['Folder'],$db);
			}
			else $fileManager->getFiles($_SESSION["userId"],"root",$db);*/
		?>
	</div>
	<div id="Folders">
		<?php
			/*if(isset($_GET['Folder'])){
				$fileManager->getFolders($_SESSION["userId"],$_GET['Folder'],$db);
			}
			else $fileManager->getFolders($_SESSION["userId"],"root",$db);*/
		?>		
	</div>
<?php
	}
	else {
?>

		<div class="alert alert-red">Sign Up or Login</div>

<?php
	}
?>
	<script type="text/javascript">
		$(window).load(function(){
<?php 
	if(isset($_GET['Folder'])){
?>
			$('#work').attr('src',"library/work/File.work.php?UserId="+"<?php echo $_SESSION['userId']; ?>"+"&Folder="+"<?php echo $_GET['Folder']; ?>");
<?php
}else{
?>
			$('#work').attr('src',"library/work/File.work.php?UserId="+"<?php echo $_SESSION['userId']; ?>");
<?php
}
?>
			setTimeout(function(){
				$('.folder.root').addClass('actual');
			},500);
		});
		
		$(':file').change(function(){
		    var file = this.files[0];
		    var name = file.name;
		    var size = file.size;
		    var type = file.type;
		    //Your validation
		});
		$('body').on('click','.file',function(){
			//$('#work').attr('src',"library/work/File.work.php?Work=GetFile&File="+$(this).data('link')+"&UserId="+"<?php echo $_SESSION['userId']?>");
		});

		$('body').on('click','.folder',function(){
			$('#work').attr('src',"library/work/File.work.php?Work=ShowFile&Folder="+$(this).data('link')+"&UserId="+"<?php echo $_SESSION['userId']; ?>");
		});
		$('#btnFile').click(function(){
			/*event.preventDefault();
			var folder = $('.folder.actual').data('link');
			if(folder=="")folder="root";
			$('#work').attr('src',"library/work/File.work.php?Work=RecordFile&UserId="+"<?php echo $_SESSION['userId']; ?>"+"&Folder="+folder);*/
		});
		$('#btnFile').click(function(){
		    var formData = new FormData($('form')[0]);
		    var folder = $('.folder.actual').data('link');
			if(folder=="")folder="root";
		    $.ajax({
		        url: "library/work/File.work.php?Work=RecordFile&UserId="+"<?php echo $_SESSION['userId']; ?>"+"&Folder="+folder,
		        type: 'POST',
		        xhr: function() {  // Custom XMLHttpRequest
		            var myXhr = $.ajaxSettings.xhr();
		            if(myXhr.upload){ // Check if upload property exists
		                myXhr.upload.addEventListener('progress',progressHandlingFunction, false); // For handling the progress of the upload
		            }
		            return myXhr;
		        },
		        //Ajax events
		        // beforeSend: beforeSendHandler,
		        // success: completeHandler,
		        // error: errorHandler,
		        data: formData,
		        //Options to tell jQuery not to process data or worry about content-type.
		        cache: false,
		        contentType: false,
		        processData: false
		    });
		});
		function progressHandlingFunction(e){
		    if(e.lengthComputable){
		        $('progress').attr({value:e.loaded,max:e.total});
		    }
		}
		$('#btnFolder').click(function(){
			event.preventDefault();
			var folder = $('.folder.actual').data('link');
			if(folder=="")folder="root";
			$('#work').attr('src',"library/work/File.work.php?Work=RecordFolder&FolderName="+$('#inputFolder').val()+"&Folder="+folder+"&UserId="+"<?php echo $_SESSION['userId']; ?>");
			$('#inputFolder').val('');
		});
	</script>
</section>
<iframe name="work" id="work" scrolling='no' width='auto' height='auto' frameborder='0' HSPACE='0' VSPACE='0'></iframe>