<?php 
	include 'includes/header.php'; // including the header class 
	if (!isset($_SESSION['loged']) || empty($_SESSION['loged'])) {
		echo "<script>window.location='continue_order.php'</script>";
	}
	$row=get_current_user_info($_SESSION['current_user_uid_or_mail']);
	confirm_order();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Order Details</title>
	<!-- link to the css -->
	<link rel="stylesheet" href="css/index.css">
</head>
<body>
	<div class="shipping_container">
		<form action="" method="post">
			<table class="shipping_table" style="border-top: 7px solid #4CAF50;">
				<caption style="text-align: left;"><h3>Shipping Information</h3></caption>
				<tr>
					<th style="width: 20%;">Name:</th>
					<td style="width: 30%;">
						<input type="text" name="cus_name" value="<?php echo $row['name'] ?>">
					</td>
				</tr>
				<tr>
					<th>Shipping Address:</th>
					<td>
						<textarea name="shipping_add" required><?php echo $row['address'] ?></textarea>
					</td>
					<td style="border: none; padding: 5%; text-align: center;">Make sure give the details shipping address <br> <small>like: House, Road, City, District etc.</small></td>
				</tr>
				<tr>
					<th>Email Address:</th>
					<td>
						<input type="text" name="email" value="<?php echo $row['email'] ?>" required>
					</td>
				</tr>
				<tr>
					<th>Phone Number:</th>
					<td>
						<input type="text" name="cus_num" value="<?php echo $row['contact_num'] ?>" required>
					</td>
				</tr>
			</table>

			<table class="payment_table" style="border-top: 7px solid #4CAF50;">
				<caption style="text-align: left;"><h3>Payment Method</h3></caption>
				<tr style="width: 100%">
					<th style="width: 50%"><input type="radio" name="p_method" onclick="show1();" value="cash on delivery" required>Cash On Delevery</th>
					<th style="width: 50%"><input type="radio" name="p_method" onclick="show2();" id="bkash" required>Bkash</th>
				</tr>
				<tr style=" margin-bottom: 1%;">
					<td colspan="2" style="display: none; width: 197.5%;" id="bkash_details">
						<h4>B-Kash Marchant Account: 01761189963</h4>
						<h4>Counter #: 1</h4>
						<b>Enter Payment Transaction ID: </b><input type="text" id="transaction_id" name="transaction_id">
					</td>
					<td colspan="2" style="display: none; width: 197.5%;" id="kash_details">
						<h2>Cash On Delivery</h2>
					</td>
				</tr>
			</table>

			<table class="item_table">
				<caption style="text-align: left;"><h3>Order Item Details</h3></caption>
				<tr style="border-left: 2px solid #4CAF50; border-right: 2px solid #4CAF50;">
					<th>SL.</th>
					<th>Image</th>
					<th>Product Name</th>
					<th>Quantity</th>
					<th>Unit Price</th>
					<th>Sub Total</th>
				</tr>
				<?php
	$tp2 = 0;
	$sl=1;

	foreach ($_SESSION["cart"] as $item)
	{
	  
	  $id = $item['product_id'];
	  $tp = $item['p_qty'] * $item['price'];
	  $tp2 += $tp;
	?>
					<tr style="border-left: 2px solid #4CAF50; border-right: 2px solid #4CAF50;">
						<td><?php echo $sl++; ?></td>
						<td><img style="width: 100px; height: 100px;" src="uploads/<?php echo $item['p_image']; ?>" alt="Product Image"></td>
						<td><?php echo $item['p_name']; ?></td>
						<td><?php echo $item['p_qty']; ?></td>
						<td><span>&#2547;</span> <?php echo $item['price']; ?></td>
						<td><span>&#2547;</span> <?php echo $tp; ?></td>
						<!-- <td><a href ='cart.php?action&id=<?php // echo $id; ?>'> Remove </a></td> -->
					</tr>
	<?php
	}
	?>
	<!-- 			<tr>
					<td>1</td>
					<td>Speaker</td>
					<td>1</td>
					<td>500</td>
					<td>500</td>
				</tr> -->
				<tr style="background:none; border-top: 3px solid #4CAF50;">
					<td style="border: none;"></td>
					<td style="border: none;"></td>
					<td style="border: none;"></td>
					<td style="border: none;"></td>
					<td><strong>Sub Total</strong></td>
					<td><span>&#2547;</span> <?php echo $tp2; ?></td>
				</tr>
				<tr style="background:none;">
					<td style="border: none;"></td>
					<td style="border: none;"></td>
					<td style="border: none;"></td>
					<td style="border: none;"></td>
					<td><strong>Shipping Cost</strong></td>
					<td><span>&#2547;</span> 40</td>
				</tr>
				<tr style="background:none;">
					<td style="border: none;"></td>
					<td style="border: none;"></td>
					<td style="border: none;"></td>
					<td style="border: none;"></td>
					<td><strong>Grand Total</strong></td>
					<td><span>&#2547;</span> <?php echo $tp2+40; ?></td>
				</tr>
			</table>
			<input type="hidden" name="total_price" value="<?php echo $tp2+40; ?>">
			<button name="confirm_btn" class="cfrm_btn">Confirm Order</button>
		</form>
	</div>
	<script>
		function show1(){
		  document.getElementById('bkash_details').style.display ='none';
		  document.getElementById('kash_details').style.display ='block';
		}

		function show2(){
		  document.getElementById('kash_details').style.display = 'none';
		  document.getElementById('bkash_details').style.display = 'block';
		}

		document.getElementById("bkash").addEventListener('change', function(){
    	document.getElementById("transaction_id").required = this.checked ;
		})
	</script>
</body>
</html>