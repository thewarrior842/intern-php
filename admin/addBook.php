<?php
require_once('header.php');
require_once('config.php');

$src="SELECT * FROM category ORDER BY cat_name";
$rs=mysqli_query($con, $src) or die(mysqli_error($con));
 ?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h2 class="mt-4">Add New Book</h2>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="books.php">Book</a></li>
                            <li class="breadcrumb-item active">Add New Book</li>
                        </ol>

                        <div class="card mb-4 border-0">
                            <form method="post" name="add-book" enctype="multipart/form-data">
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3 mb-md-0">
                                            <input class="form-control" id="b_title" name="b_title" type="text" placeholder="Enter name of category" />
                                            <label for="b_title">Title of the book</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3 mb-md-0">
                                            <input class="form-control" id="author" name="author" type="text" placeholder="Enter name of category" />
                                            <label for="author">Name of author</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3 mb-md-0">
                                            <input class="form-control" id="edition" name="edition" type="text" placeholder="Enter name of category" />
                                            <label for="edition">Book edition</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3 mb-md-0">
                                            <input class="form-control" id="publisher" name="publisher" type="text" placeholder="Enter name of publisher" />
                                            <label for="publisher">Name of publisher</label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-floating mb-3 mb-md-0">
                                            <textarea class="form-control" id="description" name="description" placeholder="Enter name of category"></textarea>
                                            <label for="description">About the book</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3 mb-md-0">
                                            <input class="form-control" id="price" name="price" type="text" placeholder="Enter price" />
                                            <label for="price">Book selling price</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3 mb-md-0">
                                            <input class="form-control" id="pub_date" name="pub_date" type="text" placeholder="Enter publish date" />
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
                                                <option value="">-Select Category-</option>
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
                                            <input type="submit" name="ok" value="Add New Book" class="btn btn-primary btn-block">
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <?php
                            if(isset($_POST['ok'])){
                                $b_title=$_POST['b_title'];
                                $author=$_POST['author'];
                                $price=$_POST['price'];
                                $description=$_POST['description'];
                                $publisher=$_POST['publisher'];
                                $pub_date=$_POST['pub_date'];
                                $edition=$_POST['edition'];
                                $cat_id=$_POST['cat_id'];
                                // echo "<pre>";
                                // print_r($_FILES['b_img']);
                                $f_name=$_FILES['b_img']['name'];
                                $f_size=$_FILES['b_img']['size'];
                                $b_img='book_img/'.$f_name;
                                $ftype=array('jpg','png','jpeg','webp','JPG','PNG','JPEG','WEBP');
                                $file_ext=explode(".",$f_name);
                                $ext=end($file_ext);
                                if(in_array($ext,$ftype)){
                                    if($f_size<(1024*1024)*100){
                                        if(move_uploaded_file($_FILES['b_img']['tmp_name'], $b_img)){
                                            $sql="INSERT INTO book (b_title, author, price, description, publisher, pub_date, edition, b_img, cat_id) VALUES ('$b_title', '$author', '$price', '".mysqli_real_escape_string($con, $description)."', '$publisher', '$pub_date', '$edition', '$b_img', '$cat_id')";
                                            $res=mysqli_query($con, $sql)or die(mysqli_error($con));
                                            // echo $res;
                                            if($res==1){
                                                echo "New book add successfully";
                                            }else{
                                                echo "New book not add successfully";
                                            }
                                        }else{
                                            echo 'Not upload successfully';
                                        }
                                    }else{
                                        echo "Please select a image less than 100KB";
                                    }
                                }else{
                                    echo 'Please select a image file';
                                }
                            }
                            ?>
                        </div>
                    </div>
                </main>
                <?php require('footer.php') ?>