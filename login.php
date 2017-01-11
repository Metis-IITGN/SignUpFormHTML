<?php
    session_start();
    //connecting to database
    $db_username = "root";
    $db_password = "";
    $db = "names";   $db=mysqli_connect("localhost",$db_username,$db_password,$db) or die("Failed to connect to databse".mysql_error());

$_SESSION["email_entered"] = NULL;
$_SESSION["password_entered"] = NULL;

$_SESSION["email"] = NULL;
$_SESSION["password"] = NULL;
$_SESSION["emailexists"] = NULL;
$_SESSION["loggedin"] = "no";

if (isset($_POST["submit_btn"]))
    {
        $email = $_POST["email"];
        $password = $_POST["password"];
        
        $_SESSION["email"] = $email;
        $_SESSION["password"] = $password;        
        
    if (($email == NULL)||($password==NULL))
    {
        if (($email == NULL))
        {
            $_SESSION["email_entered"] = "NO";
        }
        else
        {
            $_SESSION["email_entered"] = "YES";
        }    
      
        if (($password == NULL))
        {
            $_SESSION["password_entered"] = "NO";
        }
        else
        {
            $_SESSION["password_entered"] = "YES";
        }      
        
    }
        else
            {
				$_SESSION["email_entered"] = "YES";
				$_SESSION["password_entered"] = "YES";
				
    if (($_SESSION["email_entered"] == "YES"))
    {
        $rows = mysqli_query($db,"SELECT * FROM registered_users WHERE email='$email' and password='$password'");
        $num = mysqli_num_rows($rows);
        if (!($num > 0))
        {
            $_SESSION["emailexists"] = "NO";
        }
        else
        {
			$_SESSION["emailexists"] = "YES";    
        $_SESSION["loggedin"] = "yes";
        header("Location: welcome.php");
        }
    }
                else
                {
                    $_SESSION["email_entered"] = "NO";
                }
            }
    }

    
       
?>




<!DOCTYPE>
<html>
    <head>
        <title>Login</title>
    </head>
    <link type="text/css" rel="stylesheet" href="css/css_for_signup.css">
    <body>
        <ul id="header">
              <li><a href="#SignUp">Sign Up</a></li>
              <li><a href="#ContactUs">Contact Us</a></li>
              <li><a href="#FAQ">FAQs</a></li>
              <li><a class="alert" href="#Login">Login</a></li>
            </ul>
        
        <div class="navigationbar">
      <h1>Tera share</h1>
	  <h4>Welcomes you</h4>
    </div><br><br>
        
        
        <form method="post" action="login.php">
            
            <fieldset>
                <h2 >Login</h2>
                <label>Email<sup>*</sup></label>: <input type="text" name="email" default="email" placeholder="email" value="<?php if ($_SESSION["email"]){echo $_SESSION["email"];} ?>"><!--@iitgn.ac.in--><br>   
                
                <?php                
                if (($_SESSION["email_entered"] == "NO")&&(isset($_POST["submit_btn"])))
                {
                    echo "<p class='alert'>Please enter email id</p> <br>";
                }
                else if ($_SESSION["emailexists"] == "NO")
                {                   
                   
                        echo "<p class='alert'>Email id not signed up!</p> <br>";                                
                    
                }
                ?>               
                
                
                               
                <label>Password<sup>*</sup></label> <input type="password" name="password" default="password" placeholder="password" value="<?php if ($_SESSION["password"]){echo $_SESSION["password"];} ?>"><br>
                
                <?php                
                if (($_SESSION["password_entered"] == "NO")&&(isset($_POST["submit_btn"])))
                {
                    echo "<span class='alert'>Please enter password </span><br>";
                }
                ?><br>
               
                <p>* mandatory fields</p>
                <center><input type="submit" name="submit_btn" value="login"></center>
            </fieldset>
            
        </form>
        <footer>
<h3>Page Developed and Maintained by <b>Team TeraShare</b></h3>
</footer>
    
    </body>

</html>
