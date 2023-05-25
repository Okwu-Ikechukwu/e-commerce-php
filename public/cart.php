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
        <div id="mycartnav">
        <?php include("../includes/navbar.php") ?>
       </div>
            <div class="container-fluid py-3 bg-light shadow">
                 <h6 class="text-black">
                    <a class="text-black text-decoration-none" href="index.php">
                        Home /
                        </a>
                        <a class="text-black text-decoration-none" href="cart.php">
                        Cart
                    </a>
                </h6>
            </div>
            <div class="container mt-5 ">
                <h4>Shopping Cart</h4>
                    <hr>
                <div class="card card-body shadow">
                    <div class="row">
                    <div class=" col-md-12">
                        <div id="mycart">
                         <?php $items = getCartItems(); 
                            
                            if (mysqli_num_rows($items) > 0) 
                            {
                                ?>
                                <div id="row" class="row py-2 align-items-center">
                                    <div class="col-md-5">
                                        <h5><b>Product</b></h5>
                                    </div>
                                    <div class="col-md-2">
                                        <h5><b>Price</b></h5>
                                    </div>
                                    <div class="col-md-2">
                                        <h5><b>Quantity</b></h5>
                                    </div>
                                    <div class="col-md-3">
                                        
                                    </div>
                                </div>
                                <div class="">
                                    <?php
                                        foreach ($items as $citem) 
                                        {
                                            ?>
                                                <div class="card product_data shadow-sm mb-3">                                        
                                                    <div class="row py-2 align-items-center">
                                                        <div class="col-md-2">
                                                            <img id="cimg" src="../uploads/<?= $citem['image']?>" alt="cart image" >
                                                        </div>
                                                        <div class="col-md-3">
                                                            <h5 id="name1"><?= $citem['name']?></h5>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <h5 id="price1"><i class="fa fa-dollar-sign me-1"></i><?= $citem['selling_price']?></h5>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <input type="hidden" class="prodId " value="<?= $citem['prod_id']?>">
                                                            <div class="input-group mb-3 mt-3" id="qty">
                                                                <button id="btc1" class="input-group-text decrement-btn updateQty">-</button>
                                                                <input id="btc2" type="text" class="form-control text-center input-qty bg-white" value="<?= $citem['prod_qty']?>" disabled>
                                                                <button id="btc3" class="input-group-text increment-btn updateQty">+</button>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3 px-2">
                                                            <button  class="btn btn-danger  deleteItem me-3" value="<?= $citem['cid']?>"> <i class="far fa-trash-alt me-2"></i> Remove</button>
                                                            <button  id="btn1" class="btn text-white me-3 addToWishlist"  value="<?= $citem['cid']?>"> <i class="fa fa-heart me-2"></i>Save for later</button>
                                                         </div>
                                                      
                                                        
                                                    </div>
                                                </div>

                                            <?php
                                        } 
                                        ?>
                                </div>
                                <div class="text-center ">
                                <a href="checkout.php" id="btn1" class=" text-white shadow-sm btn btn-outline-primary">Proceed to Checkout</a>
                                </div>
                        <?php
                            }
                            else
                            {
                               ?>
                                <div class="card card-body text-center">
                                    <h4 class="py-3">Your cart is empty</h4>
                                    <center>
                                    <img class="img-fluid" src="../asset/img/empty.png" width="300px" alt="empty-cart">
                                    </center>
                                    <div class="text-center py-3">
                                    <a href="index.php" id="btn1" class="btn text-white">Continue Shopping</a>
                                    </div>
                                </div>
                               <?php
                            }
                             ?>
                             </div>
                        </div> 
                    </div>
                </div>
            </div>
            <div class="container">
            <?php  include("wishlist.php")  ?>
            </div>

<br><br>


</div>
<?php  include("../includes/footer.php")  ?>