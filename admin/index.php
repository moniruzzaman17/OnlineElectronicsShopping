<?php
session_start();
session_destroy();
	include 'includes/header.php';
	admin_login();

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
<br>
<br>

<!-- Main Container -->
	<div class="log_container">
		<div style="width: 96%;" class="info_div">
			<img src="images/logo.png" alt="">
			<h1 align="center">Admin Login</h1> <!-- Form Header -->
		    	<p align="center">Provide the currect for login</p>
				<?php
					if (isset($_SESSION['msg']) || !empty($_SESSION['msg'])) {

						?>
						<h2 style="color: red;" align='center'><?php echo $_SESSION['msg']; ?></h2>
						<?php
						unset($_SESSION['msg']);
					}
				?>
			    <hr>
			    <form action="" method="post">
				    <label><b>Username/Email</b></label>
		    		<input type="text" placeholder="Enter userid or email" name="id_mail" required>

		    		<label><b>Password</b></label>
		    		<input type="password" placeholder="Enter Password" name="password" required>
				    <button type="submit" name="button1" class="registerbtn"><b>LOG IN</b></button>
				</form>  <!-- End of Form -->
				<!-- Forget password => One row with two column -->
				<div class="row_div">
					<div class="col_div">
						<p><a href="forget_pass.php">Forget Password</a></p>
					</div>
					<div class="col_div" align="right">
					</div>
				</div>
			
		</div>
		
	</div>  <!-- End of the Container -->
	<?php include 'includes/footer.php'; ?>
</body>
</html>