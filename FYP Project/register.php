<?php
include('connection.php');
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['upload'])) {
        $f_name = $_POST['name'];
        $f_email = $_POST['email'];
        $f_pass = $_POST['pass'];
        
        $query = "INSERT INTO user(NAME, EMAIL, PASSWORD)VALUES('$f_name', '$f_email', '$f_pass')";

            

        if (mysqli_query($db_connection, $query)) {
                
            header('location: login.php');

            } else {

                echo "data not saved";

            }

        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>We Care - Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="imageslogin/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendorlogin/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fontslogin/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fontslogin/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendorlogin/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendorlogin/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendorlogin/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendorlogin/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendorlogin/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="csslogin/util.css">
	<link rel="stylesheet" type="text/css" href="csslogin/main.css">
<!--===============================================================================================-->
</head>
<body style="background-color: #666666;">
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form validate-form" action="register.php" method="post" enctype="multipart/form-data">
					<span class="login100-form-title p-b-43">
						Login to continue
					</span>
					
					<div class="wrap-input100 validate-input" data-validate = "username is required: xyz">
						<input class="input100" type="text" name="name">
						<span class="focus-input100"></span>
						<span class="label-input100">Username</span>
					</div>
					
                    <div class="wrap-input100 validate-input" data-validate = "email is required: ex@xyz">
						<input class="input100" type="text" name="email">
						<span class="focus-input100"></span>
						<span class="label-input100">Email</span>
					</div>
					
					<div class="wrap-input100 validate-input" data-validate="Password is required">
						<input class="input100" type="password" name="pass">
						<span class="focus-input100"></span>
						<span class="label-input100">Password</span>
					</div>
			

					<div class="container-login100-form-btn p-t-20">
						<button class="login100-form-btn" type="submit" name="upload"
                                    value="Upload">
							Register
						</button>
					</div>

					<div class="text-center p-t-30 p-b-20">
						<span class="txt2">
							Already have Account?? <a href="login.php">Sign In Here!</a>
						</span>
					</div>
					
				</form>

				<div class="login100-more" style="background-image: url('imageslogin/bg0.jpg');">
				</div>
			</div>
		</div>
	</div>
	
	

	
	
<!--===============================================================================================-->
	<script src="vendorlogin/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendorlogin/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendorlogin/bootstrap/js/popper.js"></script>
	<script src="vendorlogin/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendorlogin/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendorlogin/daterangepicker/moment.min.js"></script>
	<script src="vendorlogin/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendorlogin/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="jslogin/main.js"></script>

</body>
</html>