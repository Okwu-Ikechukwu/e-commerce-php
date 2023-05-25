


   <div class="container-fluid" style="background-color: darkgray; color: peru; ">
       <div style="padding-left:100px;" class="py-3">
            <a style="color:black;text-decoration:none;" class="" href="index.php"><h1>Ecom</h1></a>
                <!-- <h2 class="">
                    Ecom
                </h2> -->
        </div>
    </div>
    <div class="container-fluid" id="footer">
      <br>
        <div class="container">
            <div class="row text-white after">
                <div class="col-md-4">
                    <h4 id="foot" >
                        CONTACT US
                    </h4 >
                    <br>
                    <div>
                       <b>Ecom PLC</b><br>
                        NO 8 Umugweze Nekede Old Rd,<br>
                        Imo State-1111 <br><br>
                        +2348145979845 <br>
                        +2349021512880 <br>
                        0800ECOM <br>
                        Email: eikechukwu903@gmail.com
                    </div>
                    <br>
                </div>
                <div class="col-md-4">
                   <h4 id="foot" >
                       QUICK LINKS
                   </h4>
                   <br>
                       <ul id="ul">
                            <a class="li" href="../public/register.php"><li> Register</li></a>
                            <a class="li" href="../public/login.php"><li> Login</li></a>
                       </ul>
                </div>
                <div class="col-md-4 my-title">
                       <h4 id="foot" >
                           FOLLOW US
                       </h4 >
                       <br>
                       <span>
                           <a class="me-2" href="#"><i class="fab fa-facebook"></i></a>
                           <a class="me-2" href="#"><i class="fab fa-instagram"></i></a>
                           <a class="me-2" href="#"><i class="fab fa-youtube"></i></a>
                           <a class="me-2" href="#"><i class="fab fa-twitter"></i></a>
                           <a class="me-2" href="#"><i class="fab fa-linkedin"></i></a>
                       </span>
                </div>
            </div>
            <div class="text-white">
                <span> <img src="../asset//img//cs.png" class="cs img-fluid" alt="">2022 All Rights Reserved. <b id="b">Ecom PLC</b></span> <br>
                <span>Powered by <b id="b">Ecom</b> Maintained by <b id="b">OKWU IKECHUKWU E</b> Built by <b id="b">OKWU IKECHUKWU E</b></span> 
                <br><br>
            </div>
        </div>
    </div>

<button onclick="topFunction()" id="myBtn" title="Go to top">
    <i class="fa fa-arrow-up"></i>
</button>

<script>
    mybutton = document.getElementById("myBtn");
</script>
<script>
    window.onscroll = function() {scrollFunction()};
</script>
<script src="../js/jquery-3.6.1.min.js"></script>
<script src="../js/alert.js"></script>
<script src="../bootstrap-5.1.3-dist/js/bootstrap.bundle.js"></script>
<script src="../fontawesome-free-5.15.2-web/js/all.js"></script>
<script src="../js/custom.js"></script>
<script src="../js/owl.carousel.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

    <style>
        #aa{
            text-decoration: none;
            color: white;
        }
        #aa:hover{
            color: #f68b1e;
        }
        .co{
            color: #f68b1e;
        }
    </style>

    <!-- off-canvas -->
    <div class="offcanvas offcanvas-start" id="demo" style="width: 250px; background-color: black;">
    <div class="offcanvas-header " style="padding-left: 200px;">
      <button style="background-color:#f68b1e;"  type="button" class="btn-close " data-bs-dismiss="offcanvas"></button>
    </div>
    <div class="offcanvas-body mt-5">
     <div class="container-fluid">
        <h2 id="col" class="pb-2 co">Categories</h2>
        <div class="container text-white">
            <h4> <a id="aa" href="../public/index.php"> <i style="color: #f68b1e;" class="fa fa-car me-2 fs-5"></i>Automobiles</a></h4>
            <?php
                  $categories = getAllActive("categories");

                  if (mysqli_num_rows($categories) > 0) 
                  {
                      
                    foreach($categories as $item)
                    {
                        ?>
                        <h6 class="py-2"><a id="aa" href="products.php?category=<?= $item['slug']; ?>">
                            <?= $item['name']; ?>
                        </a></h6>
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
  <!-- off-canvas-end -->


  <script>
     alertify.set('notifier','position', 'top-right');
        <?php 
            if(isset($_SESSION['message'])) 
            { 
                ?>
                alertify.success('<?= $_SESSION['message']?>');
                <?php 
                unset($_SESSION['message']);
            } 
        ?>
  </script>

</body>
</html>