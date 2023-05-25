<?php
include('../middleware/adminmiddleware.php');
include('includes/header.php'); 
?>

<div class="container">
    <div class="row">
     <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>Add Products</h4>
            </div>
            <div class="card-body">
                <form action="code.php" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-12">
                            <label for="">Select Category</label>
                            <select name="category_id"  class="form-select" required>
                            <option selected>Select Category</option>
                                <?php
                                   $categories = getAll("categories");
                                   if(mysqli_num_rows($categories) > 0){
                                    foreach ($categories as $item) {
                                        ?>
                                          <option value="<?= $item['id']; ?>"><?= $item['name']; ?></option>
                                        <?php
                                      }
                                   }
                                   else 
                                   {
                                     echo "No category Available";
                                   }
                                ?>

                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="">Name</label>
                            <input type="text" name="name" placeholder="Enter Category Name" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label for="">Slug</label>
                            <input type="text" name="slug" placeholder="Enter Slug" class="form-control" required>
                        </div>
                        <div class="col-md-12">
                            <label for="">Small Description</label>
                            <textarea rows="3" name="small_description" placeholder="Enter small description" class="form-control" required></textarea>
                        </div>
                        <div class="col-md-12">
                            <label for="">Description</label>
                            <textarea rows="3" name="description" placeholder="Enter description" class="form-control" required></textarea>
                        </div>
                        <div class="col-md-6">
                            <label for="">Original price</label>
                            <input type="text" name="original_price" placeholder="Enter original price" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label for="">Selling price</label>
                            <input type="text" name="selling_price" placeholder="Enter selling price" class="form-control" required>
                        </div>
                        <div class="col-md-12">
                            <label for="">Upload Image</label>
                            <input type="file" name="image" class="form-control" required>
                        </div>
                        <div class="row">
                        <div class="col-md-6">
                            <label for="">Quantity</label>
                            <input type="nubers" name="qty" placeholder="Enter Quantity" class="form-control" required>
                        </div>
                        <div class="col-md-3 text-center"><br><br>
                            <label for="">Status</label>
                            <input type="checkbox" name="status" >
                        </div>
                        <div class="col-md-3 text-center"><br><br>
                            <label for="">Trending</label>
                            <input type="checkbox" name="trending" required>
                        </div>
                        </div>
                        <div class="col-md-12">
                            <label for="">Meta Title</label>
                            <input type="text" name="meta_title" placeholder="Enter meta title" class="form-control" required>
                        </div>
                        <div class="col-md-12">
                            <label for="">Meta Description</label>
                            <textarea rows="3" name="meta_description" placeholder="Enter meta description" class="form-control" required></textarea>
                        </div>
                        <div class="col-md-12">
                            <label for="">Meta Keywords</label>
                            <textarea rows="3" name="meta_keywords" placeholder="Enter meta keywords" class="form-control" required></textarea>
                            <br>
                        </div>
                          
                        <div class="col-md-12">
                            <center>
                            <button id="btn2" type="submit" class="btn btn-primary" name="add_product_btn">Save</button>
                            </center>
                        </div>
                    </div>
                </form>
            </div>
        </div>
     </div>
</div>
</div>


<?php include('includes/footer.php'); ?>