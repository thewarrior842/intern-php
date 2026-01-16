<?php
require("config.php");
if($_POST['b_id'] && $_POST['b_img']){
    $id=$_POST['b_id'];
    $b_img=$_POST['b_img'];
    // echo $b_img;
    $del="DELETE FROM book WHERE b_id=$id";
    $res=mysqli_query($con,$del) or die(mysqli_error($con));
    if($res==1){
        unlink("../".$b_img); // Remove the file from the disk storage
        header('location:books.php?msg=Book details delete successfully');
    }else{
        ?>
        <script>
            window.location="books.php?msg=Book details not delete successfully";
        </script>
        <?php
    }
}else{
    ?>
    <script>
        window.location="books.php?msg=Book details not found";
    </script>
    <?php
}
?>