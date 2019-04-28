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
		insert_category();
	 ?>
	<div class="insert_category_container">
		<div class="category_insertion_box">
			<div class="ci_col_add">
				<h1 align="center">Insert Product Category</h1> <!-- Form Header -->
				    <hr>
	<!-- Code for Form -->
				    <form action="" method="post">
					    <label><b>Category Name</b></label>
			    		<input type="text" placeholder="Enter Category Name" name="category_name" required>

					    <button type="submit" name="button1" class="registerbtn"><b>Insert</b></button>
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
		                    $c_id=$_GET['id'];
		                    $sql="SELECT * FROM category WHERE category_id='$c_id'";
		                    $result=mysqli_query($conn, $sql);
		                    $c_row=mysqli_fetch_array($result);

		                 ?>
		                <tr>
		                    <form action="" method="post">
		                        <td></td>
		                        <td style="overflow: hidden; text-align: center;">
		                        	<input type="hidden" name="c_id" value="<?php echo $c_id; ?>">
		                            <input class="update_c_text" type="text" name="c_name" value="<?php echo $c_row['category_name']; ?>">
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
		                $result=get_category_descending();
		                while ($row=mysqli_fetch_array($result)) { ?>
		                	<tr>
		                        <td><?php echo $row['category_id']; ?></td>
		                        <td><?php echo $row['category_name']; ?></td>
		                        <td>
		                        	<a style="text-decoration: none;" href="admin_dashboard.php?add_catg=eccbc87e4b5ce2fe28308fd9f2a7baf3&id=<?php echo $row['category_id']; ?>">Edit</a>
		                        </td>
		                        <td>
		                        	<a style="text-decoration: none;" href="admin_dashboard.php?add_catg=eccbc87e4b5ce2fe28308fd9f2a7baf3&c_dlt=<?php echo $row['category_id']; ?>">Remove</a>
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
		                    $cid=$_POST['c_id'];
		                    $c_name=$_POST['c_name'];

		                    $sql="UPDATE category SET category_name='$c_name' WHERE category_id='$cid'";
		                    mysqli_query($conn, $sql);
		                    if (mysqli_query($conn, $sql)) {
		                        echo "<script>alert('Record Updated!!'); window.location='admin_dashboard.php?add_catg=eccbc87e4b5ce2fe28308fd9f2a7baf3'</script>";
		                    }
		                }
		            }

		            if (isset($_GET['c_dlt'])) {
		            	$c_id=$_GET['c_dlt'];
		            	$sql="DELETE FROM category WHERE category_id='$c_id'";
	                    if (query($sql)) {
	                        echo "<script>alert('1 record is Deleted Permanently!!'); window.location='admin_dashboard.php?add_catg=eccbc87e4b5ce2fe28308fd9f2a7baf3'</script>";
	                    }
		            }
		        ?>
			</div>
		</div>
	</div>
</body>
</html>