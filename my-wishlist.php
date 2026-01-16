<?php require_once('header.php');
    require_once('config.php'); ?>

        <div class="cart-header-separator"></div>

        <section class="bj_account_dashboard" data-bg-color="#f5f5f5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="account_dashboard_sidebar">
                            <div class="sidebar_widget_body d-flex account_dashboard_sidebar_profile">
                                <div class="">
                                    <img src="assets/img/profile-img.png" alt="account">
                                </div>

                                <div class="">
                                    <div class="greetings">Hello</div>
                                    <?php
                                    if(isset($_SESSION['a_info'])){
                                    ?>
                                        <div class="name"><?php echo $_SESSION['a_info']['f_name'] ?></div>
                                    <?php
                                    }else{
                                    ?>
                                        <div class="name">Guest</div>
                                    <?php
                                    }
                                    ?>
                                </div>
                                
                            </div>
                            <div class="sidebar_widget_body p-0">
                                <ul class="sidebar_widget_menu">
                                    <li><a href="my-account.php">My Profile</a></li>
                                    <li><a href="my-orders.php">My Orders</a></li>
                                    <li><a href="my-ebook-library.php">My eBook Library </a></li>
                                    <li><a class="active" href="my-wishlist.php">My Wishlist</a></li>
                                </ul>
                            </div>
                        </div>

                    </div>
                    <div class="col-lg-9">
                        <div class="account_dashboard_body">
                            <div class="account_dashboard_content">
                                <div class="account_dashboard_content_header">
                                    My Wishlist
                                    <p>You have 3 product(s) in your wishlist</p>
                                </div>
                                <div class="content_body">
                                    <div class="wishlist_product_list">
                                        <div class="my_account_book list-view">
                                            <div class="my_account_book_img">
                                                <img src="assets/img/cart/best_book1.jpg" alt="cart">
                                            </div>
                                            <div class="my_account_book_content">
                                                <a href="product-single.php">
                                                    <div class="my_account_book_title">The Midnight Whispers
                                                    </div>
                                                </a>

                                                <div class="author_name">Muaz BK</div>
                                                <div class="book_price">
                                                    <span class="discount_amount">
                                                        $19.99
                                                    </span>
                                                    <span class="mrp_amount">
                                                        $29.99
                                                    </span>
                                                </div>

                                                <div class="book_rating_info">
                                                    <a href="#">1 Ratings</a>
                                                    <div class="separator"></div>
                                                    <a href="#">1 Reviews</a>
                                                </div>
                                                <button class="bj_theme_btn strock_btn add-to-cart-automated" data-name="The Midnight Whispers" data-price="19.99" data-img="assets/img/cart/best_book1.jpg" data-mrp="29.99"><i class="fa-solid fa-cart-plus"></i> Add to
                                                    Cart</button>
                                            </div>
                                            <div class="my_account_book_action">
                                                <a href="#" class="remove_btn"><i class="ti-trash"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>

<?php require_once('footer.php'); ?>