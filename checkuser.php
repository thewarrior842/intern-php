<?php
 require_once('config.php'); 
 $email_address=$_POST['email_address'];
 $src="SELECT email_address FROM user WHERE email_address='$email_address'";
$rs=mysqli_query($conn, $src)or die(mysqli_error($conn));
if(mysqli_num_rows($rs)>0){
    echo "You are already registered";
}
 ?>