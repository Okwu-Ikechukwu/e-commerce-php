
<?php
  include("../includes/functions.php");
  include("../includes/header.php");


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
<div class="container-fluid py-2 shadow mb-3 bg-white">
    <h5>This page content is based on: <b style="color:#f68b1e"><?php  if(isset($_GET['search'])){echo $_GET['search'] ;}  ?></b></h5>
</div>


<style>
  .owl-carousel .owl-nav button{
    position: absolute;
    top: 30%;
    outline: none;
  }
  .owl-carousel .owl-nav button.owl-prev:hover{
       background-color:#000;
  }
  .owl-carousel .owl-nav button.owl-next:hover{
       background-color: #000;
  }

  .owl-carousel .owl-nav button.owl-prev span:hover{
       color: #f68b1e;
  }
  .owl-carousel .owl-nav button.owl-next span:hover{
       color: #f68b1e;
  }

  .owl-carousel .owl-nav button.owl-prev{
    left: -45px;
   
  }
  .owl-carousel .owl-nav button.owl-next{
    right: -40px;
   
  }
  .owl-carousel .owl-nav button.owl-prev span{
    font-size: 45px;
    color: #fff;
  }
  .owl-carousel .owl-nav button.owl-next span{
    font-size: 45px;
    color: #fff;
  }
  .cd1{
    transition: transform .5s ease;
    color: #000;
  }
  .cd1:hover{
    transform : scale(1.1);
  }
  #btn2:hover{
    background-color:#f68b1e;
  }
  #btn2{
    background-color: #ffab58;
  }
</style>
<br>
  <div class="container">
       <div class="row">
          <div style="background-color:#f68b1e;" class="container py-2">
              <h3 id="col" style="color: #000;" class="text-center ">Searched product </h3>
           </div>
          <div class="col-md-12 bg-white py-4 mb-5">
          <div class="row">
                <?php

                      if (isset($_GET['search'])) 
                      {
                         $filtervalues = $_GET['search'];
                         $querys = "SELECT * FROM products WHERE CONCAT(name,description) LIKE '%$filtervalues%'";
                         $querys_run = mysqli_query($con,$querys);

                         if (mysqli_num_rows($querys_run) > 0) 
                         {
                            foreach ($querys_run  as $product) 
                            {                             
                                    ?>
                                        <div id="col-md" class="col-md-3 mb-2  product_data">
                                            <div class="card shadow" >
                                                    <div class="card-body" >
                                                        <img id="mage"  class="w-100" src="../uploads/<?= $product['image']; ?>" alt="Product Image" >
                                                        <div class="card-title">
                                                        <h4 id="magen" class="text-center"><?= $product['name']; ?></h4>
                                                        <span>
                                                        <div class="text-center rating " style="color:#f68b1e;">
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="far fa-star"></i>
                                                        </div>
                                                        <h6 id="up" class="text-center">
                                                        <b id="mageo"><i class="fas fa-dollar-sign"></i><s><?= $product['original_price']; ?></s></b>
                                                        <b id="mages" class=" text-success"><i class="fas fa-dollar-sign"></i><?= $product['selling_price']; ?> </b>
                                                        </h6>
                                                        </span> 

                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <div class="input-group">
                                                                <input type="hidden" disabled class="form-control text-center input-qty bg-white" value="1">
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-12">
                                                                  <button id="btn2"  class="btn w-100 px-4 addToCartBtn" value="<?= $product['id']; ?>"><i class="fa fa-shopping-cart me-2"></i>Add to Cart</button>
                                                           </div>
                                                    </div>
                                                    </div>
                                                </div>                              
                                       </div>
                            
                                    <?Php                                                 
                         }
                           
                        
                      } else
                      {
                        echo "<div class='alert alert-danger text-center'>
                                There is no product matching your search...
                              </div>";
                      }
                      }
                 ?>
              </div>
          </div> 
          <h4 id="col">Trending Products</h4>
             <hr>
          <div class="col-md-12 mb-3 bg-black">
            <div class="container  px-5  py-3">
                <div class="owl-carousel owl-theme owl-loaded owl-drag">
                        <?php
                            $trendingProducts = getAllTrending();
                            if (mysqli_num_rows($trendingProducts) > 0) 
                            {
                                foreach ($trendingProducts as $item) 
                                {
                                ?>
                                    <div id="imgsss" class="item">
                                        <a style="text-decoration: none;"  href="product-view.php?product=<?= $item['slug']; ?>">
                                          <div style="border-radius: 50px;"  class="card shadow" >
                                                <div class="card-body" >
                                                      <img  class="" id="imgss" src="../uploads/<?= $item['image']; ?>" alt="Product Image" >
                                                      <div class="card-title">
                                                      <h6 id="text" class="text-center"><?= $item['name']; ?></h6>
                                                </div>
                                                </div>
                                            </div>
                                        </a>                    
                                    </div>           
                              <?php
                                }
                            }
                        ?>
                        <div class="owl-nav">
                        </div>
                   </div>
            </div>
          </div>
     </div>
</div>

<br>

<?php  include("../includes/footer.php")  ?>
</div>
<script>
  $(document).ready( function () {

    $('.owl-carousel').owlCarousel({
    loop:true,
    nav:true,
    dots:false,
    margin:10,
    responsive:{
        0:{
            items:2,
        },
        300:{
            items:3,
        },
        400:{
            items:3,
        },
        500:{
            items:4,
        },
        600:{
            items:4
        },
        700:{
            items:4
        },
        800:{
            items:4
        },
        1000:{
            items:5
        },
        1300:{
            items:6
        }
    }
})
    
  })
</script>