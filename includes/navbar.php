
<?php 
 $page1 = substr($_SERVER['SCRIPT_NAME'], strrpos($_SERVER['SCRIPT_NAME'],"/")+1);
?>

<div class="container-fluid text-center sell py-2">
    



    <?php
        
        if(isset($_SESSION['auth']))
          {
           ?>

             <?php 
            if(isset($_SESSION['auth_user']))
            {
               $userId = $_SESSION['auth_user']['user_id'];
               $select_query = mysqli_query($con, "SELECT * FROM wishlist WHERE user_id='$userId'") or die('query failed');
               $row_count = mysqli_num_rows($select_query);
            }
               ?>
                <span id="sell" class="fs-5 fw-bold">Sell on Ecom</span>
                <h5 class="float-end text-align-middle">
                         <a href="cart.php" id="wishlist" style="text-decoration:none;color:#000;"> Wishlist</a> 
                      <span class=" " style="padding: 0 0.9rem 0.1rem 0.9rem; border-radius:3rem;text-decoration:none; color:#000;background-color:#f68b1e;"><i class="fa fa-shopping-cart me-1"></i><?php echo $row_count; ?></span>
                </h5>
           <?php
          }
          else 
          {
           ?>
               <span id="sell" class="fs-5 fw-bold">Sell on Ecom</span>
           <?php
          }
     
     
     
     ?>
</div>

<nav id="nav" class="navbar navbar-expand-lg bg-light  navbar-light shadow py-3">
  <div class="container-fluid">
    <a id="navbar-brand" class="navbar-brand" href="index.php"><h1 id="h1">Ecom</h1></a>
    <span id="bar" class="fs-3 "><a  type="button" class="text-black" data-bs-toggle="offcanvas" data-bs-target="#demo"><i class="fa fa-bars"></i></a></span>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <form method="GET" action="../public/search.php" id="search" class=" d-flex">
        <input  class="form-control me-2" type="text" name="search" required value="<?php  if(isset($_GET['search'])){echo $_GET['search'] ;}  ?>" placeholder="Search products">
        <button id="btn1" class="btn " type="submit">Search</button>
      </form>
      <ul class="navbar-nav text-white  mb-2 ">
        <li class="nav-item ">
          <a class="nav-link <?= $page1 == "index.php"? 'active':'';  ?>"  href="index.php">Home</a>
        </li>
        <?php
        
           if(isset($_SESSION['auth']))
             {
              ?>

                  <?php 


                    if(isset($_SESSION['auth_user']))
                    {
                      $userId = $_SESSION['auth_user']['user_id'];
                      $select_query = mysqli_query($con, "SELECT * FROM carts WHERE user_id='$userId'") or die('query failed');
                      $row_count = mysqli_num_rows($select_query);
                    }
                  ?>

                <li class="nav-item ">
                  <a class="nav-link <?= $page1 == "cart.php"? 'active':'';  ?>"  href="cart.php">Cart
                    <span id="car"><i id="car1" class="fa fa-shopping-cart me-1"></i><?php echo $row_count; ?></span>
                  </a>
                </li>
                <li class="nav-item dropdown">
                <a style="color: #f68b1e;"  class="nav-link dropdown-toggle"  href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown">
                 <?= $_SESSION['auth_user']['name']; ?>
                </a>
                    <ul class="dropdown-menu text-center bg-black" aria-labelledby="navbarDropdownMenuLink">
                    <li><button id="btn1" class="btn btn-primary mb-2"><a id="log" href="my-orders.php">My orders</a></button></li>
                      <li><button id="btn1" class="btn btn-primary"><a id="log" href="logout.php">logout</a></button></li>
                    </ul>
                </li>
              <?php
             }
             else 
             {
              ?>
                  <li class="nav-item">
                    <a  class="nav-link <?= $page1 == "register.php"? 'active':'';  ?>" href="register.php">Register</a>
                  </li>
                  
                  <li class="nav-item">
                    <a  class="nav-link <?= $page1 == "login.php"? 'active ':'';  ?>" href="login.php">Login</a>
                  </li>  
              <?php
             }
        
        
        
        ?>
      </ul>
     
    </div>
  </div>
</nav>