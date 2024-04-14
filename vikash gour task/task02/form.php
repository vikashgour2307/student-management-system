<?php
session_start();

if (isset($_SESSION['loggedin'])){
    header('location: home1.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login and Registration</title>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="login.css">
    <style>
        /* This is the CSS section where you can define the style and format of your webpage */
        body {
            font-family: Arial, sans-serif;
            background-color: lightblue;
        }
        h1 {
            text-align: center;
            color: white;
        }
        .container {
            width: 80%;
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
            /* position:absolute;
            left:70%; */
            margin-left:50%;
        }

        div.popup-container div.popup label{
    display: flex;
    flex-direction: row;
    align-items: center;
    margin-bottom: 7px;
    font-size: 14px;
}

div.popup-container div.popup label input[type="checkbox"]{
    width: 15px;
    height: 15px;
    margin: 0;
    margin-right: 5px;
}

    </style>
</head>

<body>
    <header>
        <div class="logo">
            <img src="vg.img.jpg" alt="logo">
        </div>
        
        <div class="sign-in-up ls-button">
            <button type="button" onclick="popup('login-popup')">Login</button>
            <button type="button" onclick="popup('register-popup')">Register</button>
        </div>
    </header>
    <div class="popup-container" id="login-popup">
        <div class="popup">
            <form action="code.php" method="post" enctype="multipart/form-data" onsubmit="return formValidation()">
                <h2>
                    <span>LOGIN</span>
                    <button type="reset" onclick="popup('login-popup')">X</button>
                </h2>
                <input type="email" name="email" placeholder="E-mail" value="<?php if(isset($_COOKIE['emailcookie'])) {echo $_COOKIE['emailcookie'];}?>" required>
                <input type="password" id="myInput" name="pass" placeholder="password" value="<?php if(isset($_COOKIE['passwordcookie'])) {echo $_COOKIE['passwordcookie'];}?>" required>
                <div class="g-recaptcha" data-sitekey="6LeM4F4pAAAAAMmWygkMoSdzZfq5KtsjZDtmVqTt" required></div>
             
                <div class="remember ">
              <input type="checkbox" value="isRemeberMe" name="remember_me" id="remember">
              <label for="rememberMe" class="lab">Remember me</label>
                </div>

                
              
                <button type="submit" name="login" value="login" class="login-btn">LOGIN</button>
                
                <span><a style="margin-left: 30%;"href="forgotpass.php">Forget Password ?</a></span>
                
            </form>
        </div>
    </div>

    <div class="popup-container" id="register-popup">
        <div class="register popup">
            <form action="code.php" method="post" enctype="multipart/form-data" onsubmit="return formValidation()">
                <h2>
                    <span>REGISTER</span>
                    <button type="reset" onclick="popup('register-popup')">X</button>
                </h2>
                <input type="text" name="name" placeholder="Full Name" required>
                <input type="phone" name="phone"  placeholder="phone" required>
                <input type="email" name="email" placeholder="E-Mail" required>
                <input type="password" name="password" placeholder="password" required>
                <input type="password" name="cpass" placeholder="Confirm password" required>
                <label for="role">Select Your Role :</label> <br>
                <select name="role" id="role">
                    <option value="NUll">Select</option>
                    <option value="Employee">Employee</option>
                    <option value="Student">Student</option>
                    <hr>

                </select> <br><br>
                <label for="photo">Upload your photo :</label>
                <input type="file" name="photo" id="photo">
                <button type="submit" value="register" name="register" class="register-btn">REGISTER</button>
            </form>
        </div>
    </div>

    
    


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
        </div>
        <div class="footer fixed-bottom" >
            <p>© 2024 My School. All rights reserved.</p>
        </div>
    </div>
    <script>
        function popup(popup_name)
        {
            get_popup=document.getElementById(popup_name);
            if(get_popup.style.display=="flex")
            {
                get_popup.style.display="none";
                document.getElementById("mainCont").style.display="block";
                
            }
            else
            {
                get_popup.style.display="flex";
                document.getElementById("mainCont").style.display="none";
            }
        }

        // Select all input elements for varification
        const name = document.getElementById("name");
        const phoneNumber = document.getElementById("phoneNumber");
        const email = document.getElementById("email");
        const password = document.getElementById("password");
      </script>

</body>

</html>
