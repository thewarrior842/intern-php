<?php
require_once('header.php');
require_once('config.php');
?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h2 class="mt-4">Change Profile</h2>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="category.php">Change Profile</a></li>
            </ol>

            <div class="card mb-4 border-0">
                <form name="frm" method="post">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="form-floating mb-3 mb-md-0">
                                <input class="form-control" id="aname" name="aname" type="text" value="<?php echo $_SESSION['a_info']['aname'] ?>">
                                <label for="aname">Enter Name</label>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="form-floating mb-3 mb-md-0">
                                <input class="form-control" id="aemail" name="aemail" type="email" value="<?php echo $_SESSION['a_info']['aemail'] ?>">
                                <label for="aemail">Enter Email</label>
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
                    $aname = $_POST['aname'];
                    $aemail = $_POST['aemail'];

                    if ($aemail == $_SESSION['a_info']['aemail']) {
                        echo "Email ID is already Existed";
                    } else {
                        try {
                            $aid=$_SESSION['a_info']['aid'];
                            $upd = "UPDATE admin SET aname='$aname', aemail='$aemail' WHERE aid=$aid ";
                            $con->query($upd);
                            echo "Profile Change Successfully";
                        } catch (mysqli_sql_exception $e) {
                            echo "Error: " . $e->getMessage();
                        }
                    }
                }
                ?>
            </div>
        </div>
    </main>
    <?php require('footer.php') ?>