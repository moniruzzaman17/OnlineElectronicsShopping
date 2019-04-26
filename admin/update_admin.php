<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title></title>
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
		$row=get_current_admin_info();
		update_admin_profile();
	?>
	<div class="update_profile_container">
		<a href="ad_profile.php?update_pro=1">Refresh Page</a>
		<table class="update_pro_table"  cellspacing="0" cellpadding="0">
			<form action="" method="post">
				<tr>
					<th>Name</th>
					<td>
						: 
						<?php
							if (isset($_GET['edit_name'])) { ?>
								<input type="text" name="name" value="<?php echo $row['admin_name']; ?>">
							<?php
							}
							else
							{ 
								echo $row['admin_name'];
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
								<a href="ad_profile.php?update_pro=<?php echo true; ?>&edit_name=<?php echo true; ?>">Edit</a>
							<?php
							}
						?>
					</td>
				</tr>
				<tr>
					<th>User ID</th>
					<td>: <?php echo $row['admin_id']; ?></td>
					<td style="text-align: center;">N/A</td>
				</tr>
				<tr>
					<th>Email Address</th>
					<td>
						: 
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
								<a href="ad_profile.php?update_pro=<?php echo true; ?>&edit_mail=<?php echo true; ?>">Edit</a>
							<?php
							}
						?>
					</td>
				</tr>
				<tr>
					<th>Cell No</th>
					<td>
						: 
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
								<a href="ad_profile.php?update_pro=<?php echo true; ?>&edit_cell=<?php echo true; ?>">Edit</a>
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