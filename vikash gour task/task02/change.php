<?php
session_start();

if (!isset($_SESSION['loggedin'])){
    header('location: form.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login and Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="login.css"> -->
    <style>
        /* This is the CSS section where you can define the style and format of your webpage */
        * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    text-decoration: none;
    font-family: sans-serif;
}

.logo img {
    margin-left: 20px;
    width: 60px;
    border-radius: 50%;
}

header {

    display: flex;

    flex-direction: row;

    align-items: center;

    justify-content: space-around;

    background-color: #30475e;

    color: white;

    padding: 20px 0;

}

header nav a {
    color: white;

    margin-right: 30px;

    font-weight: 500;
}

header div.sign-in-up button {

    background-color: #75cfb8;

    font-size: 16px;

    font-weight: 550;

    padding: 4px 12px;

    border: 2px solid #000;

    border-radius: 5px;

    outline: none;

    margin-left: 20px;

}

header div.sign-in-up button:last-child {
    background-color: #fa9579;
}

div.popup-container {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.2);
    display: flex;
    flex-direction: row;
    align-items: center;
    justify-content: center;
    display:flex;
}

div.popup-container div.popup {
    background-color: #f0f0f0;
    width: 350px;
    border-radius: 5px;
    padding: 20px 25px 30px 25px;

}

div.popup-container div.popup h2 {
    display: flex;
    flex-direction: row;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 30px;
    color: #30475e;

}

div.popup-container div.popup h2 button {
    border: none;
    background-color: transparent;
    outline: none;
    font-size: 18px;
    font-weight: 550;
    color: #797775;
}

div.popup-container div.popup input {
    width: 100%;
    margin-bottom: 20px;
    background-color: transparent;
    border: none;
    border-bottom: 2px solid #30475e;
    border-radius: 0;
    padding: 5px 0;
    font-weight: 550;
    font-size: 14px;
    outline: none;

}

div.popup-container div.popup button.login-btn,div.popup-container div.register button.register-btn  {
    font-weight: 550;
    font-style: 15px;
    color: white;
    background-color: #30475e;
    padding: 4px 10px;
    border: none;
    outline: none;
    margin-top: 5px;

}

div.popup-container div.register {

    background-color: #edeef7;

}

div.popup-container div.register h2 {
    color: #fa9579;

}

div.popup-container div.register input {
    border-bottom-color: #fa9579;
}

div.popup-container div.register button.register-btn {
    background-color: #fa9579;
}

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
            background-color: darkblue;
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
       
            margin-left:50%;
        }
    </style>
</head>

<body>

    <div class="popup-container " id="login-popup">
        <div class="popup">
            <form action="code.php" method="post" enctype="multipart/form-data" onsubmit="return formValidation()">
                <h2>
                    <span>Change account password</span>
                  
                </h2>
                <input type="email" name="email" placeholder="E-mail" required>

                
                
                <input type="password" id="myInput" name="currentpass" placeholder="Current password" required>
                
                

                <input type="password" id="myInput" name="pass" placeholder="New password" required>
                <input type="password" id="myInput1" name="cpass" placeholder="Confirm password" required>
             
  
              
                <button type="submit" name="changepass" value="changepass" class="login-btn">Change Password</button>
                <span style="margin-left: 1px;"><a href="home1.php"><button type="button" class="login-btn">Home</button></a></span>
                
            </form>
        </div>
    </div>
</body>
</html>