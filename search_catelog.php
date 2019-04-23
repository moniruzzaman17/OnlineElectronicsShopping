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
		$search_key=$_POST['keyword'];
		$search_result=get_search_item($search_key);
		$loged=true;
		if (!isset($_SESSION['loged']) && empty($_SESSION['loged'])) {
			$loged=false;
		}
	?>  <!-- include class for adding header -->
	<div class="container">
		<div class="new_product_show_div">
			<div class="product_container">

			<?php
			if (mysqli_num_rows($search_result)>0) { ?>

			<p style="font-style: italic; text-align: center;">Result Showing for "<?php echo $search_key; ?>"</p>

				<?php
				while ($s_row=mysqli_fetch_array($search_result)) { 
					$p_id=$s_row['p_id'];
					$product_name=$s_row['product_name'];
					$product_price=$s_row['product_price'];
					$product_image=$s_row['product_image'];
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
								<a href="view.php?product_id=<?php echo $s_row['p_id']; ?>">view</a>
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
			}
			else
			{
				echo '<h3 style="font-style: italic; text-align: center;">Search Item not found</h3>';
			}
			?>

			</div>  <!-- END of product container -->
		</div> <!-- END of product_show_div -->
	</div> <!-- END of container -->
	<?php include 'includes/footer.php'; ?>  <!-- include class for adding footer -->
</body>
</html>