
<?php
session_start();

if ($_SESSION['loggedin'] != true){
    header('location: form.php'); 
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
     <style>
        body {
            font-family: Arial, sans-serif;
            background-color: lightblue;
        }
        h1 {
            text-align: center;
            color: white;
        }
        .container {
            width: 100%;
            margin: auto;
        }
        .nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: darkblue;
            padding: 10px;
        }
        .nav a {
            color: white;
            text-decoration: none;
        }
        .nav a:hover {
            color: yellow;
        }
        .main {
            display: flex;
            margin-top: 20px;
        }
        .sidebar {
            width: 25%;
            background-color: lightgray;
            padding: 10px;
        }
        .content {
            width: 75%;
            padding: 10px;
        }
        .footer {
            background-color: #30475e;
            color: white;
            text-align: center;
            padding: 10px;
            margin-top: 20px;
        }
        .main-head-cont{
            background-color: darkblue;
            color: white;
            text-align: center;
            margin-top: 20px;
        }


        header {
            width: 100%;
            height: 70px;
            display: flex;
        
            flex-direction: row;
        
            align-items: center;
        
            justify-content: space-around;
        
            background-color: #30475e;
        
            color: white;
        
            padding: 20px 0;
        
        }
        
        .sidenav {
            height: 100%;
            width: 200px;
            position: fixed;
            z-index: 1;
            
            background-color: #111;
            overflow-x: hidden;
            padding-top: 20px;
          }

          .logo img {
            margin-left: 20px;
            width: 60px;
            border-radius: 50%;
        }
        .main-cont{
          position:absolute;
          left: 20%;
          width:70%;
          top:20%;
        }
        .u-name{
            margin-left:20px;
        }
        .v-name{
            margin-left:20px;
            border-radius: 30px
        }
        .ls-button{
            margin-left:30%;
        }
          
        .sidenav {
            height: 100%;
            width: 200px;
            position: fixed;
            z-index: 1;
            background-color: #111;
            overflow-x: hidden;
            padding-top: 20px;
          }

          ul {
      list-style-type: none;
      margin: 0;
      padding: 0;
      font-family: sans-serif;
            }

            li a {
              display: block;
              color: green;
              padding: 8px 16px;
              text-decoration: none;
            }

            li a.active {
              background-color: #84e4e2;
              color: white;
            }

            li a:hover:not(.active) {
              background-color: #29292a;
              color: white;
            }

            .left {
              float: left;
              width: 180px;
              margin: 0;
              padding: 1em;
            }

            .dropbtn {
                background-color: #04AA6D;
                color: white;
                padding: 16px;
                font-size: 16px;
                border: none;
            }

        .dropdown {
          position: relative;
          display: inline-block;
        }

        .dropdown-content {
          display: none;
          position: absolute;
          background-color: #f1f1f1;
          min-width: 160px;
          box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
          z-index: 1;
        }

        .dropdown-content a {
          color: black;
          padding: 12px 16px;
          text-decoration: none;
          display: block;
        }

        .dropdown-content a:hover {background-color: #ddd;}

        .dropdown:hover .dropdown-content {display: block;}

        .dropdown:hover .dropbtn {background-color: #3e8e41;}

  </style>
        
</head>

<body>

    <body>

        <header>
            <div class="logo">
                <img src="vg.img.jpg" alt="logo">
            </div>
           
            <div class="sign-in-up ls-button">
                <?php
        include('includes/dbconnect.php');
        $id = $_SESSION['id'];
        $sql = "select * from logindata where `reg_no` = '$id'";
        $result = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_assoc($result)){

            Echo '<p class="u-name" style="display:inline;">'.$row['name'].' </p> 
            
            <img class="v-name" height="60px" style="display:inline; " src="'.$row['photo'].'" alt="asdf" >
            </a>';

        }

            ?>

<div class="dropdown m-3">
  <button class="btn btn-warning">Menu</button>
  <div class="dropdown-content">
    <a href="updateprofile.php">Updateprofile</a>
    <a href="change.php">Change Password</a>
    <a href="logout.php">logout</a>
  </div>
</div>
            </div>
        </header>

        <div class="sidenav">
        <aside class="left">
     
      <ul>
           <li> <a href="dashboard1.php">Dashboard</a></li>
           <li><a class='active' href="#services">Employees</a></li> 
           <li><a href="allstudent.php">Students</a></li> 
            </ul>
    </aside>
    </div>

       
        <div class="main-cont">
       
        <h3 class="m-3">Registerd Employees:</h3>

<table class="table table-striped table-hover">
<thead>
 <tr>
<th scope="col">S No.</th>
<th scope="col">Name</th>
<th scope="col">Phone</th>
<th scope="col">Email</th>
<th scope="col">Role</th>
<th scope="col">Action</th>
</tr>
</thead>
<tbody>
<tr>
<?php

include('includes/dbconnect.php');
$sql = "SELECT * FROM `logindata`";
$result = mysqli_query($conn, $sql);
$sr = 1;
while ($row = mysqli_fetch_assoc($result)) {
    if($row['role'] == "Employee"){

echo'<tr>
<td >'.$sr.'</td>
<td>'. $row['name'] .'</td>
<td>'. $row['phone'].'</td>
<td>'. $row['email']. '</td>
<td>'. $row['role']. '</td>
<td>
<a href="view.php?viewId='.$row['reg_no'].'"><button class="btn btn-primary">View</button></a>
<a href="delete.php?deleteId='.$row['reg_no'].'"><button class="btn btn-danger">Delete</button></a>

';
if($row['status'] == 1){
    echo'<button class="btn btn-success active " id="'.$row['reg_no'].'">Active</button>';
  }
  else{
      echo'<button class="btn btn-danger inactive" id="'.$row['reg_no'].'">Inactive</button>';
  }
  
  echo '
        
  </td>
  </tr>';
    $sr++;
}

}
?>

</tr>
</tbody>
</table>
</div>
<div class="footer fixed-bottom">
    <p>© 2024 My School. All rights reserved.</p>
</div>
    
    </body>

</html>