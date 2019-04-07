<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="css/index.css">
	<link rel="stylesheet" href="css/login.css">
 	<script src='js/jquery.min.js'></script>
</head>
<body>
	<?php 
		 $result 		=get_category();
		 $sub_result	=get_sub_category();
		 insert_product();
	 ?>
	<div class="insert_product_container">
		<div class="product_insertion_box">
			<h1 align="center">Insert Product Details</h2>
			    <hr>
<!-- Code for Form -->
			    <form action="" method="post" enctype="multipart/form-data">
				    <label><b>Product Name</b></label>
		    		<input type="text" placeholder="Product Nmae" name="p_name" required>

				    <label><b>Product Category</b></label>
					<select name="select1" id="select1">
					    <option><-- Select Category --></option>
						<?php
							while ($row=mysqli_fetch_array($result)) { // fetching the each row of category table
								$category_id=$row['category_id'];
							 ?>
					    		<option value="<?php echo $row['category_id']; ?>" data-othervalue="<?php echo $row['category_name']; ?>"><?php echo $row['category_name']; ?></option>
							<?php
							}
						?>
					</select>
					<input type=hidden name=category id=categoryValue />

				    <label><b>Product Sub-Category</b></label>
					<select name="select2" id="select2">
						<?php
							while ($row_sub=mysqli_fetch_array($sub_result)) { // fetching the each row of category table
								$category_id=$row_sub['category_id'];
							 ?>
					    		<option value="<?php echo $row_sub['category_id']; ?>" data-othervalue="<?php echo $row_sub['sub_category_name']; ?>"><?php echo $row_sub['sub_category_name']; ?></option>
							<?php
							}
						?>
					</select>
					<input type=hidden name=subcategory id=subcategoryValue />

		    		<label><b>Product Details</b></label>
		    		<textarea class="textarea" name="p_details" id="" cols="30" rows="10" required></textarea>
				    <label><b>Product Quantity</b></label>
		    		<input type="number" min="1" name="p_quantiy" value="1" required>

				    <label><b>Unit Price</b></label>
		    		<input type="text" placeholder="unit price" name="price" required>

				    <label><b>Product Image</b></label>
		    		<input type="file" name="image" required>
				    <button type="submit" name="p_insert_btn" class="registerbtn"><b>Insert</b></button>
				</form>  <!-- End of Form -->

		</div>
	</div>
<script>
	// script for dependent dropdown
    var $select1 = $( '#select1' ),
        $select2 = $( '#select2' ),
    $options = $select2.find( 'option' );
    
$select1.on( 'change', function() {
    $select2.html( $options.filter( '[value="' + this.value + '"]' ) );
} ).trigger( 'change' );

// script for store category dropdown value into input type 
$('#select1').change(function () {
var otherValue=$(this).find('option:selected').attr('data-othervalue');
$('#categoryValue').val(otherValue);
});

// script for store sub-category dropdown value into input type 
$('#select2').change(function () {
var otherValue=$(this).find('option:selected').attr('data-othervalue');
$('#subcategoryValue').val(otherValue);
});



</script>
</body>
</html>