<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Online Electronics Shopping System</title>
	<link rel="stylesheet" href="../css/index.css">
</head>
<body>
	<?php include 'functions/init.php'; ?>
	<div class="header_container">
		<div class="header_top">
			<div class="site_logo">
				<img src="images/logo.png" alt="">
			</div>
			<div class="site_title">
				<h2>Online Electronics Shopping</h2>
			</div>
			<div class="search_div">
				<div class="search_box">
					<input type="text" name="" placeholder="search keyword">
				</div>
				<div class="search_btn">
					<button>Search</button>
				</div>
			</div>
			<div class="cart_div">
				<div class="cart_container">
					<div class="cart_logo">
						<a href="cart.php"><img style="width: 45px; height: 45px; margin: 7% 68%;" src="images/cart.png" alt=""></a>
					</div>
					<div class="cart_title">
						<a href="cart.php">My Cart</a>
					</div>
				</div>
			</div>
			<div class="log_btn">
				<!-- <a href="">Login</a> -->
				<div class="log_btn_div">
					<!-- <button>Login</button> -->
					<a href="login.php">Login</a>
					<a href="signup.php">Signup</a>
					<!-- <button>Logout</button> -->
				</div>
			</div>
		</div> <!-- end of header_top -->
		<div class="header_down">
			<div class="statement_div">
				<h2>Make Your Shopping More Easy</h2>
				
			</div>
			<div class="navbar">
				<ul>
				  <li><a class="active" href="index.php">Home</a></li>
				  <li>
				  	<div class="header_dropdown">
				  	<a href="#news">Category</a>
					  <div class="header_dropdown-content">
					    <div class="sub_dropdown">
					    <a class="sub_link" href="#">Link 1</a>
						  <div class="sub_dropdown-content">
						    <a class="sub_link" href="#">Link 1</a>
						  </div> <!-- end of sub_dropdown-content -->
						</div> <!-- end of sub_dropdown -->
					  </div> <!-- end of header_dropdown-content -->
					</div> <!-- end of header_dropdown -->
				  </li>
				  <li><a href="#contact">Contact Us</a></li>
				  <li><a href="#about">Terms & Conditions</a></li>
				  <li><a href="#about">Profile</a></li>
				</ul>
			</div> <!-- end of navbar -->
		</div> <!-- end of header_down -->
	</div> <!-- end of header_container -->
</body>
</html>