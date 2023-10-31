<?php include('../config/constants.php'); ?>

<!DOCTYPE html>
<html>
<head>
    
    <title> Login- Food Order System </title>
  
    <link rel='stylesheet' type='text/css'  href='../css/admin.css'>
    
</head>
<body>
    

<div class="login">
    <h1 class="text-center">Login</h1>
    <br> <br>
    <?php
    if(isset($_SESSION['login'])){
        
        echo $_SESSION['login'];
        unset($_SESSION['login']);
    }
     if(isset($_SESSION['no-login-message']))
     {
        echo $_SESSION['no-login-message'];
        unset($_SESSION['no-login-message']);
     }
    ?>

    <!--login form starts her-->
    <form action="" method="POST" class="text-center">
        Username: <br>
        <input type="text" name="username" placeholder="Enter Username"> <br> <br>
        Password: <br>
        <input type="password" name="password"placeholder="Enter Password">
       <br><br>
        <input type="submit" name="submit" value="Login" class="btn-primary">
    </form>
 <br>

    <p class="text-center">Created By - <a href="https://www.facebook.com/profile.php?id=100012095255671"> Anuvab Saha </a> </p>
</div> 

    
</body>
</html>

<?php

// check whether the submit  button is  clicked or not
if(isset($_POST['submit']))
{
    //process to login
    //1. get the data from login form
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    //sql check whehter the user with username and password exists or not
    $sql = "SELECT * FROM tbl_admin WHERE username='$username'AND password='$password'";

    //3.Execute the query
    $res = mysqli_query($conn, $sql);

    //4.count rows to check whether the user exist or not
    $count = mysqli_num_rows($res);

    if($count==1){

        //user available and login succes
        $_SESSION['login'] = "<div class='success'>Login Succesful.</div>";
        $_SESSION['user'] = $username; //to check whether the  user is logged in or not and logout will unset it

        //Redirect to homepage /dashboard
        header('location:'.SITEURL.'admin/');

    }
    else{

        //user not available and login fail
        $_SESSION['login'] = "<div class='error text-center'>Username and Password did not match.</div>";
        //Redirect to homepage /dashboard
        header('location:'.SITEURL.'admin/login.php');
    }

}