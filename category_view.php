<!DOCTYPE html>
<html lang="bn">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="css/index.css">
</head>
<body>
	<?php 
		include 'includes/header.php'; 
		if (isset($_GET['category_name'])) {
			$category_name 		=$_GET['category_name'];
			$sub_category_name 	="1";
			$category_result 	=get_category_wise_product($category_name, $sub_category_name);
		}
		if (isset($_GET['sub_category_name'])) {
			$sub_category_name 		=$_GET['sub_category_name'];
			$category_name 			="1";
			$sub_category_result 	=get_category_wise_product($category_name, $sub_category_name);
		}

	?>
	<div class="category_product_container">
		<div class="all_product_view_div">
			<?php
				if (isset($_GET['category_name'])) { ?>
					<h2><?php echo $_GET['category_name']; ?></h2>
				<?php
				}
				else
				{ ?>
					<h2><?php echo $_GET['sub_category_name']; ?></h2>
				<?php
				}
			?>
			<hr>
			<div class="all_product_container">
				<!-- create a loop for showing all the product category wise -->
				<?php
				if (isset($_GET['category_name'])) {
				while ($c_row=mysqli_fetch_array($category_result)) {
					$p_id=$c_row['p_id'];
					$p_name=$c_row['product_name'];
					$p_price=$c_row['product_price'];
					$p_image=$c_row['product_image'];
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
								<a href="view.php?product_id=<?php echo $p_id; ?>">view</a>
							</div>
							<!-- <div class="btn">
								<a href="">add to cart</a>
							</div> -->
						</div>  <!-- END of product btn -->
					</div>  <!-- END of collection -->
				<?php
				}
				}
				else
				{
				while ($sc_row=mysqli_fetch_array($sub_category_result)) {
					$p_id=$sc_row['p_id'];
					$p_name=$sc_row['product_name'];
					$p_price=$sc_row['product_price'];
					$p_image=$sc_row['product_image'];
					$sub_category=$sc_row['product_sub_category'];
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
									<a href="view.php?product_id=<?php echo $p_id; ?>">view</a>
								</div>
								<!-- <div class="btn">
									<a href="">add to cart</a>
								</div> -->
							</div>  <!-- END of product btn -->
						</div>  <!-- END of collection -->
					<?php
				}
				}
				?>

			</div> <!-- END of all_product_container -->
		</div> <!-- END of all_product_view_div -->
	</div> <!-- END of category_product_container -->
	<?php include 'includes/footer.php'; ?>
</body>
</html>