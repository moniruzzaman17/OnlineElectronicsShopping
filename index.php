<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Online Electronics Shopping System</title>
	<link rel="stylesheet" href="css/index.css">
</head>
<body>
	<?php include 'includes/header.php'; ?>  <!-- include class for adding header -->
	<div class="container">
		<div class="banner">
			<!-- code for making category list -->
			<div class="category_div">
				<div class="category_container">
					<ul>
						<li>
							<div class="dropdown">
								<a class="dropbtn" href="">TV & AUDIO</a>
								<div class="dropdown-content">
								  <a href="#">LED TV</a>
								  <a href="#">LCD TV</a>
								  <a href="#">CRT TV</a>
								</div>
							</div>
						</li>

						<li>
							<div class="dropdown">
								<a class="dropbtn" href="">HOME APPLIANCES</a>
								<div class="dropdown-content">
								  <a href="#">Air Condition</a>
								  <a href="#">House Hold</a>
								  <a href="#">Washing Tools</a>
								</div>
							</div>
						</li>

						<li>
							<div class="dropdown">
								<a class="dropbtn" href="">MOBILE</a>
								<div class="dropdown-content">
								  <a href="#">Features Phone</a>
								  <a href="#">Smart Phone</a>
								</div>
							</div>
						</li>
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
				<div class="collection">
					<div class="collection1">
						<img src="images/p1.jpg" alt="">
					</div>   <!-- END of collection1 -->
					<div class="product_info">
						<h2>Speaker</h2>
						<p>BDT 700tk</p>
					</div>  <!-- END of product info -->
					<div class="product_btn">
						<div class="btn">
							<a href="view.php">view</a>
						</div>
						<div class="btn">
							<a href="">add to cart</a>
						</div>
					</div>  <!-- END of product btn -->
				</div>  <!-- END of collection -->
				<div class="collection">
					<div class="collection1">
						<img src="images/p2.jpg" alt="">
					</div>
					<div class="product_info">
						<h2>Canon Camera</h2>
						<p>BDT 700tk</p>
					</div>
					<div class="product_btn">
						<div class="btn">
							<a href="">view</a>
						</div>
						<div class="btn">
							<a href="">add to cart</a>
						</div>
					</div>  <!-- END of product btn -->
				</div>
				<div class="collection">
					<div class="collection1">
						<img src="images/p3.jpg" alt="">
					</div>
					<div class="product_info">
						<h2>Mobile</h2>
						<p>BDT 700tk</p>
					</div>
					<div class="product_btn">
						<div class="btn">
							<a href="">view</a>
						</div>
						<div class="btn">
							<a href="">add to cart</a>
						</div>
					</div>  <!-- END of product btn -->
				</div>
				<div class="collection">
					<div class="collection1">
						<img src="images/p3.jpg" alt="">
					</div>
					<div class="product_info">
						<h2>Mobile</h2>
						<p>BDT 700tk</p>
					</div>
					<div class="product_btn">
						<div class="btn">
							<a href="">view</a>
						</div>
						<div class="btn">
							<a href="">add to cart</a>
						</div>
					</div>  <!-- END of product btn -->
				</div>
			</div>  <!-- END of product container -->
		</div> <!-- END of product_show_div -->
		<!-- code for all product collection view -->
		<div class="all_product_view_div">
			<h2>All Collection</h2>
			<hr>
			<div class="all_product_container">
				<div class="collection">
					<div class="collection1">
						<img src="images/p5.jpg" alt="">
					</div>   <!-- END of collection1 -->
					<div class="product_info">
						<h2>Speaker</h2>
						<p>BDT 700tk</p>
					</div>  <!-- END of product info -->
					<div class="product_btn">
						<div class="btn">
							<a href="">view</a>
						</div>
						<div class="btn">
							<a href="">add to cart</a>
						</div>
					</div>  <!-- END of product btn -->
				</div>  <!-- END of collection -->
				<div class="collection">
					<div class="collection1">
						<img src="images/p6.jpg" alt="">
					</div>   <!-- END of collection1 -->
					<div class="product_info">
						<h2>Mobile</h2>
						<p>BDT 700tk</p>
					</div>  <!-- END of product info -->
					<div class="product_btn">
						<div class="btn">
							<a href="">view</a>
						</div>
						<div class="btn">
							<a href="">add to cart</a>
						</div>
					</div>  <!-- END of product btn -->
				</div>  <!-- END of collection -->
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