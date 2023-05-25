
<?php
  include("../includes/header.php");
  include("../includes/functions.php");
?>
<?php if (isset($_SESSION['message']))
    {
    ?>
  <div id="message" class="alert alert-success alert-dismissible fade show text-center" role="alert">
      <strong>Hey!</strong> <?= $_SESSION['message']; ?>.
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
  <?php
  unset($_SESSION['message']);
  }
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


<div class="container mt-2 mb-2">
    <div class="row">
        <div class="col-md-2 px-2 mt-1">
             
              <img style="border-radius: 10px;" src="../asset//img//l7.png" class="imge"  alt="">
              <br>
              <img style="border-radius: 10px;" src="../asset//img//ca2.jpg" class="imge"  alt="">
              <br>
              <img style="border-radius: 10px;" src="../asset//img//ca6.jpg" class="imge"  alt="">
              <br>
              <img style="border-radius: 10px;" src="../asset//img//ca4.png" class="imge"  alt="">
              
          
        </div>
        
        <div id="flex" class="col-md-8">
        <video style="border-radius: 10px;" src="../asset//img//vid.mp4" autoplay loop muted class="d-block  imgee"></video>
        </div>

        <div  class="col-md-2 px-2 mt-1">
             
             <div id="flex1" >
                <img style="border-radius: 10px;" src="../asset//img//l6.png" class="imge2"  alt="">
                <br>
                <img style="border-radius: 10px;" src="../asset//img//ca5.jpg" class="imge2"  alt="">
                <br>
                <img style="border-radius: 10px;" src="../asset//img//ca3.png" class="imge2"  alt="">
                <br>
                <img style="border-radius: 10px;" src="../asset//img//c10.png" class="imge2"  alt="">
             </div>
         
       </div>
    </div>
</div>
<br>
    <div class="container">
        <div class="row">
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
           <div style="background-color:#f68b1e;" class="container py-2">
              <h3 id="col" style="color: #000;" class="text-center ">Shop From Our Collections</h3>
           </div>
          <div class="col-md-12 bg-black py-4 mb-5">
             
                  
             
              <div class="row">
              <?php
                  $categories = getAllActive("categories");

                  if (mysqli_num_rows($categories) > 0) 
                  {
                      
                    foreach($categories as $item)
                    {
                        ?>
                          <div id="img" class="col-md-2 mb-2 item ">
                                <a style="text-decoration: none;" href="products.php?category=<?= $item['slug']; ?>">
                                  <div  class="card shadow cd1" >
                                        <div class="card-body" >
                                              <img id="imgs"  class="img-fluid" src="../uploads/<?= $item['image']; ?>" alt="Category Image" >
                                              <div class="card-title">
                                              <h4 id="text1" class="text-center "><?= $item['name']; ?></h4>
                                        </div>
                                        </div>
                                    </div>
                                </a>                               
                          </div>
                        <?php
                    }
                  }
                  else
                  {
                    echo "No data available";
                  }
              ?>

              </div>  
          </div> 
          <div style="background-color:#000;" class="container py-2">
              <h3 id="col" style="color: #fff;" class="text-center ">Our Products</h3>
              <div class="row">
              <div class="col-md-6 mb-2 " >
                    <img class="card-img-top img-fluid" src="../asset//img//fl4.jpg" alt="Card image" style="height: 250px;" >
              </div>  
              <div class="col-md-6 mb-2" >
                <img class="card-img-top img-fluid" src="../asset//img//fl6.jpg" alt="Card image" style="height: 250px;" >
              </div> 
              </div>
           </div>

          <div class="col-md-12 bg-black  py-4  mb-5">
              <div class="row">
              <?php
                  $products = getAllnonTrending();
                  if (mysqli_num_rows($products) > 0) 
                  {
                      foreach ($products as $item) 
                      {
                        ?>
                          <div id="col-md" class="col-md-3 mb-4">
                                    <a style="text-decoration: none;" href="product-view.php?product=<?= $item['slug']; ?>">
                                      <div class="card shadow cd2" >
                                            <div class="card-body" >
                                                  <img id="mage" class="w-100" src="../uploads/<?= $item['image']; ?>" alt="Product Image" >
                                                  <div class="card-title">
                                                  <h4 id="magen" class="text-center"><?= $item['name']; ?></h4>
                                                 <span>
                                                 <div class="text-center rating pb-1" style="color:#f68b1e;">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="far fa-star"></i>
                                                </div>
                                                 <h6 id="up" class="text-center">
                                                 <b id="mageo"><i class="fas fa-dollar-sign"></i><s><?= $item['original_price']; ?></s></b>
                                                 <b id="mages" class=" text-success"><i class="fas fa-dollar-sign"></i><?= $item['selling_price']; ?> </b>
                                                 </h6>
                                                 
                                                 </span> 
                                                  
                                            </div>
                                            </div>
                                        </div>
                                    </a>                               
                              </div>
                        <?php
                    }
                  }
                  else
                  {
                    echo "No data available";
                  }
              ?>

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