<?php
	function user_registration()
	{


	if ($_SERVER['REQUEST_METHOD']=="POST")
	{
		$name				=	$_POST['name'];
		$user_id			=	$_POST['user_id'];
		$pass				=	$_POST['password'];
		$mail				=	$_POST['mail'];
		$contact			=	$_POST['contact'];
		$address			=	$_POST['address'];
		$status				=	"user";

		$sql= "INSERT INTO user_info(name,user_id,password,email,contact_num,address,status)";
			$sql.=" VALUES('$name','$user_id','$pass','$mail','$contact','$address', '$status')";

		$result=query($sql);
		if ($result) {
			echo "<script>alert('You are Successfully registered!!'); window.location='login.php'</script>";
		}

		else {
			echo "<script>alert('Comment is not Successfully Submitted'); window.location='p_location.php'</script>";
		}
	}
	}

	// login function
	function login()
	{
		if ($_SERVER['REQUEST_METHOD']=="POST")
		{
			$id_or_mail	=	$_POST['id_mail'];
			$pass		=	$_POST['password'];

			
			$sql = "SELECT * FROM user_info WHERE password='$pass' AND user_id='$id_or_mail' OR email='$id_or_mail'";
			$result=query($sql);
  			$row = fetch_array($result);
  			$u_id=$row['user_id'];
  			$email=$row['email'];
  			$password=$row['password'];

			if ($password==$pass && $u_id==$id_or_mail || $email==$id_or_mail) {
				$_SESSION['loged']=true;
				echo "<script>window.location='index.php'</script>";
			}

			else {
				$_SESSION['msg']="Record not matched!!";
			}
		}
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

	// get category function
	function get_category()
	{
		$sql = "SELECT * FROM category";
		$result=query($sql);
		return $result;
	}

	// get sub_category function
	function get_sub_category($c_id)
	{
		$sql = "SELECT * FROM sub_category WHERE category_id='$c_id'";
		$result=query($sql);
		return $result;
	}

	// get category wise product
	function get_category_wise_product($c_name,$sub_c_name)
	{
		if ($c_name != "") {
			if ($sub_c_name==1) {
				$sql = "SELECT * FROM product_info WHERE product_category='$c_name'";
				$result=query($sql);
					return $result;
			}
			if ($c_name == 1)
			{
				$sql = "SELECT * FROM product_info WHERE product_sub_category='$sub_c_name'";
				$result=query($sql);
					return $result;
			}
		}
		else
		{
			$sql = "SELECT * FROM product_info";
			$result=query($sql);
			return $result;
		}
	}

	// get new collection product
	function get_new_collection_product()
	{
		$sql = "SELECT * FROM product_info ORDER BY p_id DESC limit 4";
		$result=query($sql);
		return $result;
	}

	// get new product details
	function get_product_details($p_id)
	{
		$sql = "SELECT * FROM product_info WHERE p_id='$p_id'";
		$result=query($sql);
		return $result;
	}
?>