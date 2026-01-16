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
        <div class="login-area registration-area">
            <div class="login-wrapper">
                <div class="login-left">
                    <a href="index.php" class="logo"><img src="assets/img/home-two/logo-dark.svg" alt="Image"></a>
                    <h2 class="title">Sign Up to Bookjar</h2>
                    <div class="sibtitle">Create Your Account with Just Few Steps</div>
                    <div class="col-lg-12">
                        <div class="account_dashboard_body">
                            <div class="account_dashboard_content">
                                <div class="account_dashboard_content_header">
                                    Personal Information
                                </div>
                                <div class="content_body">
                                    <form id="registrationForm" method="post" action="" novalidate>
                                        <div class="row gy-4">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <input type="text" name="f_name" id="f_name" class="form-control" required>
                                                    <label for="f_name" class="floating-label">First Name</label>
                                                    <div id="Invalid-f_name" class="error-message"></div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <input type="text" name="l_name" id="l_name" class="form-control" required>
                                                    <label for="l_name" class="floating-label">Last Name</label>
                                                    <div id="Invalid-l_name" class="error-message"></div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="dob" class="form-label">Your Date of Birth</label>
                                                    <input type="date" name="dob" id="dob" class="form-control" required>
                                                    <div id="Invalid-dob" class="error-message"></div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="form-label">Gender</label>
                                                    <div class="d-flex flex-row">
                                                        <div class="form-check me-3">
                                                            <input class="form-check-input" type="radio" value="male" id="genderMale" name="gender" required>
                                                            <label class="form-check-label" for="genderMale">Male</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" value="female" id="genderFemale" name="gender" required>
                                                            <label class="form-check-label" for="genderFemale">Female</label>
                                                        </div>
                                                    </div>
                                                    <div id="Invalid-gender" class="error-message"></div> <!-- Error message for gender -->
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <input class="form-control" type="email" name="email_address" id="email_address" required>
                                                    <label class="floating-label" for="email_address">Email Address</label>
                                                    <div id="Invalid-email_address" class="error-message"></div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <input class="form-control" type="tel" name="phone" id="phone" required>
                                                    <label class="floating-label" for="phone">Mobile Number</label>
                                                    <div id="Invalid-phone" class="error-message"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="account_dashboard_content_title mt-3">
                                            <h4>Password </h4>
                                        </div>
                                        <div class="row mt-1 gy-3">
                                            <div class="col-lg-6">
                                                <div class="form-group pass-field-with-icon">
                                                    <input type="password" name="toggle_passowrd_field" id="toggle_passowrd_field" class="form-control" required>
                                                    <label for="toggle_passowrd_field" class="floating-label">New Password</label>
                                                    <i data-toggleTarget="#toggle_passowrd_field" class="icon fas fa-eye toggle-password"></i>
                                                    <div id="Invalid-toggle_passowrd_field" class="error-message"></div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group pass-field-with-icon">
                                                    <input type="password" name="toggle_passowrd_field2" id="toggle_passowrd_field2" class="form-control" required>
                                                    <label for="toggle_passowrd_field2" class="floating-label">Confirm Password</label>
                                                    <i data-toggleTarget="#toggle_passowrd_field2" class="icon fas fa-eye toggle-password"></i>
                                                    <div id="Invalid-toggle_passowrd_field2" class="error-message"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <button type="submit" name="ok" class="bj_theme_btn mt-3">Submit</button>
                                    </form>
                                    <?php
                                    if(isset($_POST['ok'])){
                                        $f_name=$_POST['f_name'];
                                        $l_name=$_POST['l_name'];
                                        $dob=$_POST['dob'];
                                        $gender=$_POST['gender'];
                                        $email_address=$_POST['email_address'];
                                        $phone=$_POST['phone'];
                                        $toggle_passowrd_field=$_POST['toggle_passowrd_field'];
                                        $toggle_passowrd_field2=$_POST['toggle_passowrd_field2'];
                                        $src="SELECT email_address FROM user WHERE email_address='$email_address'";
                                        $rs=mysqli_query($conn, $src)or die(mysqli_error($conn));
                                        if(mysqli_num_rows($rs)>0){
                                            ?>
                                            <div class="account_dashboard_content_title mt-3">
                                                <h4><?php echo "You are already register"; ?> </h4>
                                            </div>
                                            <?php 
                                        }else{
                                            $sql="INSERT INTO user (f_name, l_name, dob, gender, email_address, phone, toggle_passowrd_field, toggle_passowrd_field2) VALUES ('$f_name', '$l_name', '$dob', '$gender', '$email_address', '$phone', '$toggle_passowrd_field', '$toggle_passowrd_field2')";
                                            $res=mysqli_query($conn, $sql);
                                            if($res==1){
                                                ?>
                                                <div class="account_dashboard_content_title mt-3">
                                                    <h4><?php echo "Registration Successful"; ?> </h4>
                                                </div>
                                                <?php
                                            }else{
                                                ?>
                                                <div class="account_dashboard_content_title mt-3">
                                                    <h4><?php echo "Registration Unsuccessful"; ?> </h4>
                                                </div>
                                                <?php                                               
                                            }
                                        }
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="new-user">
                        Already have an account?<a href="login.php"> Login Here</a>
                    </div>
                </div>
                <div class="login-right">
                    <img class="mt-auto" src="assets/img/login/reginstration-img.png" alt="Image">
                </div>
            </div>
        </div>
    </div>
    <!-- Optional JavaScript; choose one of the two! -->
    <script src="assets/js/jquery-3.6.0.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
    <script src="assets/js/preloader.js"></script>
    <script src="assets/vendors/bootstrap/js/popper.min.js"></script>
    <script src="assets/vendors/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/vendors/wow/wow.min.js"></script>
    <script src="assets/js/custom.js"></script>

    <script>
        // Custom validation method for names
        $.validator.addMethod("lettersonly", function(value, element) {
            return this.optional(element) || /^[a-zA-Z]+$/.test(value);
        }, "Please enter only letters.");

        // Custom validation method for password
        $.validator.addMethod("strongPassword", function(value) {
            return /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{6,}$/.test(value);
        }, "Password must be at least 6 characters long and contain at least one uppercase letter, one lowercase letter, one number, and one special character.");

        // Custom validation method for phone number
        $.validator.addMethod("phoneUS", function(value, element) {
            return this.optional(element) || /^\d{10}$/.test(value);
        }, "Please enter a valid 10-digit phone number.");

        $(document).ready(function(){
            $("#registrationForm").validate({
                rules:{
                    f_name: { required: true, lettersonly: true },
                    l_name: { required: true, lettersonly: true },
                    dob: { required: true },
                    gender: { required: true },
                    email_address: { required: true, email: true },
                    phone: { required: true, phoneUS: true },
                    toggle_passowrd_field: { required: true, strongPassword: true },
                    toggle_passowrd_field2: { required: true, equalTo: "#toggle_passowrd_field" }
                },
                messages:{
                    f_name: { required: '<h6 class="h6 bold text-danger">*Please enter your first name</h6>' },
                    l_name: { required: '<div class="alert text-danger">*Please enter your last name</div>' },
                    dob: { required: 'Please enter your date of birth' },
                    gender: { required: 'Please select your gender' },
                    email_address: { required: 'Please enter your email', email: 'Please enter a valid email address' },
                    phone: { required: 'Please enter your phone number' },
                    toggle_passowrd_field: { required: 'Please enter your password' },
                    toggle_passowrd_field2: { required: 'Please confirm your password', equalTo: 'Passwords do not match' }
                },
                errorPlacement: function(error, element) {
                    error.appendTo('#Invalid-' + element.attr('id'));
                },
                submitHandler: function(form) {
                    form.submit(); 
                }
            });
        });
    </script>
    <script>
        $(document).ready(function(){
            $("#email_address").on("blur", function(){
                let email_address=$("#email_address").val();
                // alert(email_address);
                $.ajax({
                    method:"post",
                    url: "checkuser.php",
                    data: {
                        email_address: email_address
                    },
                    success: function( result ) {
                        // alert(result);
                        $("#Invalid-email_address").html(result)
                    }
                });
            })
        });
    </script>
</body>
</html>