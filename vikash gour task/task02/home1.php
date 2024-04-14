<?php
session_start();

if ($_SESSION['loggedin'] != true){
    header('location: form.php');
}
if ($_SESSION['role'] == "admin"){
    header('location: dashboard1.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login and Registration</title>
    <link rel="stylesheet" href="login.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> -->
    <style>
        /* This is the CSS section where you can define the style and format of your webpage */
        body {
            font-family: Arial, sans-serif;
            background-color: lightblue;
        }
        .u-name{
            margin-top: 15px;
            margin-left:20px;
        }
        .v-name{
            margin-left:20px;
            border-radius: 30px
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
        .ls-button{
            margin-left:30%;
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
<header>
        <div class="logo">
            <img src="vg.img.jpg" alt="logo">
        </div>
       
        <div class="sign-in-up ls-button d-flex">
            
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


<div class="dropdown mt-3">
          <button class="btn btn-warning">Menu</button>
          <div class="dropdown-content">
            <a href="updateprofile.php">Updateprofile</a>
            <a href="change.php">Change Password</a>
            <a href="logout.php">logout</a>
          </div>
        </div>
      </div>
    

        
        </div>
    </header>
    
    
    


    <div class="fluid-container main-content" id="mainCont">
        <h1 class="main-head-cont">Welcome to My School</h1>
        
        <div class="main">
            <div class="sidebar" style="margin-left: 20px;">
                <h3>News and Events</h3>
                <ul style="padding-left: 15px;">
                    <li>New session starts from April 1</li>
                    <li>Annual sports day on March 15</li>
                    <li>Science fair on February 28</li>
                    <li>Parent-teacher meeting on January 31</li>
                </ul>
            </div>
            <div class="content">
                <h2>About Us</h2>
                <p>My School is a co-educational institution that provides quality education to students from kindergarten to grade 12. We follow the CBSE curriculum and offer a variety of subjects and activities to enhance the learning experience of our students. We have a team of qualified and experienced teachers who are dedicated to imparting knowledge and skills to our students. We also have a well-equipped library, a computer lab, a science lab, a music room, and a playground. We aim to create a conducive environment for the holistic development of our students.</p>
            </div>
        </div> <br>
        

    
         <br>
  
        <div class="footer fixed-bottom">
            <p>© 2024 My School. All rights reserved.</p>
        </div>
    </div>
 
</body>
</html>


    