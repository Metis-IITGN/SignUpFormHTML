<?php
    session_start();
    //connecting to database
    $db_username = "root";
    $db_password = "";
    $db = "names";   $db=mysqli_connect("localhost",$db_username,$db_password,$db) or die("Failed to connect to databse".mysql_error());

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

    
       
?>




<!DOCTYPE>
<html>
    <head>
        <title>Login</title>
		<link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
		<!--<link type="text/css" rel="stylesheet" href="css/css_for_signup.css">-->
		<style>
body
{
	background-color: black;
}
div.form
{
    display: block;
    text-align: center;
}
h5
{
	margin: 0;
	color: white;
}
form
{
	color: #0d1121;
    display: inline-block;
    margin-left: auto;
    border-radius:30px;
    margin-right: auto;
    text-align: left; 
    width: 40%; 
    margin: 2%
}
form
{
	background-color: white;
}
h1
{
	font-size: 2.8em;
	color:white;
	padding-bottom: 0;}
div.header
{
	background: linear-gradient(to bottom, blue,black);
	line-height: 1.8em;
}
header
{
	background-color: #0000FF;
	line-height: 1.5em;
	color: white;
}
ul 
{
    list-style-type: none;
    background: linear-gradient(to bottom, blue);
    margin: 0;
    padding: 0;
    overflow: hidden;
    
    width:100%;
}
form
{
	text-align: center
}
li
{
    float: right;
}
li a 
{
    display: block;
    color: white;
    text-align: center;
    padding: 16px;
    text-decoration: none;
}
footer
{
	
	width:100%; 
	line-height: 0.5em;
	color: white;
	text-align:right;
	background: linear-gradient(to bottom, black,#0000FF);
	position: static;
    bottom: 0;
    left: 0;
    right: 0;
    height:80px;
}
li a:hover
{
    background-color: #00FFFF;
}
</style>
    </head>
    
    <body>
        <div class="header" style="margin-top: 0">
      <ul>
 			 <li><a href="signuprush.php">Sign In</a></li>
				<li><a href="login.php">Login</a></li>
				<li><a href="#ContactUs">Contact Us</a></li>
				<li><a href="#FAQ">FAQ</a></li>
				<li><a href="index.html">Home</a></li>
      </ul>
<h1><center><b>TeraShare</b></center></h1>
<h5><b>Sign in</b></h5>
<br><br>
</div>

<div class=form>

	<form class="w3-container w3-card-8" method="post" action="login.php">
            
                <h2 >Login</h2>
				<center><p>
                <label class="w3-label w3-validate" >Email<sup>*</sup></label>: <input class="w3-input" style="width:90%" type="text" name="email" default="email" placeholder="email" value="<?php if ($_SESSION["email"]){echo $_SESSION["email"];} ?>"><!--@iitgn.ac.in--><br>   
                
                <?php                
                if ($_SESSION["emailexists"] == "NO")
                {                   
                   
                        echo "<p class='alert'>Email id not signed up!</p> <br>";                                
                    
                }
                ?>               
					</p>
		</center>
                
                <center><p>               
                <label class="w3-label w3-validate" >Password<sup>*</sup></label> <input style="width:90%" class="w3-input"  type="password" name="password" default="password" placeholder="password" value="<?php if ($_SESSION["password"]){echo $_SESSION["password"];} ?>"><br>
                
                <br>
               </p></center>
                <p>* mandatory fields</p>
                <center><p><input class="w3-btn w3-section w3-blue w3-ripple"  type="submit" name="submit_btn" value="login"></p></center>
            
        </form>
		</div>
		<br><br><br>
        <footer style="background-color:#0000FF;">
			<h6>Page Developed and Maintained by <b>Team TeraShare</b></h6>
		<h6>Contact information: <a href="mailto:terashare@iitgn.ac.in">terashare@iitgn.ac.in</a>.</h6>
			<br>
</footer>
    
    </body>

</html>
