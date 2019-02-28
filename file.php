<?php 
	$myfile = fopen("testfile.txt", "w");
	$txt = "John Doe\n";
	fwrite($myfile, $txt);
	fclose($myfile);
	if($_SERVER['REQUEST_METHOD']=='POST'){
		$target_dir = "upload/";
		$target_file = $target_dir.basename($_FILES['file_upload']['name']);
		$isUpload = false;
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
		// Check if image file is a actual image or fake image
		if(isset($_POST["upload"])) {
		    $check = getimagesize($_FILES["file_upload"]["tmp_name"]);
		    if($check !== false) {
		        echo "File is an image - " . $check["mime"] . ".";
		        $isUpload = true;
		    } else {
		        echo "File is not an image.";
		        $isUpload = false;
		    }
		}
		// Check if file already exists
		if (file_exists($target_file)) {
		    echo "Sorry, file already exists.";
		    $isUpload = false;
		}
		// Check file size
		if ($_FILES["file_upload"]["size"] > 500000) {
		    echo "Sorry, your file is too large.";
		    $isUpload = false;
		}
		// Allow certain file formats
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
		&& $imageFileType != "gif" ) {
		    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
		    $isUpload = false;
		}
		// Check if $uploadOk is set to 0 by an error
		if ($isUpload == false) {
		    echo "Sorry, your file was not uploaded.";
		// if everything is ok, try to upload file
		} else {
		    if (move_uploaded_file($_FILES["file_upload"]["tmp_name"], $target_file)) {
		        echo "The file ". basename( $_FILES["file_upload"]["name"]). " has been uploaded.";
		    } else {
		        echo "Sorry, there was an error uploading your file.";
		    }
		}
	}
	
 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title></title>
 </head>
 <body>
 	<form action="<?php $_SERVER['PHP_SELF']?>" method="post" enctype="multipart/form-data">
 		<input type="file" name="file_upload">
 		<input type="submit" name="upload">
 	</form>
 </body>
 </html>