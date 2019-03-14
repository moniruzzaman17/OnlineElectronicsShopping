<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Sign Up</title>

	<!-- CSS Link only for keep the same style as login -->
	<link rel="stylesheet" href="css/login.css">

	<!--Internal CSS for forget pass main-->
	<style>
		
	</style>
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

<!-- Main Container -->
	<div class="container">
		<div class="info_div">
			<h2 align="center">To Reset your Password Please varify your Email</h2> <!-- Form Header -->
			<form action="mail.php" method="POST">
				<label style="font-size:20px;"><b>Email</b></label>
	    		<input type="text" placeholder="Enter Email" name="mail" required>
	    		<input type="hidden" name="v_original_code" value="" />
				<button type="submit" name="button1" class="registerbtn"><b>Get Varification Code</b></button>
			</form>
			<form action="" method="post">
				<input type="hidden" name="original_code" value="" />
	    		<label style="font-size:20px;"><b>Verification Code</b></label>
	    		<input type="text" placeholder="Enter Verification Code" name="v_code"  required>
				<button type="submit" name="button2" class="registerbtn"><b>Verify</b></button>
			</form>
		</div>
		<a href="login.php">BACK</a>
	</div>  <!-- End of the Container -->
	<?php include 'includes/footer.php'; ?>
</body>
</html>