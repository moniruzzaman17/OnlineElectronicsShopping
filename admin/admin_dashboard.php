<?php include 'includes/header.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="css/index.css">
</head>
<body>
    <div class="ad_container">
        <div class="dsinfo_container">
            <h1 align="center">Admin Dashboard</h1>
            <div class="db_side_bar">
                <ul>
                    <li><a href="admin_dashboard.php?dashboard=<?php echo md5("1"); ?>">Dashboard</a></li>
                    <li><a href="admin_dashboard.php?add_product=<?php echo md5("2"); ?>">Add Product</a></li>
                    <li><a href="admin_dashboard.php?add_catg=<?php echo md5("3"); ?>">Add Category</a></li>
                    <li><a href="admin_dashboard.php?add_sub_catg=<?php echo md5("4"); ?>">Add Sub-Category</a></li>
                    <li><a href="admin_dashboard.php?add_o_ntf=<?php echo md5("5"); ?>">Order Notification</a></li>
                    <li><a href="admin_dashboard.php?p_info=<?php echo md5("6"); ?>">Product info</a></li>
                </ul>
            </div>
            <div class="db_page_container">
                <?php
                    if (isset($_GET['dashboard'])) {
                        # code...
                    }
                    elseif (isset($_GET['add_product'])) {
                        include 'insert_product.php';
                    }
                    elseif (isset($_GET['add_catg'])) {
                        include 'insert_category.php';
                    }
                    elseif (isset($_GET['add_sub_catg'])) {
                        include 'insert_sub_category.php';
                    }
                    elseif (isset($_GET['add_o_ntf'])) {
                        include 'order_approval.php';
                    }
                    elseif (isset($_GET['p_info'])) {
                        include 'product_info.php';
                    }
                ?>
            </div>
        </div>
    </div>
 <?php include 'includes/footer.php'; ?>   
</body>
</html>
