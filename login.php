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
                
                $query = "select * from users where user_name = '$user_name' limit 1";
                $result = mysqli_query($con, $query);

                if($result)
                {
                    if($result && mysqli_num_rows($result) > 0)
    {
                    $user_data = mysqli_fetch_assoc($result);
                    if($user_data['password'] === $password)
                    {
                        $_SESSION['user_id'] = $user_data['user_id'];
                        header("Location: index.php");
                        die;

                    }
    }

                }

                echo "Please enter some valid information";
                
            }else
            {
                echo "Please enter some valid information";

            }



            

       }


?>





<!DOCTYPE html>

<html>
<tittle>Login Page</tittle>

<head>Login</head>

<body>

<form method="post">

<input type="text" name="user_name" placeholder="enter your username" ><br>
<input type="password" name="password" placeholder="enter your password" ><br>
<input type="submit" value="login"><br>

<a href="signup.php">Click to signup</a><br>
<a href="forget-password.php">Forget Password</a>






</form>






</body>





</html>
