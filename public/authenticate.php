<?php


if (!isset($_SESSION['auth'])) 
{
     redirect("login.php","Please Login to continue");
}

?>