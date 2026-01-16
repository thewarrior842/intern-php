<?php
require_once("config.php");
require ('vendor/autoload.php');

use Razorpay\Api\Api;

$api = new Api("rzp_test_jIctH4BZwcxQXF", "zAh1TuOegxlNpTdb8Qzl0Kn6");

$active = "Checkout";
$cust_id = $_SESSION['a_info']['uid'];
$total = 0;
$address = $_GET['address'];
$payment_id=$_GET['payment_id'];
//echo $cust_id;
$payment = $api->payment->fetch($payment_id);
$payment_mode = $payment->method;   // card / upi / netbanking

$cookie_data = stripslashes($_COOKIE['shopping_cart']);
$cart_data = json_decode($cookie_data, true);
//print_r($cart_data);
foreach ($cart_data as $keys => $values) {
    $total = $total + ($values["item_quantity"] * $values["item_price"]);
    $sql = "INSERT INTO orders (o_qty, o_price, cust_id, item_id, address, payment_id, payment_mode) VALUES (" . $values['item_quantity'] . ", " . $values["item_price"] . ", $cust_id, " . $values["item_id"] . ",'$address', '$payment_id', '$payment_mode')";
    $res = mysqli_query($conn, $sql) or die(mysqli_error($con));
}
setcookie("shopping_cart", "", time() - 3600);


?>