
<?php

include("../includes/functions.php");
include("../includes/header.php");

if(isset($_SESSION['auth']))
{
    redirect(" index.php", "You are already logged in");
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
       <br><br><br><br>
    <div class="py-5">
    <div class="container">
        <div class="row justify-content-center">
         <div class="col-md-6">
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
            <div class="card">
                <div class="card-header text-center">
                     <h4>Login Form</h4>
                </div>
                <div class="card-body">
                <form action="../includes/authcode.php" method="POST">
                    <div class="mb-3">
                        <label class="form-label">Email address</label>
                        <input type="email" name="email" class="form-control" placeholder="Enter your email" required>
                    </div>
                    <div class="mb-3">
                        <label  class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Enter password"  required>
                    </div>
                    <center>
                        <button id="btn1" type="submit" name="login" value="login" class="btn btn-primary">Login</button>
                    </center>
                </form>
                </div>
            </div>
         </div>
     </div>
  </div>
</div>
<br><br><br><br>

<?php include("../includes/footer.php") ?>


</div>
