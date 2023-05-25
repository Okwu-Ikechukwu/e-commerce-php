<?php
include('../middleware/adminmiddleware.php');
include('includes/header.php'); 
?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
           <form method="GET" action=""   class=" d-flex mb-2">
                <input style="height: 40px;" class="form-control me-2" type="text" name="search"value="<?php  if(isset($_GET['search'])){echo $_GET['search'] ;}  ?>" placeholder="Search products">
                <button id="btn1" class="btn " type="submit">Search</button>
            </form>
                     
                   

                   <?php
                        
                    if (isset($_GET['search'])) 
                    {
                     
                    $filtervalues = $_GET['search'];
                    $querys = "SELECT * FROM products WHERE CONCAT(name,meta_description) LIKE '%$filtervalues%' ";
                    $querys_run = mysqli_query($con,$querys);

                    if (mysqli_num_rows($querys_run) > 0) 
                    {
                        ?>
                <div class="card">
                    <div class="card-header">
                        <h4>Searched Product</h4>
                    </div>
                    <div class="card-body" id="products_table">
                        <table class="table table-bordered table-striped text-center">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Image</th>
                                    <th>Status</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead> 
                            <tbody>
                            
                    <?php
                        foreach ($querys_run  as $products) 
                        {                             
                      
                            ?> 
                                    <tr>
                                        <td> <?= $products['id']?> </td>
                                        <td> <?= $products['name']?> </td>
                                        <td>
                                            <img src="../uploads/<?= $products['image']?>"  width="50px" height="50px" alt="<?= $products['name']?>">
                                        </td>
                                        <td>
                                            <?= $products['status'] == '0'? "Visible":"Hidden" ?> 
                                        </td>
                                        <td>
                                            <a href="edit-product.php?id=<?= $products['id']?>" id="btn2" class="btn btn-sm ">Edit</a>
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-sm btn-danger delete_category_btn" value="<?= $products['id']?>">Delete</button>
                                        </td>
                                    </tr>  
                            <?php


                                                         
                    }  

                    ?>
                     <center>
                    <a id='btn1' href='products.php' class='btn '>Click to go back</a> 
                   </center> 
                    </tbody>
                    </table>
                </div>
               <?php
                   
                    } else
                    {
                            echo "
                            <div class='card'>
                            <div class='card-header'>
                                <h4>Searched Product</h4>
                            </div>
                            <div class='card-body' id='products_table'>
                                <table class='table table-bordered table-striped text-center'>
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Image</th>
                                            <th>Status</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                            </thead> 
                                    </table> 
                                    <div class='container alert alert-danger text-center'>
                                    There is no Product matching your search...
                                    </div>
                                <center>
                                <a id='btn1' href='products.php' class='btn '>Click to go back</a> 
                                </center>
                            </div>
                            ";         
                    }  
                      
                    }  else
                    {   
                       ?>
                       <?php
                            ?>
                <div class="card">
                    <div class="card-header">
                        <h4>Products</h4>
                    </div>
                    <div class="card-body" id="products_table">
                        <table class="table table-bordered table-striped text-center">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Image</th>
                                    <th>Status</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead> 
                        <tbody>
                            <?php
                                $products = getAll("products");

                                if (mysqli_num_rows($products) > 0) 
                                {
                                    foreach($products as $item)
                                    {
                                        ?>
                                             <tr>
                                                 <td> <?= $item['id']?> </td>
                                                 <td> <?= $item['name']?> </td>
                                                 <td>
                                                     <img src="../uploads/<?= $item['image']?>"  width="50px" height="50px" alt="<?= $item['name']?>">
                                                 </td>
                                                 <td>
                                                      <?= $item['status'] == '0'? "Visible":"Hidden" ?> 
                                                 </td>
                                                 <td>
                                                     <a href="edit-product.php?id=<?= $item['id']?>" id="btn2" class="btn btn-sm">Edit</a>
                                                 </td>
                                                 <td>
                                                         <button type="button" class="btn btn-sm btn-danger delete_product_btn" value="<?= $item['id']?>">Delete</button>
 
                                                 </td>
                                             </tr>  
                                        <?php
                                    }
                        }
                        else
                        {
                            echo "No records Found";
                        }
                    ?>
                        <?php
                        ?>
                            </tbody>
                         </table>
                    </div> 
                      <?php   
                    }  
                  
                    ?>    

            </div>
        </div>
    </div>
</div>
</div>
<br><br><br><br><br>
<?php include('includes/footer.php'); ?>