<?php
$name=$_POST["name"];
$email=$_POST["email"];
$roll=$_POST["roll"];
$course=$_POST["course"];
$password=$_POST["password"];
$datastore=mysqli_connect();

if  ($email==NULL or $password==NULL)
{  echo "Mandatory Fields left empty!!";}

else
{  mysqli_query($datastore,"INSERT INTO registered_users(Name,Email,RollNo,Course,Password) VALUES ($name,$email,$roll,$course,$password");
   echo "<h1>VERIFICATION PAGE</h1>";
   echo "Name:".$name."<br>";
   echo "Email:".$email."<br>";
   echo "Roll No:".$roll."<br>";
   echo "Course:".$course."<br>";
   echo "Password:".$password."<br>";}

mysqli_close($datastore);
?>

