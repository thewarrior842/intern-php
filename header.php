<?php
    require_once('config.php');
?>
<?php
$uri_path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri_segments = explode('/', $uri_path);
$current_page= end($uri_segments);
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="assets/img/favicon.png">
    <!-- Bootstrap CSS -->
    <link href="assets/vendors/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendors/slick/slick.css" rel="stylesheet">
    <link href="assets/vendors/slick/slick-theme.css" rel="stylesheet">
    <link href="assets/vendors/elagent-icon/style.css" rel="stylesheet">
    <link href="assets/vendors/font-awesome/css/all.min.css" rel="stylesheet">
    <link href="assets/vendors/icomoon/style.css" rel="stylesheet">
    <link href="assets/vendors/themify-icon/themify-icons.css" rel="stylesheet">
    <link href="assets/vendors/animation/animate.css" rel="stylesheet">
    <link href="assets/vendors/fancybox/jquery.fancybox.min.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/responsive.css" rel="stylesheet">
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
    <title>Bookjar</title>
</head>

<body data-scroll-animation="true">
    <div id="preloader">
        <div id="ctn-preloader" class="ctn-preloader">
            <div class="round_spinner">
                <div class="spinner"></div>
                <div class="text">
                    <img src="assets/img/favicon.png" alt="Image">
                    <h4><span>Bookjar</span></h4>
                </div>
            </div>
            <h2 class="head">Did You Know?</h2>
            <p></p>
        </div>
    </div>
    <div class="body_wrapper">

        <div class="toast-container position-fixed p-3">
            <div id="cartToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-header">
                    <strong class="me-auto">Cart Update</strong>
                    <small>just now</small>
                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body">
                    Item added to the cart!
                </div>
            </div>
        </div>

        <header class="header_area header_relative">
            <nav class="navbar navbar-expand-lg menu_one" id="header">
                <div class="container">
                    <a class="navbar-brand" href="index.php"><img src="assets/img/home-two/logo-dark.svg" alt="logo"></a>
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
                            <li class="nav-item">
                                <a href="index.php" class="nav-link">Home</a>
                            </li>
                            <li class="nav-item">
                                <a href="shop.php" class="nav-link">Shop</a>
                            </li>
                            <li class="nav-item">
                                <a href="about.php" class="nav-link">About</a>
                            </li>
                            <?php
                            if(isset($_SESSION['a_info'])){
                                ?>
                                <li class="nav-item dropdown submenu">
                                <a class="nav-link dropdown-toggle" href="my-account.php" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <?php echo $_SESSION['a_info']['f_name']." ".$_SESSION['a_info']['l_name'] ?>
                                </a>

                                <ul class="dropdown-menu">
                                    <li class="nav-item">
                                        <a href="my-account.php" class="nav-link">User Profile</a>
                                    </li>

                                    <li class="nav-item">
                                        <a href="my-orders.php" class="nav-link">Orders</a>
                                    </li>

                                    <!-- <li class="nav-item">
                                        <a href="my-wishlist.php" class="nav-link">Wishlist</a>
                                    </li> -->
                                </ul>
                            </li>
                                <?php
                            }
                            ?>
                        </ul>
                        <div class="alter_nav">
                            <ul class="navbar-nav search_cart menu">
                                <li class="nav-item search"><a class="nav-link search-btn" href="javascript:void(0);"><i class="ti-search"></i></a>
                                    <form action="#" method="get" class="menu-search-form">
                                        <div class="input-group">
                                            <input type="search" class="form-control" placeholder="Search here..">
                                            <button type="submit"><i class="ti-arrow-right"></i></button>
                                        </div>
                                    </form>
                                </li>
                                <li class="nav-item shpping-cart dropdown submenu">
                                    <a class="cart-btn nav-link" href="cart.php"> <i class="ti-shopping-cart"></i></a>
                                </li>
                            </ul>
                        </div>
                        <?php
                        if(isset($_SESSION['a_info'])){
                        ?>
                            <a class="bj_theme_btn strock_btn hidden-sm hidden-xs" href="logout.php"><i class="fa-regular fa-user"></i>Logout</a>
                        <?php
                        }else{
                        ?>
                            <a class="bj_theme_btn strock_btn hidden-sm hidden-xs" href="login.php"><i class="fa-regular fa-user"></i>Login</a>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </nav>
        </header>