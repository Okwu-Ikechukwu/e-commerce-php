<?php
include('../middleware/adminmiddleware.php');
include('includes/header.php'); 
?>

<div class="container">
    <div class="row">
     <div class="col-md-12">
           <?php 
            if (isset($_GET['id'])) 
            {
                $id = $_GET['id'];
                
                $user = getByID("users",$id);
                if(mysqli_num_rows( $user) > 0)
                {
                    $data = mysqli_fetch_array($user);

                    ?>
                        <div class="card">
                            <div class="card-header">
                                <h4>Edit Users
                                <a id="btn2" href="user.php" class="btn btn-primary float-end">Back</a>
                                </h4>
                            </div>
                            <div class="card-body">
                               <form action="code.php" method="POST">
                                  <div class="row">
                                       <input type="hidden" name="user_id" value="<?= $data['id']; ?>">
                                        <div class="mb-3">
                                            <label  class="form-label">Name</label>
                                            <input type="text" name="name" class="form-control" value="<?= $data['name']; ?>" placeholder="Enter your name" required>
                                            </div>
                                            <div class="mb-3">
                                            <label  class="form-label">Phone</label>
                                            <input type="text" name="phone" class="form-control" value="<?= $data['phone']; ?>" placeholder="Enter phone number" required>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Email address</label>
                                                <input type="email" name="email" class="form-control" value="<?= $data['email']; ?>" placeholder="Enter your email" required>
                                            </div>
                                            <div class="mb-3">
                                                <label  class="form-label">Password</label>
                                                <input type="password" name="password" class="form-control" value="<?= $data['password']; ?>" placeholder="Enter password"  required>
                                            </div>
                                            <div class="mb-3">
                                                <label  class="form-label">Comfirm Password</label>
                                                <input type="password" name="cpassword" class="form-control" value="<?= $data['password']; ?>" placeholder="Comfirm password"  required>
                                            </div>
                                            <div class="mb-3">
                                                <label  class="form-label">Role_as</label>
                                                <input type="number" name="role_as" class="form-control" value="<?= $data['role_as']; ?>" placeholder="role_as"  required>
                                            </div>
                                            <center>
                                                <button id="btn1" type="submit" name="update_user_btn" class="btn btn-primary" >Register</button>
                                            </center>
                                        </div>
                                </form>
                            </div>
                        </div>
                    <?php
                }
                else
                {
                   echo "user not found for given id";
                }
 
            }
             else
             {
                echo "id missing from url";
             }
           ?>
           
     </div>
</div>
</div>


<?php include('includes/footer.php'); ?>