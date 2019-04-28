<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title></title>
	<link rel="stylesheet" href="css/index.css">
 	<script src='js/jquery.min.js'></script>
	<style>
		.update_profile_container{
			overflow: hidden;
			margin: auto;
			padding: 1%;
		}
		.update_profile_container a{
			float: right;
			margin: 0% 17%;
		}

		.update_pro_table{
			width: 70%;
			vertical-align: left;
			border: none;
			margin-left: 15%;
			padding: 2%;

		}

		.update_pro_table tr:nth-child(even) {background-color: #f2f2f2;}

		.update_pro_table th{
			text-align: left;
			padding: 3%;
		}

		.update_pro_table td{
			text-align: left;
			padding: 3%;
		}

		.update_pro_table td a{
			text-decoration: none;
		}
	</style>
</head>
<body>
	<?php
		include 'includes/header.php';
		$row=get_current_profile_info();
		update_user_profile();
	?>
	<div class="update_profile_container">
		<a href="update_profile.php?update_pro=1">Refresh Page</a>
		<table class="update_pro_table"  cellspacing="0" cellpadding="0">
			<form action="" method="post">
				<tr>
					<th>Name</th>
					<td>
						<?php
							if (isset($_GET['edit_name'])) { ?>
								<input type="text" name="name" value="<?php echo $row['name']; ?>">
							<?php
							}
							else
							{ 
								echo $row['name'];
							}
						?>
							
					</td>
					<td style="text-align: center;">
						<?php
							if (isset($_GET['edit_name'])) { ?>
								<button name="name_update_btn">Update</button>
							<?php
							}
							else
							{ ?>
								<a href="update_profile.php?update_pro=<?php echo true; ?>&edit_name=<?php echo true; ?>">Edit</a>
							<?php
							}
						?>
					</td>
				</tr>
				<tr>
					<th>User ID</th>
					<td><?php echo $row['user_id']; ?></td>
					<td style="text-align: center;">N/A</td>
				</tr>
				<tr>
					<th>Email Address</th>
					<td>
						<?php
							if (isset($_GET['edit_mail'])) { ?>
								<input type="text" name="mail" value="<?php echo $row['email']; ?>">
							<?php
							}
							else
							{ 
								echo $row['email'];
							}
						?>
					</td>
					<td style="text-align: center;">
						<?php
							if (isset($_GET['edit_mail'])) { ?>
								<button name="mail_update_btn">Update</button>
							<?php
							}
							else
							{ ?>
								<a href="update_profile.php?update_pro=<?php echo true; ?>&edit_mail=<?php echo true; ?>">Edit</a>
							<?php
							}
						?>
					</td>
				</tr>
				<tr>
					<th>Cell No</th>
					<td>
						<?php
							if (isset($_GET['edit_cell'])) { ?>
								<input type="text" name="cell" value="<?php echo $row['contact_num']; ?>">
							<?php
							}
							else
							{ 
								echo $row['contact_num'];
							}
						?>
					</td>
					<td style="text-align: center;">
						<?php
							if (isset($_GET['edit_cell'])) { ?>
								<button name="cell_update_btn">Update</button>
							<?php
							}
							else
							{ ?>
								<a href="update_profile.php?update_pro=<?php echo true; ?>&edit_cell=<?php echo true; ?>">Edit</a>
							<?php
							}
						?>
					</td>
				</tr>
				<tr>
					<th>Address</th>
					<td style="overflow: hidden;">
						<?php
							if (isset($_GET['edit_address'])) { ?>
								<textarea name="address" id="" cols="30" rows="10"><?php echo $row['address']; ?></textarea>
							<?php
							}
							else
							{ 
								echo $row['address'];
							}
						?>
					</td>
					<td style="text-align: center;">
						<?php
							if (isset($_GET['edit_address'])) { ?>
								<button name="add_update_btn">Update</button>
							<?php
							}
							else
							{ ?>
								<a href="update_profile.php?update_pro=<?php echo true; ?>&edit_address=<?php echo true; ?>">Edit</a>
							<?php
							}
						?>
					</td>
				</tr>
			</form>
		</table>
	</div>
</body>
</html>