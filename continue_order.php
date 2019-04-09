<?php 
	include 'includes/header.php'; // including the header class 
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Notice</title>
	<!-- link to the css -->
	<link rel="stylesheet" href="css/index.css">
</head>
<body style="margin: 0; overflow: hidden;">
	<div class="co_container">
		<div class="co_notice_box">
			<h1 style="text-align: center;">For Continue Order Please login first <br> thank you</h1> <br><br>
			<center><a class="login_btn_for_order" href="login.php?oss=<?php echo "login&first" ?>">Login</a></center>
		</div>
	</div>
<?php include 'includes/footer.php'; // including the header class  ?>
</body>
</html>