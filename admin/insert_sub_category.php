<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="css/index.css">
	<link rel="stylesheet" href="css/login.css">
</head>
<body>
	<?php 
		include 'includes/header.php';
		$cat_result=get_category();
		insert_sub_category();
	 ?>
	<div class="insert_category_container">
		<div class="category_insertion_box">
			<h1 align="center">Insert Product Category</h1> <!-- Form Header -->
			    <hr>
<!-- Code for Form -->
			    <form action="" method="post">
				    <label><b>Category Name</b></label>

					<select name="select1" id="select1">
					    <option><-- Select Category --></option>
						<?php
							while ($row=mysqli_fetch_array($cat_result)) { // fetching the each row of category table
								$category_id=$row['category_id'];
							 ?>
					    		<option value="<?php echo $row['category_id']; ?>"><?php echo $row['category_name']; ?></option>
							<?php
							}
						?>
					</select>
				    <label><b>Sub-Category Name</b></label>
		    		<input type="text" placeholder="Enter Sub-Category Name" name="sub_category_name" required>

				    <button type="submit" name="button1" class="registerbtn"><b>Insert</b></button>
				</form>  <!-- End of Form -->
		</div>
	</div>
</body>
</html>