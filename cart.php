<?php
$message = '';
if (isset($_GET["action"])) {
    if ($_GET["action"] == "delete") {
        $cookie_data = stripslashes($_COOKIE['shopping_cart']);
        $cart_data = json_decode($cookie_data, true);
        foreach ($cart_data as $keys => $values) {
            if ($cart_data[$keys]['item_id'] == base64_decode($_GET["id"])) {
                unset($cart_data[$keys]);
                $item_data = json_encode($cart_data);
                setcookie("shopping_cart", $item_data, time() + (86400 * 30));
                header("location:cart.php?remove=1");
            }
        }
    }
    if ($_GET["action"] == "clear") {
        setcookie("shopping_cart", "", time() - 3600);
        header("location:cart.php?clearall=1");
    }
}

if (isset($_GET["success"])) {
    $message = '
 <div class="alert alert-success alert-dismissible">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    Item Added into Cart
 </div>
 ';
}
?>
<?php require_once('header.php');
require_once('config.php');
?>
<div class="cart-header-separator"></div>

<!-- Cart area  -->
<div class="cart-header-alert pt-3" data-bg-color="#f5f5f5">
    <div class="container">
        <?php
        if (isset($_GET["remove"])) {
            $message = '
                    <div class="alert alert-success alert-dismissible">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    Item removed from Cart
                    </div>
                    ';
        }
        if (isset($_GET["clearall"])) {
            $message = '
                    <div class="alert alert-success alert-dismissible">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    Your Shopping Cart has been clear...
                    </div>
                    ';
        }
        ?>

    </div>
</div>

<section class="bj_cart_area" data-bg-color="#f5f5f5">
    <div class="container">
        <div class="row gy-lg-0 gy-3">
            <div class="col-lg-12">
                <div class="bj_cart_content_header">
                    <div class="form-check cart_total_select">
                        <h5>Your Cart</h5>
                    </div>
                </div>
                <div class="cart_item_wrapper">
                    <div class="single_cart_item">
                        <?php
                        if (isset($_COOKIE["shopping_cart"])) {
                            ?>
                            <div class="col-12">
                                <?php echo $message; ?>
                                <div align="right">
                                    <a href="cart.php?action=clear"><b>Clear Cart</b></a>
                                </div>
                                <table class="table table-bordered">
                                    <tr>
                                        <th>Item Name</th>
                                        <th>Quantity</th>
                                        <th>Price</th>
                                        <th>Total</th>
                                        <th>Action</th>
                                    </tr>
                                    <?php
                                    if (isset($_COOKIE["shopping_cart"])) {
                                        $total = 0;
                                        $cookie_data = stripslashes($_COOKIE['shopping_cart']);
                                        $cart_data = json_decode($cookie_data, true);
                                        foreach ($cart_data as $keys => $values) {
                                            ?>
                                            <tr>
                                                <td><?php echo $values["item_name"]; ?></td>
                                                <td><?php echo $values["item_quantity"]; ?></td>
                                                <td>&#8377; <?php echo $values["item_price"]; ?></td>
                                                <td>&#8377;
                                                    <?php echo number_format($values["item_quantity"] * $values["item_price"], 2); ?>
                                                </td>
                                                <td><a href="cart.php?action=delete&id=<?php echo base64_encode($values["item_id"]); ?>"><span
                                                            class="text-danger">Remove</span></a></td>
                                            </tr>
                                            <?php
                                            $total = $total + ($values["item_quantity"] * $values["item_price"]);
                                        }
                                        ?>
                                        <tr>
                                            <td colspan="3" align="right">Total</td>
                                            <td align="right">
                                                <p>&#8377; <?php echo number_format($total, 2); ?></p>
                                            </td>
                                            <td></td>
                                        </tr>
                                        <?php
                                    } else {
                                        echo '
                    <tr>
                    <td colspan="5" align="center"><a href="shop.php">Continue Shopping</a></td>
                    </tr>
                    ';
                                    }
                                    ?>
                                </table>
                                <?php
                                if (isset($_SESSION['a_info'])) {
                                    ?>
                                    <form name="frm" onsubmit="event.preventDefault(); paynow()">
                                        <div class="form-group">
                                            <label for="address">Address</label>
                                            <textarea name="address" id="address" class="form-control" rows="5"></textarea>
                                        </div>

                                        <h4>Total &#8377;<span id="total"><?php echo $total ?></span></h4>
                                        <button class="btn btn-primary" value="Place Order" onclick="paynow();">Place
                                            Order</button>
                                    </form>
                                    <?php
                                } else {
                                    echo "Plase login yourself for place the order";
                                }
                                ?>
                            </div>
                            <?php
                        } else {
                            ?>
                            <h4 class="text-center text-danger"><a href="shop.php">Continue Shopping</a></h4>
                            <?php
                        }
                        ?>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
<!-- Cart area  -->

<?php require_once('footer.php'); ?>