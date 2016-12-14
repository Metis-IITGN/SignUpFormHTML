<?php

session_start();
$name=$_POST["name"];
$email=$_POST["email"];
$roll=$_POST["roll"];
$course=$_POST["course"];
$password=$_POST["password"];
$password2=$_POST["password2"];
$datastore=mysqli_connect("localhost:8080","root","",$datastore);
$result = mysqli_query($datastore,"SELECT * FROM registered_users WHERE Email==$email");
$num_rows = mysqli_num_rows($result);


if  ($email==NULL or $password==NULL)
{  echo "Mandatory Fields left empty!!";}

elseif ($num_rows>0)
{ echo "Already existing account on this mail-id";}

elseif ($password!=$password2)
{echo "Passwords Mismatch";}

else
{  mysqli_query($datastore,"INSERT INTO registered_users(Name,Email,RollNo,Course,Password) VALUES ($name,$email,$roll,$course,$password)");
   echo "<h1>VERIFICATION PAGE</h1>";
   echo "Name:".$name."<br>";
   echo "Email:".$email."<br>";
   echo "Roll No:".$roll."<br>";
   echo "Course:".$course."<br>";
   echo "Password:".$password."<br>";}

mysqli_close($datastore);
?>


