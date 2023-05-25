<?php
session_start();
include('../includes/config.php');

if(isset($_SESSION['auth']))
{
    if (isset($_POST['scope'])) 
    {
        $scope = $_POST['scope'];
        switch ($scope)
        {
           case "add2":
            
            $prod_id = $_POST['prod_id'];

            $user_id = $_SESSION['auth_user']['user_id'];

            $query = "SELECT * FROM carts WHERE id='$prod_id'";
            $res = mysqli_query($con, $query);
            $rows = mysqli_fetch_assoc($res);
            $prod_id = $rows['prod_id'];
            $prod_qty = $rows['prod_qty'];
            $md = date('Y-m-d h:i:s');

            $chk_existing_wishlist = "SELECT * FROM wishlist WHERE prod_id='$prod_id' AND user_id='$user_id' ";
            $chk_existing_wishlist_run = mysqli_query($con, $chk_existing_wishlist);

            if (mysqli_num_rows($chk_existing_wishlist_run) > 0) 
              {
                 echo "existing";
              }
              else
              {     
                 $sql = "INSERT into wishlist(user_id, prod_id, prod_qty, created_at)VALUES('$user_id', '$prod_id', '$prod_qty', '$md')";
                 $res2 = mysqli_query($con, $sql);
    
                if ($res2) 
                {
                
                 $sql2 = "DELETE FROM carts WHERE prod_id = '$prod_id' AND user_id = '$user_id'";
                 $res3 = mysqli_query($con, $sql2);
                   if($res3){
                    echo 201;
                   } 
                }
                else
                {
                echo 500;
                }
              }
              break;
        

            case"delete2":
                $prod_id = $_POST['prod_id'];

                $user_id = $_SESSION['auth_user']['user_id'];

                $chk_existing_wishlist = "SELECT * FROM wishlist WHERE prod_id='$prod_id' AND user_id='$user_id' ";
                $chk_existing_wishlist_run = mysqli_query($con, $chk_existing_wishlist);
    
                if (mysqli_num_rows($chk_existing_wishlist_run) > 0) 
                {
                    $delete_query = "DELETE FROM wishlist WHERE prod_id='$prod_id' AND user_id = '$user_id'";
                    $delete_query_run = mysqli_query($con, $delete_query);

                    if ($delete_query_run) 
                    {
                        echo 200; 
                    }
                    else
                    {
                    echo "Something went wrong"; 
                    }
                }
                else
                {
                    echo "Something went wrong"; 
                }

                break;
                
                case "add3":
            
                    $prod_id = $_POST['prod_id'];
        
                    $user_id = $_SESSION['auth_user']['user_id'];
        
                    $query = "SELECT * FROM wishlist WHERE id='$prod_id'";
                    $res = mysqli_query($con, $query);
                    $rows = mysqli_fetch_assoc($res);
                    $prod_id = $rows['prod_id'];
                    $prod_qty = $rows['prod_qty'];
                    $md = date('Y-m-d h:i:s');
        
                    $chk_existing_wishlist = "SELECT * FROM carts WHERE prod_id='$prod_id' AND user_id='$user_id' ";
                    $chk_existing_wishlist_run = mysqli_query($con, $chk_existing_wishlist);
        
                    if (mysqli_num_rows($chk_existing_wishlist_run) > 0) 
                      {
                         echo "existing";
                      }
                      else
                      {     
                         $sql = "INSERT into carts(user_id, prod_id, prod_qty, created_at)VALUES('$user_id', '$prod_id', '$prod_qty', '$md')";
                         $res2 = mysqli_query($con, $sql);
            
                        if ($res2) 
                        {
                        
                         $sql2 = "DELETE FROM wishlist WHERE prod_id = '$prod_id' AND user_id = '$user_id'";
                         $res3 = mysqli_query($con, $sql2);
                           if($res3){
                            echo 201;
                           } 
                        }
                        else
                        {
                        echo 500;
                        }
                      }
                      break;

            default:
            echo 600;
        }
    }
}
else
{
    echo 401;
}
?>