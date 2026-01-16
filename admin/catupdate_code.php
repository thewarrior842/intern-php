<?php
require('config.php');
if(isset($_POST['ok'])) {
    $id=$_POST['cat_id'];
    $name=$_POST['cat_name'];
    $upd="UPDATE category SET cat_name='$name', cat_id='$id' WHERE cat_id=$id";
    $res=mysqli_query($con, $upd) or die(mysqli_error($con));
    if($res==1) {
        ?>
        <script>
            window.location="category.php?msg=Category update successfully";
        </script>
        <?php
    } else {
        ?>
        <script>
            window.location="category.php?msg=Category not update sucessfully";
        </script>
        <?php
    }
}
?>