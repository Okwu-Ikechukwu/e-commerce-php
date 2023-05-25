<?php
include('../middleware/adminmiddleware.php');
include('includes/header.php'); 

?>
<style>
    #hov{
    transition: transform .5s ease;
  }
  #hov:hover{
    transform : scale(1.1);
  }

</style>
<div class="container py-5 mb-5">
    <div class="row">
        <div class="col-md-12">
            <div class="row mt-4">
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card" style="cursor: default;">
            <div class="card-header p-3 pt-2">
              <div class="icon icon-lg icon-shape bg-gradient-dark shadow-dark text-center border-radius-xl mt-n4 py-3 position-absolute">
                <i style="color: white; font-size:larger;" class="fa fa-user"></i>
              </div>
              <div class="text-end pt-1">
                <p class="text-sm mb-0 text-capitalize">Total no of Users</p>
                <?php
                  $userId = $_SESSION['auth_user']['user_id'];
                  $select_query = mysqli_query($con, "SELECT * FROM users") or die('query failed');
                  $row_count = mysqli_num_rows($select_query);
                 ?>
                <h4 class="mb-0"><?php echo $row_count; ?><h6>users</h6></h4>
              </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-3">
              <p class="mb-0"><span class="text-success text-sm font-weight-bolder">+55% </span>than last week</p>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card" id="hov">
             <a href="user.php"  class="text-dark">
                <div class="card-header p-3 pt-2">
                  <div class="icon icon-lg icon-shape bg-gradient-primary shadow-primary text-center border-radius-xl mt-n4 py-3 position-absolute">
                    <i style="color: white; font-size:larger;" class="fa fa-user"></i>
                  </div>
                  <div class="text-end pt-1">
                    <p class="text-sm mb-0 text-capitalize">Edit Users</p>
                    <h4 class="mb-0">Click  <h6>to edit users </h6></h4>
                  </div>
                </div>
                <hr class="dark horizontal my-0">
                <div class="card-footer p-3">
                  <p class="mb-0"><span class="text-success text-sm font-weight-bolder">+3% </span>than last month</p>
                </div>
             </a>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card " style="cursor: default;">
            <div class="card-header p-3 pt-2">
              <div class="icon icon-lg icon-shape bg-gradient-success shadow-success text-center border-radius-xl mt-n4 py-3 position-absolute">
              <i style="color: white; font-size:larger;" class="fa fa-calculator"></i>
              </div>
              <div class="text-end pt-1">
                <p class="text-sm mb-0 text-capitalize">Total No of products</p>
                <?php
                  $row_count = 0;
                  $select_query = "SELECT * FROM products";
                  $result2 = mysqli_query($con, $select_query);
                  while ($row2 = mysqli_fetch_assoc($result2)) {
                    $row_count += $row2['qty'];
                  }
                  $row_count = number_format($row_count);
                  
                 ?>
                <h4 class="mb-0"><?php echo $row_count; ?><h6>products</h6></h4>
              </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-3">
              <p class="mb-0"><span class="text-success text-sm font-weight-bolder">+2%</span> than yesterday</p>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6">
          <div class="card " style="cursor: default;">
            <div class="card-header p-3 pt-2">
              <div class="icon icon-lg icon-shape bg-gradient-info shadow-info text-center border-radius-xl mt-n4 py-3 position-absolute">
                  <i style="color: white; font-size:larger;" class="fa fa-calculator"></i>
              </div>
              <div class="text-end pt-1">
                <p class="text-sm mb-0 text-capitalize">Products sold</p>
                <?php
                  $row_count = 0;
                  $select_query = "SELECT * FROM order_items";
                  $result2 = mysqli_query($con, $select_query);
                  while ($row2 = mysqli_fetch_assoc($result2)) {
                    $row_count += $row2['qty'];
                  }
                  $row_count = number_format($row_count);
                  
                 ?>
                <h4 class="mb-0"><?php echo $row_count; ?> <h6>products</h6></h4>
              </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-3">
              <p class="mb-0"><span class="text-success text-sm font-weight-bolder">+5% </span>than yesterday</p>
            </div>
          </div>
        </div>
      </div>
        </div>    
    </div>
</div>

<br><br><br><br><br><br><br><br><br><br>
<br><br><br><br>
<?php include('includes/footer.php'); ?>