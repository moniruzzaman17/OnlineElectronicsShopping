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
		insert_category();
	 ?>
	<div class="insert_category_container">
		<div class="category_insertion_box">
			<h1 align="center">Insert Product Category</h1> <!-- Form Header -->
			    <hr>
<!-- Code for Form -->
			    <form action="" method="post">
				    <label><b>Category Name</b></label>
		    		<input type="text" placeholder="Enter Category Name" name="category_name" required>

				    <button type="submit" name="button1" class="registerbtn"><b>Insert</b></button>
				</form>  <!-- End of Form -->
		</div>
	</div>
</body>
</html>