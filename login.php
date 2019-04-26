<?php
session_start();
session_destroy();
	include 'functions/init.php';
	if (isset($_GET['oss'])) {
		login($_GET['oss']);
	}
	else
	{
		$none="none";
		login($none);
	}
	// $loged=false;
	// if (isset($_SESSION['loged']) && empty($_SESSION['loged'])) {
	// 	$loged=true;
	// }
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
			<h1 align="center">Online Electronics Shopping Login</h1> <!-- Form Header -->
		    	<p align="center">Please Follow the step for login</p>
				<?php
					if (!isset($_SESSION['msg']) || empty($_SESSION['msg'])) {
						# code...
					}
					else{
						?>
						<h2 style="color: red;" align='center'><?php echo $_SESSION['msg']; ?></h2>
						<?php
						unset($_SESSION['msg']);
					}
				?>
			    <hr>
<!-- Code for Form -->
			    <form action="" method="post">
				    <label><b>Username/Email</b></label>
		    		<input type="text" placeholder="Enter userid or email" name="id_mail" required>

		    		<label><b>Password</b></label>
		    		<input type="password" placeholder="Enter Password" name="password" required>
				    <button type="submit" name="button1" class="registerbtn"><b>LOG IN</b></button>
				</form>  <!-- End of Form -->



				<hr>

				<!-- Forget password => One row with two column -->
				<div class="row_div">
					<div class="col_div">
						<p><a href="forget_pass.php">Forget Password</a></p>
					</div>
					<div class="col_div" align="right">
						<p>You don't have an account? <a class="signup_btn" href="signup.php">Sign Up</a>.</p>
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