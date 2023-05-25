<footer class="footer pt-3">
<div class="container-fluid" style="background-color: darkgray; color: peru; ">
       <div style="padding-left:100px;" class="py-3">
            <a style="color:black;text-decoration:none;" class="" href="index.php"><h4>Ecom</h4></a>
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
                            <a class="li" href="../admin/index.php"><li> Dashboard</li></a>
                            <a class="li" href="../admin/category.php"><li> All category</li></a>
                            <a class="li" href="../admin/add-category.php"><li> Add category</li></a>
                            <a class="li" href="../admin/products.php"><li> All products</li></a>
                            <a class="li" href="../admin/add-products.php"><li> Add products</li></a>
                            <a class="li" href="../admin/user.php"><li> Edit Users</li></a>
                            <a class="li" href="../admin/user.php"><li>Registered Users</li></a>
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
</footer>
<button onclick="topFunction()" id="myBtn" title="Go to top">
    <i class="fa fa-arrow-up"></i>
</button>

<script>
    mybutton = document.getElementById("myBtn");
</script>
<script>
    window.onscroll = function() {scrollFunction()};
</script>
  </main>
  <script src="assets/js/jquery-3.6.1.min.js"></script>
  <script src="assets/js/bootstrap.bundle.min.js"></script>
  <script src="assets/js/perfect-scrollbar.min.js"></script>
  <script src="assets/js/smooth-scrollbar.min.js"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script src="assets/js//custom.js"></script>
  <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
  <script src="fontawesome/js/all.js"></script>

  <script>
        <?php 
            if(isset($_SESSION['message'])) 
            { 
                ?>
                alertify.set('notifier','position', 'top-right');
                alertify.success('<?= $_SESSION['message']?>');
                <?php 
                unset($_SESSION['message']);
            } 
        ?>
  </script>
</body>
</html>