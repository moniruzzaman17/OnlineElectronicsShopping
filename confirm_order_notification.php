<?php 
	include 'includes/header.php'; // including the header class 
	$order_id=get_last_order_id();
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
			<h1 style="text-align: center;">Your Order is Pending for Review <br> thank you</h1>
			<h2 style="text-align: center;">Your Order ID: <?php echo $order_id; ?></h2> <br><br>
			<center><a class="cont_shp_btn" href="index.php">Continue Shopping</a></center>
		</div>
	</div>
<?php include 'includes/footer.php'; // including the header class  ?>
</body>
</html>