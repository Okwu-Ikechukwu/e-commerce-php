<?php
include('../includes/functions.php');

if (isset($_SESSION['auth'])) 
{
    if($_SESSION['role_as'] != 1)
    {
        redirect("../public/index.php", "You are not authorised to access this page");
    
    }
}
else
{
    redirect("../public/login.php", "Login to continue");
}


?>