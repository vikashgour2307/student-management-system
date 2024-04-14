<?php

session_start();
include('includes/dbconnect.php');
if(isset($_GET['deleteId'])){
    $name=$_GET['deleteId'];
}

$sql="DELETE FROM `logindata` WHERE `reg_no` = '$name'";
$result = mysqli_query($conn,$sql);
if($result){
   // echo "record deleted successfully";
    header("location:home1.php");
}
else{die(mysqli_error($conn));
}
?>