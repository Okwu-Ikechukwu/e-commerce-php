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
                    $querys = "SELECT * FROM categories WHERE CONCAT(name,meta_description) LIKE '%$filtervalues%' ";
                    $querys_run = mysqli_query($con,$querys);

                    if (mysqli_num_rows($querys_run) > 0) 
                    {
                        ?>
                <div class="card">
                    <div class="card-header">
                        <h4>Searched Category</h4>
                    </div>
                    <div class="card-body" id="category_table">
                        <table class="table table-bordered table-responsive table-striped text-center">
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
                        foreach ($querys_run  as $category) 
                        {                             
                      
                            ?> 
                                    <tr>
                                        <td> <?= $category['id']?> </td>
                                        <td> <?= $category['name']?> </td>
                                        <td>
                                            <img src="../uploads/<?= $category['image']?>"  width="50px" height="50px" alt="<?= $category['name']?>">
                                        </td>
                                        <td>
                                            <?= $category['status'] == '0'? "Visible":"Hidden" ?> 
                                        </td>
                                        <td>
                                            <a href="edit-category.php?id=<?= $category['id']?>" id="btn2" class="btn btn-sm ">Edit</a>
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-sm btn-danger delete_category_btn" value="<?= $category['id']?>">Delete</button>
                                        </td>
                                    </tr>  
                            <?php


                                                         
                    }  

                    ?>
                     <center>
                    <a id='btn1' href='category.php' class='btn '>Click to go back</a> 
                   </center> 
                    </tbody>
                    </table>
                </div>
               <?php
                   
                    } else
                    {
                            echo "
                                <div class='card'>
                                    <div class='card-header' id='category_table'>
                                    <h4>Categories</h4>
                                        </div>
                                        <div class='card-body' >
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
                                    There is no Category matching your search...
                                    </div>
                                <center>
                                <a id='btn1' href='category.php' class='btn '>Click to go back</a> 
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
                        <h4>Categories</h4>
                    </div>
                    <div class="card-body" id="category_table">
                        <table class="table table-bordered table-responsive table-striped text-center">
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
                               $category = getAll("categories");

                                if (mysqli_num_rows($category) > 0) 
                                {
                                    foreach($category as $item)
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
                                                    <a href="edit-category.php?id=<?= $item['id']?>" id="btn2" class="btn btn-sm ">Edit</a>
                                                </td>
                                                <td>
                                                    <button type="button" class="btn btn-sm btn-danger delete_category_btn" value="<?= $item['id']?>">Delete</button>
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