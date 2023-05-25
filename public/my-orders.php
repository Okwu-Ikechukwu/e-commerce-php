<?php
  include("../includes/functions.php");
  include("../includes/header.php");
  include('authenticate.php');
?>
<div class="all">
    <div class="container-fluid">
         <center>
           <img class="img-fluid" src="../asset/img/add.gif" alt="">
         </center>
       </div>
        <div>
        <?php include("../includes/navbar.php") ?>
       </div>
            <div class="container-fluid py-3 bg-light shadow">
                 <h6 class="text-black">
                    <a class="text-black text-decoration-none" href="index.php">
                        Home /
                        </a>
                        <a class="text-black text-decoration-none" href="my-orders.php">
                        My Orders
                    </a>
                </h6>
            </div>
            <div class="container py-5">
                <div class="card card-body shadow">
                    <div class="row">
                         <div class=" col-md-12 py-2 px-2 table-responsive">
                            <table id="table" class="table table-bordered table-striped ">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Tracking No</th>
                                        <th>Price</th>
                                        <th>Date</th>
                                        <th>View</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                    $orders = getOrders();

                                    if (mysqli_num_rows($orders) > 0) 
                                    {
                                        foreach ($orders as $item) {
                                            ?>
                                                <tr>
                                                    <td><?= $item['id'] ?></td>
                                                    <td><?= $item['tracking_no'] ?></td>
                                                    <td><?= $item['total_price'] ?></td>
                                                    <td><?= $item['created_at'] ?></td>
                                                    <td>
                                                        <a href="view-order.php?t=<?= $item['tracking_no']; ?>" id="btn3" class="btn text-white">View details</a>
                                                    </td>
                                                </tr>
                                            <?php
                                        }
                                    } else{
                                        ?> 
                                           <tr>
                                              <td colspan="5" class="py-5" >
                                              <center>
                                                    <h3>No Order has been made by this user</h3>
                                                </center></td>
                                                
                                            </tr>
                                        <?php
                                        
                                    } 
                                 ?>
                                </tbody>
                            </table>               
                        </div> 
                    </div>
                </div>
            </div>

<br><br><br><br><br>


</div>
<?php  include("../includes/footer.php")  ?>