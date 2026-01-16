<?php require_once('header.php');
    require_once('config.php');
 ?>
<div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h2 class="mt-4">All Category</h2>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">Category</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-body">
                                <a href="addCategory.php" class="btn btn-info">Add New Category</a>
                            </div>
                        </div>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                All Category
                            </div>
                            <div class="card-body">
                                <!-- Fetch from category table and display -->
                                <?php
                                $src="SELECT * FROM category ORDER BY cat_name ASC";
                                $rs=mysqli_query($con, $src) or die(mysqli_error($con));
                                if(mysqli_num_rows($rs) > 0){
                                    ?>
                                    <table class="table-bordered table">
                                        <thead>
                                            <tr>
                                                <th>Name of Category</th>
                                                <th>Update</th>
                                                <th>Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        while($rec = mysqli_fetch_assoc($rs)) {
                                        ?>
                                        <tr>
                                            <td><?php echo $rec['cat_name'] ?></td>
                                            <td>
                                                <form name="upd-frm<?php echo $i; ?>" method="post" action="catupdate.php">
                                                    <input type="hidden" name="cat_id" value="<?php echo $rec['cat_id'] ?>">
                                                    <button type="submit" class="btn"><i class="far fa-edit text-primary"></i></button>
                                                </form>
                                            </td>
                                            <td>
                                                <form name="del-frm<?php echo $i; ?>" method="post" action="catdelete.php">
                                                    <input type="hidden" name="cat_id" value="<?php echo $rec['cat_id'] ?>">
                                                    <button type="submit" class="btn"><i class="far fa-trash-alt text-danger"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                     <?php
                                        }
                                    ?>
                                    </tbody>
                                    </table>
                                    <?php
                                }else{
                                    echo "No Category Details Found";
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </main>
                <?php require('footer.php') ?>