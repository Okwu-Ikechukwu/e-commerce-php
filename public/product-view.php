
<?php
  include("../includes/functions.php");
  include("../includes/header.php");
  
if (isset($_GET['product'])) 
{
    $product_slug = $_GET['product'];
    $product_data = getSlugActive("products",$product_slug);
    $product = mysqli_fetch_array($product_data);
    
    if ($product) 
    {
        ?>
    <div class="all">
           <div class="container-fluid">
                <center>
                <img class="img-fluid" src="../asset/img/add.gif" alt="">
                </center>
              </div>
                <div id="my-nav">
                    <?php include("../includes/navbar.php") ?>
               </div>

            <div class="container-fluid py-3 bg-light shadow">
                <h6 class="text-black">
                <a class="text-black text-decoration-none" href="index.php">
                    Home / Collections /
                </a>
                <?= $product['name']; ?></h6>
            </div>

            <div class=" py-4">
                <div class="container product_data mt-5">
                    <div class="row">
                        <div id="imgp" class="col-md-4 px-5 py-5 bg-light shadow">                     
                            <img id="imgp1" src="../uploads/<?= $product['image']; ?>" alt="product image">
                        </div>
                        <div style="font-size: 20px;font-weight: 500;" class="col-md-8 px-5">
                            <h4 id="mean1"><b><?= $product['name']; ?>
                            <span id="mean" class="float-end text-danger"><?php if($product['name']){ echo "Trending"; } ?></span>
                         </b>
                        </h4>
                                 
                            <hr>
                            <p id="mean2"><?= $product['small_description']; ?></p>
                            <div class="row py-2">
                                <div class="col-md-6">
                                    <h4 id="mean3"><i class="fas fa-dollar-sign me-1"></i><span class="text-success fw-bold"><?= $product['selling_price']; ?></span></h4>
                                </div>
                                <div class="col-md-6">
                                    <h5 id="mean4"><i class="fas fa-dollar-sign me-1"></i><s class="text-danger"><?= $product['original_price']; ?></s></h5>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="input-group mb-3" style="width: 130px;">
                                        <button  class="input-group-text decrement-btn">-</button>
                                        <input type="text" disabled class="form-control text-center input-qty bg-white" value="1">
                                        <button class="input-group-text increment-btn">+</button>
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-3">
                               <div class="col-md-12">
                                      <button  class="btn btn-primary px-4 addToCartBtn" value="<?= $product['id']; ?>"><i class="fa fa-shopping-cart me-2"></i>Add to Cart</button>
                               </div>
                            </div>
                            
                            <hr>

                            <h5 id="mean5"><b>Product Description:</b></h5>
                            <p id="mean6"><?= $product['description']; ?></p>
                        </div>
                    </div>
                </div>
            </div>
        <br><br><br><br><br>
    </div>

        <?Php
    }
    else
    {
       echo "Product Not Found";
    }

}
else
{
    echo "Something went wrong";
}
include("../includes/footer.php")  ?>