<html>
<body>
<form method="post" action="reportfile.php">
<h3>Query:</h3> <br>
   Select Your Query about the File:<br><br>
   <select name="query">
  <option value="emptyfile">Empty File</option>
  <option value="corruptfile">Corrupt File</option>
  <option value="repeatation">Repeated File</option>
  <option value="renamefile">Rename File</option>
  <option value="relocatefile">Relocate File</option>
   </select><br><br>
    
   <input type="submit" name="submit_button" value="Submit"><br> 
</form>
<?php
  session_start();
   if (isset($_POST["submit_button"]))
  {
   $query=$_POST["query"];
   $_SESSION["query"]=$query;
   $email=$_SESSION["email"];
   $storehome="querystore";
   $conn=new mysqli("localhost","root","",$storehome);
   $sql = "INSERT INTO users_query (Email,Query) VALUES ('$email','$query')";
    if ($conn->query($sql) === TRUE) 
       {    echo "Query submitted successfully";
            echo "<a href='welcomepage.php'> Back</a>"; } 
    else 
       {   echo "Error: " . $sql . "<br>" . $conn->error; }
            $conn->close();}

?>
</body>
</html>
