<?php 
session_start();
include('config.php');

function getAll($table)
{
  global $con;
  $query = "SELECT * FROM $table";
   return  $query_run = mysqli_query($con, $query);
}


function getByID($table, $id)
{
  global $con;
  $query = "SELECT * FROM $table WHERE id='$id' ";
   return  $query_run = mysqli_query($con, $query);
}


function getAllActive($table)
{
  global $con;
  $query = "SELECT * FROM $table WHERE status='0' ";
   return  $query_run = mysqli_query($con, $query);
}

function getAllTrending()
{
  global $con;
  $query = "SELECT * FROM products WHERE trending='1' LIMIT 13";
   return  $query_run = mysqli_query($con, $query);
}

function getAllnonTrending()
{
  global $con;
  $query = "SELECT * FROM products WHERE trending='1' LIMIT 100 ";
   return  $query_run = mysqli_query($con, $query);
}

function getSlugActive($table, $slug)
{
  global $con;
  $query = "SELECT * FROM $table WHERE slug='$slug' AND status='0' LIMIT 1 ";
   return  $query_run = mysqli_query($con, $query);
}


function getProdByCategory($category_id)
{
  global $con;
  $query = "SELECT * FROM products WHERE category_id='$category_id' AND status='0' ";
   return  $query_run = mysqli_query($con, $query);
}

function getIDActive($table, $id)
{
  global $con;
  $query = "SELECT * FROM $table WHERE id='$id' AND status='0' ";
   return  $query_run = mysqli_query($con, $query);
}

function getCartItems()
{
   global $con;
   $userId = $_SESSION['auth_user']['user_id'];
   $query = "SELECT c.id as cid, c.prod_id, c.prod_qty, p.id as pid, p.name, p.image, p.selling_price 
                FROM carts c, products p WHERE c.prod_id=p.id AND c.user_id='$userId' ORDER BY c.id DESC ";
                 return  $query_run = mysqli_query($con, $query);
}

function getWishlistItems()
{
   global $con;
   $userId = $_SESSION['auth_user']['user_id'];
   $query = "SELECT w.id as wid, w.prod_id, w.prod_qty, p.id as pid, p.name, p.image, p.selling_price 
                FROM wishlist w, products p WHERE w.prod_id=p.id AND w.user_id='$userId' ORDER BY w.id DESC ";
                 return  mysqli_query($con, $query);
}

function getOrders()
{
   global $con;
   $userId = $_SESSION['auth_user']['user_id'];
   $query = "SELECT * FROM orders WHERE user_id='$userId' ORDER BY id DESC ";
   return $query_run = mysqli_query($con, $query);
}

function checkTrackingNoValid($trackingNo)
{
   global $con;
   $userId = $_SESSION['auth_user']['user_id'];
   $query = "SELECT * FROM orders WHERE tracking_no='$trackingNo' AND user_id= '$userId' ";
   return mysqli_query($con, $query);

}

function checkTrackingNo($trackingNo)
{
   global $con;
   $query = "SELECT * FROM orders WHERE tracking_no='$trackingNo' ";
   return mysqli_query($con, $query);

}

function getAllOrders()
{
  global $con;
  $query = "SELECT * FROM orders WHERE status='0' ";
   return  $query_run = mysqli_query($con, $query);
}



function getOrderHistory()
{
  global $con;
  $query = "SELECT * FROM orders WHERE status !='0' ";
   return  $query_run = mysqli_query($con, $query);
}


function redirect($url, $message)
{
    $_SESSION['message'] = $message;
    header('Location: '.$url);
    exit();
}

?>