<?php

session_start();
include("functions.php");
require_once('config.php');

if (isset($_POST['submit'])) {
     $name = mysqli_real_escape_string($con,$_POST['name']);
     $phone = mysqli_real_escape_string($con,$_POST['phone']);
     $email = mysqli_real_escape_string($con,$_POST['email']);
     $password = mysqli_real_escape_string($con,$_POST['password']);
     $cpassword = mysqli_real_escape_string($con,$_POST['cpassword']);

     $check_email_query = "SELECT email FROM users WHERE email='$email' ";
     $check_email_query_run = mysqli_query($con, $check_email_query);

     if(mysqli_num_rows($check_email_query_run) > 0)
     {

        redirect(" ../public/register.php", "Email already Exist");
        
     }
     
     else
    {

        if ($password == $cpassword) {
            $insert_query = "INSERT INTO users (name,email,phone,password) VALUES ('$name', '$email', '$phone', '$password')" ;
            $insert_query_run = mysqli_query($con,  $insert_query);
             
            if($insert_query_run)
            {
                redirect(" ../public/login.php", "Registered Successfully");
   
            }
            else{
                redirect("../public/register.php", "Something went wrong");
            }
   
        } 
        else
        {
            redirect(" ../public/register.php", "password do not match");
        }

    }

}

else if (isset($_POST['login'])) {
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);


    $login_query = "SELECT *  FROM users WHERE email = '$email' AND password = '$password'";
    $login_query_run = mysqli_query($con, $login_query);

    if (mysqli_num_rows($login_query_run) > 0) 
    {
        $_SESSION['auth']  = true;

        $userdata = mysqli_fetch_array($login_query_run);
        $userid = $userdata['id'];
        $username = $userdata['name'];
        $useremail = $userdata['email'];
        $role_as = $userdata['role_as'];
 
        $_SESSION['auth_user'] = [
            'user_id' => $userid,
            'name' => $username,
            'email' => $useremail
        ];

        $_SESSION['role_as'] = $role_as;

        if ($role_as == 1) 
        {
            redirect(" ../admin/index.php", "Welcome To Dashboard");
        }
        else
        {
            redirect("../public/index.php", "Logged In Successsfully");

        }  
    }
    else
    {
           redirect(" ../public/login.php", "Invalid Credentials");
    }
}

else {
    
}
?>