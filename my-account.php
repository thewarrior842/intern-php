<?php require_once('header.php');
    require_once('config.php'); 
    if(empty($_SESSION['a_info'])){
        ?>
        <script>
            window.location='login.php'
        </script>
        <?php
    }
?>

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
                            <li><a class="active " href="my-account.php">My Profile</a></li>
                            <li><a href="my-orders.php">My Orders</a></li>
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
                            Personal Information
                        </div>
                        <div class="content_body">
                            <?php
                            if(isset($_SESSION['a_info'])){
                            ?>
                            <form name="upd-frm" method="post">
                                <div class="row gy-4">
                                    <div class="col-lg-6">
                                        <div class="form-group ">
                                            <input type="text" class="form-control"
                                                value="<?php echo $_SESSION['a_info']['f_name'] ?>" name="f_name">
                                            <label class="floating-label">First Name</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group ">
                                            <input type="text" class="form-control"
                                                value="<?php echo $_SESSION['a_info']['l_name'] ?>" name="l_name">
                                            <label class="floating-label">Last Name</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group ">
                                            <label class="form-label">Your Date of Birth</label>
                                            <input type="date" class="form-control"
                                                value="<?php echo $_SESSION['a_info']['dob']; ?>" name="dob">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-label">Gender</label>
                                            <input type="text" class="form-control"
                                                value="<?php echo $_SESSION['a_info']['gender'] ?>" name="gender">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group ">
                                            <input type="text" class="form-control"
                                                value="<?php echo $_SESSION['a_info']['email_address'] ?>" name="email_address">
                                            <label class="floating-label">Email-Address</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <input class="form-control" type="text" id="phone"
                                                value="<?php echo $_SESSION['a_info']['phone'] ?>" name="phone">
                                            <label class="floating-label" for="phone">Mobile Number</label>
                                        </div>
                                    </div>
                                </div>
                                <input type="submit" name="ok" value="Save Changes" class="bj_theme_btn mt-3">
                            </form>
                            <?php
                                    }
                                if(isset($_POST['ok'])){
                                    $f_name=$_POST['f_name'];
                                    $l_name=$_POST['l_name'];
                                    $dob= strtotime($_POST['dob']);
                                    $gender=$_POST['gender'];
                                    $phone=$_POST['phone'];
                                    $uid=$_SESSION['a_info']['uid'];
                                    try{
                                        $upd="UPDATE user SET f_name='$f_name', l_name='$l_name', dob='".date("Y-m-d",$dob)."', gender='$gender', phone='$phone' WHERE uid=$uid";
                                        $res=mysqli_query($conn, $upd);
                                        $_SESSION['a_info']['f_name']=$f_name;
                                        $_SESSION['a_info']['l_name']=$l_name;
                                        $_SESSION['a_info']['dob']=date("Y-m-d",$dob);
                                        $_SESSION['a_info']['gender']=$gender;
                                        $_SESSION['a_info']['phone']=$phone;
                                        echo "Profile update successfully";
                                        ?>
                                        <script>
                                            window.location='my-account.php';
                                        </script>
                                        <?php
                                    }catch(mysqli_sql_exception $e){
                                        echo "Error: ".$e->getMessage();
                                    }

                                }
                                    ?>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
<!-- Dashboard area -->

<?php require_once('footer.php'); ?>