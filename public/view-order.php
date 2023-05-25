<?php
  include("../includes/functions.php");
  include("../includes/header.php");
  include('authenticate.php');

  if (isset($_GET['t'])) {
     $tracking_no = $_GET['t'];

     $orderData = checkTrackingNoValid($tracking_no);
     if(mysqli_num_rows($orderData) < 0){

          echo "Something went wrong";

     }
  }else
  {
    echo "Something went wrong";
  }
  
  $data = mysqli_fetch_array($orderData);
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
            My Orders /
        </a>
        <a class="text-black text-decoration-none" href="view-order.php">
            View Order
        </a>
    </h6>
</div>

<div class="container py-5">
    <div class="card card-body shadow">
        <div class="">
            <div class="row">
                <div class=" col-md-12 ">
                    <div class="card">
                        <div class="card-header bg-black text-white">
                
                          <span class="fs-4">  Order Details </span>
                          <a href="my-orders.php" id="btn1" class="btn float-end algin-middle text-white"> <i class="fa fa-reply"></i> Back</a>

                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <h4>Delivery Details</h4>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-12 mb-2">
                                            <label class="fw-bold">Name</label>
                                            <div class="border p-1">
                                                <?= $data['name']; ?>
                                           </div>
                                        </div>
                                        <div class="col-md-12 mb-2">
                                            <label class="fw-bold">Email</label>
                                            <div class="border p-1">
                                                <?= $data['email']; ?>
                                           </div>
                                        </div>
                                        <div class="col-md-12 mb-2">
                                            <label class="fw-bold">Phone</label>
                                            <div class="border p-1">
                                                <?= $data['phone']; ?>
                                           </div>
                                        </div>
                                        <div class="col-md-12 mb-2">
                                            <label class="fw-bold">Tracking No</label>
                                            <div class="border p-1">
                                                <?= $data['tracking_no']; ?>
                                           </div>
                                        </div>
                                        <div class="col-md-12 mb-2">
                                            <label class="fw-bold">Address</label>
                                            <div class="border p-1">
                                                <?= $data['address']; ?>
                                           </div>
                                        </div>
                                        <div class="col-md-12 mb-2">
                                            <label class="fw-bold">Pin code</label>
                                            <div class="border p-1">
                                                <?= $data['pincode']; ?>
                                           </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <h4>Order Details</h4>

                                    <hr>
                                    
                                    <table class="table">
                                        <thead>
                                            <tr id="tr">
                                                <th id="th">Product</th>
                                                <th id="th">Price</th>
                                                <th id="th">Quantity</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                      
                                        <?php
                                            
                                            $userId = $_SESSION['auth_user']['user_id'];

                                            $order_query = "SELECT o.id as oid, o.tracking_no, o.user_id, oi.*, oi.qty as orderqty,
                                            p.* FROM  orders o, order_items oi, products p WHERE o.user_id='$userId'
                                            AND oi.order_id=o.id AND p.id=oi.prod_id AND o.tracking_no='$tracking_no' ";

                                            $order_query_run = mysqli_query($con, $order_query);

                                            if (mysqli_num_rows($order_query_run) > 0) 
                                            {
                                                foreach ($order_query_run as $item) {
                                                    ?>
                                                         <tr>
                                                              <td class="align-middle" id="td">
                                                                    <img src="../uploads/<?= $item['image']; ?>" width="50px" height="50px" alt="<?= $item['name']; ?>">
                                                                   <?= $item['name']; ?>
                                                              </td>
                                                              <td class="align-middle" id="td1">
                                                              <i class="fa fa-dollar-sign"></i><?= $item['price']; ?>
                                                              </td>
                                                              <td class="align-middle" id="td2">
                                                                  X<?= $item['orderqty']; ?>
                                                              </td>
                                                         </tr>
                                                    <?php    
                                                }
                                            }
                                        ?>
                                        </tbody>
                                    </table>

                                    <hr>

                                    <h5 id="h5">Total Price : <span class="float-end fw-bold"><i class="fa fa-dollar-sign me-1"></i><?= $data['total_price'] ?></span></h5>
                                       
                                    <hr>

                                    <label class="fw-bold">Payment Mode</label>
                                    <div class="border p-1 mb-3">
                                        <?= $data['payment_mode'] ?>
                                    </div>
                                    <label class="fw-bold">Status</label>
                                    <div class="border p-1 mb-3">
                                        <?php
                                             if ($data['status'] == 0) 
                                             {
                                                  echo "Under Process";

                                             }else if ($data['status'] == 1) {

                                                echo "Completed";

                                             }else if ($data['status'] == 2){
                                                 echo "Cancelled";
                                             }
                                         ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> 
             </div>
        </div>
    </div>
</div>
<br><br><br><br><br>
</div>
<?php  include("../includes/footer.php")  ?>