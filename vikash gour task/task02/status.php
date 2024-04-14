<?php

session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true ) {
    header("Location: home1.php");
    exit;
}
elseif ($_SESSION['role'] != "admin"){
    header("Location: form.php");
    exit;
}
else{

include('includes/dbconnect.php');
    $id = $_GET['Id'];
    $sql = "SELECT * FROM `logindata`  WHERE `logindata`.`reg_no` = '$id'";
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
if($row['status'] == 0){
   // $email = $row['email'];
    // $to = $email;
    //             $subject = "Activation Confirmation";
    //             // $otp = rand(3000,8000);
    //             $message = "Your account has been activated , You can login now ";
    //             // $message .= "$otp";
    //             $headers = "From: vikashgour76299@hmail.com";
                
    //             $res = mail($to, $subject, $message, $headers);
    $sql = "UPDATE `logindata` SET `status` = '1' WHERE `logindata`.`reg_no` = '$id'";
    $result = mysqli_query($conn, $sql);
    $_SESSION['active'] = "dlt";
    header("Location: dashboard1.php");

    
} 
else{
    $email = $row['email'];
    // $to = $email;
    //             $subject = "Deactivation Confirmation";
    //             // $otp = rand(3000,8000);
    //             $message = "Your account has been De-activated , You can not login anymore..! ";
    //             // $message .= "$otp";
    //             $headers = "From: vikashgour76299@hmail.com";
                
    //             $res = mail($to, $subject, $message, $headers);

    $sql = "UPDATE `logindata` SET `status` = '0' WHERE `logindata`.`reg_no` = '$id'";
    $result = mysqli_query($conn, $sql);
    $_SESSION['inactive'] = "dlt";
    header("Location: dashboard1.php");

}
    }

}

?>