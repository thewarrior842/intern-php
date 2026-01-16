<?php
session_start();
$server="localhost";
$user="root";
$pass="Deep123456";
$db="bookjar";
$port='3306'; //3307
try{
    $con=mysqli_connect($server,$user,$pass,$db,$port);
}catch(Exception $e){
    echo $e->getMessage();
}
?>