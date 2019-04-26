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
		<div class="info_div" style="width: 40%; margin: 9% 33%;">
			<h2 align="center">To Reset your Password Please varify your Email</h2> 
<?php
include 'functions/init.php';
if (!isset($_SESSION['send'])) { ?>

			<form action="mail.php" method="post">
				<label style="font-size:20px;"><b>Email</b></label>
	    		<input type="text" placeholder="Enter Email" name="mail" required>

				<!--PHP Code for random number generator-->
				<?php 
					$code= mt_rand();
				?>
				<input type="hidden" name="v_original_code" value="<?php echo $code; ?>" />
				<button type="submit" name="button1" class="registerbtn"><b>Get Varification Code</b></button>
			</form>
<?php
}
else
{
	echo '<p style="font-style: italic; color: red;">check you mail to get verification code</p>';
}
if (!isset($_SESSION['get']) && isset($_SESSION['send'])) { ?>
			<form action="" method="post">
				<input type="hidden" name="original_code" value="<?php echo mt_rand(); ?>" />
	    		<label style="font-size:20px;"><b>Verification Code</b></label>
	    		<input type="text" placeholder="Enter Verification Code" name="v_code"  required>
				<button type="submit" name="button2" class="registerbtn"><b>Continue</b></button>
			</form>
			<br>
			<br>
			<br>

<?php
}

if (isset($_POST['button2'])) {
$or_code=$_SESSION['or_code'];
	$_SESSION['send']=true;
	$_SESSION['get']=true;
	// header("Refresh:0");
	$new_code=$_POST['v_code'];
	if ($or_code==$new_code) { ?>
			<form action="" method="post">
				<input type="hidden" name="original_code" value="<?php echo mt_rand(); ?>" />
	    		<label style="font-size:20px;"><b>Enter new password</b></label>
	    		<input type="text" placeholder="Enter Verification Code" name="new_pass"  required>
				<button type="submit" name="update" class="registerbtn"><b>Update</b></button>
			</form>

	<?php
	}
	else
	{
		echo '<h5>Sorry Verification code does not match</h5>';
	}
}

if (isset($_POST['update'])) {
	$new_pass=$_POST['new_pass'];
	$email=$_SESSION['email'];
$sql=mysqli_query($conn, "SELECT * FROM admin WHERE email='$email'");
	$row=mysqli_fetch_array($sql);

	if ($row['email']==$email) {
		$update_user="UPDATE admin SET password='$new_pass' WHERE email='$email'";
		if (query($update_user)) {
			session_destroy();
			echo "<script>alert('Your password has been Updated'); window.location='index.php'</script>";
		}
	}
}
?>


		</div>
<center>
		<a href="index.php">BACK</a>
</center>

	</div>  <!-- End of the Container -->
	<?php include 'includes/footer.php'; ?>
</body>
</html>