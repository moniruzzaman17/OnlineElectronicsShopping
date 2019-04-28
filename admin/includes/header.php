<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Online Electronics Shopping System</title>
	<link rel="stylesheet" href="../css/index.css">
</head>
<body>
	<?php 
	include 'functions/init.php';

		 $result 		=get_category();
		 $sub_result	=get_sub_category();

	logout(); 
		$loged=true;
		if (!isset($_SESSION['admin_loged']) && empty($_SESSION['admin_loged'])) {
			$loged=false;
		}
	?>
	<div class="header_container">
		<div class="header_top">
			<div class="site_logo">
				<img src="../images/logo.png" alt="">
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
						<a href="cart.php"><img style="width: 45px; height: 45px; margin: 7% 68%;" src="../images/cart.png" alt=""></a>
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
					<?php 
						if ($loged==true) { ?>
							<form action="" method="post">
								<button name="logout_btn">Logout</button>
							</form>
						<?php
						}
					?>
					<!-- <button>Logout</button> -->
				</div>
			</div>
		</div> <!-- end of header_top -->
		<div class="header_down">
			<div class="statement_div">
				<h2>WELCOME to Admin Panel</h2>
				
			</div>
			<div class="navbar">
				<ul>
					<?php 
						if ($loged==true) { ?>
				  	<li><a class="active" href="admin_dashboard.php">Home</a></li>
				  	<li><a href="ad_profile.php">Profile</a></li>
						<?php
						}
					?>
				</ul>
			</div> <!-- end of navbar -->
		</div> <!-- end of header_down -->
	</div> <!-- end of header_container -->
</body>
</html>