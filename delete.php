<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="wIDth=device-wIDth, initial-scale=1.0">
    <title>delete</title>
</head>
<body>
<?php 
    $connection = mysqli_connect("localhost","root","","registration");
    if ($connection){
        echo "Database connected";
   }
   else{
      die("Database not connected");
   }
   ?>
   <?php
        if(isset($_POST['submit'])){
            $ID = $_POST['ID'];
            $query="delete from data ";
            $query.="where ID = '$ID'";
            $result=mysqli_query($connection,$query);
            if(!$result){
                die("Query failed".mysqli_query($connection));
            }
            else{
                echo "<br/> $ID Record deleted";
            }
       }
   ?>
   <h1>delete record</h1>
   <form action="delete.php" method="post">
        <select name="ID">
        <?php
            $query = "SELECT * FROM DATA";
            $result = mysqli_query($connection,$query);
            if(!$result){
                die("query failed".mysqli_error($connection));
            }
            else
            {
                echo "Result is working <br/>";
                while($row=mysqli_fetch_assoc($result)){
                $ID=$row['ID'];
                echo"<option value='$ID'>$ID</option>";
                }
            }
        ?>
        </select>
        <input type="submit" value="Delete" name="submit">
    </form>
</body>
</html>