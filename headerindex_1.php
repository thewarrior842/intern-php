<?php
    require_once('config.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="shortcut icon" href="assets/img/favicon.png" />
    <!-- Bootstrap CSS -->
    <link href="assets/vendors/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
    <link href="assets/vendors/slick/slick.css" rel="stylesheet" />
    <link href="assets/vendors/slick/slick-theme.css" rel="stylesheet" />
    <link href="assets/vendors/elagent-icon/style.css" rel="stylesheet" />
    <link href="assets/vendors/themify-icon/themify-icons.css" rel="stylesheet" />
    <link href="assets/vendors/animation/animate.css" rel="stylesheet" />
    <link href="assets/vendors/font-awesome/css/all.min.css" rel="stylesheet" />
    <link href="assets/vendors/swiper/swiper.min.css" rel="stylesheet" />
    <link href="assets/vendors/icomoon/style.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet" />
    <link href="assets/css/responsive.css" rel="stylesheet" />
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
    <title>Bookjar</title>
</head>

<body data-scroll-animation="true">
    <div id="preloader">
        <div id="ctn-preloader" class="ctn-preloader">
            <div class="round_spinner">
                <div class="spinner"></div>
                <div class="text">
                    <img src="assets/img/favicon.png" alt="Image" />
                    <h4><span>Bookjar</span></h4>
                </div>
            </div>
            <h2 class="head">Did You Know?</h2>
            <p></p>
        </div>
    </div>

    <div class="body_wrapper">
        <div class="click_capture"></div>
        <header class="header_area header_relative header_blue">
            <nav class="navbar navbar-expand-lg menu_one menu_white" id="header">
                <div class="container">
                    <a class="navbar-brand sticky_logo" href="index.php">
                        <img src="assets/img/home/logo-white.svg" alt="logo" />
                        <img src="assets/img/home-two/logo-dark.svg" alt="logo" />
                    </a>
                    <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="menu_toggle">
                            <span class="hamburger">
                                <span></span>
                                <span></span>
                                <span></span>
                            </span>
                            <span class="hamburger-cross">
                                <span></span>
                                <span></span>
                            </span>
                        </span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-between" id="navbarSupportedContent">
                        <ul class="navbar-nav menu w_menu ms-auto me-auto">
                            <li class="nav-item dropdown submenu active">
                                <a class="nav-link dropdown-toggle" href="index.php" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    HOME
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="nav-item active">
                                        <a href="index.php" class="nav-link">Home One</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item dropdown submenu">
                                <a class="nav-link dropdown-toggle" href="shop.php" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Shop
                                </a>

                                <ul class="dropdown-menu">
                                    <li class="nav-item">
                                        <a href="shop.php" class="nav-link">Shop</a>
                                    </li>

                                    <li class="nav-item">
                                        <a href="cart.php" class="nav-link">Cart</a>
                                    </li>

                                    <li class="nav-item">
                                        <a href="checkout.php" class="nav-link">Checkout</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item dropdown submenu">
                                <a class="nav-link dropdown-toggle" href="my-account.php" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Dashboard
                                </a>

                                <ul class="dropdown-menu">
                                    <li class="nav-item">
                                        <a href="my-account.php" class="nav-link">User Profile</a>
                                    </li>

                                    <li class="nav-item">
                                        <a href="my-orders.php" class="nav-link">Orders</a>
                                    </li>

                                    <li class="nav-item">
                                        <a href="my-wishlist.php" class="nav-link">Wishlist</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item dropdown submenu mega_menu tab-demo">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Explore
                                </a>
                                <ul class="dropdown-menu sub">
                                    <li>
                                        <div class="row">
                                            <div class="col-lg-5 tabHeader">
                                                <ul class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                                    <li class="nav-item active">
                                                        <a class="nav-link" id="v-pills-tour-tab" data-toggle="pill" href="#v-pills-tour" role="tab" aria-controls="v-pills-tour" aria-selected="false">Utility Pages</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" id="v-others-menu-tab" data-toggle="pill" href="#v-others-menu" role="tab" aria-controls="v-others-menu" aria-selected="false">Company</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" id="v-pills-doc-tab" data-toggle="pill" href="#v-pills-doc" role="tab" aria-controls="v-pills-doc" aria-selected="true">Shop Pages</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" id="v-pills-code-tab" data-toggle="pill" href="#v-pills-code" role="tab" aria-controls="v-pills-code" aria-selected="false">Dashboard</a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="col-lg-7">
                                                <div class="tab-content tabContent" id="v-pills-tabContent">
                                                    <div class="tab-pane fade active show" id="v-pills-tour" role="tabpanel" aria-labelledby="v-pills-tour-tab">
                                                        <div class="d-flex">
                                                            <ul class="list-unstyled tab_list w_100">
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
                                                                        <a href="registration.php">Sign Up</a>                                                                
                                                                    <?php
                                                                    }
                                                                    ?>                                                                    
                                                                </li>
                                                                <li>
                                                                    <a href="typography.php">Typography</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="tab-pane fade" id="v-others-menu" role="tabpanel" aria-labelledby="v-others-menu-tab">
                                                        <div class="d-flex">
                                                            <ul class="list-unstyled tab_list w_100">
                                                                <li>
                                                                    <a href="about.php">About</a>
                                                                </li>
                                                                <li>
                                                                    <a href="terms-condition.php">Terms & Services</a>
                                                                </li>
                                                                <li>
                                                                    <a href="privacy-policy.php">Privacy Policy</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="tab-pane fade" id="v-pills-doc" role="tabpanel" aria-labelledby="v-pills-doc-tab">
                                                        <div class="d-flex">
                                                            <ul class="list-unstyled tab_list">
                                                                <li>
                                                                    <a href="shop.php">Shop</a>
                                                                </li>
                                                                <li>
                                                                    <a href="cart.php">Cart</a>
                                                                </li>
                                                                <li>
                                                                    <a href="checkout.php">Checkout</a>
                                                                </li>
                                                                <li>
                                                                    <a href="my-wishlist.php">Wishlist</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="tab-pane fade" id="v-pills-code" role="tabpanel" aria-labelledby="v-pills-code-tab">
                                                        <div class="d-flex">
                                                            <ul class="list-unstyled tab_list">
                                                                <li>
                                                                    <a href="my-account.php">User Profile</a>
                                                                </li>
                                                                <li>
                                                                    <a href="my-orders.php">Orders</a>
                                                                </li>
                                                                <li>
                                                                    <a href="my-ebook-library.php">Ebook Library</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>                                   
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item dropdown submenu">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Blog
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="nav-item">
                                        <a href="#" class="nav-link">Coming Soon</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>

                        <div class="alter_nav">
                            <ul class="navbar-nav search_cart menu">
                                <li class="nav-item shpping-cart dropdown submenu">
                                    <a class="cart-btn nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="icon-shopping-basket"></i></a>
                                    <ul class="dropdown-menu">                                  
                                        <li class="cart_f">
                                            <div class="cart-button text-center">
                                                <a href="cart.php" class="btn btn-cart get_btn pink">View Cart</a>
                                                <a href="checkout.php" class="btn btn-cart get_btn dark">Checkout</a>
                                            </div>
                                        </li>
                                    </ul>
                                </li>
                                <li class="nav-item user ms-3">
                                    <a class="nav-link" href="my-account.php"><i class="icon-user"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </nav>
        </header>