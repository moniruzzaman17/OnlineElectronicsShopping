<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title></title>
	<style>
		.admin_add_container{
			margin: 0;
			overflow: hidden;
			padding: 0;
		}

		.add_box{
			overflow: hidden;
			padding: 5%;
			padding-top: 0;
			font-size: 17px;
			margin-left: 14%;
		}

		.add_box label{
			padding: 1%;
			padding-left: 0;
		}

		.add_box input[type=text], .add_box input[type=password]{
			padding: 1%;
			width: 36%;
			background: rgba(147,147,147,0.1);
		}

		.add_btn{
			padding: 1%;
			width: 15%;
			margin-top: 3%;
			margin-left: 11%;
		}

	</style>
</head>
<body>
	<?php 
		add_admin();
	?>
	<div class="admin_add_container">
		<div class="add_box">
			<form action="" method="post">
				<label for="">Name</label><br>
				<input type="text" name="name" placeholder="Enter Name" pattern="^[A-Z][ a-zA-Z]+$" title="First Letter must be upper case and only space and characters are allowed" required><br><br>
				<label for="">User ID</label><br>
	              <?php
	                if (isset($_SESSION['msg'])) { ?>
	                  <p style="color: red;"><?php echo $_SESSION['msg']; ?></p>
	                <?php
	                unset($_SESSION['msg']);
	                }
	              ?>
				<input type="text" name="user_id" placeholder="user id" pattern="^[a-z][a-z_]{1,20}[0-9]{1,15}$" title="start with at least 2 lower case and end with number, allowed only a-z,_,0-9" required><br><br>
				<label for="">Password</label><br>
				<input type="password" name="pass" placeholder="password" required><br><br>
				<label for="">Email Address</label><br>
				<input type="text" name="mail" placeholder="example@example.com" pattern="^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$" title="Make sure a valid mail address" required><br><br>
				<label for="">Contact Number</label><br>
				<input type="text" name="cell" placeholder="01xxxxxxxxx" pattern="^[0-9]{11}" title="Only accept numarical value with 11 number" required> <br>
				<button name="add_btn" class="add_btn">Add</button>
			</form>
		</div>
	</div>
</body>
</html>