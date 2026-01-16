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
            'item_id' => $_POST["hidden_id"],
            'item_name' => $_POST["hidden_name"],
            'item_price' => $_POST["hidden_price"],
            'item_quantity' => $_POST["quantity"]
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
    <div class="bd_shape one wow fadeInDown layer" data-wow-delay="0.3s" data-depth="0.5"><img
            data-parallax='{"y": -50}' src="assets/img/breadcrumb/book_left1.png" alt="">
    </div>
    <div class="bd_shape two wow fadeInUp layer" data-depth="0.6" data-wow-delay="0.4s"><img data-parallax='{"y": 30}'
            src="assets/img/breadcrumb/book-left2.png" alt="">
    </div>
    <div class="bd_shape three wow fadeInDown layer" data-wow-delay="0.3s" data-depth="0.5"><img
            data-parallax='{"y": -50}' src="assets/img/breadcrumb/plane-1.png" alt="">
    </div>
    <div class="bd_shape four wow fadeInUp layer" data-depth="0.6" data-wow-delay="0.4s"><img data-parallax='{"y": 30}'
            src="assets/img/breadcrumb/plan-3.png" alt="">
    </div>
    <div class="bd_shape five wow fadeInUp layer" data-depth="0.6" data-wow-delay="0.4s"><img data-parallax='{"y": 80}'
            src="assets/img/breadcrumb/plan-2.png" alt="">
    </div>
    <div class="bd_shape six wow fadeInDown layer" data-wow-delay="0.3s" data-depth="0.5"><img
            data-parallax='{"y": -60}' src="assets/img/breadcrumb/book-right.png" alt="">
    </div>
    <div class="bd_shape seven wow fadeInUp layer" data-depth="0.6" data-wow-delay="0.4s"><img data-parallax='{"x": 50}'
            src="assets/img/breadcrumb/book-right2.png" alt="">
    </div>
    <div class="container">
        <h2 class="title wow fadeInUp" data-wow-delay="0.2s">Book Shope</h2>
        <ol class="breadcrumb justify-content-center wow fadeInUp" data-wow-delay="0.3s">
            <li><a href="index.php">Home</a></li>
            <li class="active">Shop Single</li>
        </ol>
    </div>
</section>
<!-- breadcrumb area  -->
<section class="product_details_area sec_padding" data-bg-color="#f5f5f5">
    <div class="container">
        <div class="row gy-xl-0 gy-3">
            <div class="col-xl-9">
                <?php
                $b_id = base64_decode($_GET['b_id']);
                $src = "SELECT b.*, c.cat_name FROM book b INNER JOIN category c ON b.cat_id=c.cat_id WHERE b.b_id=$b_id";
                $rs = mysqli_query($conn, $src) or die(mysqli_error($conn));
                $rec = mysqli_fetch_assoc($rs);
                ?>
                <div class="bj_book_single me-xl-3">
                    <div class="bj_book_img flip">
                        <div class="front"><img class="img-fluid" src="<?php echo $rec['b_img'] ?>" alt="">
                        </div>
                        <div class="back"><img class="img-fluid" src="<?php echo $rec['b_img'] ?>" alt=""></div>
                        <div class="pr_ribbon">
                            <span class="product-badge">New</span>
                        </div>
                    </div>
                    <div class="bj_book_details">
                        <h2><?php echo $rec['b_title'] ?></h2>
                        <ul class="list-unstyled book_meta">
                            <li>By:<a href="#"><?php echo $rec['author'] ?></a></li>
                            <li>Category:<a href="#"><?php echo $rec['cat_name'] ?></a></li>
                            <li>Tag:<a href="#">Best Sellers</a></li>
                        </ul>
                        <div class="price">&#8377;<?php echo $rec['price'] ?>.00</div>
                        <p><?php echo substr($rec['description'], 0, 250) ?> <a href="#">See more.</a></p>
                        <ul class="product_meta list-unstyled">
                            <li><span>Publisher:</span><?php echo $rec['publisher'] ?></li>
                            <li><span>Publication date:</span><?php echo $rec['pub_date'] ?></li>
                        </ul>
                    </div>
                </div>
                <div class="bj_book_single_tab_area me-xl-3">
                    <ul class="nav nav-tabs bj_book_single_tab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="product_description-tab" data-bs-toggle="tab"
                                data-bs-target="#product_description" type="button" role="tab"
                                aria-controls="product_description" aria-selected="true">Product
                                Details</button>
                        </li>
                    </ul>
                    <div class="tab-content bj_book_single_tab_content mt-4">
                        <div class="tab-pane fade show active" id="product_description" role="tabpanel"
                            aria-labelledby="product_description-tab">
                            <div class="product_book_content_details">
                                <div>
                                    <h5 class="content_header mb-2">Description</h5>
                                    <p class="content_text mb-2"><?php echo ($rec['description']) ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3">
                <div class="product_sidbar">
                    <div class="price_head">Buy new: <span class="price">&#8377;<?php echo $rec['price'] ?>.00</span>
                    </div>
                    <ul class="list-unstyled">
                        <li>
                            <div class="icon"><img src="assets/img/arrow.png" alt=""></div>Get Fast, Free
                            Shipping with <span class="blue_text">FREE
                                Returns</span>
                        </li>
                        <li>
                            <div class="icon"><img src="assets/img/arrow.png" alt=""></div><span class="blue_text">FREE
                                delivery</span> if you spend any amount
                            on items shipped by Bookjar
                        </li>
                        <li>
                            <div class="icon"><img src="assets/img/arrow.png" alt=""></div>Fastest delivery
                            <span class="blue_text">as per your destination</span>
                        </li>
                        <li>
                            <div class="icon"><img src="assets/img/pin.png" alt=""></div>Select delivery
                            location
                        </li>
                    </ul>
                    <h3>In Stock.</h3>
                    <form name="<?php echo $rec['b_title'] ?>" method="post">
                        <div class="product-qty">
                            Qty:
                            <div class="cart_quantity">
                                <button type="button" class="quantity_btn minus"><i class="icon_minus-06"></i></button>
                                <input name="quantity" type="number" min="1" max="5" step="1" value="1">
                                <button type="button" class="quantity_btn plus"><i class="icon_plus"></i></button>
                            </div>
                        </div>

                        <div class="d-flex flex-column gap-3">
                            <input type="hidden" name="hidden_id" value="<?php echo $rec['b_id'] ?>">
                            <input type="hidden" name="hidden_name" value="<?php echo $rec['b_title'] ?>">
                            <input type="hidden" name="hidden_price" value="<?php echo $rec['price'] ?>">
                            <input type="submit" name="add_to_cart" value=" Add to Cart" class="btn btn-primary">
                            <!-- <button class="bj_theme_btn add-to-cart-automated" type="button" data-name="<?php echo $rec['b_title'] ?>" data-price="&#8377;<?php echo $rec['price'] ?>.00" data-img="<?php echo $rec['b_img'] ?>" > <i class="icon_cart_alt"></i>Add to
                                        cart</button> -->
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<?php require_once('footer.php'); ?>