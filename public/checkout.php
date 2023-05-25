<?php
  include("../includes/functions.php");
  include("../includes/header.php");
  include('authenticate.php');
  

  $CartItems =  getCartItems();

  if(mysqli_num_rows($CartItems) == 0)
  {
      header('Location: index.php');
  }
?>
<style>
    #btpay{
        background-color: green;
        color: white;
        border: none;
        border-radius: 5px;
    }
</style>
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
                        <a class="text-black text-decoration-none" href="checkout.php">
                        Checkout
                    </a>
                </h6>
            </div>
        <div class="container py-5">
            <div class="card">
                <div class="card card-body shadow">
                    <form action="../includes/placeorder.php" method="POST" >
                        <div class="row py-2">
                            <div class="col-md-7">
                                <h4 class="text-center">Basic Details</h4>
                                <hr>
                                     <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="" class="fw-bold">Name</label>
                                            <input type="text" name="name" id="name" required placeholder="Enter your full name" class="form-control">
                                            <small class="text-danger name"></small>              
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="" class="fw-bold">E-mail</label>
                                            <input type="email" name="email" id="email" required placeholder="Enter your full email" class="form-control">
                                            <small class="text-danger email"></small>                                    
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="" class="fw-bold">Phone</label>
                                            <input type="text" name="phone" id="phone" required placeholder="Enter your full phone" class="form-control">
                                            <small class="text-danger phone"></small>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="" class="fw-bold">Pin code</label>
                                            <input type="text" name="pincode" id="pincode" required placeholder="Enter your full pin code" class="form-control">
                                            <small class="text-danger pincode"></small>
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <label for="" class="fw-bold">Address</label>
                                            <textarea name="address" id="address" required class="form-control" rows="5"></textarea>
                                            <small class="text-danger address"></small>
                                        </div>
                                    </div>
                                </div> 
                                <div class="col-md-5">
                                    <h4 class="text-center">Order Details</h4>
                                    <hr>
                                        <?php $items = getCartItems(); 
                                        ?>
                                        <?php
                                        $totalprice = 0;
                                        foreach ($items as $citem) 
                                        {
                                            ?>
                                                <div class="mb-1 border">
                                                    <div class="row align-items-center">                                        
                                                        <div class="col-md-2">
                                                            <img id="imgc" src="../uploads/<?= $citem['image']?>" alt="cart image" >
                                                        </div>
                                                        <div class="col-md-5">
                                                            <h6 id="name3"><?= $citem['name']?></h6>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <h6 id="price3"><i class="fa fa-dollar-sign me-1"></i><b><?= $citem['selling_price']?></b></h6>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <h6 id="qty1"> X <?= $citem['prod_qty']?></h6>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                            <?php
                                            $totalprice += $citem['selling_price'] * $citem['prod_qty'];
                                         
                                        }
                                        ?>
                                        <hr>
                                        <h5>Total Price : <span class="float-end"><i class="fa fa-dollar-sign me-1"></i><?= $totalprice ?></span></h5>
                                        <div class="">
                                            <input type="hidden" name="payment_mode" value="COD">
                                            <button  id="btn3" type="submit" name="placeorder_btn" class="btn py-2 mb-2 w-100 text-white">Comfirm and place order | COD</button>
                                            <div id="paypal-button-container" class="mt-3"></div>
                                        </div>
                                </div>
                            </div>
                        </div>
                    </form>
              </div>
        </div>

<br><br><br><br><br>

</div>
<?php  include("../includes/footer.php")  ?>

<!-- Replace "test" with your own sandbox Business account app client ID -->
<script src="https://www.paypal.com/sdk/js?client-id=ARZkaC2zux-d6dUas1cvv8O2hyZVm6lHlFEPnLdvz29ABjWd3EJ-A0pRidSBJCLqsVLe-SiB87rqch85&currency=USD"></script>


<script>



      paypal.Buttons({
            onClick(){
                var name = $('#name').val();
                var email = $('#email').val();
                var phone = $('#phone').val();
                var pincode = $('#pincode').val();
                var address = $('#address').val();
                
                if (name.length == 0) 
                {
                    $('.name').text("*This field is required");
                }else{
                    $('.name').text("");
                }
                if (email.length == 0) 
                {
                    $('.email').text("*This field is required");
                }else{
                    $('.email').text("");
                }
                if (phone.length == 0) 
                {
                    $('.phone').text("*This field is required");
                }else{
                    $('.phone').text("");
                }
                if (pincode.length == 0) 
                {
                    $('.pincode').text("*This field is required");
                }else{
                    $('.pincode').text("");
                }
                if (address.length == 0) 
                {
                    $('.address').text("*This field is required");
                }else{
                    $('.address').text("");
                }

                if (name.length == 0 || email.length == 0 || phone.length == 0 || pincode.length == 0 || address.length == 0)
                {
                    return false;
                }
            },
            // Sets up the transaction when a payment button is clicked
            createOrder: (data, actions) => {
            return actions.order.create({
                purchase_units: [{
                amount: {
                    value: '<?= $totalprice ?>' // Can also reference a variable or function
                }
                }]
            });
            },
            // Finalize the transaction after payer approval
            onApprove: (data, actions) => {
            return actions.order.capture().then(function(orderData) {
                // Successful capture! For dev/demo purposes:
                const transaction = orderData.purchase_units[0].payments.captures[0];
                
                var name = $('#name').val();
                var email = $('#email').val();
                var phone = $('#phone').val();
                var pincode = $('#pincode').val();
                var address = $('#address').val();

                var data = {
                    
                    'name': name,
                    'email': email,
                    'phone': phone,
                    'pincode': pincode,
                    'address': address,
                    'payment_mode': "Paid by Paypal",
                    'payment_id': transaction.id,
                    'placeorder_btn': true
                }
                $.ajax({
                            method: "POST",
                            url: "../includes/placeorder.php",
                            data: data,
                            success: function (response) {
                                if (response == 201) 
                                {
                                    alertify.success("Order Placed successfully");
                                    window.location.href = '../public/my-orders.php';
                                }
                                else
                                {
                                   
                                    console.log(response);
                                }
                            }
                        });
                // When ready to go live, remove the alert and show a success message within this page. For example:
                // const element = document.getElementById('paypal-button-container');
                // element.innerHTML = '<h3>Thank you for your payment!</h3>';
                // Or go to another URL:  actions.redirect('thank_you.html');
            });
            }
      }).render('#paypal-button-container');
    </script>