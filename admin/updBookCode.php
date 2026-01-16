<?php
//require_once('header.php');
require_once('config.php');

    $b_title=$_POST['b_title'];
    $author=$_POST['author'];
    $price=$_POST['price'];
    $description=$_POST['description'];
    $publisher=$_POST['publisher'];
    $pub_date=$_POST['pub_date'];
    $edition=$_POST['edition'];
    $cat_id=$_POST['cat_id'];
    $b_id=$_POST['b_id'];
    $new=$_POST['new'];
    if($_FILES['b_img']['name']){
        $f_name=$_FILES['b_img']['name'];
        $f_size=$_FILES['b_img']['size'];
        $b_img='book_img/'.rand(00000000,99999999)."_".$f_name;
        $ftype=array('jpg','png','jpeg','webp','JPG','PNG','JPEG','WEBP');
        $file_ext=explode(".",$f_name);
        $ext=end($file_ext);
        if(in_array($ext,$ftype)){
            if($f_size<(1024*1024)*100){
                if(move_uploaded_file($_FILES['b_img']['tmp_name'], "../".$b_img)){
                    $sql="UPDATE book SET b_title='$b_title', author='$author', price='$price', publisher='$publisher', pub_date='$pub_date', edition='$edition', description='".mysqli_real_escape_string($con, $description)."', b_img='$b_img', cat_id=$cat_id, new='$new' WHERE b_id=$b_id";
                    $res=mysqli_query($con, $sql)or die(mysqli_error($con));
                    // echo $res;
                    if($res==1){
                        ?>
                        <script>
                            window.location="books.php?msg=Book details update successfully";
                        </script>
                        <?php
                    }else{
                        echo "Book not update successfully";
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
    }else{
        $sql="UPDATE book SET b_title='$b_title', author='$author', price='$price', publisher='$publisher', pub_date='$pub_date', edition='$edition', description='".mysqli_real_escape_string($con, $description)."', cat_id=$cat_id, new='$new' WHERE b_id=$b_id";
        // echo $sql;
        $res=mysqli_query($con, $sql)or die(mysqli_error($con));
        if($res==1){
            ?>
            <script>
                window.location="books.php?msg=Book details update successfully";
            </script>
            <?php
        }else{
            ?>
            <script>
                window.location="books.php?msg=Book details not update successfully";
            </script>
            <?php
        }
    }
?>