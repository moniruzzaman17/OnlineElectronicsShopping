<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Cart</title>
	<!-- link to the css -->
	<link rel="stylesheet" href="css/index.css">
</head>
<body>
<?php include 'includes/header.php'; ?>  <!-- including the header class -->
	<div class="cart_container">
		<!-- creating a table for organizing all the product in cart -->
		<h2 align="center">Here is your cart details</h2>
		<div class="table_container">
		<table class="cart_table">
			<thead>
				<th>Image</th>
				<th>Product Code</th>
				<th>Product Name</th>
				<th>Quantity</th>
				<th>Price</th>
				<th>Total</th>
				<th>Action</th>
			</thead> <!-- END of the thead -->
			<tbody>
				<tr>
					<td>demo</td>
					<td>demo</td>
					<td>demo</td>
					<td>demo</td>
					<td>demo</td>
					<td>demo</td>
					<td>demo</td>
				</tr>
			</tbody> <!-- END of the tbody -->
		</table> <!-- END of the table -->
		</div> <!-- END of the table_container -->
		<br>
		<br>
		<div class="bellow_cart_div">
		<!-- creating a form to continue shopping -->
		<form action="cart.php" method="post">
			<button class="continue_shopping_btn">Continue Shopping</button>
		</form>
		</div>
	</div> <!-- END of the cart_container -->
<?php include 'includes/footer.php'; ?>  <!-- including the header class -->
</body> <!-- END of the body tag -->
</html>