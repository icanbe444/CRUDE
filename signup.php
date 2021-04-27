<?php

session_start();

        include("connection.php");
        include("functions.php");

       if($_SERVER['REQUEST_METHOD'] == "POST")
       {

            $user_name = $_POST['user_name'];
            $password = $_POST['password'];

            if(!empty($user_name) && !empty($password) && !is_numeric($user_name)) 
            {
                $user_id = random_num(20);
                $query = "insert into users (user_id,user_name,password) values('$user_id','$user_name','$password')";
                
                mysqli_query($con, $query);

                header("Location: login.php");
                die;
            }else
            {
                echo "Please enter some valid information";

            }



            

       }


?>



<!DOCTYPE html>

<html>
<tittle>Signup Page</tittle>



<body>

<form method="post">

<input type="text" name="user_name" placeholder="enter your username" ><br>
<input type="password" name="password" placeholder="enter your password" ><br>
<input type="submit" value="signup"><br>

<a href="login.php">Click to login</a>






</form>






</body>





</html>
