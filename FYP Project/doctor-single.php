
<?php

include('connection.php');
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['upload'])) {
        $f_name = $_POST['name'];
        $f_email = $_POST['email'];
        $f_contact = $_POST['contact'];
        $f_doctor = $_POST['doctor'];
        $f_date = $_POST['date'];
        $f_message = $_POST['message'];
        
            $query = "INSERT INTO appointment(NAME, EMAIL, CONTACT, DOCTOR, DATE, MESSAGE)VALUES('$f_name', '$f_email', '$f_contact', '$f_doctor', '$f_date', '$f_message')";

            if (mysqli_query($db_connection, $query)) {

                echo "Message Send successfully.";
                header('location: doctor-single.php');

            } else {

                echo "data not send... Error";

            }

        }
    }

?>
<?php

error_reporting(0);

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>We Care - Single Blog</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Amatic+SC:400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">
    
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/ionicons.min.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">

    
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body class="goto-here">
		<div class="py-1 bg-primary">
    	<div class="container">
    		<div class="row no-gutters d-flex align-items-start align-items-center px-md-0">
	    		<div class="col-lg-12 d-block">
		    		<div class="row d-flex">
		    			<div class="col-md pr-4 d-flex topper align-items-center">
					    	<div class="icon mr-2 d-flex justify-content-center align-items-center"><span class="icon-phone2"></span></div>
						    <span class="text">+92 321 1234567</span>
					    </div>
					    <div class="col-md pr-4 d-flex topper align-items-center">
					    	<div class="icon mr-2 d-flex justify-content-center align-items-center"><span class="icon-paper-plane"></span></div>
						    <span class="text">wecare@email.com</span>
					    </div>
					    <div class="col-md-5 pr-4 d-flex topper align-items-center text-lg-right">
						    <span class="text">3-5 Business days delivery &amp; Free Returns</span>
					    </div>
				    </div>
			    </div>
		    </div>
		  </div>
    </div>
    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
	      <a class="navbar-brand" href="index.php">We Care</a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>

	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
	          <li class="nav-item"><a href="index.php" class="nav-link">Home</a></li>
	          <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Shop</a>
              <div class="dropdown-menu" aria-labelledby="dropdown04">
              	<a class="dropdown-item" href="shop.php">Shop</a>
              	<a class="dropdown-item" href="wishlist.php">Wishlist</a>
                <a class="dropdown-item" href="checkout.php">Checkout</a>
              </div>
            </li>
	          <li class="nav-item"><a href="about.php" class="nav-link">About</a></li>
	          <li class="nav-item active"><a href="blog.php" class="nav-link">Blog</a></li>
	          <li class="nav-item"><a href="doctors.php" class="nav-link">Doctors</a></li>
	          <li class="nav-item"><a href="contact.php" class="nav-link">Contact</a></li>
	          <li class="nav-item cta cta-colored"><a href="cart.php" class="nav-link"><span class="icon-shopping_cart"></span>[Cart]</a></li>
            <li class="nav-item"><a href="login.php" class="nav-link">LOGOUT</a></li>
	        </ul>
	      </div>
	    </div>
	  </nav>
    <!-- END nav -->

    <div class="hero-wrap hero-bread" style="background-image: url('images/f2.jpg');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
          	<p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home</a></span> <span>Doctor</span></p>
            <h1 class="mb-0 bread">Doctor's Detail</h1>
          </div>
        </div>
      </div>
    </div>

    <section class="ftco-section ftco-degree-bg">
      <div class="container">
        <div class="row">
        <?php
                    include('connection.php');
                    $select = "SELECT * from doctors WHERE FLAG=0";
                    $result = mysqli_query($db_connection, $select);
                    while ($doctor_record = mysqli_fetch_assoc($result)) {
                        ?>
          <div class="col-lg-12 ftco-animate mt-5">
						<h2 class="mb-3">#<?php echo $doctor_record['ID']; ?> <?php echo $doctor_record['NAME']; ?></h2>
                        <h4 class=""><?php echo $doctor_record['SPECIALIST']; ?></h4>
                        <h4 class=""><?php echo $doctor_record['EXPERIENCE']; ?></h4>
            
            <p><?php echo $doctor_record['ABOUT']; ?></p>
            <div class="text-center">
            <?php echo "<img src='" . $doctor_record['image'] . "' width=30%;>"; ?>
                    </div>
            <?php } ?>
            <!-- about writter -->

            <div class="about-author d-flex p-4 bg-light mt-5">
              <div class="bio align-self-md-center mr-4 col-lg-4 col-6">
                <img src="images/person_4.png" alt="Image placeholder" class="img-fluid mb-4">
              </div>
              <div class="desc align-self-md-center col-lg-8  col-6">
                <h3>Ahmad Zeeshan - CEO</h3>
                <p>If you look at farmers from another perspective, they are saving us, the environments and our surroundings; they are playing a role to protect us and by these farmers are growing crops as well for us to eat and grow. So it is right to say that farmers and kind of doctors because a life without trees in the world would be a 'poisonous life' for us and our next generations to come.

Doctors on the other hands we need them in our lives to make sure we are healthy and to treat us when we are not healthy. Without doctors a lot of people will be dead and there will not be 7.6 billion people in the world but about half that amount. Without doctors there will be more tears in the world (more people will be crying and morning due to their relative dying), there will be more fighting(people will be going through extreme length and measures to get drugs to heal themselves and others around them) which could involve killing, bombing and so on. So to conclude Doctors are essential to our life and that is an unchangeable fact. Period!</p>
              </div>
            </div>

            <!-- Comments -->
            
            <div class="pt-5">
             
              
              <div class="comment-form-wrap pt-5">
                <h3 class="mb-5">For any Appointment, Contact Us!</h3>
                <form action="doctor-single.php" class="p-5 bg-light" method="post" enctype="multipart/form-data"
                                            class="form-horizontal">
                  <div class="form-group">
                    <label for="name">Name *</label>
                    <input type="text" class="form-control" id="name" name="name">
                  </div>

                  <div class="form-group">
                    <label for="email">Email *</label>
                    <input type="email" class="form-control" id="email" name="email">
                  </div>

                  <div class="form-group">
                    <label for="contact">Contact No *</label>
                    <input type="text" class="form-control" name="contact">
                  </div>

                  <div class="form-group">
                    <label for="doctor">Doctor</label>
                    <input type="text" class="form-control" name="doctor">
                  </div>

                  <div class="form-group">
                    <label for="date">Date *</label>
                    <input type="date" class="form-control" name="date">
                  </div>

                  <div class="form-group">
                    <label for="message">Message</label>
                    <textarea name="message" id="message" cols="30" rows="10" class="form-control"></textarea>
                  </div>
                  <div class="form-group">
                    <input type="submit" value="Upload" name="upload" class="btn py-3 px-4 btn-primary">
                  </div>

                </form>
              </div>
            </div>
          </div>

        </div>
      </div>
    </section> <!-- .section -->

    <footer class="ftco-footer ftco-section bg-light">
      <div class="container">
      	<div class="row">
      		<div class="mouse">
						<a href="#" class="mouse-icon">
							<div class="mouse-wheel"><span class="ion-ios-arrow-up"></span></div>
						</a>
					</div>
      	</div>
        <div class="row mb-5">
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">We Crae</h2>
              <p>Like humans, livestock animals need a balanced diet containing all the necessary nutrients, 
                fluids, minerals, and vitamins. Proper nutrition gives your animals the vigor to grow,
                 develop, and reproduce, and strong immunity to fight off infections.</p>
              <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
                <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
              </ul>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4 ml-md-5">
              <h2 class="ftco-heading-2">Menu</h2>
              <ul class="list-unstyled">
                <li><a href="shop.php" class="py-2 d-block">Shop</a></li>
                <li><a href="about.php" class="py-2 d-block">About</a></li>
                <li><a href="blog.php" class="py-2 d-block">Blogs</a></li>
                <li><a href="contact.php" class="py-2 d-block">Contact Us</a></li>
              </ul>
            </div>
          </div>
          <div class="col-md-4">
             <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Help</h2>
              <div class="d-flex">
	              <ul class="list-unstyled mr-l-5 pr-l-3 mr-4">
	                <li><a href="#" class="py-2 d-block">Contact Us</a></li>
	                <li><a href="#" class="py-2 d-block">Privacy Policy</a></li>
	              </ul>
	            </div>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
            	<h2 class="ftco-heading-2">Have a Questions?</h2>
            	<div class="block-23 mb-3">
	              <ul>
	                <li><span class="icon icon-map-marker"></span><span class="text">LDA Chock, Near Superior University, Lahore</span></li>
	                <li><a href="#"><span class="icon icon-phone"></span><span class="text">+92 321 1234567</span></a></li>
	                <li><a href="#"><span class="icon icon-envelope"></span><span class="text">wecare@email.com</span></a></li>
	              </ul>
	            </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 text-center">

            <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
						  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved by WE CARE Team <i class="icon-heart color-danger" aria-hidden="true"></i> 
						  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
						</p>
          </div>
        </div>
      </div>
    </footer>
    
  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <script src="js/jquery.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/jquery.animateNumber.min.js"></script>
  <script src="js/bootstrap-datepicker.js"></script>
  <script src="js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="js/google-map.js"></script>
  <script src="js/main.js"></script>
    
  </body>
</html>