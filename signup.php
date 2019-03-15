<?php
	include 'functions/init.php';
	user_registration();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Sign Up</title>

	<!-- CSS Link -->
	<link rel="stylesheet" href="css/login.css">
	<!-- <link rel="stylesheet" href="css/index.css"> -->
</head>
<body>
	<!-- Fixed Header -->
	<header class="header">
		<div class="header_container">
			<div class="header_info">
				<div class="header_logo">
					<img style="width: 100%; height: 100%;" src="images/logo.png" alt="Logo">
				</div>
			</div>
			<div class="header_info">
					<h2 align="center">Online Electronics Shopping System</h2>
			</div>
			
		</div>
	</header>  <!-- End of Header -->
<br>
<br>

<!-- Main Container -->
	<div class="container">
		<div class="info_div">
			<img src="images/logo.png" alt="">
			<h1 align="center">Online Electronics Shopping SIGNUP</h1> <!-- Form Header -->
		    	<p align="center">Give the correct information to be registered user</p>
			    <hr>
<!-- Code for Form -->
			    <form action="" method="post">
				    <label><b>Full Name</b></label>
		    		<input type="text" placeholder="Enter Full Name" name="name" required>

				    <label><b>Username</b></label>
		    		<input type="text" placeholder="Enter Username" name="user_id" required>

		    		<label><b>Password</b></label>
		    		<input type="password" placeholder="create Password" name="password" required>

				    <label><b>Email</b></label>
		    		<input type="text" placeholder="Enter a valid Email" name="mail" required>

				    <label><b>Contact Number</b></label>
		    		<input type="text" placeholder="Enter phone number" name="contact" required>

				    <label><b>Address</b></label>
		    		<input type="text" placeholder="shipping address" name="address" required>
				    <button type="submit" name="button1" class="registerbtn"><b>SIGN UP</b></button>
				</form>  <!-- End of Form -->



				<hr>

				<!-- Forget password => One row with two column -->
				<div class="row_div">
					<div class="col_div">
						<p><a href="forget_pass.php">Forget Password</a></p>
					</div>
					<div class="col_div" align="right">
						<p>Already have an account? <a class="signup_btn" href="login.php">LOG IN</a>.</p>
					</div>
				</div>
				<!-- End of Forget password => One row with two column -->
					<hr>

				<!-- Google Language translation=> One row with two column -->	
				<div class="row_div">
					<a class="backbtn" href="index.php">BACK TO HOME</a>
				</div>
		</div>
	</div>  <!-- End of the Container -->
	<?php include 'includes/footer.php'; ?>
</body>
</html>