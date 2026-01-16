<?php
require_once('header.php');
require_once('config.php');
?>
    <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h2 class="mt-4"></h2>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Update Category
                            </div>
                            <div class="card-body">
                                <!-- Fetch from category table and display -->
                                    <div class="container-fluid px-4">
                                        <?php
                                        if(empty($_POST['cat_id'])){
                                            ?>
                                            <script>
                                                window.location="category.php?msg=Category not found";
                                            </script>
                                            <?php
                                        }
                                        $id=$_POST['cat_id'];
                                        $src="SELECT * FROM category WHERE cat_id=$id";
                                        $rs=mysqli_query($con,$src) or die(mysqli_error($con));
                                        $rec=mysqli_fetch_assoc($rs);
                                        ?>
                                        <form name="frm" method="post" action="catupdate_code.php">
                                            <div class="mb-3">
                                                <label for="cat_name" class="form-label">Enter Category</label>
                                                <input type="text" name="cat_name" class="form-control" id="cat_name" value="<?php echo $rec['cat_name'] ?>">
                                            </div>
                                            <input type="hidden" name="cat_id" value="<?php echo $rec['cat_id'] ?>">
                                            <input type="submit" name="ok" value="Submit" class="btn btn-primary">
                                        </form>
                                    </div>
                            </div>
                        </div>
                    </div>
                </main>
    <?php require('footer.php') ?>