<?php
session_start();


$db_username = "root";
    $db_password = "";
    $db = "names";   $db=mysqli_connect("localhost",$db_username,$db_password,$db) or die("Failed to connect to database".mysql_error());

function error_found(){
  header("Location: signuprush.php");
}
set_error_handler('error_found');
if ($_SESSION["loggedin"] === "no")
{
    echo "You are not logged in";
}
else
{
	
		$target_fol = (string)$_POST["course_initials"];	
$target_dir = "uploads/".$target_fol."/";
	$target_fol = $target_fol + '';
$target_file=$target_dir.$_POST["course_initials"]."_".$_POST["course_code"]."_".basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$FileType = pathinfo($target_file,PATHINFO_EXTENSION);

if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}

if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename($_FILES["fileToUpload"]["name"]). " has been uploaded.";
		
		$q = "INSERT INTO files(folder,file_name,uploaded_by) VALUES('".($_POST["course_initials"])."','".($_POST["course_initials"]."_".$_POST["course_code"]."_".basename($_FILES["fileToUpload"]["name"]))."','".$_SESSION["email"]."');";
		
		mysqli_query($db,$q) or die(mysql_error());
		
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
}

?>
