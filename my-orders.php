<?php require_once('header.php');
    require_once('config.php'); ?>
<?php
if(empty($_SESSION['a_info'])){
    ?>
    <script>
        window.location='login.php'
    </script>
    <?php
}
?>
        <div class="cart-header-separator"></div>

        <!-- Account Dashboard area -->
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
                                    <li><a class="active" href="my-orders.php">My Orders</a></li>
                                    <!-- <li><a href="my-ebook-library.php">My eBook Library </a></li>
                                    <li><a href="my-wishlist.php">My Wishlist</a></li> -->
                                </ul>
                            </div>
                        </div>


                    </div>
                    <div class="col-lg-9">
                        <div class="account_dashboard_body">
                            <div class="account_dashboard_content">
                                <div class="account_dashboard_content_header">
                                    My Orders <span>(Your Total Order: 12)</span>
                                </div>
                                <div class="content_body">

                                    <div class="my_order_list">
                                    <?php
                        $cust_id=$_SESSION['a_info']['uid'];
                        $src="SELECT o.*, i.b_title FROM orders o INNER JOIN book i ON o.item_id=i.b_id WHERE o.cust_id='$cust_id' ORDER BY o.date DESC";
                        $rs=mysqli_query($conn, $src) or die(mysqli_error($conn));
                        if(mysqli_num_rows($rs)>0){
                            ?>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Order Date</th>
                                        <th>Ordered item</th>
                                        <th>Quantity</th>
                                        <th>Order Price</th>
                                        <th>Delivery Address</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    while($rec=mysqli_fetch_assoc($rs)){
                                        ?>
                                         <tr>
                                            <td><?php echo date("d-M-Y",strtotime($rec['date'])) ?></td>
                                            <td><?php echo $rec['b_title'] ?></td>
                                            <td><?php echo $rec['o_qty'] ?></td>
                                            <td><?php echo $rec['o_price'] ?></td>
                                            <td><?php echo $rec['address'] ?></td>
                                        </tr>
                                        <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                            <?php
                        }else{
                            echo "Sorry No Order Found";
                        }
                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>
        <!-- Account Dashboard area -->

<?php require_once('footer.php'); ?>