<?php
	include "dbconnection.php";
    session_start();
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $emailError = "";
        $usernameError = "";
        $nameError = "";
        $passError = "";

        //Take Data from from
        $myname = $_REQUEST['name'];
        $mysurname = $_REQUEST['surname'];
        $myusername = $_REQUEST['username'];
        $mypassword = $_REQUEST['password']; 
        $repassword = $_REQUEST['re-password'];
        $myemail = $_REQUEST['email'];

        //Validate Mail Format
        if (!filter_var($myemail, FILTER_VALIDATE_EMAIL)) {
            $emailError = "Invalid email format!";
            echo $emailError;
        }
        
        //Validate Pass
        if($mypassword !== $repassword){
            $passError = "Passwords mismatch!";
        }

        //Check data (Username , Name + Surname)
        $sql = "SELECT * FROM gdss_system.users WHERE Username = '".$myusername."' or (Name = '".$myname."' and Surname = '".$mysurname."')";
        $result = $conn->query($sql);

        if ($result->num_rows <= 0) {
            continue;
        }else{
            while($row = $result->fetch_assoc()) { 
                if($row["Username"] === $myusername){
                    $usernameError = "Username exists!";
                }

                if($row["Name"] === $myname and $row["Surname"] === $mysurname){
                    $nameError = "User already exists!";
                }
            }
        }

        if($nameError == "" and $usernameError == "" and $passError=="" and $emailError == ""){
            $sql = "SELECT * FROM gdss_system.users";
            $result = $conn->query($sql);
            $count = $result->num_rows + 1;

            $sql = "INSERT INTO gdss_system.users (`ID`, `Name`, `Surname`, `Username`, `Password`, 'Email', 'UserType') VALUES ('".$count."', '".$myname." ', '".$mysurname."', '".$myusername."', '".$mypassword."', '".$myemail."', 'User')";
            $result = $conn->query($sql);
            echo "<script type='text/javascript'>alert('User inserted successfully!');</script>";
            header("location: index.php");
        }
        

    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Sign Up</title>
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
        <script src="js/signup.js"></script>
    </head>

    <body>
        <div class="limiter">
            <div class="container-login100">
                <div class="wrap-login100">
                    <div class="login75-form-title" style="background-image: url(images/bg-01.jpg);">
                        <span class="login100-form-title-1">
                            SIGN UP
                        </span>
                    </div>

                    <form method="POST" action="<?php echo $_SERVER["PHP_SELF"];?>" class="login100-form validate-form">
					<div class="wrap-input100 validate-input m-b-18">
                        <div> ERROR </div>
						<span class="label-input100">Name</span>
						<input class="input100" type="text" name="name" placeholder="Enter name" required>
                        <span class="focus-input100"></span>
                    </div>

					<div class="wrap-input100 validate-input m-b-18">
						<span class="label-input100">Surname</span>
						<input class="input100" type="text" name="surname" placeholder="Enter surname" required>
						<span class="focus-input100"></span>
					</div>

                    <div class="wrap-input100 validate-input m-b-18">
						<span class="label-input100">Username</span>
						<input class="input100" type="text" name="username" placeholder="Enter username" required>
						<span class="focus-input100"></span>
					</div>

                    <div class="wrap-input100 validate-input m-b-18">
						<span class="label-input100">Password</span>
						<input class="input100" type="password" name="password" placeholder="Enter password" required>
						<span class="focus-input100"></span>
					</div>

                    <div class="wrap-input100 validate-input m-b-18">
						<span class="label-input100">Re-Enter Password</span>
						<input class="input100" type="password" name="re-password" placeholder="Re-enter password" required>
						<span class="focus-input100"></span>
					</div>

                    <div class="wrap-input100 validate-input m-b-18">
						<span class="label-input100">Email</span>
						<input class="input100" type="email" name="email" placeholder="Enter email" required>
						<span class="focus-input100"></span>
					</div>

					<div class="container-login100-form-btn">
						<input type="submit" id="signup" name="signup-btn" value="Sign Up" class="login100-form-btn"/>
                        <button onclick="location.href = 'index.php';" class="login100-form-btn">Return</button>
					</div>
				</form>
                </div>
            </div>
        </div>
    </body>
</html>