<?php include 'includes/header.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="css/index.css">
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
    <?php
        $row=get_current_admin_info();

    ?>
    <div class="ad_container">
        <div class="dsinfo_container">
            <h1 align="center">Welcome <?php echo $row['admin_name']; ?></h1>
            <div class="db_side_bar">
                <ul>
                    <li><a href="ad_profile.php?update_pro=<?php echo true; ?>">Update Profile</a></li>
                    <li><a href="ad_profile.php?add_admin=<?php echo true; ?>">Add Admin</a></li>
                </ul>
            </div>
            <div class="db_page_container">
                <?php
                    if (isset($_GET['update_pro'])) {
                        include 'update_admin.php';
                    }
                    elseif (isset($_GET['add_admin'])) {
                        include 'add_admin.php';
                    }
                    else
                    {
                        include 'ad_pro_home.php';
                    }

                ?>

            </div>
        </div>
    </div>
 <?php include 'includes/footer.php'; ?>   
</body>
</html>
