<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Online Electronics Shopping System</title>
	<link rel="stylesheet" href="css/index.css">
</head>
<body>
	<!-- php code -->
	<?php 
		include 'includes/header.php';
		 $result 				=get_category();
		 $none					="";
		 $all_product_result 	=get_category_wise_product($none, $none);
		 $new_collection_result =get_new_collection_product();
		$loged=true;
		if (!isset($_SESSION['loged']) && empty($_SESSION['loged'])) {
			$loged=false;
		}
	?>  <!-- include class for adding header -->
	<div class="container">
		<div class="banner">
			<!-- code for making category list -->
			<div class="category_div">
				<div class="category_container">
					<ul>
						<!-- making loop for showing all the category -->
						<?php
							while ($row=mysqli_fetch_array($result)) { // fetching the each row of category table
								$category_id=$row['category_id'];

		 						$sub_result =get_sub_category($category_id);
							 ?>
							<li>
								<div class="dropdown">
									<a class="dropbtn" href="category_view.php?category_name=<?php echo $row['category_name']; ?>"><?php echo $row['category_name']; ?></a>
									<div class="dropdown-content">
										<!-- making loop for showing all the sub category under the main category -->
										<?php
											while ($row_sub=mysqli_fetch_array($sub_result)) { ?>
									  			<a href="category_view.php?sub_category_name=<?php echo $row_sub['sub_category_name']; ?>"><?php echo $row_sub['sub_category_name']; ?></a>
											<?php
											}
										?>
									</div> <!-- END of dorpdown-content -->
								</div> <!-- END of dorpdown -->
							</li>
							<?php
							}
						?>
					</ul>
				</div>
			</div> <!-- END of category_div -->
			<div class="carousel">
				<div class="image_div">
			  		<img class="mySlides" src="images/img1.jpg">
			 		<img class="mySlides" src="images/img2.jpg">
			 		<img class="mySlides" src="images/img3.jpg">
				</div>
			</div>  <!-- END of carousel -->
		</div> <!-- END of banner -->

		<!-- code for showing basic info about shopping -->
		<div class="info_div">
			<div class="info">
				<div class="info_1_icon">
					<img style="margin-top: 31%;" src="images/ico1.jpg" alt="">
				</div> <!-- END of info_1_icon -->
				<div class="info_1_description">
					<h3>whole country shipping</h3>
					<p>quick shipping</p>
				</div> <!-- END of info_1_description -->
			</div> <!-- END of info_1 -->
			<div class="info">
				<div class="info_2_icon">
					<img style="margin-top: 31%;" src="images/ico2.jpg" alt="">
				</div> <!-- END of info_1_icon -->
				<div class="info_2_description">
					<h3>100% secure payments</h3>
					<p>cash on delivery, bkash</p>
				</div> <!-- END of info_1_description -->
			</div> <!-- END of info_2 -->
			<div class="info">
				<div class="info_3_icon">
					<img style="margin-top: 31%;" src="images/ico3.jpg" alt="">
				</div> <!-- END of info_1_icon -->
				<div class="info_3_description">
					<h3>Support 24/7</h3>
					<p>Call us: ( +880 ) 1212121212</p>
				</div> <!-- END of info_1_description -->
			</div> <!-- END of info_3 -->
			<div class="info">
				<div class="info_4_icon">
					<img style="margin-top: 31%;" src="images/ico4.jpg" alt="">
				</div> <!-- END of info_1_icon -->
				<div class="info_4_description">
					<h3>Member Discount</h3>
					<p>up to 15%</p>
				</div> <!-- END of info_1_description -->
			</div> <!-- END of info_4 -->
		</div> <!-- END of info_div -->
		<div class="new_product_show_div">
			<h2>NEW COLLECTION</h2>
			<hr>
			<div class="product_container">

			<?php
				while ($new_c_row=mysqli_fetch_array($new_collection_result)) { 
					$p_id=$new_c_row['p_id'];
					$product_name=$new_c_row['product_name'];
					$product_price=$new_c_row['product_price'];
					$product_image=$new_c_row['product_image'];
					?>
					<div class="collection">
						<div class="collection1">
							<img src="uploads/<?php echo $product_image; ?>" alt="">
						</div>   <!-- END of collection1 -->
						<div class="product_info">
							<h2><?php echo $product_name; ?></h2>
							<p>BDT <?php echo $product_price; ?>tk</p>
						</div>  <!-- END of product info -->
						<div class="product_btn">
							<div class="btn">
								<a href="view.php?product_id=<?php echo $new_c_row['p_id']; ?>">view</a>
							</div>
							<!-- <div class="btn">
								<form action="cart.php" method="post">
									<button> add to cart</button>
								</form>
							</div> -->
						</div>  <!-- END of product btn -->
					</div>  <!-- END of collection -->
				<?php
				}
			?>

			</div>  <!-- END of product container -->
		</div> <!-- END of product_show_div -->
		<!-- code for all product collection view -->
		<div class="all_product_view_div">
			<h2>All Collection</h2>
			<hr>
			<div class="all_product_container">
				<!-- create a loop for showing all the product category wise -->
				<?php
				while ($all_p_row=mysqli_fetch_array($all_product_result)) {
					$p_name=$all_p_row['product_name'];
					$p_price=$all_p_row['product_price'];
					$p_image=$all_p_row['product_image'];
				 ?>
					<div class="collection">
						<div class="collection1">
							<img src="uploads/<?php echo $p_image; ?>" alt="">
						</div>   <!-- END of collection1 -->
						<div class="product_info">
							<h2><?php echo $p_name; ?></h2>
							<p>BDT <?php echo $p_price; ?>tk</p>
						</div>  <!-- END of product info -->
						<div class="product_btn">
							<div class="btn">
								<a href="view.php?product_id=<?php echo $all_p_row['p_id']; ?>">view</a>
							</div><!-- 
							<div class="btn">
								<a href="">add to cart</a>
							</div> -->
						</div>  <!-- END of product btn -->
					</div>  <!-- END of collection -->
				<?php
				}
				?>

			</div> <!-- END of all_product_container -->
		</div> <!-- END of all_product_view_div -->
	</div> <!-- END of container -->
	<?php include 'includes/footer.php'; ?>  <!-- include class for adding footer -->

	<!-- javascript code -->
	<script>
			var myIndex = 0;
			carousel();

			function carousel() 
				{
				    var i;
				    var x = document.getElementsByClassName("mySlides");
				    for (i = 0; i < x.length; i++) {
				       x[i].style.display = "none";  
				    }
				    myIndex++;
				    if (myIndex > x.length) {myIndex = 1}
				    x[myIndex-1].style.display = "block";  
				    setTimeout(carousel, 4000); // Change image every 4 seconds
				}
		</script>
</body>
</html>