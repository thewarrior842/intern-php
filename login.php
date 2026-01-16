<?php require_once('config.php'); ?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="assets/img/favicon.png">
    <!-- Bootstrap CSS -->
    <link href="assets/vendors/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendors/elagent-icon/style.css" rel="stylesheet">
    <link href="assets/vendors/font-awesome/css/all.min.css" rel="stylesheet">
    <link href="assets/vendors/animation/animate.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/responsive.css" rel="stylesheet">
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
        <div class="login-area">
            <div class="bg-shapes">
                <img class="wow fadeIn" src="assets/img/login/heart-shape-01.png" alt="Image">
                <img class="wow fadeInLeft" src="assets/img/login/heart-shape-02.png" alt="Image">
                <img class="wow fadeInLeft" src="assets/img/login/heart-shape-03.png" alt="Image">
                <img class="wow " src="assets/img/login/heart-shape-04.png" alt="Image">
            </div>
            <div class="login-wrapper">
                <div class="login-left">
                    <a href="index.php" class="logo"><img src="assets/img/home-two/logo-dark.svg" alt="Image"></a>
                    <h2 class="title">Login to Your Account</h2>
                    <br>
                    <div class="sibtitle">Welcome Back! </div>
                    <br>
                    <form name="log-frm" method="post" action="">
                        <div class="input-field">
                            <input class="form-control" type="text" name="email_address" id="email_address" placeholder="Email Address" required>
                        </div>
                        <div class="input-field pass-field-with-icon">
                            <input type="password" name="toggle_passowrd_field" id="toggle_passowrd_field" class="form-control" placeholder="Password" required>
                            <i data-toggleTarget="#toggle_passowrd_field" class="icon fas fa-eye toggle-password"></i>
                        </div>
                        <div class="d-flex justify-content-between input-field">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                                <label class="form-check-label" for="flexCheckChecked">
                                    Remember me
                                </label>
                            </div>
                            <a href="#" class="forget-password">Forgot Password?</a>
                        </div>
                        <button type="submit" name="ok" class="bj_theme_btn w-100 border-0">Log In</button>
                    </form>
                    
                    <?php
                    if(isset($_POST['ok'])){
                        $email_address=$_POST['email_address'];
                        $toggle_passowrd_field=$_POST['toggle_passowrd_field'];
                        $src="SELECT * FROM user WHERE email_address='$email_address' AND toggle_passowrd_field='$toggle_passowrd_field'";
                        $rs=mysqli_query($conn, $src) or die(mysqli_error($conn));
                        if(mysqli_num_rows($rs)>0){
                            $rec=mysqli_fetch_assoc($rs);
                            $_SESSION['a_info']=$rec;
                            header('location:index.php');
                        }else{
                            ?>
                            <div class="alert alert-danger">
                                Invalid email or password
                            </div>
                            <?php
                        }
                    }
                    ?>
                    
                    <div class="new-user">
                        New user?<a href="registration.php"> Create an account</a>
                    </div>
                </div>
                <div class="login-right">
                    <img src="assets/img/login/login-img.png" alt="Image">
                </div>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->
    <script src="assets/js/jquery-3.6.0.min.js"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <script src="assets/js/preloader.js"></script>
    <script src="assets/vendors/bootstrap/js/popper.min.js"></script>
    <script src="assets/vendors/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/vendors/wow/wow.min.js"></script>
    <script src="assets/js/custom.js"></script>

</body>

</html>