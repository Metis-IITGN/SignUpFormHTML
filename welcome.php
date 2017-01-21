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
		
		<a href='upload_form.php'>Upload a file: </a>
    
    </body>
</html>
";
}
?>
