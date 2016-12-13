<?php
    session_start();
    //connecting to database
    $db_username = "root";
    $db_password = "";
    $db = "names";   $db=mysqli_connect("localhost",$db_username,$db_password,$db) or die("Failed to connect to databse".mysql_error());
    
$_SESSION["email_entered"] = NULL;
$_SESSION["roll_entered"] = NULL;
$_SESSION["course_entered"] = NULL;
$_SESSION["password_entered"] = NULL;
$_SESSION["password2_entered"] = NULL;
$_SESSION["user_loggedin"] = NULL;
$_SESSION["passwords_equal"] = NULL;

$_SESSION["email"] = NULL;
$_SESSION["name"] = NULL;
$_SESSION["roll"] = NULL;
$_SESSION["course"] = NULL;
$_SESSION["password"] = NULL;
$_SESSION["password2"] = NULL;

    
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
        
        
    if (($email == NULL)||($roll==NULL)||($course == NULL)||($password==NULL)||($password2 == NULL))
    {
        if (($email == NULL))
        {
            $_SESSION["email_entered"] = "NO";
        }
        else
        {
            $_SESSION["email_entered"] = "YES";
        }
        if (($roll == NULL))
        {
            $_SESSION["roll_entered"] = "NO";
        }
        else
        {
            $_SESSION["roll_entered"] = "YES";
        }
        if (($course == NULL))
        {
            $_SESSION["course_entered"] = "NO";
        }
        else
        {
            $_SESSION["course_entered"] = "YES";
        }
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
        if (($password2 == NULL))
        {
            $_SESSION["password2_entered"] = "NO";
        }
        else
        {
            $_SESSION["password2_entered"] = "YES";
        }
        
    }
        else
            {
    if (($password == $password2))
    {
        $_SESSION["passwords_equal"] = "YES";
    
        $new_user = "INSERT INTO registered_users(email,name,roll,course,password,status) VALUES('$email','$name','$roll','$course','$password','0') ";
        mysqli_query($db,$new_user) or die("Trouble signing up".mysql_error());
        header("Location: welcome.php");
    }
                else
                {
                    $_SESSION["passwords_equal"] = "NO";
                }
            }
    }

    
       
?>

<!DOCTYPE>
<html>
    <head>
        <title>Sign Up for TeraShare</title>
    </head>
    <link type="text/css" rel="stylesheet" href="css/css_for_signup.css">
    <body>
        <ul id="header">
              <li><a class="alert" href="#SignUp">Sign Up</a></li>
              <li><a href="#ContactUs">Contact Us</a></li>
              <li><a href="#FAQ">FAQs</a></li>
              <li><a href="#Login">Login</a></li>
            </ul>
        
        <div class="navigationbar">
      <h1>Tera share</h1>
	  <h4>Welcomes you</h4>
    </div><br><br>
        
        
        <form method="post" action="signuprush.php">
            
            <fieldset>
                <h2 >Signup</h2>
                <label>Email<sup>*</sup></label>: <input type="text" name="email" default="email" placeholder="email" value="<?php if ($_SESSION["email"]){echo $_SESSION["email"];} ?>">@iitgn.ac.in<br>   
                
                <?php                
                if (($_SESSION["email_entered"] == "NO")&&(isset($_POST["submit_btn"])))
                {
                    echo "<p class='alert'>Please enter email id</p> <br>";
                }
                ?>               
                
                
                <label>Name</label> <input type="text" name="name" default="Team TeraShare" placeholder="Team TeraShare" value="<?php if ($_SESSION["name"]){echo $_SESSION["name"];} ?>"><br>
                <label>Roll-no<sup>*</sup></label> <input type="text" name="roll" default="11111111" placeholder="11111111" value="<?php if ($_SESSION["roll"]){echo $_SESSION["roll"];} ?>"><br>
                
                <?php                
                if (($_SESSION["roll_entered"] == "NO")&&(isset($_POST["submit_btn"])))
                {
                    echo "<span class='alert'>Please enter roll no. </span><br>";
                }
                ?>  
                
                <label>Course<sup>*</sup></label><select name="course">
                    <option value="btech">btech</option>
                    <option value="mtech">mtech</option>
                    <option value="msc">msc</option>
                    <option value="ma">ma</option>
                    <option value="phd">phd</option>
                    <option value="alumni">alumni</option>
                </select><br>
                
                <?php                
                if (($_SESSION["course_entered"] == "NO")&&(isset($_POST["submit_btn"])))
                {
                    echo "<span class='alert'>Please select course</span> <br>";
                }
                ?>  
                
                <label>Password<sup>*</sup></label> <input type="password" name="password" default="password" placeholder="password" value="<?php if ($_SESSION["password"]){echo $_SESSION["password"];} ?>"><br>
                
                <?php                
                if (($_SESSION["password_entered"] == "NO")&&(isset($_POST["submit_btn"])))
                {
                    echo "<span class='alert'>Please enter password </span><br>";
                }
                ?><br>
                <label>Reenter password<sup>*</sup></label> <input type="password" name="password2" default="password" placeholder="password" value="<?php if ($_SESSION["password"]){echo $_SESSION["password"];} ?>"><br>
                
                <?php                
                if (($_SESSION["password2_entered"] == "NO")&&(isset($_POST["submit_btn"])))
                {
                    echo "<span class='alert'>Please reenter password </span> <br>";
                }
                ?>  
                
                <?php
                
                if (($_SESSION["password2_entered"] == "YES")&&($_SESSION["password_entered"] == "YES"))
                {
                    if ($_SESSION["passwords_equal"] == "NO")
                    {
                        echo "<span class='alert'>Passwords not same. Please reenter password </span><br>";
                    }
                }
                ?>
                <p>* manadtory fields</p>
                <center><input type="submit" name="submit_btn" value="register"></center>
            </fieldset>
            
        </form>
        <footer>
<h3>Page Developed and Maintained by <b>Team TeraShare</b></h3>
</footer>
    
    </body>

</html>
