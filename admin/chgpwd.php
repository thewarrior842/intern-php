<?php
require_once('header.php');
require_once('config.php');
?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h2 class="mt-4">Change Password</h2>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="category.php">Change Password</a></li>
            </ol>

            <div class="card mb-4 border-0">
                <form name="frm" method="post">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="form-floating mb-3 mb-md-0">
                                <input class="form-control" id="apwd" name="apwd" type="password">
                                <label for="apwd">Enter Your Current Password</label>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="form-floating mb-3 mb-md-0">
                                <input class="form-control" id="npwd" name="npwd" type="password">
                                <label for="npwd">Enter New Password</label>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="form-floating mb-3 mb-md-0">
                                <input class="form-control" id="cpwd" name="cpwd" type="password">
                                <label for="cpwd">Enter Confirm Password</label>
                            </div>
                        </div>
                    </div>
                    <div class="mt-4 mb-3">
                        <div class="col-6">
                            <div class="d-grid">
                                <input type="submit" name="ok" value="Save Changes" class="btn btn-primary btn-block">
                            </div>
                        </div>
                    </div>
                </form>
                <?php
                if (isset($_POST['ok'])) {
                    $apwd = $_POST['apwd'];
                    $npwd = $_POST['npwd'];
                    $cpwd = $_POST['cpwd'];
                    $aid = $_SESSION['a_info']['aid'];
                    try {
                        if ($npwd == $_SESSION['a_info']['apwd']) {
                            echo "You enterd same password as current password";
                        } else {
                            if ($npwd == $cpwd) {
                                $upd = "UPDATE admin SET apwd='$npwd' WHERE aid='$aid'";
                                $con->query($upd);
                ?>
                                <script>
                                    alert("Your Password Changed Successfully");
                                </script>
                                <?php
                                session_destroy();
                                ?>
                                <script>
                                    window.location = 'login.php';
                                </script>

                <?php
                            } else {
                                echo "Your Confirm password does not match with your new password";
                            }
                        }
                    } catch (mysqli_sql_exception $e) {
                        echo "Error: " . $e->getMessage();
                    }
                }
                ?>
            </div>
        </div>
    </main>
    <?php require('footer.php') ?>