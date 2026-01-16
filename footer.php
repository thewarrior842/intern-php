        <!-- footer area -->
        <footer class="bj_footer_area_two bj_footer_area_four" data-bg-color="#001F58">
            <div class="container">
                <div class="footer_top">
                    <div class="row">
                        <div class="col-lg-3 col-sm-6">
                            <div class="f_widget link_widget pe-4">
                                <a href="#" class="f_logo">
                                    <img src="assets/img/home/logo-white.svg" alt="f_logo">
                                </a>
                                <div class="footer_subscribes">
                                    <h2 class="f_widget_title">Subscribe Now</h2>                                   
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2 col-sm-6">
                            <div class="f_widget link_widget">
                                <h2 class="f_widget_title">Company</h2>
                                <ul class="list-unstyled list">
                                    <li><a href="about.php">About Us</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-2 col-sm-6">
                            <div class="f_widget link_widget">
                                <h2 class="f_widget_title">Services</h2>
                                <ul class="list-unstyled list">
                                    <li><a href="shop.php">Shop</a></li>
                                    <li><a href="my-orders.php">Order</a></li>
                                    <li><a href="cart.php">Cart</a></li>
                                    <li><a href="checkout.php">Checkout</a></li>
                                    <li><a href="my-wishlist.php">Wishlist</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-2 col-sm-6">
                            <div class="f_widget link_widget">
                                <h2 class="f_widget_title">Pages</h2>
                                <ul class="list-unstyled list">
                                    <li>
                                        <?php
                                        if(isset($_SESSION['a_info'])){
                                        ?>
                                        <?php
                                        }else{
                                        ?>
                                            <a href="login.php">Sign In</a>                                                                
                                        <?php
                                        }
                                        ?>
                                    </li>
                                    <li>
                                        <?php
                                        if(isset($_SESSION['a_info'])){
                                        ?>
                                        <?php
                                        }else{
                                        ?>
                                            <a href="registration.php">Register</a>                                                               
                                        <?php
                                        }
                                        ?>

                                    </li>
                                    <li><a href="typography.php">Typography</a></li>
                                    <li><a href="404.html">404 Page</a></li>
                                    <li><a href="my-ebook-library.php">Ebook Library</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6">
                            <div class="f_widget link_widget">
                                <h2 class="f_widget_title">Contacs Us</h2>
                                <ul class="list-unstyled list">
                                    <li><a href="#"><i class="fa-solid fa-phone-volume"></i>+91
                                            9832925156</a></li>
                                    <li><a href="mailto:subhadeepdasadhikari141@gmail.com"><i class="fa-solid fa-envelope"></i>subhadeepdasadhikari141@gmail.com</a></li>
                                </ul>
                                <ul class="list-unstyled f_social_round">
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="footer_bottom d-flex  justify-content-center">
                    <p>&copy; 2026 Bookjar. All Rights Reserved</p>
                </div>
            </div>
        </footer>
    </div>
    <!-- Back to top button -->
    <a id="back-to-top" title="Back to Top"></a>
    <!-- Optional JavaScript; choose one of the two! -->
    <script src="assets/js/jquery-3.6.0.min.js"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->

    <script src="assets/js/preloader.js"></script>
    <script src="assets/vendors/bootstrap/js/popper.min.js"></script>
    <script src="assets/vendors/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/vendors/parallax/parallax.js"></script>
    <script src="assets/vendors/slick/slick.min.js"></script>
    <script src="assets/js/comming-soon.js"></script>
    <script src="assets/vendors/isotope/imagesloaded.pkgd.min.js"></script>
    <script src="assets/vendors/isotope/isotope.pkgd.min.js"></script>
    <script src="assets/vendors/parallax/jquery.parallax-scroll.js"></script>
    <script src="assets/vendors/fancybox/jquery.fancybox.min.js"></script>
    <script src="assets/vendors/wow/wow.min.js"></script>
    <script src="assets/js/custom.js"></script>
        <!-- <script src="assets/js/jquery-3.6.0.min.js"></script> -->

    <script>

        function paynow(){
            var total = document.getElementById("total").innerHTML;
            var address=document.getElementById('address').value;
            if(address==""){
                alert("Please enter valid location and address");
            }else{
                var options = {
                    "key": "rzp_test_jIctH4BZwcxQXF", // Enter the Key ID generated from the Dashboard
                    "amount": total*100, // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
                    "currency": "INR",
                    "name": "Book Jar",
                    "description": "A bookstore is a store that sells books, and where people can buy them.",
                    "image": "http://localhost/img/hero.png",
                    "handler": function (response){
                        var payment_id = response.razorpay_payment_id;
                        $.ajax({
                            data:{address:address, payment_id:payment_id},
                            url: "placeorderajax.php",
                            success: function( result ){
                            //   alert(result);
                                alert('Order Placed. Thankyou for Shopping');
                                window.open('order.php','_self');
                            }
                        });
                    }
                };
            }
            var rzp1 = new Razorpay(options);
            rzp1.open();
        }
  </script>

</body>

</html>