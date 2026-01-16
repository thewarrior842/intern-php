<?php
require("config.php");
$id=$_POST['cat_id'];
$del="DELETE FROM category WHERE cat_id=$id";
$res=mysqli_query($con,$del) or die(mysqli_error($con));
if($res==1){
    header('location:category.php?msg=Category delete successfully');
}else{
    ?>
    <script>
        window.location="category.php?msg=Category not delete successfully";
    </script>
    <?php
}
?>