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
				echo "<script>alert('Product Successfully Added'); window.location='admin_dashboard.php?add_product=c81e728d9d4c2f636f067f89cc14862c'</script>";
			}

			else {
				echo "<script>alert('not submitted!!'); window.location='admin_dashboard.php?add_product=c81e728d9d4c2f636f067f89cc14862c'</script>";
			}
	}
	}

	function admin_login()
	{
		if ($_SERVER['REQUEST_METHOD']=="POST")
		{
			if (isset($_POST['button1'])) {
				$id_or_mail	=	$_POST['id_mail'];
				$pass		=	$_POST['password'];

				
				$sql = "SELECT * FROM admin WHERE password='$pass' AND admin_id='$id_or_mail' OR email='$id_or_mail'";
				$result=query($sql);
	  			$row = fetch_array($result);
	  			$u_id=$row['admin_id'];
	  			$email=$row['email'];
	  			$password=$row['password'];

				if ($password==$pass && $u_id==$id_or_mail || $email==$id_or_mail) {
					$_SESSION['admin_loged']=true;
					$_SESSION['current_admin_uid_or_mail']=$id_or_mail;

						echo "<script>window.location='admin_dashboard.php'</script>";
				}

				else {
					$_SESSION['msg']="Record not matched!!";
				}
			}
		}
	}

	// get current admin ID
	function current_admin_id()
	{
		$id_mail=$_SESSION['current_admin_uid_or_mail'];

		$sql 		= "SELECT * FROM admin WHERE admin_id='$id_mail' OR email='$id_mail'";
		$result		=query($sql);
		$row		=fetch_array($result);
		$admin_id 	=$row['admin_id'];
		return $admin_id;

	}

	// get category function
	function get_category()
	{
		$sql = "SELECT * FROM category";
		$result=query($sql);
		return $result;
	}
	// get category descending function
	function get_category_descending()
	{
		$sql = "SELECT * FROM category ORDER BY category_id DESC";
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

	// get sub_category function
	function get_sub_category_desc()
	{
		$sql = "SELECT * FROM sub_category ORDER BY sub_category_id DESC";
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
			if (isset($_POST['button1'])) {
				$category_name	=	$_POST['category_name'];

				$sql= "INSERT INTO category(category_name)";
					$sql.=" VALUES('$category_name')";

				$result=query($sql);
				if ($result) {
					echo "<script>alert('Product Category Successfully Added'); window.location='admin_dashboard.php?add_catg=eccbc87e4b5ce2fe28308fd9f2a7baf3'</script>";
				}

				else {
					echo "<script>alert('not added!!'); window.location='admin_dashboard.php?add_catg=eccbc87e4b5ce2fe28308fd9f2a7baf3'</script>";
				}
			}
		}
	}

	function insert_sub_category()
	{
		if ($_SERVER['REQUEST_METHOD']=="POST")
		{
			if (isset($_POST['sub_button1'])) {
				$category_id		=	$_POST['select1'];
				$sub_category_name	=	$_POST['sub_category_name'];

				$sql= "INSERT INTO sub_category(category_id, sub_category_name)";
					$sql.=" VALUES('$category_id', '$sub_category_name')";

				$result=query($sql);
				if ($result) {
					echo "<script>alert('Sub-Category Successfully Added'); window.location='admin_dashboard.php?add_sub_catg=a87ff679a2f3e71d9181a67b7542122c'</script>";
				}

				else {
					echo "<script>alert('not added!!'); window.location='admin_dashboard.php?add_sub_catg=a87ff679a2f3e71d9181a67b7542122c'</script>";
				}
			}
		}
	}

	function get_order_approval_info()
	{
		$sql = "SELECT * FROM order_details WHERE approve_status=0 ORDER BY order_id DESC";
		$result=query($sql);
		return $result;
	}

	function get_orderd_customer_info($oid)
	{
		$sql = "SELECT * FROM user_info, order_details WHERE order_details.order_id='$oid' AND order_details.cus_id=user_info.user_id";
		$result=query($sql);
		$row= fetch_array($result);
		return $row;
	}

	function get_orderd_product_info($oid)
	{
		$sql = "SELECT * FROM order_item, order_details WHERE order_details.order_id='$oid' AND order_details.order_id=order_item.order_id";
		$result=query($sql);
		return $result;
	}

	function get_product_info()
	{
		$sql = "SELECT * FROM product_info ORDER BY quantity ASC";
		$result=query($sql);
		return $result;
	}

	function get_current_admin_info()
	{
		$admin_id=current_admin_id();
		$sql = "SELECT * FROM admin WHERE admin_id='$admin_id'";
		$result=query($sql);
		$row=fetch_array($result);
		return $row;
	}

	function update_admin_profile()
	{
		$admin_id=current_admin_id();
		if ($_SERVER['REQUEST_METHOD']=="POST") {
			if (isset($_POST['name_update_btn'])) {
				$name=$_POST['name'];
				$sql="UPDATE admin SET admin_name='$name' WHERE admin_id='$admin_id'";
				$result=query($sql);
				echo "<script>window.location='ad_profile.php?update_pro=1'</script>";

			}
			elseif (isset($_POST['mail_update_btn'])) {
				$mail=$_POST['mail'];
				$sql="UPDATE admin SET email='$mail' WHERE admin_id='$admin_id'";
				$result=query($sql);
				echo "<script>window.location='ad_profile.php?update_pro=1'</script>";

			}
			elseif (isset($_POST['cell_update_btn'])) {
				$cell=$_POST['cell'];
				$sql="UPDATE admin SET contact_num='$cell' WHERE admin_id='$admin_id'";
				$result=query($sql);
				echo "<script>window.location='ad_profile.php?update_pro=1'</script>";

			}
		}
	}

	function add_admin()
	{
		if ($_SERVER['REQUEST_METHOD']=="POST") {
			if (isset($_POST['add_btn'])) {
				$name		=	$_POST['name'];
				$id			=	$_POST['user_id'];
				$pass		=	$_POST['pass'];
				$mail		=	$_POST['mail'];
				$cell		=	$_POST['cell'];

			    $u_id_exist=false;

			    $sql_check="SELECT * FROM admin";
			    $check_id_query=query($sql_check);
			    while ($row=fetch_array($check_id_query)) {

			      if ($row['admin_id']==$id) {
			          $u_id_exist=true;
			      }
			    }
			    if ($u_id_exist==true) {
			        $_SESSION['msg'] = "**Entered user id already taken, Choose another one**";
			    }
			    else
			    {
					$sql= "INSERT INTO admin(admin_name, admin_id, email, password, contact_num)";
						$sql.=" VALUES('$name','$id','$mail','$pass','$cell')";

					$result=query($sql);
					if ($result) {
						unset($_SESSION['msg']);
						echo "<script>alert('New Admin is Added'); window.location='ad_profile.php?add_admin=1'</script>";
					}

					else {
						echo "<script>alert('Not Added!!'); window.location='ad_profile.php?add_admin=1'</script>";
					}
    			}
			}
		}
	}

	function send_email($email,$subject,$msg,$header)
	{
		return mail($email,$subject,$msg,$header);
	}

	function get_ordered_product_quantity($oid)
	{
		$sql="SELECT * FROM order_item WHERE order_id='$oid'";
		$result=query($sql);
		return $result;
	}

?>