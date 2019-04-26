<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
    <style>
        .dh_row{
            width: 100%;
            float: left;
            margin-bottom: 1%;
            margin-left: 5%
        }

        .dh_col{
            width: 50%;
            float: left;

        }

        .dh_box{
            box-shadow: 0 8px 6px -6px black;
            width: 300px;
            height: 200px;
            border: 1px solid gray;
        }


    </style>
</head>
<body>
	<div class="dhome_container">
		<?php
        date_default_timezone_set('Asia/Dhaka');
                    // include '../functions/db.php';
                    $result_ls=mysqli_query($conn, "SELECT SUM(total_amount) FROM order_details WHERE approve_status=1");
                    $row_ls=mysqli_fetch_array($result_ls);
                    $total_sales=$row_ls['SUM(total_amount)'];

                    $last_start_date=date('Y-m-01', strtotime("last month"));
                    $last_end_date=date('Y-m-t', strtotime("last month"));

                    $result_lms=mysqli_query($conn, "SELECT SUM(total_amount) FROM order_details WHERE approve_status=1 AND order_date BETWEEN '$last_start_date' AND '$last_end_date'");
                    $row_lms=mysqli_fetch_array($result_lms);
                    $last_month_sales=$row_lms['SUM(total_amount)'];

                    $current_start_date=date('Y-m-01');
                    $current_end_date=date('Y-m-t');
                    
                    $result_cms=mysqli_query($conn, "SELECT SUM(total_amount) FROM order_details WHERE approve_status=1 AND order_date BETWEEN '$current_start_date' AND '$current_end_date'");
                    $row_cms=mysqli_fetch_array($result_cms);
                    $current_month_sales=$row_cms['SUM(total_amount)'];


                    $result_tu=mysqli_query($conn, "SELECT COUNT(id) FROM user_info");
                    $row_tu=mysqli_fetch_array($result_tu);
                    $total_user=$row_tu['COUNT(id)'];


                    $result_tp=mysqli_query($conn, "SELECT COUNT(p_id) FROM product_info");
                    $row_tp=mysqli_fetch_array($result_tp);
                    $total_product=$row_tp['COUNT(p_id)'];


                    $result_lc=mysqli_query($conn, "SELECT COUNT(quantity) FROM product_info WHERE quantity<=2");
                    $row_lc=mysqli_fetch_array($result_lc);
                    $low_quantity=$row_lc['COUNT(quantity)'];
		?>
                <div class="dh_row">
                    <div class="dh_col">
                        <div class="dh_box">
                            <h2 style="text-align: center;">LifeTime Sales</h2>
                            <h2 style="text-align: center;"><?php echo $total_sales; ?></h2>
                        </div>
                    </div>
                    <div class="dh_col">
                        <div class="dh_box">
                            <h2 style="text-align: center;">Last Month Sales</h2>
                            <h2 style="text-align: center;"><?php echo $last_month_sales; ?></h2>
                        </div>
                    </div>
                </div>


                <div class="dh_row">
                    <div class="dh_col">
                        <div class="dh_box">
                            <h2 style="text-align: center;">Current Month Sales</h2>
                            <h2 style="text-align: center;"><?php echo $current_month_sales; ?></h2>
                        </div>
                    </div>
                    <div class="dh_col">
                        <div class="dh_box">
                            <h2 style="text-align: center;">Total User</h2>
                            <h2 style="text-align: center;"><?php echo $total_user; ?></h2>
                        </div>
                    </div>
                </div>

                <div class="dh_row">
                    <div class="dh_col">
                        <div class="dh_box">
                            <h2 style="text-align: center;">Total Product Count</h2>
                            <h2 style="text-align: center;"><?php echo $total_product; ?></h2>
                        </div>
                    </div>
                    <div class="dh_col">
                        <div class="dh_box">
                            <h2 style="text-align: center;">Number of Low Quantity Product</h2>
                            <h2 style="text-align: center;"><?php echo $low_quantity; ?></h2>
                        </div>
                    </div>
                </div>
	</div>
</body>
</html>