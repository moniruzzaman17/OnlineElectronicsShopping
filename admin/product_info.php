<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Product Information</title>
        <style>
            table{
                width:1000px;
                margin:auto;
                text-align:center;
                table-layout:fixed;
            }
            table, tr, th, td{
                padding:20px;
                color:white;
                border:1px solid #a6d8a8;
                border-collapse:collapse;
                font-size:18px;
                font-family:Arial;
                background:linear-gradient(top, #4caf50 0%, #4caf50 100%);
                background:-webkit-linear-gradient(top, #4caf50 0%, #4caf50 100%);
            }
            table, .n_hv:hover td{
                background:#e83f33;
                
            }

            td{
                background:linear-gradient(top, #95d097 0%, #95d097 100%);
                background:-webkit-linear-gradient(top, #95d097 0%, #95d097 100%);
                
            }
            h2{
                font-size: 2em;
                color:black;
            }
        </style>
    </head>
    <body>
        <section>
            <table>
                <caption>
                    <h2>Product Information</h2>
                </caption>
                <?php 
                if (isset($_GET['id'])) {
                    $p_id=$_GET['id'];
                    $sql="SELECT * FROM product_info WHERE p_id='$p_id'";
                    $result=mysqli_query($conn, $sql);
                    $p_row=mysqli_fetch_array($result);

                 ?>
                <tr>
                    <form action="" method="post">
                        <td></td>
                        <td style="overflow: hidden;"><?php echo $p_row['p_id']; ?></td>
                        <input type="hidden" name="p_id" value="<?php echo $p_row['p_id']; ?>">
                        <td style="overflow: hidden; text-align: center;">
                            <input type="text" name="p_name" value="<?php echo $p_row['product_name']; ?>">
                        </td>
                        <td style="overflow: hidden;">
                            <input type="text" name="p_qty" value="<?php echo $p_row['quantity']; ?>">
                        </td>
                        <td style="overflow: hidden;">
                            <input type="text" name="p_price" value="<?php echo $p_row['product_price']; ?>">
                        </td>
                        <td style="overflow: hidden;"><?php echo $p_row['product_category']; ?></td>
                        <td style="overflow: hidden;"><?php echo $p_row['product_sub_category']; ?></td>
                        <td>
                            <button name="update_btn">Update</button>
                        </td>
                    </form>
                </tr>
                <?php
                }
                ?>
                <tr class="n_hv">
                    <th>Sl</th>
                    <th>Product Id</th>
                    <th>Product Name</th>
                    <th>Quantity</th>
                    <th>Unit Price</th>
                    <th>Category</th>
                    <th>Sub Category</th>
                    <th>Action</th>
                </tr>
                <?php
                $result=get_product_info();
                $sl=1;
                while ($row=mysqli_fetch_array($result)) { ?>
                    <tr>
                        <td><?php echo $sl++; ?></td>
                        <td><?php echo $row['p_id']; ?></td>
                        <td><?php echo $row['product_name']; ?></td>
                        <td><?php echo $row['quantity']; ?></td>
                        <td><?php echo $row['product_price']; ?></td>
                        <td><?php echo $row['product_category']; ?></td>
                        <td><?php echo $row['product_sub_category']; ?></td>
                        <td><a style="text-decoration: none;" href="admin_dashboard.php?p_info=<?php echo md5("6"); ?>&id=<?php echo $row['p_id']; ?>">edit</a></td>
                        
                    </tr>
                <?php
                }
                ?>
            </table>
        </section>

        <?php
            if ($_SERVER['REQUEST_METHOD']=="POST") {
                if (isset($_POST['update_btn'])) {
                    $pid=$_POST['p_id'];
                    $p_name=$_POST['p_name'];
                    $p_qty=$_POST['p_qty'];
                    $p_price=$_POST['p_price'];

                    $sql="UPDATE product_info SET product_name='$p_name', quantity='$p_qty', product_price='$p_price' WHERE p_id='$pid'";
                    mysqli_query($conn, $sql);
                    if (mysqli_query($conn, $sql)) {
                        echo "<script>alert('Record Updated!!'); window.location='admin_dashboard.php?p_info=1679091c5a880faf6fb5e6087eb1b2dc'</script>";
                    }
                }
            }
        ?>
    </body>
</html>
















