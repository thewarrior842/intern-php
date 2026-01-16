<?php require_once('header.php');
    require_once('config.php'); ?>

        <div class="cart-header-separator"></div>

        <!-- Checkout area  -->
        <section class="bj_checkout_area" data-bg-color="#f5f5f5">
            <div class="container">
                <div class="row justify-content-center gy-lg-0 gy-4">
                    <div class="col-lg-7">
                        <div class="bj_checkout_content mb-4">
                            <div class="content_header">
                                Login
                            </div>
                            <div class="content_body">

                                <form class=" row gy-3" action="#" method="post">
                                    <div class="col-md-12 form-group">
                                        <input type="text" class="form-control" id="login_email" required>
                                        <label class="floating-label">Email *</label>
                                    </div>
                                    <div class="col-md-12 form-group">
                                        <input type="password" class="form-control" id="password" required>
                                        <label class="floating-label">Password *</label>
                                    </div>
                                    <div class="col-12">
                                        New user? <a href="registration.html">Create an account</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="bj_checkout_content">
                            <div class="content_header">
                                Shipping Address
                                <span>(Please Fill Out Your Information)</span>
                            </div>
                            <div class="content_body">
                                <div class="porduct_pickup_location_wrapper mb-3">
                                    Pick up your parcel from:
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="porduct_pickup_location" id="flexRadioDefault1">
                                        <label class="form-check-label" for="flexRadioDefault1">
                                            Home
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="porduct_pickup_location" id="flexRadioDefault2" checked>
                                        <label class="form-check-label" for="flexRadioDefault2">
                                            Office
                                        </label>
                                    </div>
                                </div>
                                <form class=" row gy-3" action="#" method="post">
                                    <div class="col-md-12 form-group">
                                        <input type="text" class="form-control" id="name" required>
                                        <label class="floating-label">Full Name *</label>
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <input type="text" class="form-control" id="phone_no" required>
                                        <label class="floating-label">Phone No *</label>
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <input type="text" class="form-control" id="alternative_phone_no" required>
                                        <label class="floating-label">Alternative Phone No </label>
                                    </div>
                                    <div class="col-md-6 form-group">

                                        <select class="selectpickers">
                                            <option value="Bangladesh">Bangladesh</option>
                                            <option value="United States">United States</option>
                                            <option value="United Kingdom">United Kingdom</option>
                                            <option value="Canada">Canada</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <select class="selectpickers">
                                            <option value="Select City" disabled selected="selected">Select City
                                            </option>
                                            <option value="Comilla">Comilla</option>
                                            <option value="Dhaka">Dhaka</option>
                                            <option value="Chittagong">Chittagong</option>
                                            <option value="Khulna">Khulna</option>
                                            <option value="Rajshahi">Rajshahi</option>
                                            <option value="Rangpur">Rangpur</option>
                                            <option value="Mymensingh">Mymensingh</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <select class="select selectpickers">
                                            <option value="Select Area" disabled selected="selected">Select Area
                                            </option>
                                            <option value="Comilla">Comilla</option>
                                            <option value="Dhaka">Dhaka</option>
                                            <option value="Chittagong">Chittagong</option>
                                            <option value="Khulna">Khulna</option>
                                            <option value="Rajshahi">Rajshahi</option>
                                            <option value="Rangpur">Rangpur</option>
                                            <option value="Mymensingh">Mymensingh</option>
                                        </select>
                                    </div>
                                    <div class="col-md-12 form-group">
                                        <textarea class="form-control message" required></textarea>
                                        <label class="floating-label">Address</label>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="cart-happy-return-parent mt-4 mb-0">
                            <div class="cart-happy-return">
                                <img src="assets/img/cart/happy-return-new.webp" alt="">
                                <p>7 Days Happy Return</p>
                            </div>
                            <div class="cart-happy-return">
                                <img src="assets/img/cart/earn-points.svg" alt="">
                                <p>Purchase and Earn Point</p>
                            </div>
                        </div>
                        <div class="bj_checkout_content payment_method_wrapper mt-4">
                            <div class="content_header">
                                Payment Method
                                <span>(Please select a payment method)</span>
                            </div>
                            <div class="content_body">
                                <div class="porduct_payment_method_wrapper">
                                    <div class="field_title">Cash On Delivery</div>

                                    <div class="row ">
                                        <div class="col-lg-6">
                                            <div class="form-check">
                                                <label class="form-check-label" for="cod_payment">
                                                    <input class="form-check-input" type="radio" name="check_payment_method" id="cod_payment">
                                                    <img src="assets/img/cart/cod.webp" alt="">
                                                    <span>Cash On Delivery</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>

                                    <div class="field_title mt-3">Mobile Wallet</div>
                                    <div class="row gy-2 gy-lg-0">
                                        <div class="col-lg-4">
                                            <div class="form-check">
                                                <label class="form-check-label" for="mobile_wallet_payment">
                                                    <input class="form-check-input" type="radio" name="check_payment_method" id="mobile_wallet_payment">
                                                    <img src="assets/img/cart/Skrill.png" alt="">
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-check">
                                                <label class="form-check-label" for="mobile_wallet_payment_2">
                                                    <input class="form-check-input" type="radio" name="check_payment_method" id="mobile_wallet_payment_2">
                                                    <img src="assets/img/cart/Stripe.png" alt="">
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-check">
                                                <label class="form-check-label" for="mobile_wallet_payment_3">
                                                    <input class="form-check-input" type="radio" name="check_payment_method" id="mobile_wallet_payment_3">
                                                    <img src="assets/img/cart/Bitpay.png" alt="">
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="field_title mt-3">Debit/Credit Card</div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-check">
                                                <label class="form-check-label" for="debit_card_payment">
                                                    <input class="form-check-input" type="radio" name="check_payment_method" id="debit_card_payment">
                                                    <img src="assets/img/cart/rok-ssl-card-icon-sslNew.webp" alt="">
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <hr>
                            <div class="payment_method_footer text-lg-end text-center">
                                <a href="#" class="bj_theme_btn">Confirm Order <span class="price ms-1">1,585
                                        Tk</span></a>
                            </div>
                        </div>

                    </div>
                    <div class="col-lg-4">
                        <div class="bj_checkout_sidebar">
                            <div class="cart_checkout_summary border-bottom-radius-0">
                                <div class="cart_checkout_header">
                                    <h5>Checkout Summary</h5>
                                </div>
                                <div class="cart_checkout_body">
                                    <div class="checkout_item">
                                        <span>Subtotal</span>
                                        <span>1,243 Tk</span>
                                    </div>
                                    <div class="checkout_item">
                                        <span>Shipping <button type="button" class="tooltip-btn" data-bs-toggle="tooltip" data-bs-placement="top" title="Minimum delivery charge will start from Rs.48. However, delivery charges will vary depending on the number, price, weight and location of your product.">
                                                <i class="icon_info_alt"></i>
                                            </button></span>
                                        <span>57 Tk</span>
                                    </div>
                                    <div class="checkout_item">
                                        <span>Total</span>
                                        <span>777 Tk</span>
                                    </div>
                                    <div class="checkout_item strong">
                                        <span>Payable Total</span>
                                        <span>1,243 Tk</span>
                                    </div>
                                </div>
                            </div>
                            <div class="checkout_promo_apply">
                                <div class="promo_body">
                                    <a class="promo_header" data-bs-toggle="collapse" href="#promo_code_header" role="button" aria-expanded="false" aria-controls="promo_code_header">
                                        <h6 class="mb-0">Apply Voucher or Promo Code</h6>
                                        <i class="fa-solid fa-chevron-down"></i>
                                    </a>
                                    <div class="collapse" id="promo_code_header">
                                        <form action="#" class="d-flex align-items-center">
                                            <input type="text" class="form-control" placeholder="Enter Promo Code">
                                            <button class="bj_theme_btn">Apply</button>
                                        </form>
                                    </div>
                                </div>
                                <div class="promo-success">
                                    You are saving 26%
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Checkout area  -->

<?php require_once('footer.php'); ?>