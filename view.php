<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>view details</title>
	<!-- link to the css -->
	<link rel="stylesheet" href="css/index.css">
</head>
<body>
<?php include 'includes/header.php'; ?>  <!-- including the header class -->
	<div class="view_container">
		<div class="product_show_div">
			<div class="product_image_container">
				<img src="images/p2.jpg" alt="">
			</div>
		</div> <!-- END of product_show_div -->
		<div class="product_info_div">
			<div class="product_details_info">
				<h1>Speaker</h1>
				<p>Availability :</p>
				<p>Product Code:</p>
				<hr class="hr_for_viewpage">
				<h1 class="product_name_viewpage">BDT. 500 tk </h1>
				<hr class="hr_for_viewpage">
				<br>
				<br>
				<label for="">Quantity</label>
				<!-- this input type value minimum is 1 and maximum is same as the product quantity -->
				<input type="number" min="1" max="7" value="1">
				<br>
				<br>
				<!-- creating a form to submit data to the cart -->
				<form action="cart.php" method="post">
					<button class="add_cart_btn">Add to Cart</button>
				</form>
			</div> <!-- END of product_details_info -->
		</div> <!-- END of product_info_div -->
	</div> <!-- END of view_container -->
	<div class="product_description">
		<div class="p_details">
			<h2>Product Description:</h2>
			<hr class="hr_for_viewpage">
			<p>lorem ipsum skhre lowh slooe lsheo akdoe kfo ljhosdk sdfjo jdfosn </p>
		</div> <!-- END of p_details -->
	</div> <!-- END of product_description -->
<?php include 'includes/footer.php'; ?>  <!-- include class for adding footer -->
</body>
</html>