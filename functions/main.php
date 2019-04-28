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


	    $u_id_exist=false;

	    $sql_check="SELECT * FROM user_info";
	    $check_id_query=query($sql_check);
	    while ($row=fetch_array($check_id_query)) {

	      if ($row['user_id']==$user_id) {
	          $u_id_exist=true;
	      }
	    }
	    if ($u_id_exist==true) {
	        $_SESSION['msg'] = "**Entered user id already taken, Choose another one**";
	    }
	    else
	    {
			$sql= "INSERT INTO user_info(name,user_id,password,email,contact_num,address)";
				$sql.=" VALUES('$name','$user_id','$pass','$mail','$contact','$address')";

			$result=query($sql);
			if ($result) {
				echo "<script>alert('You are Successfully registered!!'); window.location='login.php'</script>";
			}

			else {
				echo "<script>alert('Information is not Submitted'); window.location='signup.php'</script>";
			}
	    }
	}
	}

	// login function
	function login($check)
	{
		if ($_SERVER['REQUEST_METHOD']=="POST")
		{
			$id_or_mail	=	$_POST['id_mail'];
			$pass		=	$_POST['password'];

			
			$sql = "SELECT * FROM user_info WHERE password='$pass' AND (user_id='$id_or_mail' OR email='$id_or_mail')";
			$result=query($sql);
			if (mysqli_num_rows($result)>0) {
	  			$row = fetch_array($result);
	  			$u_id=$row['user_id'];
	  			$email=$row['email'];
	  			$password=$row['password'];

				if ($password==$pass && $u_id==$id_or_mail || $email==$id_or_mail) {
					$_SESSION['loged']=true;
					$_SESSION['current_user_uid_or_mail']=$id_or_mail;
					if ($check=="none") {
						echo "<script>window.location='index.php'</script>";
					}
					else
					{
						echo "<script>window.location='order.php'</script>";	
					}
				}
			}

			else {
				$_SESSION['msg']="Record not matched!!";
			}
		}
	}

	function current_userid()
	{
		$id_mail=$_SESSION['current_user_uid_or_mail'];

		$sql 		= "SELECT * FROM user_info WHERE user_id='$id_mail' OR email='$id_mail'";
		$result		=query($sql);
		$row		=fetch_array($result);
		$user_id 	=$row['user_id'];
		return $user_id;

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
		$sql 		= "SELECT * FROM product_info ORDER BY p_id DESC limit 4";
		$result		=query($sql);
		return $result;
	}

	// get new product details
	function get_product_details($p_id)
	{
		$sql		= "SELECT * FROM product_info WHERE p_id='$p_id'";
		$result		=query($sql);
		return $result;
	}

	// get current user information
	function get_current_user_info($uid_mail)
	{
		$sql 		= "SELECT * FROM user_info WHERE user_id='$uid_mail' OR email='$uid_mail'";
		$result		=query($sql);
		$row		=fetch_array($result);
		return $row;
	}

	// confirm order with order details
	function confirm_order()
	{
		if ($_SERVER['REQUEST_METHOD']=="POST") 
		{
			if (isset($_POST['confirm_btn'])) 
			{
				$user_id		=	current_userid();
				$current_date	=	date("Y-m-d");
				$cus_name		=	$_POST['cus_name'];
				$ship_address	=	$_POST['shipping_add'];
				// $email			=	$_POST['email'];
				// $phn_num		=	$_POST['cus_num'];
				$total_amount	=	$_POST['total_price'];

				if (isset($_POST['transaction_id']) && !empty($_POST['transaction_id'])) {
					$p_method		=	"B-Kash";
					$transaction_id	=	$_POST['transaction_id'];
				}
				else
				{
					$p_method		=	$_POST['p_method'];
					$transaction_id	=	"N/A";
				}


				$sql= "INSERT INTO order_details(order_date,cus_id,cus_name,ship_address,payment_type,transaction_id,total_amount)";
					$sql.=" VALUES('$current_date','$user_id','$cus_name','$ship_address','$p_method','$transaction_id', '$total_amount')";

				$result=query($sql);

				$sql2 		= "SELECT * FROM order_details ORDER BY order_id DESC LIMIT 1";
				$result2	=query($sql2);
				$row2		=fetch_array($result2);
				// geting last inserted order id for storing again into order item
				$order_id 	=$row2['order_id']; 


				foreach ($_SESSION["cart"] as $item) 
				{
					$sub_total=$item['p_qty'] * $item['price'];
					$sql3= "INSERT INTO order_item(order_id,product_id,product_name,quantity,unit_price,sub_total)";
						$sql3.=" VALUES('$order_id','".$item['product_id']."','".$item['p_name']."','".$item['p_qty']."','".$item['price']."','$sub_total')";

					$result3=query($sql3);
				}
				if ($result && $result3) {
					unset($_SESSION["cart"]);
					unset($_SESSION['cart_qty']);
					echo "<script>window.location='confirm_order_notification.php'</script>";
					
				}
			}
		}
	}

	function get_last_order_id()
	{
		$user_id 	= current_userid();
		$sql 		= "SELECT * FROM order_details WHERE cus_id='$user_id' ORDER BY order_id DESC LIMIT 1";
		$result		=query($sql);
		$row		=fetch_array($result);
		$oid 		=$row['order_id'];
		return $oid;
	}

	function get_search_item($search_key)
	{
		// $sql 		= "SELECT * FROM product_info WHERE product_name='$search_key' OR product_category='$search_key'OR product_sub_category='$search_key' OR p_id='$search_key'";

		$sql 		= "SELECT * FROM product_info WHERE product_name LIKE'%$search_key%' OR product_category LIKE '%$search_key%' OR product_sub_category LIKE '%$search_key%' OR p_id='$search_key'";
		$result		=query($sql);
		return $result;
	}

	function send_email($email,$subject,$msg,$header)
	{
		return mail($email,$subject,$msg,$header);
	}


	function get_current_profile_info()
	{
		$user_id=current_userid();
		$sql = "SELECT * FROM user_info WHERE user_id='$user_id'";
		$result=query($sql);
		$row=fetch_array($result);
		return $row;
	}


	function update_user_profile()
	{
		$user_id=current_userid();
		if ($_SERVER['REQUEST_METHOD']=="POST") {
			if (isset($_POST['name_update_btn'])) {
				$name=$_POST['name'];
				$sql="UPDATE user_info SET name='$name' WHERE user_id='$user_id'";
				$result=query($sql);
				echo "<script>window.location='update_profile.php?update_pro=1'</script>";

			}
			elseif (isset($_POST['mail_update_btn'])) {
				$mail=$_POST['mail'];
				$sql="UPDATE user_info SET email='$mail' WHERE user_id='$user_id'";
				$result=query($sql);
				echo "<script>window.location='update_profile.php?update_pro=1'</script>";

			}
			elseif (isset($_POST['cell_update_btn'])) {
				$cell=$_POST['cell'];
				$sql="UPDATE user_info SET contact_num='$cell' WHERE user_id='$user_id'";
				$result=query($sql);
				echo "<script>window.location='update_profile.php?update_pro=1'</script>";

			}
			elseif (isset($_POST['add_update_btn'])) {
				$cell=$_POST['address'];
				$sql="UPDATE user_info SET address='$cell' WHERE user_id='$user_id'";
				$result=query($sql);
				echo "<script>window.location='update_profile.php?update_pro=1'</script>";

			}
		}
	}


?>