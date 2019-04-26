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
		    		<input type="text" placeholder="Enter Full Name" name="name" pattern="^[A-Z][ a-zA-Z]+$" title="First Letter must be upper case and only space and characters are allowed" required>

				    <label><b>Username</b></label>
		              <?php
		                if (isset($_SESSION['msg'])) { ?>
		                  <p style="color: red;"><?php echo $_SESSION['msg']; ?></p>
		                <?php
		                unset($_SESSION['msg']);
		                }
		              ?>
		    		<input type="text" placeholder="Enter Username" name="user_id" pattern="^[a-z][a-z_]{1,20}[0-9]{1,15}$" title="start with at least 2 lower case and end with number, allowed only a-z,_,0-9" required>

		    		<label><b>Password</b></label>
		    		<input type="password" placeholder="create Password" name="password" pattern="^[a-zA-Z0-9 .@#$%&*]{6,30}$" required>

				    <label><b>Email</b></label>
		    		<input type="text" placeholder="Enter a valid Email" name="mail" pattern="^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$" title="Make sure a valid mail address" required>

				    <label><b>Contact Number</b></label>
		    		<input type="text" placeholder="Enter phone number" name="contact" pattern="^[0-9]{11}" title="Only accept numarical value with 11 numarical value" required>

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