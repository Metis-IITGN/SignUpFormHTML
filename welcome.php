<?php
session_start();

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
    echo "
<!DOCTYPE>
<html>
    <head>
        <title>
            Welcome to TeraShare
        </title>
    
    </head>
    <body>
        You have successfully signed up!!!<br>
        <a href=\"logout.php\">Logout</a>
		
		<form action=\"upload.php\" method=\"post\" enctype=\"multipart/form-data\">
    Select image to upload:
    <input type=\"file\" name=\"fileToUpload\" id=\"fileToUpload\">
    <input type=\"submit\" value=\"Upload Image\" name=\"submit\">
</form>
    
    </body>
</html>
";
}
?>
