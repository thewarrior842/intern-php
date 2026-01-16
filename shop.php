<?php
if (isset($_POST["add_to_cart"])) {
    if (isset($_COOKIE["shopping_cart"])) {
        $cookie_data = stripslashes($_COOKIE['shopping_cart']);

        $cart_data = json_decode($cookie_data, true);
    } else {
        $cart_data = array();
    }

    $item_id_list = array_column($cart_data, 'item_id');

    if (in_array($_POST["hidden_id"], $item_id_list)) {
        foreach ($cart_data as $keys => $values) {
            if ($cart_data[$keys]["item_id"] == $_POST["hidden_id"]) {
                $cart_data[$keys]["item_quantity"] = $cart_data[$keys]["item_quantity"] + $_POST["quantity"];
            }
        }
    } else {
        $item_array = array(
            'item_id'   => $_POST["hidden_id"],
            'item_name'   => $_POST["hidden_name"],
            'item_price'  => $_POST["hidden_price"],
            'item_quantity'  => $_POST["quantity"]
        );
        $cart_data[] = $item_array;
    }


    $item_data = json_encode($cart_data);
    ob_start();
    setcookie('shopping_cart', $item_data, time() + (86400 * 30));
    ob_end_flush();
?>
    <script>
        window.location = "cart.php?success=1";
    </script>
<?php
}
?>


<?php require_once('header.php');
require_once('config.php'); ?>

<!-- breadcrumb area  -->
<section class="bj_breadcrumb_area text-center banner_animation_03" data-bg-color="#f5f5f5">
    <div class="bg_one" data-bg-image="assets/img/breadcrumb/breadcrumb_banner_bg.png"></div>
    <div class="bd_shape one wow fadeInDown layer" data-wow-delay="0.3s" data-depth="0.5"><img data-parallax='{"y": -50}' src="assets/img/breadcrumb/book_left1.png" alt="">
    </div>
    <div class="bd_shape two wow fadeInUp layer" data-depth="0.6" data-wow-delay="0.4s"><img data-parallax='{"y": 30}' src="assets/img/breadcrumb/book-left2.png" alt="">
    </div>
    <div class="bd_shape three wow fadeInDown layer" data-wow-delay="0.3s" data-depth="0.5"><img data-parallax='{"y": -50}' src="assets/img/breadcrumb/plane-1.png" alt="">
    </div>
    <div class="bd_shape four wow fadeInUp layer" data-depth="0.6" data-wow-delay="0.4s"><img data-parallax='{"y": 30}' src="assets/img/breadcrumb/plan-3.png" alt="">
    </div>
    <div class="bd_shape five wow fadeInUp layer" data-depth="0.6" data-wow-delay="0.4s"><img data-parallax='{"y": 80}' src="assets/img/breadcrumb/plan-2.png" alt="">
    </div>
    <div class="bd_shape six wow fadeInDown layer" data-wow-delay="0.3s" data-depth="0.5"><img data-parallax='{"y": -60}' src="assets/img/breadcrumb/book-right.png" alt="">
    </div>
    <div class="bd_shape seven wow fadeInUp layer" data-depth="0.6" data-wow-delay="0.4s"><img data-parallax='{"x": 50}' src="assets/img/breadcrumb/book-right2.png" alt="">
    </div>
    <div class="container">
        <h2 class="title wow fadeInUp" data-wow-delay="0.2s">Book Shope</h2>
        <ol class="breadcrumb justify-content-center wow fadeInUp" data-wow-delay="0.3s">
            <li><a href="index.php">Home</a></li>
            <li class="active">Shop Sidebar</li>
        </ol>
    </div>
</section>
<!-- breadcrumb area  -->


<!-- shop area  -->
<section class="bj_shop_area sec_padding" data-bg-color="#f5f5f5">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="shop_sidebar">
                    <div class="widget filter_widget">
                        <h3 class="shop_sidebar_title"><a href="#"><img src="assets/img/shop/filter.svg" alt=""></a>Filter</h3>
                    </div>
                    <div class="widget shop_category_widget">
                        <h4 class="shop_sidebar_title_small"><i class="icon-category-icon"></i>Category</h4>
                        <ul class="list-unstyled shop_category_list">
                            <li><a href="shop.php">All categories</a></li>
                            <?php
                            $cat = mysqli_query($conn, "SELECT * FROM category ORDER BY cat_name");
                            if (mysqli_num_rows($cat) > 0) {
                                while ($cat_row = mysqli_fetch_assoc($cat)) {
                            ?>
                                    <li><a href="shop.php?cat=<?php echo base64_encode($cat_row['cat_id']) ?>"><?php echo $cat_row['cat_name'] ?></a></li>
                            <?php
                                }
                            } else {
                                echo '<li><a href="#">All categories</a></li>';
                            }
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-9">
                <form role="search" method="get" class="pr_search_form input-group" action="#">
                    <input type="text" name="s" value="" class="form-control search-field" id="search" placeholder="Serach  off book store..">
                    <button type="submit"><i class="ti-search"></i></button>
                </form>
                <div class="shop_top d-flex align-items-center justify-content-between">
                </div>
                <div class="row">
                    <?php
                    if (empty($_GET['cat'])) {
                        $src = mysqli_query($conn, "SELECT * FROM book") or die(mysqli_error($conn));
                        if (mysqli_num_rows($src) > 0) {
                            while ($brec = mysqli_fetch_assoc($src)) {
                    ?>

                                <div class="col-xl-3 col-lg-4 col-sm-6 projects_item">
                                    <div class="best_product_item best_product_item_two shop_product">
                                        <div class="img">
                                            <a href="product-single.php?b_id=<?php echo base64_encode($brec['b_id']); ?>" class="img">
                                                <img src="<?php echo $brec['b_img'] ?>" alt="book" />
                                            </a>
                                            <?php
                                            if ($brec['new'] == 1) {
                                            ?>
                                                <div class="pr_ribbon">
                                                    <span class="product-badge">New</span>
                                                </div>

                                            <?php
                                            }
                                            ?>
                                            <!-- <div class="hover_item">
                                                        <a class="quick_button" href="my-wishlist.php" data-bs-toggle="tooltip" data-bs-placement="right" title="Wishlist"><i class="icon_heart_alt"></i></a>
                                                    </div>
                                                    <button type="button" class="bj_theme_btn add-to-cart-automated" data-name="" data-img="" data-price="" data-mrp="">
                                                        <i class="icon_cart_alt"></i>Add To Cart
                                                    </button> -->
                                        </div>
                                        <div class="bj_new_pr_content">
                                            <a href="product-single.php?b_id=<?php echo base64_encode($brec['b_id']) ?>">
                                                <h4 class="bj_new_pr_title"><?php echo $brec['b_title'] ?></h4>
                                            </a>
                                            <div class="bj_pr_meta d-flex">
                                                <div class="book_price">&#8377;<?php echo $brec['price'] ?>.00</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php
                            }
                        } else {
                            echo "No Book Found";
                        }
                    } else {
                        $cat_id = base64_decode($_GET['cat']);
                        $src = mysqli_query($conn, "SELECT * FROM book WHERE cat_id=$cat_id") or die(mysqli_error($conn));
                        if (mysqli_num_rows($src) > 0) {
                            while ($brec = mysqli_fetch_assoc($src)) {
                            ?>
                                <div class="col-xl-3 col-lg-4 col-sm-6 projects_item">
                                    <div class="best_product_item best_product_item_two shop_product">
                                        <div class="img">
                                            <a href="product-single.php?b_id=<?php echo base64_encode($brec['b_id']); ?>" class="img">
                                                <img src="<?php echo $brec['b_img'] ?>" alt="book" />
                                            </a>
                                            <div class="pr_ribbon">
                                                <span class="product-badge">New</span>
                                            </div>
                                            <div class="hover_item">
                                                <a class="quick_button" href="my-wishlist.php" data-bs-toggle="tooltip" data-bs-placement="right" title="Wishlist"><i class="icon_heart_alt"></i></a>
                                            </div>
                                            <!-- <form name="<?php echo $brec['b_title'] ?>" method="post">
                                                                <input type="hidden" name="hidden_id" value="<?php echo $brec['b_id'] ?>">
                                                                <input type="hidden" name="hidden_name" value="<?php echo $brec['b_title'] ?>">
                                                                <input type="hidden" name="hidden_price" value="<?php echo $brec['price'] ?>">
                                                                <input type="hidden" name="quantity" value="1">
                                                                <input type="submit" name="add_to_cart" value="Add to Cart" class="btn btn-primary">
                                                            </form> -->
                                            <!-- <button type="button" class="bj_theme_btn add-to-cart-automated" data-name="" data-img="" data-price="" data-mrp="">
                                                        <i class="icon_cart_alt"></i>Add To Cart
                                                    </button> -->
                                        </div>
                                        <div class="bj_new_pr_content">
                                            <a href="product-single.php?b_id=<?php echo base64_encode($brec['b_id']); ?>">
                                                <h4 class="bj_new_pr_title"><?php echo $brec['b_title'] ?></h4>
                                            </a>
                                            <div class="bj_pr_meta d-flex">
                                                <div class="book_price">&#8377;<?php echo $brec['price'] ?>.00</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                    <?php
                            }
                        } else {
                            echo "No Book Found";
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- shop area  -->

<?php require_once('footer.php'); ?>