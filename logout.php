<?php
session_start();

if($_SERVER["REQUEST_METHOD"] == "POST") {
    session_destroy();
    unset($_SESSION['login_user']); //Unset login user so that he cant have access to other pages
    header("location: index.php"); //Index page
}
?>