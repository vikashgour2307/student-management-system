<?php
session_start();
session_unset();
session_destroy();
if ($_SESSION['loggedin'] != true){
    header('location: form.php');
}
?>