<?php require_once('header.php');
    require_once('config.php');
 ?>
<div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h2 class="mt-4">All Books</h2>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">Books</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-body">
                                <a href="addBook.php" class="btn btn-info">Add New Book</a>
                            </div>
                        </div>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                All Books
                            </div>
                            <div class="card-body">
                                <?php
                                $src="SELECT b.*, c.cat_name FROM book b INNER JOIN category c ON b.cat_id=c.cat_id";
                                $rs=mysqli_query($con, $src)or die(mysqli_error($con));
                                if(mysqli_num_rows($rs)>0){
                                    ?>
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Title</th>
                                                <th>Author</th>
                                                <th>Description</th>
                                                <th>Edition</th>
                                                <th>Publication Date</th>
                                                <th>Publisher</th>
                                                <th>Price</th>
                                                <th>Image</th>
                                                <th>Name of Category</th>
                                                <th>Update</th>
                                                <th>Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            while($rec=mysqli_fetch_assoc($rs)){
                                                ?>
                                                <tr>
                                                    <td><?php echo $rec['b_title'] ?></td>
                                                    <td><?php echo $rec['author'] ?></td>
                                                    <td><?php echo substr($rec['description'], 0, 50) ?></td>
                                                    <td><?php echo $rec['edition'] ?></td>
                                                    <td><?php echo $rec['pub_date'] ?></td>
                                                    <td><?php echo $rec['publisher'] ?></td>
                                                    <td><?php echo $rec['price'] ?></td>
                                                    <td><img src="<?php echo "../".$rec['b_img'] ?>" width="75" height="75"></td>
                                                    <td><?php echo $rec['cat_name'] ?></td>
                                                    <td>
                                                        <form name="upd-frm<?php echo $i; ?>" method="post" action="updBook.php">
                                                            <input type="hidden" name="b_id" value="<?php echo $rec['b_id'] ?>">
                                                            <button type="submit" class="btn"><i class="far fa-edit text-primary"></i></button>
                                                        </form>
                                                    </td>
                                                    <td>
                                                        <form name="del-frm<?php echo $i; ?>" method="post" action="bookdelete.php">
                                                            <input type="hidden" name="b_id" value="<?php echo $rec['b_id'] ?>">
                                                            <input type="hidden" name="b_img" value="<?php echo $rec['b_img'] ?>">
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
                                    echo "Sorry No Book details found";
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </main>
                <?php require('footer.php') ?>