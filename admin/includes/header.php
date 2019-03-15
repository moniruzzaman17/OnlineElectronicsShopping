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
		if (!isset($_SESSION['loged']) && empty($_SESSION['loged'])) {
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
						else
						{ ?>
							<a href="login.php">Login</a>
							<a href="signup.php">Signup</a>
						<?php
						}
					?>
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
						<!-- making loop for showing all the category -->
						<?php
							while ($row=mysqli_fetch_array($result)) { // fetching the each row of category table
								$category_id=$row['category_id'];
							 ?>
							    <div class="sub_dropdown">
							    <a class="sub_link" href="#"><?php echo $row['category_name']; ?></a>
								  <div class="sub_dropdown-content">
									<?php
										while ($row_sub=mysqli_fetch_array($sub_result)) { ?>
								  			<a class="sub_link" href="#"><?php echo $row_sub['sub_category_name']; ?></a>
										<?php
										}
									?>
								  </div> <!-- end of sub_dropdown-content -->
								</div> <!-- end of sub_dropdown -->
						<?php
						}
						?>
					  </div> <!-- end of header_dropdown-content -->
					</div> <!-- end of header_dropdown -->
				  </li>
				  <li><a href="insert_product.php">Insert product</a></li>
				  <li><a href="insert_category.php">Insert Category</a></li>
				  <li><a href="insert_sub_category.php">Insert sub-category</a></li>
				  <li>
					<?php 
						if ($loged==true) { ?>
				  			<a href="#about">Profile</a>
						<?php
						}
					?>
				  </li>
				</ul>
			</div> <!-- end of navbar -->
		</div> <!-- end of header_down -->
	</div> <!-- end of header_container -->
</body>
</html>