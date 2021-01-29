<?php
	include "dbconnection.php";
	session_start();
	
	if ($_SERVER['REQUEST_METHOD'] === 'POST') {

      // username and password sent from form 
      $myusername = $_REQUEST['username'];
      $mypassword = $_REQUEST['password']; 
      //Make the sql query and submit to db
      $sql = "SELECT * FROM gdss_system.users WHERE Username = '".$myusername."' and Password = '".$mypassword."'";
	  $result = $conn->query($sql);
      $row = $result->fetch_assoc();
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
	 
      if($count == 1) {
		 $_SESSION['login_user'] = $myusername;
         //Go to teachers start page
         header("location: mainSystem.php");
      }else {
		 $_SESSION['Error'] = "Your Login Name or Password is invalid";
		 echo "<script type='text/javascript'>alert('Your Login Name or Password is invalid');</script>";
      }
   }
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Group Decision Support System</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->

</head>
<body>
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-form-title" style="background-image: url(images/bg-01.jpg);">
					<span class="login100-form-title-1">
						WELCOME TO GDSS
					</span>
					<span class="login100-form-title-1">
						SIGN IN PAGE
					</span>
				</div>

				<form method="POST" action="<?php echo $_SERVER["PHP_SELF"];?>" class="login100-form validate-form">
					<div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
						<span class="label-input100">Username</span>
						<input class="input100" type="text" name="username" placeholder="Enter username">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-18" data-validate = "Password is required">
						<span class="label-input100">Password</span>
						<input class="input100" type="password" name="password" placeholder="Enter password">
						<span class="focus-input100"></span>
					</div>

					<div class="container-login100-form-btn">
						<input type="submit" id="login-btn" name="login" value="Login" class="login100-form-btn"/>
						<button onclick="location.href = 'signupPage.php';" id="signup-btn" name="signup" class="login100-form-btn">Sign Up</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	
<!-- ===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
	<!-- <script src="vendor/animsition/js/animsition.min.js"></script> -->
	<!-- <script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script> -->
	<!-- <script src="vendor/select2/select2.min.js"></script>
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
	<script src="vendor/countdowntime/countdowntime.js"></script> -->
<!--=============================================================================================== -->
	<script src="js/main.js"></script>

</body>
</html>