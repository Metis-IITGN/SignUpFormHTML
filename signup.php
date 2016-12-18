session_start();

<html>
<body>
   <?php
   $name=$_POST["name"];
   $email=$_POST["email"];
   $roll=$_POST["roll"];
   $course=$_POST["course"];
   $password=$_POST["password"];
   $password2=$_POST["password2"];
	/*for storing it in the particular session*/
	$_SESSION["name"]=$name;
	$_SESSION["email"]=$email;
	$_SESSION["roll"]=$roll;
	$_SESSION["course"]=$course;
	$_SESSION["password"]=$password;
	$_SESSION["password2"]=$password2;
   $datastore="mydatabase";
   $datastore=mysqli_connect("localhost","root","",$datastore);
	
	/*verification of empty spaces*/
   if  ($email==NULL or $password==NULL)
   {   echo "Mandatory Fields left empty!!";}

	/*checking duplicates*/
   elseif ($result=mysqli_query($datastore,"SELECT * FROM registered_users WHERE Email=$email"))
   {   echo "Already existing account on this mail-id";}

	/*avoiding password carelessness*/
   elseif ($password!=$password2)
   {   echo "Passwords Mismatch";}

   else
   {  mysqli_query($datastore,"INSERT INTO registered_users(Name,Email,RollNo,Course,Password) VALUES ($name,$email,$roll,$course,$password)");
       echo "<h1>VERIFICATION PAGE</h1>";
       echo "Name:".$name."<br>";
       echo "Email:".$email."<br>";
       echo "Roll No:".$roll."<br>";
       echo "Course:".$course."<br>";
       echo "Password:".$password."<br>";
	/*redirecting to the welcomepage*/
       echo "Get through to the<a href='welcomepage.php'> WORLD OF SHARING</a>";
     }
   mysqli_close($datastore);
   ?>
</body>
</html>



