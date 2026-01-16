<?php require_once('header.php');
    require_once('config.php'); ?>

        <div class="cart-header-separator"></div>

        <!-- Dashboard area -->
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
                                    <li><a class="active" href="my-ebook-library.php">My eBook Library </a></li>
                                    <li><a href="my-wishlist.php">My Wishlist</a></li>
                                </ul>
                            </div>
                        </div>

                    </div>
                    <div class="col-lg-9">
                        <div class="account_dashboard_body">
                            <div class="account_dashboard_content">
                                <div class="account_dashboard_content_header">
                                    My Owned Products
                                </div>
                                <div class="content_body">
                                    <div class="product_filter_search">
                                        <form action="#" class="search_form">
                                            <input type="text" placeholder="Search for books" class="form-control">
                                            <button type="submit" class="search_btn"><i class="ti-search"></i></button>
                                        </form>

                                        <form class="woocommerce-ordering" method="get">
                                            Sort by
                                            <select name="orderby" class="orderby selectpickers">
                                                <option value="menu_order" selected='selected'>Default sorting</option>
                                                <option value="popularity">Sort by popularity</option>
                                                <option value="rating">Sort by average rating</option>
                                                <option value="date">Sort by latest</option>
                                                <option value="price">Sort by price: low to high</option>
                                                <option value="price-desc">Sort by price: high to low</option>
                                            </select>
                                        </form>

                                    </div>
                                    <div class="owned_product_list">
                                        <div class="my_account_book list-view">
                                            <div class="my_account_book_img ">
                                                <img src="assets/img/cart/best_book1.jpg" alt="cart">
                                            </div>
                                            <div class="my_account_book_content ">
                                                <a href="product-single.php">
                                                    <div class="my_account_book_title ">
                                                        Game Of Thrones
                                                    </div>
                                                </a>
                                                <div class="book_rating">
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                </div>
                                                <div class="source">source: Free Learning</div>
                                            </div>
                                            <div class="my_account_book_action ">
                                                <a href="http://www.googleguide.com/print/adv_op_ref.pdf" class="bj_theme_btn strock_btn gallerypdf"><i class="fa-regular fa-eye"></i>
                                                    Open Reader</a>
                                                <div class="download_options">
                                                    <a href="http://www.googleguide.com/print/adv_op_ref.pdf" download><i class="icon_download"></i> Code</a>
                                                    <a href="http://www.googleguide.com/print/adv_op_ref.pdf" download><i class="icon_download"></i> PDF</a>
                                                    <a href="http://www.googleguide.com/print/adv_op_ref.pdf" download><i class="icon_download"></i> EPUB</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="my_account_book list-view">
                                            <div class="my_account_book_img ">
                                                <img src="assets/img/cart/best_book2.jpg" alt="cart">
                                            </div>
                                            <div class="my_account_book_content ">
                                                <a href="product-single.html">
                                                    <div class="my_account_book_title ">
                                                        Game Of Thrones
                                                    </div>
                                                </a>
                                                <div class="book_rating">
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                </div>
                                                <div class="source">source: Free Learning</div>
                                            </div>
                                            <div class="my_account_book_action ">
                                                <a href="http://www.googleguide.com/print/adv_op_ref.pdf" class="bj_theme_btn strock_btn gallerypdf"><i class="fa-regular fa-eye"></i>
                                                    Open Reader</a>
                                                <div class="download_options">
                                                    <a href="http://www.googleguide.com/print/adv_op_ref.pdf" download><i class="icon_download"></i> Code</a>
                                                    <a href="http://www.googleguide.com/print/adv_op_ref.pdf" download><i class="icon_download"></i> PDF</a>
                                                    <a href="http://www.googleguide.com/print/adv_op_ref.pdf" download><i class="icon_download"></i> EPUB</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="my_account_book list-view">
                                            <div class="my_account_book_img ">
                                                <img src="assets/img/cart/best_book3.jpg" alt="cart">
                                            </div>
                                            <div class="my_account_book_content ">
                                                <a href="product-single.php">
                                                    <div class="my_account_book_title ">
                                                        Game Of Thrones
                                                    </div>
                                                </a>
                                                <div class="book_rating">
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                </div>
                                                <div class="source">source: Free Learning</div>
                                            </div>
                                            <div class="my_account_book_action ">
                                                <a href="http://www.googleguide.com/print/adv_op_ref.pdf" class="bj_theme_btn strock_btn gallerypdf"><i class="fa-regular fa-eye"></i>
                                                    Open Reader</a>
                                                <div class="download_options">
                                                    <a href="http://www.googleguide.com/print/adv_op_ref.pdf" download><i class="icon_download"></i> Code</a>
                                                    <a href="http://www.googleguide.com/print/adv_op_ref.pdf" download><i class="icon_download"></i> PDF</a>
                                                    <a href="http://www.googleguide.com/print/adv_op_ref.pdf" download><i class="icon_download"></i> EPUB</a>
                                                </div>
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
        <!-- Dashboard area -->

<?php require_once('footer.php'); ?>