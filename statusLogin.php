<?php
//Check if a user is logged in so that he cannot redirect with bypass to another page
   include('dbconnection.php');
   session_start();
   
   $user_check = $_SESSION['login_user']; //Set login user
   $sql = "SELECT * FROM gdss_system.users WHERE Username = '".$user_check."'";
   $result = $conn->query($sql);
   $row = $result->fetch_assoc();
   
   $login_name = $row['Name'];
   $login_surname = $row['Surname'];
   
   if(!isset($_SESSION['login_user'])){ //If not logged in go to first page
      header("location:index.php");
      die();
   }
?>