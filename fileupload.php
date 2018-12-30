<?php
$file_upload_name="";
$isfile_uploaded=false;

// Check if image file is a actual image or fake image
if( sizeof($_FILES)>0 )
  if (strlen($_FILES["files"]["name"]) && isset($_POST["update_3"]))
 {
	$isfile_uploaded=true;
	$file_upload_name=$_FILES["files"]["name"];
	echo $file_upload_name;
	//$var=var_export($_FILES["files"]);
	$target_dir = "images/";
	$target_file = $target_dir . basename($_FILES["files"]["name"]);
	//echo $target_file;
	$uploadOk = 1;
	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));


    $check = getimagesize($_FILES["files"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }


if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["files"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["files"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
}
?>