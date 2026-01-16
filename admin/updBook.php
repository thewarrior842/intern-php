<?php
require_once('header.php');
require_once('config.php');

$src="SELECT * FROM category ORDER BY cat_name";
$rs=mysqli_query($con, $src) or die(mysqli_error($con));
if($_POST['b_id']){
    $b_id=$_POST['b_id'];
    $brs=mysqli_query($con,"SELECT b.*, c.cat_name FROM book b INNER JOIN category c ON b.cat_id=c.cat_id WHERE b.b_id=$b_id") or die(mysqli_error($con));
    $brec=mysqli_fetch_assoc($brs);
}else{
    ?>
    <script>
        window.location="books.php?msg=Select a book before update";
    </script>
    <?php
}
 ?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h2 class="mt-4">Update Book Details</h2>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="books.php">Book</a></li>
                            <li class="breadcrumb-item active">Update Book</li>
                        </ol>

                        <div class="card mb-4 border-0">
                            <form method="post" name="add-book" enctype="multipart/form-data" action="updBookCode.php">
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3 mb-md-0">
                                            <input class="form-control" id="b_title" name="b_title" type="text" value="<?php echo $brec['b_title'] ?>" />
                                            <label for="b_title">Title of the book</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3 mb-md-0">
                                            <input class="form-control" id="author" name="author" type="text" value="<?php echo $brec['author'] ?>" />
                                            <label for="author">Name of author</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3 mb-md-0">
                                            <input class="form-control" id="edition" name="edition" type="text" value="<?php echo $brec['edition'] ?>" />
                                            <label for="edition">Book edition</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3 mb-md-0">
                                            <input class="form-control" id="publisher" name="publisher" type="text" value="<?php echo $brec['publisher'] ?>"/>
                                            <label for="publisher">Name of publisher</label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-floating mb-3 mb-md-0">
                                            <textarea class="form-control" id="description" name="description" id="description"><?php echo $brec['description'] ?>"</textarea>
                                            <label for="description">About the book</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3 mb-md-0">
                                            <input class="form-control" id="price" name="price" type="text" value="<?php echo $brec['price'] ?>" />
                                            <label for="price">Book selling price</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3 mb-md-0">
                                            <input class="form-control" id="pub_date" name="pub_date" type="text" value="<?php echo $brec['pub_date'] ?>" />
                                            <label for="pub_date">Book publishing date</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3 mb-md-0">
                                            <input class="form-control" id="b_img" name="b_img" type="file">
                                            <label for="b_img">Select Book Image</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3 mb-md-0">
                                            <select class="form-control" name="cat_id" id="cat_id">
                                                <option value="<?php echo $brec['cat_id']; ?>"><?php echo $brec['cat_name'] ?></option>
                                                <?php
                                                while($rec=mysqli_fetch_assoc($rs)){
                                                    ?>
                                                    <option value="<?php echo $rec['cat_id'] ?>"><?php echo $rec['cat_name'] ?></option>
                                                    <?php
                                                }
                                                ?>
                                            </select>
                                            <label for="cat_id">Select Category</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-4 mb-3">
                                    <div class="col-6">
                                        <div class="d-grid">
                                            <img src="../<?php echo $brec['b_img'] ?>" width="50">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                        <div class="form-floating mb-3 mb-md-0">
                                            <select name="new" id="new" class="form-control">
                                                <option value="<?php echo $brec['new'] ?>" selected>
                                                <?php 
                                                if($brec['new']=='1'){
                                                    echo "New";
                                                }else{
                                                    echo "Normal";
                                                }
                                                ?>
                                                </option>
                                                <option value="1">New</option>
                                                <option value="0">Normal</option>
                                            </select>
                                            <label for="new">Status</label>
                                        </div>
                                    </div>
                                <div class="mt-4 mb-3">
                                    <div class="col-6">
                                        <div class="d-grid">
                                        <input type="hidden" name="b_id" value="<?php echo $brec['b_id'] ?>">
                                            <input type="submit" name="ok" value="Save Changes" class="btn btn-primary btn-block">
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </main>
                <?php require('footer.php') ?>