<?php

session_start();
include('includes/dbconnect.php');
if(isset($_GET['viewId'])){
    $name=$_GET['viewId'];
}

$sql = "SELECT * FROM `logindata` WHERE `reg_no` = '$name'";
$result = mysqli_query($conn,$sql);
while ($row = mysqli_fetch_assoc($result)) {
    // echo  $row['name'] ;
    // echo  $row['phone'];
    // echo  $row['email'];
    // echo  $row['role'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="login.css">
    <style>
      .view{
        text-align: center;
      }
ul li{
    list-style: none
}
  .view img {
    width: 200px;
    height: 200px;
    margin: 20px;
    /* width: 60px; */
    border-radius: 100px;
}
    </style>
</head>
<body>


     

    <div class="container main-content-container col-md-10 mt-5 px-0">
<div class="container profile-container">

    <div class="text-center ">
         
    <?php
           
    echo '   

        <img src="'.$row['photo'].'" width="300" height="300" alt="User Photo" class="profile-pic img-fluid">

        <h2 class="mt-3">'.$row['name'].'</h2>
        <p class="text-muted">'.$row['role'].'</p>


        <h4>Contact Information</h4>
        <ul>
            <li>Email: '.$row['email'].'</li>
            <li>Phone: +91 '.$row['phone'].'</li>
        </ul>';
    
    ?>
    
    </div>
</div>
</div>

 




    <br>
    </div>


</body>
</html>


    <?php
}


?>