<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>view details</title>
	<!-- link to the css -->
	<link rel="stylesheet" href="css/index.css">
</head>
<body>
<?php 
	include 'includes/header.php'; 
	$product_id 		=$_GET['product_id'];
	$product_result 	=get_product_details($product_id);
	while ($row=mysqli_fetch_array($product_result)) {
		$p_id 		=$row['p_id'];
		$p_name 	=$row['product_name'];
		$p_price 	=$row['product_price'];
		$quantity 	=$row['quantity'];
		$p_details 	=$row['product_details'];
		$p_image 	=$row['product_image'];
		if ($quantity>0) {
			$vailability="Available";
		}
		else
		{
			$vailability="Not Available";
		}
	}
	?>  <!-- including the header class -->
	<div class="view_container">
		<div class="product_show_div">
			<div class="product_image_container">
				<img src="uploads/<?php echo $p_image; ?>" alt="">
			</div>
		</div> <!-- END of product_show_div -->
		<div class="product_info_div">
			<div class="product_details_info">
				<h1><?php echo $p_name; ?></h1>
				<p>Status : <?php echo $vailability; ?></p>
				<p>Product Code:<?php echo $p_id; ?></p>
				<hr class="hr_for_viewpage">
				<h1 class="product_name_viewpage">BDT. <?php echo $p_price; ?> tk </h1>
				<hr class="hr_for_viewpage">
				<br>
				<br>
				<label for="">Quantity</label>
				<!-- this input type value minimum is 1 and maximum is same as the product quantity -->
				<input type="number" min="1" max="<?php echo $quantity; ?>" value="1">
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
			<p><?php echo $p_details; ?></p>
		</div> <!-- END of p_details -->
	</div> <!-- END of product_description -->
<?php include 'includes/footer.php'; ?>  <!-- include class for adding footer -->
</body>
</html>