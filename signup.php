
<html>
<body>
<form method="post" action="signup.php">
   <h1> Sign Up</h1>
   <fieldset>
   Email Address*:
   <input type="text" name="email" placeholder="peter.parker" >@iitgn.ac.in
   <br>
   Name:
   <input type="text" name="name" placeholder="Peter Parker">
   <br>
   Roll No:
   <input type="text" name="roll" placeholder="16110038">
   <br>
<!--Course: USING RADIO BUTTON
   <input type="radio" name="course" value="btech" checked> BTech <br>
   <input type="radio" name="course" value="mtech "> Mtech<br>
   <input type="radio" name="course" value="msc"> MSc<br>
   <input type="radio" name="course" value="ma"> MA<br>
   <input type="radio" name="course" value="phd"> PHD<br>
   <input type="radio" name="course" value="alumni"> Alumni<br>
HERE WE USE DROPDOWN MENU-->
   Course:<select name="course">
	<option value="btech">Btech</option>
	<option value="mtech">Mtech</option>
	<option value="msc">MSc</option>
	<option value="ma">MA</option>
	<option value="phd">PHD</option>
	<option value="alumni">Alumni</option>
   </select><br>
   Password*:
   <input type="password" name="password">
   <br>
   Verify Password:
   <input type="password" name="password2">
   <br>
   *Mandatory Fields	
   </fieldset>
   <br><input type="submit" name="submit_button" value="Submit"><br> 
</form>
 
   <?php
   session_start();
if (isset($_POST["submit_button"]))
{
<!-- session_start(); -->

<html>
<body>


<?php


/*

   $name=$_POST["name"];
   $email=$_POST["email"];
   $roll=$_POST["roll"];
   $course=$_POST["course"];
   $password=$_POST["password"];
   $password2=$_POST["password2"];

*/

	/*for storing it in the particular session*/

/*
	$_SESSION["name"]=$name;
	$_SESSION["email"]=$email;
	$_SESSION["roll"]=$roll;
	$_SESSION["course"]=$course;
	$_SESSION["password"]=$password;
	$_SESSION["password2"]=$password2;
   


*/




 /**********************************************************************************************/
 /*                       DEFINING FIXED VALUES AND STORING THE DATA TO DATABASE               */
 /**********************************************************************************************/

   $name='Ashim';
   $email='ashim.raj@iitgn.ac.in';
   $roll='14110021';
   $course='XYZ';
   $password='mypasskey';
   $password2='mypasskey';

   $datastore="mydatabase";


   $conn = new mysqli('localhost', 'root', '', $datastore);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 


    // $sql = "INSERT INTO MyGuests (firstname, lastname, email) VALUES ('John', 'Doe', 'john@example.com')";

    $sql = "INSERT INTO registered_users (Name,Email,RollNo,Course,Password) VALUES ('$name','$email','$roll','$course','$password')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();

    /*

   else
   {  mysqli_query($datastore,"INSERT INTO registered_users(Name,Email,RollNo,Course,Password) VALUES ($name,$email,$roll,$course,$password)");
       echo "<h2>VERIFICATION PAGE</h2>";
       echo "Name:".$name."<br>";
       echo "Email:".$email."<br>";
       echo "Roll No:".$roll."<br>";
       echo "Course:".$course."<br>";
       echo "Password:".$password."<br>";
	/*redirecting to the welcomepage*/
    //   echo "Get through to the<a href='welcomepage.php'> WORLD OF SHARING</a>";
     }
   mysqli_close($datastore);
}
   //     echo "Get through to the<a href='welcomepage.php'> WORLD OF SHARING</a>";
   //   }
   // mysqli_close($datastore);
   ?>
</body>
</html>
