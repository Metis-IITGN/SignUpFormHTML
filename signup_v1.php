<?php
    session_start();
    //connecting to database
    $db_username = "root";
    $db_password = "";
    $db = "names";   $db=mysqli_connect("localhost",$db_username,$db_password,$db) or die("Failed to connect to databse".mysql_error());
    

$_SESSION["user_loggedin"] = NULL;
$_SESSION["passwords_equal"] = NULL;

$_SESSION["email"] = NULL;
$_SESSION["name"] = NULL;
$_SESSION["roll"] = NULL;
$_SESSION["course"] = NULL;
$_SESSION["password"] = NULL;
$_SESSION["password2"] = NULL;
$_SESSION["loggedin"] = "no";
$_SESSION["emailexists"] = NULL;

/*$_SESSION["loggedin"] = NULL;*/

    
    if (isset($_POST["submit_btn"]))
    {
        $email = $_POST["email"];
        $name = $_POST["name"];
        $roll = $_POST["roll"];
        $course = $_POST["course"];
        $password = $_POST["password"];
        $password2 = $_POST["password2"];
        
        $_SESSION["email"] = $email;
        $_SESSION["roll"] = $roll;
        $_SESSION["name"] = $name;
        $_SESSION["course"] = $course;
        $_SESSION["password"] = $password;
        $_SESSION["password2"] = $password2;
        
        
    
    if (($password == $password2))
    {
        $rows = mysqli_query($db,"SELECT * FROM registered_users WHERE email='{$email}'");
        $num = mysqli_num_rows($rows);
        if ($num > 0)
        {
            $_SESSION["emailexists"] = "yes";
        }
        else
        {
        $_SESSION["passwords_equal"] = "YES";
    
        $new_user = "INSERT INTO registered_users(email,name,roll,course,password,status) VALUES('$email','$name','$roll','$course','$password','0') ";
        mysqli_query($db,$new_user) or die("Trouble signing up".mysql_error());
        $_SESSION["loggedin"] = "yes";
        header("Location: welcome.php");
        }
    }
                else
                {
                    $_SESSION["passwords_equal"] = "NO";
                }
            }
    

    
       
?>

<!DOCTYPE>
<html>
    <head>
        <title>Sign Up for TeraShare</title>
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
		    width: 50%; 
		    margin: 2%
		}
		form
		{
			background-color: white;
		}
		h1
		{
			font-size: 2.8em;
			color: white;
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
    <!--<link type="text/css" rel="stylesheet" href="css/css_for_signup.css">-->
	<link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
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
		<h5><b>Sign Up!</b></h5>
		<br><br>
		</div>
        
        <div class="form">
        <form method="post" action="signuprush.php">
			<br>
            
            <fieldset style = "width: 75%; margin: 0px auto;padding:30px;">
                <h2 >Signup</h2>
				<center><p>
                <label class="w3-label w3-validate">E-Mail ID<sup>*</sup></label>: <input class="w3-input" type="text" name="email" default="email" placeholder="email" value="<?php if ($_SESSION["email"]){echo $_SESSION["email"];} ?>"  style="width:90%" required><!--@iitgn.ac.in-->   
                
                <?php                
                if ((isset($_POST["submit_btn"])))
                {
                   if ($_SESSION["emailexists"] == "yes")
               
                        echo "<p class='alert'>Email id already exists</p> <br>";             
                    
                    
                }
                ?>      
					</p></center>
                <center><p>
                
                <label  class="w3-label w3-validate">Name<sup>*</sup></label> <input class="w3-input" type="text" name="name" default="Team TeraShare" placeholder="Team TeraShare" value="<?php if ($_SESSION["name"]){echo $_SESSION["name"];} ?>"  style="width:90%" required>
					</p></center>
				
				<center><p>
                <label  class="w3-label w3-validate">Roll-no<sup>*</sup></label> <input class="w3-input" type="text" name="roll" default="11111111" placeholder="11111111" value="<?php if ($_SESSION["roll"]){echo $_SESSION["roll"];}  ?>" style="width:90%" required><br>
                
                
					</p>
				</center>
				
				
                <center><p>
                <label  class="w3-label w3-validate">Course<sup>*</sup></label><select name="course">
                    <option value="btech">btech</option>
                    <option value="mtech">mtech</option>
                    <option value="msc">msc</option>
                    <option value="ma">ma</option>
                    <option value="phd">phd</option>
                    <option value="alumni">alumni</option>
                </select><br>
                
               </p></center>
				
				<center><p>
                
                <label  class="w3-label w3-validate">Password<sup>*</sup></label> <input class="w3-input" type="password" name="password" default="password" placeholder="password" value="<?php if ($_SESSION["password"]){echo $_SESSION["password"];} ?>"><br>
                
                <br>
					</p></center>
				<center><p>
                <label  class="w3-label w3-validate">Reenter password<sup>*</sup></label> <input class="w3-input" type="password" name="password2" default="password" placeholder="password" value="<?php if ($_SESSION["password"]){echo $_SESSION["password"];} ?>"><br>
                
                
                <?php
                
                
                    if ($_SESSION["passwords_equal"] == "NO")
                    {
                        echo "<span class='alert'>Passwords not same. Please reenter password </span><br>";
                    }
                ?></p></center>
                <h5><center>*Mandatory fields</center></h5>
                <center><input  class="w3-btn w3-section w3-blue w3-ripple" type="submit" name="submit_btn" value="register"></center>
            </fieldset>
			<br>
            
        </form>
		</div>
        <footer style="background-color:#0000FF;">
		<br>
		<br>
		<br>
		<h6>Website maintained and Developed by <b>Team TeraShare</b> </h6>
		<h6>Contact information: <a href="mailto:terashare@iitgn.ac.in">terashare@iitgn.ac.in</a>.</h6>
		<br>
	</footer>
    
    </body>

</html>
