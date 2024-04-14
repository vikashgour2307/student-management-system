<?php
if(isset($_POST['register'])){  
    include('includes/dbconnect.php');
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $role = $_POST['role'];
    $photo = $_POST['photo'];

    $target_dir = "uploads/";
    $fname = $_FILES['photo']['name'];
    $tempfname = $_FILES['photo']['tmp_name'];
    $target_file = $target_dir . basename($fname);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    move_uploaded_file($tempfname, $target_dir . $fname);
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    $sql = "INSERT INTO `logindata`(`name`, `email`, `phone`, `password`, `role`, `photo`, `status`, `time`) VALUES ('$name', '$email', '$phone', '$hashed_password', '$role', '$target_file', '0', current_timestamp())";
    $result = mysqli_query($conn, $sql);
    if($result){
        header('location: form.php');
    }


}

if(isset($_POST['update'])){
  include('includes/dbconnect.php');
  session_start();
  $id = $_SESSION['id'];
  $name = $_POST['name'];
  $phone = $_POST['phone'];
  $photo = $_FILES['photo'];
  $target_dir = "uploads/";
    $fname = $_FILES['photo']['name'];
    $tempfname = $_FILES['photo']['tmp_name'];
    $target_file = $target_dir . basename($fname);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    move_uploaded_file($tempfname, $target_dir .$fname);
    $sql = "UPDATE `logindata` SET `name` = '$name', `phone` = '$phone', `photo` = '$target_file' WHERE `logindata`.`reg_no` = '$id'";
    $result = mysqli_query($conn, $sql);
    if($result){
      header('location: home1.php');
    }
    }




if(isset($_POST['login'])){
    include('includes/dbconnect.php');

    $email = $_POST['email'];
    $password = $_POST['pass'];
    $sql = "SELECT * FROM `logindata` WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);


    if($num == 1){
      while($row = mysqli_fetch_assoc($result)){
        
          if ($row['status'] == "1") {
            if( $hashed_password = password_hash($password, PASSWORD_DEFAULT)){
            session_start();
            $_SESSION['loggedin'] = true;
            $_SESSION['role'] = $row['role'];
            $_SESSION['id'] = $row['reg_no'];
          
            if(isset($_POST['remember_me'])){
              if (isset($_COOKIE['emailcookie'])) {
                  unset($_COOKIE['emailcookie']);
                  unset($_COOKIE['passwordcookie']);
              }
              
              setcookie('emailcookie',$email,time()+86400);
              setcookie('passwordcookie',$password,time()+86400);
             
          }

              header('location: home1.php');


          }
          
          
        }
        else{
            echo 'not approved';
          }
      }
    }  

}

// include 'includes/dbconnect.php';


if (isset($_POST['changepass'])) {
  include('includes/dbconnect.php');
    

    // Sanitize and validate user inputs
    $email =  $_POST["email"];
    $oldpass = $_POST["currentpass"];
    $newpass = $_POST["pass"];
    // $hpass = password_hash($newpass, PASSWORD_DEFAULT);


    // Check for empty fields
    if (empty($email) || empty($oldpass) || empty($newpass)) {
        $inpute = true;
    } 
    else {
        

        

        // $sql = "select * from users1 where username = '$username' AND password = '$password'";
        $sql = "select * from logindata where email = '$email'";
        $result = mysqli_query($conn, $sql);
        $num = mysqli_num_rows($result);

        if($num == 1) {
            while($row = mysqli_fetch_assoc($result)){
                if ($oldpass != $row['password']) {
                    // Passwords match
                    // $showalert = true;
                    
                    

                } else {
                    // Passwords do not match
                    // $sucess = true;
                    $sql = "UPDATE `logindata` SET `password` = '$newpass' WHERE `logindata`.`email` = '$email'";
                    $result = mysqli_query($conn, $sql);
                    session_start();
                    session_unset();
                      session_destroy();
                      if ($_SESSION['loggedin'] != true){
                          header('location: form.php');
                      }

                    
                }
                
            }
            
            
        }
        else {
            $showalert = true;
        }
    }
    

}


?>