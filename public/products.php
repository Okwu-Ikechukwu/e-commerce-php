
<?php
  include("../includes/functions.php");
  include("../includes/header.php");
  
  if (isset($_GET['category'])) 
  {
     
  $category_slug = $_GET['category'];
  $category_data = getSlugActive("categories",$category_slug);
  $category = mysqli_fetch_array($category_data);

  if ($category) 
  {
    $cid = $category['id'];
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
                Home / Collections /
              </a>
              <?= $category['name']; ?></h6>
        </div>
        <div class="container mt-3">
            <div class="row">
              <div class=" col-md-12">
                  <h1 id="col" style="color: #000;"  ><?= $category['name']; ?></h1>
                  <hr>
                  <div class="row">
                  <?php
                      $products = getProdByCategory($cid);
    
                      if (mysqli_num_rows($products) > 0) 
                      {
                          
                        foreach($products as $item)
                        {
                            ?>
                              <div id="col-md" class="col-md-3 mb-2">
                                    <a style="text-decoration: none;" href="product-view.php?product=<?= $item['slug']; ?>">
                                      <div class="card shadow" >
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
    <br><br><br><br><br>
    </div>
    <?php 
  }
    else
    {
       header('Location: index.php');
    }

}
else
{
  header('Location: index.php');
}
include("../includes/footer.php")  ?>