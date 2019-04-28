<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="css/index.css">
	<link rel="stylesheet" href="css/login.css">
</head>
<style>
	.category_insertion_box{
		overflow: hidden;
		width: 100%;

	}

	.ci_col{
		width: 65%;
		float: left;
	}

	.ci_col_add{
		float: left;
		width: 35%;
	}

    table{
        width:80%;
        margin:auto;
        text-align:center;
        padding:20px;
        color:black;
        border:1px solid #a6d8a8;
        border-collapse:collapse;
        font-size:18px;
        margin-bottom: 3%;
        /*font-family:Arial*/
    }
    .n_hv:hover td{
        background:#e83f33;
        
    }

    .n_hv{
        background: #6FC576;
    }


    h2{
        font-size: 2em;
        color:black;
    }

    .update_c_text{
    	padding: 2%;
    	border: 1px solid chartreuse;
    }
</style>
<body>
	<?php 
		$sub_cat_result=get_category();
		insert_sub_category();
	 ?>
	<div class="insert_category_container">
		<div class="category_insertion_box">
			<div class="ci_col_add">
				<h1 align="center">Insert Sub-Category</h1> <!-- Form Header -->
				    <hr>
	<!-- Code for Form -->
				    <form action="" method="post">
					    <label><b>Category Name</b></label>

						<select name="select1" id="select1">
						    <option><-- Select Category --></option>
							<?php
								while ($row=mysqli_fetch_array($sub_cat_result)) { // fetching the each row of category table
									$category_id=$row['category_id'];
								 ?>
						    		<option value="<?php echo $row['category_id']; ?>"><?php echo $row['category_name']; ?></option>
								<?php
								}
							?>
						</select>
					    <label><b>Sub-Category Name</b></label>
			    		<input type="text" placeholder="Enter Sub-Category Name" name="sub_category_name" required>

					    <button type="submit" name="sub_button1" class="registerbtn"><b>Insert</b></button>
					</form>  <!-- End of Form -->
			</div>
			<div class="ci_col" style="overflow: scroll; height: 390px;">
		        <section>
		            <table>
		                <caption>
		                    <h2>Category List</h2>
		                </caption>
		                <?php 
		                if (isset($_GET['id'])) {
		                    $sc_id=$_GET['id'];
		                    $sql="SELECT * FROM sub_category WHERE sub_category_id='$sc_id'";
		                    $result=mysqli_query($conn, $sql);
		                    $c_row=mysqli_fetch_array($result);

		                 ?>
		                <tr>
		                    <form action="" method="post">
		                        <td></td>
		                        <td style="overflow: hidden; text-align: center;">
		                        	<input type="hidden" name="sc_id" value="<?php echo $sc_id; ?>">
		                            <input class="update_c_text" type="text" name="sc_name" value="<?php echo $c_row['sub_category_name']; ?>">
		                        </td>
		                        <td colspan="2">
		                            <button name="update_btn">Update</button>
		                        </td>
		                    </form>
		                </tr>
		                <?php
		                }
		                ?>
		                <tr class="n_hv">
		                    <th>Category ID</th>
		                    <th>Category Name</th>
		                    <th colspan="2">Action</th>
		                </tr>
		                <?php
		                $result=get_sub_category_desc();
		                while ($row=mysqli_fetch_array($result)) { ?>
		                	<tr>
		                        <td><?php echo $row['sub_category_id']; ?></td>
		                        <td><?php echo $row['sub_category_name']; ?></td>
		                        <td>
		                        	<a style="text-decoration: none;" href="admin_dashboard.php?add_sub_catg=a87ff679a2f3e71d9181a67b7542122c&id=<?php echo $row['sub_category_id']; ?>">Edit</a>
		                        </td>
		                        <td>
		                        	<a style="text-decoration: none;" href="admin_dashboard.php?add_sub_catg=a87ff679a2f3e71d9181a67b7542122c&sc_dlt=<?php echo $row['sub_category_id']; ?>">Remove</a>
		                        </td>
		                        
		                    </tr>
		                <?php
		                }
		                ?>
		            </table>
		        </section>

		        <?php
		            if ($_SERVER['REQUEST_METHOD']=="POST") {
		                if (isset($_POST['update_btn'])) {
		                    $scid=$_POST['sc_id'];
		                    $sc_name=$_POST['sc_name'];

		                    $sql="UPDATE sub_category SET sub_category_name='$sc_name' WHERE sub_category_id='$scid'";
		                    mysqli_query($conn, $sql);
		                    if (mysqli_query($conn, $sql)) {
		                        echo "<script>alert('Record Updated!!'); window.location='admin_dashboard.php?add_sub_catg=a87ff679a2f3e71d9181a67b7542122c'</script>";
		                    }
		                }
		            }

		            if (isset($_GET['sc_dlt'])) {
		            	$sc_id=$_GET['sc_dlt'];
		            	$sql="DELETE FROM sub_category WHERE sub_category_id='$sc_id'";
	                    if (query($sql)) {
	                        echo "<script>alert('1 record is Deleted Permanently!!'); window.location='admin_dashboard.php?add_sub_catg=a87ff679a2f3e71d9181a67b7542122c'</script>";
	                    }
		            }
		        ?>
			</div>
		</div>
	</div>
</body>
</html>