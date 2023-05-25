<div class="container py-5">
            <h4>Wishlist</h4>
                 <hr>
                <div class="card card-body shadow">
                    <div class="row">
                    <div class=" col-md-12">
                        <div id="mywishlist">
                         <?php 

                            $item = getWishlistItems(); 
                            
                            if (mysqli_num_rows($item) > 0) 
                            {
                                ?>
                                <div id="row" class="row py-2 align-item-center">
                                    <div class="col-md-5">
                                        <h5><b>Product</b></h5>
                                    </div>
                                    <div class="col-md-2">
                                        <h5><b>Price</b></h5>
                                    </div>
                                    <div class="col-md-5">
                                        
                                    </div>
                                </div>
                                <div class="">
                                    <?php
                                        foreach ($item as $witem) 
                                        {
                                            ?>
                                                <div class="card product_data shadow-sm mb-3">                                        
                                                    <div class="row py-2 align-items-center">
                                                        <div class="col-md-2">
                                                            <img id="wimg" src="../uploads/<?= $witem['image']?>" alt="cart image" >
                                                        </div>
                                                        <div class="col-md-3">
                                                            <h5 id="name2"><?= $witem['name']?></h5>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <h5 id="price2"><i class="fa fa-dollar-sign me-1"></i><?= $witem['selling_price']?></h5>
                                                        </div>
                                                        <div class="col-md-5 px-5">
                                                            <button  class="btn btn-danger  me-3 deleteItem2" value="<?= $witem['prod_id']?>"> <i class="far fa-trash-alt me-2"></i> Remove</button>
                                                            <button  id="btn1" class="btn text-white addback" value="<?= $witem['wid']?>"> <i class="fa fa-shopping-cart me-2"></i>Add to cart</button>
                                                         </div>
                                                      
                                                        
                                                    </div>
                                                </div>

                                            <?php
                                        } 
                                        ?>
                                </div>
                        <?php
                            }
                            else
                            {
                               ?>
                                <div class="card card-body text-center">
                                    <h4 class="py-3">Your Wishlist is empty</h4>
                                    <center>
                                    <img class="img-fluid" src="../asset/img/empty.png" width="300px" alt="empty-cart">
                                    </center>
                                </div>
                               <?php
                            }
                             ?>
                             </div>
                        </div> 
                    </div>
                </div>
            </div>