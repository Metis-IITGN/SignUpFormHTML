<?php
$email = $_POST["email"];
$name = $_POST["name"];
$roll = $_POST["roll"];
$course = $_POST["course"];
$password = $_POST["password"];

echo "<h1>VERIFICATION OF DETAILS </h1>";
echo "Email: ".$email."@iitgn.ac.in <br>";
echo "Name: ".$name."<br>";
echo "Roll no.: ".$roll."<br>";
echo "Course: ".$course."<br>";

echo "Password: ".$password."<br>";
?>
