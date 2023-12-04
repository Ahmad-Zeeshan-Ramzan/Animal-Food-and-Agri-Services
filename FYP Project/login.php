<?php

include('connection.php');
session_start();
if (isset($_POST['login'])) {
    $login_name = $_POST['username'];
    $login_pass = $_POST['pass'];
    if (!empty($login_name) || !empty($login_pass)) {
        if (!preg_match('/[^a-zA-Z\d]/', $login_name) && !preg_match('/[^a-zA-Z\d]/', $login_pass)) {


            $login = "select * from user WHERE NAME='" . $login_name . "' and PASSWORD='" . $login_pass . "' and FLAG=0";
            $result = mysqli_query($db_connection, $login) or die(mysqli_error($db_connection));

            if (mysqli_fetch_assoc($result)) {
                if (!empty($_POST['remember'])) {
                    setcookie("username", $_POST["username"], time() + 3600);
                    setcookie("pass", $_POST["pass"], time() + 3600);
                    echo "Cookies Set Successsfully";
                } else {
                    setcookie("username", "");
                    setcookie("pass", "");
                    echo "Cookies not Set";
                }

                $_SESSION['user'] = $login_name;
                // echo "cookie set";
                header('location: index.php');
            }
        }
    } else {
        echo "Please eneter your password and/or username in correct format";
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
				<form class="login100-form validate-form" action="" method="post">
					<span class="login100-form-title p-b-43">
						Login to continue
					</span>
					
					<div class="wrap-input100 validate-input" data-validate = "Valid username is required: xyz">
						<input class="input100" type="text" name="username" value="<?php if (isset($_COOKIE["username"])) {
                                            echo $_COOKIE["username"];
                                        } ?>" 
									>
						<span class="focus-input100"></span>
						<span class="label-input100">Username</span>
					</div>
					
					
					<div class="wrap-input100 validate-input" data-validate="Password is required">
						<input class="input100" type="password" name="pass" value="<?php if (isset($_COOKIE["pass"])) {
                                            echo $_COOKIE["pass"];
                                        } ?>"
                                    >
						<span class="focus-input100"></span>
						<span class="label-input100">Password</span>
					</div>

					<div class="flex-sb-m w-full p-t-3 p-b-32">
						<div class="contact100-form-checkbox">
							<input class="input-checkbox100" id="ckb1" type="checkbox" name="remember">
							<label class="label-checkbox100" for="ckb1">
								Remember me
							</label>
						</div>

						<div>
							<a href="forget-pass.php" class="txt1">
								Forgot Password?
							</a>
						</div>
					</div>
			

					<div class="container-login100-form-btn">
						<button class="login100-form-btn" type="submit"
                                    name="login">
							Login
						</button>
					</div>

					<div class="text-center p-t-30 p-b-20">
						<span class="txt2">
							Don't have Account?? <a href="register.php">Sign Up Here!</a>
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