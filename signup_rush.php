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
    
    if (isset($_POST["submit_btn"]))
    {
        $email = $_POST["email"];
        $name = $_POST["name"];
        $roll = $_POST["roll"];
        $course = $_POST["course"];
        $password = $_POST["password"];
        $password2 = $_POST["password2"];

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
        echo "You have successfully signed up!";
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
    <body>
        <form method="post" action="signuprush.php">
            <h1>SIGN UP!</h1>
            <fieldset>
                Email*: <input type="text" name="email" default="email" placeholder="email">@iitgn.ac.in<br>   
                
                <?php                
                if (($_SESSION["email_entered"] == "NO")&&(isset($_POST["submit_btn"])))
                {
                    echo "Please enter email id <br>";
                }
                ?>               
                
                
                Name: <input type="text" name="name" default="Team TeraShare" placeholder="Team TeraShare"><br>
                Roll No*: <input type="text" name="roll" default="11111111" placeholder="11111111"><br>
                
                <?php                
                if (($_SESSION["roll_entered"] == "NO")&&(isset($_POST["submit_btn"])))
                {
                    echo "Please enter roll no. <br>";
                }
                ?>  
                
                Course*: <select name="course">
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
                    echo "Please select course <br>";
                }
                ?>  
                
                Password*: <input type="password" name="password" default="password" placeholder="password">
                
                <?php                
                if (($_SESSION["password_entered"] == "NO")&&(isset($_POST["submit_btn"])))
                {
                    echo "Please enter password <br>";
                }
                ?><br>
                Re-enter password*: <input type="password" name="password2" default="password" placeholder="password"><br>
                
                <?php                
                if (($_SESSION["password2_entered"] == "NO")&&(isset($_POST["submit_btn"])))
                {
                    echo "Please reenter password <br>";
                }
                ?>  
                
                <?php
                
                if (($_SESSION["password2_entered"] == "YES")&&($_SESSION["password_entered"] == "YES"))
                {
                    if ($_SESSION["passwords_equal"] == "NO")
                    {
                        echo "Passwords not same. Please reenter password <br>";
                    }
                }
                ?>
                *Mandatory fields
            </fieldset>
            <input type="submit" name="submit_btn" value="register">
        </form>
    
    </body>

</html>
