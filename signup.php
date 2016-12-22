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
       echo "<h1>VERIFICATION PAGE</h1>";
       echo "Name:".$name."<br>";
       echo "Email:".$email."<br>";
       echo "Roll No:".$roll."<br>";
       echo "Course:".$course."<br>";
       echo "Password:".$password."<br>";
	/*redirecting to the welcomepage*/
   //     echo "Get through to the<a href='welcomepage.php'> WORLD OF SHARING</a>";
   //   }
   // mysqli_close($datastore);
   ?>
</body>
</html>



