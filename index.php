<?php
if(isset($_POST["add_to_cart"]))
{
 if(isset($_COOKIE["shopping_cart"]))
 {
  $cookie_data = stripslashes($_COOKIE['shopping_cart']);

  $cart_data = json_decode($cookie_data, true);
 }
 else
 {
  $cart_data = array();
 }

 $item_id_list = array_column($cart_data, 'item_id');

 if(in_array($_POST["hidden_id"], $item_id_list))
 {
  foreach($cart_data as $keys => $values)
  {
   if($cart_data[$keys]["item_id"] == $_POST["hidden_id"])
   {
    $cart_data[$keys]["item_quantity"] = $cart_data[$keys]["item_quantity"] + $_POST["quantity"];
   }
  }
 }
 else
 {
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
    window.location="cart.php?success=1";
</script>
<?php
}
?>
<?php
require_once('headerindex.php');
require_once('config.php');
?>
  
        <!-- banner area  -->
        <section class="bj_banner_area banner_animation_03" data-bg-color="#f5f5f5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="bj_banner_content">
                            <div class="offer_text wow fadeInUp">
                                SALE UPTO <span>20% OFF</span>
                            </div>
                            <h2 class="wow fadeInUp" data-wow-delay="0.2s">
                                Meet your next favorite book
                            </h2>
                            <p class="wow fadeInUp" data-wow-delay="0.4s">
                                Unleash your imagination with epic fantasy sagas, mystical
                                adventures, and tales of otherworldly realms. Embark on quests
                                with heroes.
                            </p>
                            <div class="d-flex">
                                <a href="shop.php" class="bj_theme_btn wow fadeInLeft" data-wow-delay="0.2s">SHOP
                                    NOW</a>
                                <a href="#product_tab_showcase_id" class="bj_theme_btn strock_btn wow fadeInLeft" data-wow-delay="0.3s">TAKE A
                                    TOUR</a>
                            </div>
                            <div class="d-flex community_info_wrapper wow fadeInUp" data-wow-delay="0.4s">
                                <div class="community_info">
                                    <h5>Our Community</h5>
                                    <div class="people_img">
                                        <div class="avater_img">
                                            <img src="assets/img/home/avater_one.png" alt="" />
                                        </div>
                                        <div class="avater_img">
                                            <img src="assets/img/home/avater2.png" alt="" />
                                        </div>
                                        <div class="avater_img">
                                            <img src="assets/img/home/avater3.png" alt="" />
                                        </div>
                                        <div class="avater_img">
                                            <img src="assets/img/home/avater4.png" alt="" />
                                        </div>
                                        <div class="avater_img">
                                            <i class="fa-solid fa-plus"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="community_info_number">
                                    <div class="number"><span class="counter">100</span>k+</div>
                                    <p>Book Readers worldwide</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="bj_banner_img">
                            <img class="wow fadeInRight" data-wow-delay="0.4s" src="assets/img/home/girl.png" alt="" />
                            <div class="shape_one">
                                <img class="layer" data-depth="-0.15" src="assets/img/home/star-one.png" alt="" />
                            </div>
                            <div class="shape_two">
                                <img class="layer" data-depth="-0.25" src="assets/img/home/star-two.png" alt="" />
                            </div>
                            <div class="shape_three">
                                <img class="layer" data-depth="-0.15" src="assets/img/home/round.png" alt="" />
                            </div>
                            <div class="shape_four">
                                <img src="assets/img/home/dot.png" alt="" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- banner area  -->

        <!-- product tab showcase area  -->
        <section class="product_tab_showcase_area sec_padding" id="product_tab_showcase_id">
            <div class="container">
                <div class="section_title wow fadeInUp">
                    <h2 class="title title_two">Browse By Genres</h2>
                </div>
                <div class="row wow fadeInUp" data-wow-delay="0.2s">
                    
                    <div class="col-lg-4">
                        <ul class="nav nav-pills tab_slider_thumb" id="pills-tab-one" role="tablist">
                            <?php
                            $cat=mysqli_query($conn,"SELECT * FROM category ORDER BY cat_name");
                            if(mysqli_num_rows($cat) > 0){
                                $cat_arr=array(); //Define an array
                                $i=0;
                                while($catrow = mysqli_fetch_assoc($cat)){
                                    $cat_arr[$catrow['cat_id']]=$catrow['cat_name'];
                                    if($i==0){
                                        ?>
                                        <li role="presentation" class="nav-item">
                                        <a class="nav-link active" id="pills-<?php echo $catrow['cat_name'] ?>-tab" data-bs-toggle="pill" data-bs-target="#pills-<?php echo $catrow['cat_name'] ?>" role="tab" aria-controls="pills-<?php echo $catrow['cat_name'] ?>" aria-selected="true">
                                            <strong><?php echo $catrow['cat_name'] ?></strong> <span>&nbsp;</span></a>
                                        </li>

                                        <?php
                                    }else{
                                        ?>
                                        <li role="presentation" class="nav-item">
                                            <a class="nav-link" id="pills-<?php echo $catrow['cat_name'] ?>-tab" data-bs-toggle="pill" data-bs-target="#pills-<?php echo $catrow['cat_name'] ?>" role="tab" aria-controls="pills-<?php echo $catrow['cat_name'] ?>" aria-selected="false">
                                                <strong><?php echo $catrow['cat_name'] ?></strong> <span>&nbsp;</span></a>
                                        </li>
                                        <?php
                                    }
                                    $i++;
                                }
                            }else{
                                echo "Category Not Found";
                            }
                            ?>                            
                        </ul>
                    </div>
                    <div class="col-lg-8">
                        <div class="tab-content" id="pills-tabContent-two">
                            <?php
                            $i=0;
                            foreach($cat_arr as $key=>$val){
                                if($i==0){
                                ?>
                                <div class="tab-pane fade show active" id="pills-<?php echo $val;?>" role="tabpanel" aria-labelledby="pills-<?php echo $val;?>-tab"><?php echo $val; ?>
                                    <div class="tab_slider_content slick_slider_tab">
                                        <?php
                                        $src="SELECT * FROM book WHERE cat_id=$key";
                                        $brs=mysqli_query($conn, $src)or die(mysqli_error($conn));
                                        if(mysqli_num_rows($brs)){
                                            while($brec=mysqli_fetch_assoc($brs)){
                                                ?>
                                                <div class="item">
                                                    <div class="bj_new_pr_item">
                                                        <a href="product-single.php?b_id=<?php echo base64_encode($brec['b_id']); ?>" class="img">
                                                            <img src="<?php echo $brec['b_img'] ?>" alt="book" />
                                                        </a>
                                                        <a href="my-wishlist.php" data-bs-toggle="tooltip" data-bs-placement="top" title="Add to Wishlist" class="wish_btn" tabindex="-1"><i class="icon_heart_alt"></i></a>
                                                        <div class="bj_new_pr_content_two">
                                                            <div class="d-flex justify-content-between">
                                                                <a href="product-single.php?b_id=<?php echo base64_encode($brec['b_id']) ?>">
                                                                    <h5><?php echo $brec['b_title'] ?></h5>
                                                                </a>
                                                                <div class="book_price">
                                                                    <sup>&#8377;</sup><?php echo $brec['price'] ?><sup></sup>
                                                                </div>
                                                            </div>
                                                            <div class="writer_name">
                                                                <i class="icon-user"></i><a href="#"><?php echo $brec['author'] ?></a>
                                                            </div>
                                                            <form name="<?php echo $brec['b_title'] ?>" method="post">
                                                                <input type="hidden" name="hidden_id" value="<?php echo $brec['b_id'] ?>">
                                                                <input type="hidden" name="hidden_name" value="<?php echo $brec['b_title'] ?>">
                                                                <input type="hidden" name="hidden_price" value="<?php echo $brec['price'] ?>">
                                                                <input type="hidden" name="quantity" value="1">
                                                                <input type="submit" name="add_to_cart" value="Add to Cart" class="btn btn-primary">
                                                            </form>

                                                            <!-- <button type="button" class="bj_theme_btn add-to-cart-automated" data-name="" data-img="" data-price="" data-mrp="">
                                                                <i class="icon_cart_alt"></i>Add To Cart
                                                            </button> -->
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php
                                            }
                                        }else{
                                            echo "No Books Found";
                                        }
                                        ?>
                                    </div>
                                </div>
                                <?php
                                }else{
                                    ?>
                                    <div class="tab-pane fade <?php echo $val;?>" id="pills-<?php echo $val;?>" role="tabpanel" aria-labelledby="pills-<?php echo $val;?>-tab"><?php echo $val;?>
                                        <div class="tab_slider_content slick_slider_tab">
                                        <?php
                                        $src="SELECT * FROM book WHERE cat_id=$key";
                                        $brs=mysqli_query($conn, $src)or die(mysqli_error($conn));
                                        if(mysqli_num_rows($brs)){
                                            while($brec=mysqli_fetch_assoc($brs)){
                                                ?>
                                                <div class="item">
                                                    <div class="bj_new_pr_item">
                                                        <a href="product-single.php?b_id=<?php echo base64_encode($brec['b_id']); ?>" class="img">
                                                            <img src="<?php echo $brec['b_img'] ?>" alt="book" />
                                                        </a>
                                                        <a href="my-wishlist.php" data-bs-toggle="tooltip" data-bs-placement="top" title="Add to Wishlist" class="wish_btn" tabindex="-1"><i class="icon_heart_alt"></i></a>
                                                        <div class="bj_new_pr_content_two">
                                                            <div class="d-flex justify-content-between">
                                                                <a href="product-single.php?b_id=<?php echo base64_encode($brec['b_id']) ?>">
                                                                    <h5><?php echo $brec['b_title'] ?></h5>
                                                                </a>
                                                                <div class="book_price">
                                                                    <sup>&#8377;</sup><?php echo $brec['price'] ?><sup></sup>
                                                                </div>
                                                            </div>
                                                            <div class="writer_name">
                                                                <i class="icon-user"></i><a href="#"><?php echo $brec['author'] ?></a>
                                                            </div>
                                                            <form name="<?php echo $brec['b_title'] ?>" method="post">
                                                                <input type="hidden" name="hidden_id" value="<?php echo $brec['b_id'] ?>">
                                                                <input type="hidden" name="hidden_name" value="<?php echo $brec['b_title'] ?>">
                                                                <input type="hidden" name="hidden_price" value="<?php echo $brec['price'] ?>">
                                                                <input type="hidden" name="quantity" value="1">
                                                                <input type="submit" name="add_to_cart" value="Add to Cart" class="btn btn-primary">
                                                            </form>
                                                            <!-- <button type="button" class="bj_theme_btn add-to-cart-automated" data-name="" data-img="" data-price="" data-mrp="">
                                                                <i class="icon_cart_alt"></i>Add To Cart
                                                            </button> -->
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php
                                            }
                                        }else{
                                            echo "No Books Found";
                                        }
                                        ?>    
                                        </div>
                                    </div>
                                    <?php
                                }
                                $i++;
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- product tab showcase area  -->

        <!-- best selling product area  -->
        <section class="best_selling_pr_area sec_padding" data-bg-color="#f5f5f5">
            <div class="container">
                <div class="section_title section_title_two text-center wow fadeInUp" data-wow-delay="0.2s">
                    <h2 class="title title_two">New Arrivals</h2>
                    <p>Reading books helps you to develop your communication skill</p>
                </div>
                <div class="row">
                    <?php
                    $src="SELECT * FROM book WHERE new='1'";
                    $brs=mysqli_query($conn, $src)or die(mysqli_error($conn));
                    if(mysqli_num_rows($brs)){
                        while($brec=mysqli_fetch_assoc($brs)){
                            ?>
                            <div class="col-xl-4 col-md-6">
                        <div class="bj_new_pr_item_two d-flex wow fadeInUp" data-wow-delay="0.2s">
                            <a href="product-single.php?b_id=<?php echo base64_encode($brec['b_id']); ?>" class="img">
                                <img src="<?php echo $brec['b_img'] ?>" alt="book" />
                            </a>
                            <div class="bj_new_pr_content_two">
                                <a href="product-single.php?b_id=<?php echo base64_encode($brec['b_id']) ?>">
                                    <h4 class="bj_new_pr_title"><?php echo $brec['b_title'] ?></h4>
                                </a>
                                <div class="writer_name">by <a href="#"><?php echo $brec['author'] ?></a></div>
                                <div class="book_price"><sup>&#8377;</sup><?php echo $brec['price'] ?>.00<sup></sup></div>
                                <button type="button" class="bj_theme_btn add-to-cart-automated" data-name="" data-img="" data-price="" data-mrp="">
                                    <i class="icon_cart_alt"></i>Add To Cart
                                </button>
                            </div>
                        </div>
                    </div>
                            <?php
                        }
                    }else{
                        echo "New Arraival Temporaraly Unavailable";
                    }
                    ?>                    
                </div>
                <div class="text-center mt-4">
                    <a href="shop.php" class="bj_theme_btn strock_btn blue_strock_btn wow fadeInUp" data-wow-delay="0.4s">View All</a>
                </div>
            </div>
        </section>

        <!-- bj testimonial area -->
        <!-- <section class="bj_testimonial_area sec_padding" data-bg-color="#f5f5f5">
            <div class="container">
                <div class="section_title section_title_two text-center wow fadeInUp" data-wow-delay="0.2s">
                    <h2 class="title title_two">Testimonial</h2>
                    <p>What Our Happy Client Said</p>
                </div>
                <div class="swiper mySwiper bj_testimonial_inner wow fadeInUp" data-wow-delay="0.4s">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="row align-items-center">
                                <div class="col-lg-4">
                                    <img class="testimonail_img" src="assets/img/home/testimonial1.jpg" alt="" />
                                </div>
                                <div class="col-lg-8">
                                    <div class="bj_testimonial_content">
                                        <h4>
                                            “My experience with Mark is a complete sucess, from
                                            customer service, wide range of products, clean store,
                                            purchasing experience, the newsletter.Thank you.”
                                        </h4>
                                        <div class="author">
                                            <h5>Leona Paul</h5>
                                            <span class="position">CEO of Floatcom</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="row align-items-center">
                                <div class="col-lg-4">
                                    <img class="testimonail_img" src="assets/img/home/testimonial2.jpg" alt="" />
                                </div>
                                <div class="col-lg-8">
                                    <div class="bj_testimonial_content">
                                        <h4>
                                            “My experience with Mark is a complete sucess, from
                                            customer service, wide range of products, clean store,
                                            purchasing experience, the newsletter.Thank you.”
                                        </h4>
                                        <div class="author">
                                            <h5>Michael Anderson</h5>
                                            <span class="position">Senior Product Manager</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="row align-items-center">
                                <div class="col-lg-4">
                                    <img class="testimonail_img" src="assets/img/home/testimonial3.jpg" alt="" />
                                </div>
                                <div class="col-lg-8">
                                    <div class="bj_testimonial_content">
                                        <h4>
                                            “My experience with Mark is a complete sucess, from
                                            customer service, wide range of products, clean store,
                                            purchasing experience, the newsletter.Thank you.”
                                        </h4>
                                        <div class="author">
                                            <h5>Jennifer Lee</h5>
                                            <span class="position">Creative Director</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="row align-items-center">
                                <div class="col-lg-4">
                                    <img class="testimonail_img" src="assets/img/home/testimonial4.jpg" alt="" />
                                </div>
                                <div class="col-lg-8">
                                    <div class="bj_testimonial_content">
                                        <h4>
                                            “My experience with Mark is a complete sucess, from
                                            customer service, wide range of products, clean store,
                                            purchasing experience, the newsletter.Thank you.”
                                        </h4>
                                        <div class="author">
                                            <h5>Robert Turner</h5>
                                            <span class="position">IT Manager</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="row align-items-center">
                                <div class="col-lg-4">
                                    <img class="testimonail_img" src="assets/img/home/testimonial5.jpg" alt="" />
                                </div>
                                <div class="col-lg-8">
                                    <div class="bj_testimonial_content">
                                        <h4>
                                            “My experience with Mark is a complete sucess, from
                                            customer service, wide range of products, clean store,
                                            purchasing experience, the newsletter.Thank you.”
                                        </h4>
                                        <div class="author">
                                            <h5>John Smith</h5>
                                            <span class="position">Co-founder</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="row align-items-center">
                                <div class="col-lg-4">
                                    <img class="testimonail_img" src="assets/img/home/testimonial6.jpg" alt="" />
                                </div>
                                <div class="col-lg-8">
                                    <div class="bj_testimonial_content">
                                        <h4>
                                            “My experience with Mark is a complete sucess, from
                                            customer service, wide range of products, clean store,
                                            purchasing experience, the newsletter.Thank you.”
                                        </h4>
                                        <div class="author">
                                            <h5>Richard Brown</h5>
                                            <span class="position">Financial Analyst</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                    <div class="slider_pagination_inner">
                        <div class="swiper-pagination"></div>
                        <a href="#" class="bj_theme_btn text_btn">See all reviews<i class="arrow_right"></i></a>
                    </div>
                </div>
            </div>
        </section> -->
        <!-- bj testimonial area -->


<?php require_once('footer.php') ?>