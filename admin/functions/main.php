<?php
	function insert_product()
	{


	if ($_SERVER['REQUEST_METHOD']=="POST")
	{
			$product_name		=	$_POST['p_name'];
			$category			=	$_POST['category'];
			$subcategory		=	$_POST['subcategory'];
			$p_details			=	$_POST['p_details'];
			$p_quantity			=	$_POST['p_quantiy'];
			$price				=	$_POST['price'];
			$p_image			=	$_FILES["image"]["name"];

			move_uploaded_file($_FILES["image"]["tmp_name"],"../uploads/" . $_FILES["image"]["name"]);	

			$sql= "INSERT INTO product_info(product_name,product_category,product_sub_category,product_details,quantity,product_price,product_image)";
				$sql.=" VALUES('$product_name','$category','$subcategory','$p_details','$p_quantity', '$price', '$p_image')";

			$result=query($sql);
			if ($result) {
				echo "<script>alert('Product Successfully Added'); window.location='insert_product.php'</script>";
			}

			else {
				echo "<script>alert('not submitted!!'); window.location='insert_product.php'</script>";
			}
	}
	}



	// get category function
	function get_category()
	{
		$sql = "SELECT * FROM category";
		$result=query($sql);
		return $result;
	}

	// get sub_category function
	function get_sub_category()
	{
		$sql = "SELECT * FROM sub_category";
		$result=query($sql);
		return $result;
	}

	

	// logout function
	function logout()
	{
		if ($_SERVER['REQUEST_METHOD']=="POST")
		{
			if (isset($_POST['logout_btn'])) {

				session_destroy();
				echo "<script>window.location='index.php'</script>";
			}
		}
	}

	function insert_category()
	{
		if ($_SERVER['REQUEST_METHOD']=="POST")
		{
				$category_name	=	$_POST['category_name'];

				$sql= "INSERT INTO category(category_name)";
					$sql.=" VALUES('$category_name')";

				$result=query($sql);
				if ($result) {
					echo "<script>alert('Product Category Successfully Added'); window.location='insert_category.php'</script>";
				}

				else {
					echo "<script>alert('not added!!'); window.location='insert_category.php'</script>";
				}
		}
	}

	function insert_sub_category()
	{
		if ($_SERVER['REQUEST_METHOD']=="POST")
		{
				$category_id		=	$_POST['select1'];
				$sub_category_name	=	$_POST['sub_category_name'];

				$sql= "INSERT INTO sub_category(category_id, sub_category_name)";
					$sql.=" VALUES('$category_id', '$sub_category_name')";

				$result=query($sql);
				if ($result) {
					echo "<script>alert('Sub-Category Successfully Added'); window.location='insert_sub_category.php'</script>";
				}

				else {
					echo "<script>alert('not added!!'); window.location='insert_sub_category.php'</script>";
				}
		}
	}

?>