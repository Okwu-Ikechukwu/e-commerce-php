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
                    $querys = "SELECT * FROM users WHERE CONCAT(name,email) LIKE '%$filtervalues%' ";
                    $querys_run = mysqli_query($con,$querys);

                    if (mysqli_num_rows($querys_run) > 0) 
                    {
                        ?>
                        <div class="card">
                        <div class="card-header">
                            <h4>
                                User Searched
                            </h4>
                        </div>
                        <div class="card-body" id="products_table">
                        <table class="table table-bordered table-striped text-center">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Password</th>
                                    <th>role_as</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead> 
                            <tbody>
                           
                    <?php
                        foreach ($querys_run  as $user) 
                        {                             
                      
                            ?> 
                                    <tr>
                                        
                                        <td> <?= $user['id']?> </td>
                                        <td> <?= $user['name']?> </td>
                                        <td>
                                            <?= $user['email']?>
                                        </td>
                                        <td>
                                            <?= $user['phone']?> 
                                        </td>
                                        <td>
                                            <?= $user['password']?> 
                                        </td>
                                        <td>
                                            <?= $user['role_as']?> 
                                        </td>
                                        <td>
                                            <a href="edit-user.php?id=<?= $user['id']?>" id="btn2" class="btn btn-sm">Edit</a>
                                        </td>
                                        <td>
                                                <button type="button" class="btn btn-sm btn-danger delete_user_btn" value="<?= $user['id']?>">Delete</button>

                                        </td>
                                        
                                    </tr> 
                            <?php


                                                         
                    }  

                    ?>
                     <center>
                    <a id='btn1' href='user.php' class='btn '>Click to go back</a> 
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
                                        <h4>
                                            User Searched
                                        </h4>
                                    </div>
                                    <div class='card-body' >
                                    <table class='table table-bordered table-striped text-center'>
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Phone</th>
                                                <th>Password</th>
                                                <th>role_as</th>
                                                <th>Edit</th>
                                                <th>Delete</th>
                                            </tr>
                                        </thead> 
                                 </table> 
                                <div class='container alert alert-danger text-center'>
                                There is no User matching your search...
                                </div>
                              <center>
                              <a id='btn1' href='user.php' class='btn '>Click to go back</a> 
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
                                    <h4>
                                    Registered Users
                                    <a id="btn2" href="index.php" class="btn btn-primary float-end">Back</a>
                                    </h4>
                                </div>
                            <div class="card-body" id="products_table">
                                <table class="table table-bordered table-striped text-center">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Password</th>
                                            <th>role_as</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead> 
                                    <tbody>
                            <?php
                                $users = getAll("users");

                                if (mysqli_num_rows($users) > 0) 
                                {
                                    foreach($users as $item)
                                    {
                                        ?>
                                        <tr>
                                            <td> <?= $item['id']?> </td>
                                            <td> <?= $item['name']?> </td>
                                            <td>
                                                <?= $item['email']?>
                                            </td>
                                            <td>
                                                <?= $item['phone']?> 
                                            </td>
                                            <td>
                                                <?= $item['password']?> 
                                            </td>
                                            <td>
                                                <?= $item['role_as']?> 
                                            </td>
                                            <td>
                                                <a href="edit-user.php?id=<?= $item['id']?>" id="btn2" class="btn btn-sm">Edit</a>
                                            </td>
                                            <td>
                                                    <button type="button" class="btn btn-sm btn-danger delete_user_btn" value="<?= $item['id']?>">Delete</button>

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