<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Order Approval Pannel</title>
        <style>
            table{
                width:97%;
                margin:auto;
                text-align:center;
                table-layout:fixed;
            }

            .first_tr, th{
                background-color: #6FC576;
            }

            h2{
                color:black;
            }

            .apr_btn a{
                text-decoration: none;
                display: block;
            }
            .apr_btn: hover{
                background-color: #E83F33;
            }

        </style>
    </head>
    <body>
        <section>
            <table>
                <caption>

                </caption>
                <tr class="first_tr" style=" word-wrap: break-word;">
                    <th  >Sl</th>
                    <th style="width: 14%;">Order Date</th>
                    <th>Order Id</th>
                    <th style="width: 19%;">Customer Name</th>
                    <th>Total Price</th>
                    <th>Payment Status</th>
                    <th style="width: 15%;">Transaction ID</th>
                    <th style="overflow: hidden; width: 9%;">Action 1</th>
                    <th style="overflow: hidden; width: 9%;">Action 2</th>
                    <th>Status</th>
                </tr>
                <?php
                $result=get_order_approval_info();
                $sl=1;
                while ($row=mysqli_fetch_array($result)) {
                ?>
                <tr style="background-color: none;">
                    <td><?php echo $sl++; ?></td>
                    <td><?php echo $row['order_date']; ?></td>
                    <td><a style="text-decoration: none; " href=""><?php echo $row['order_id']; ?></a></td>
                    <td><?php echo $row['cus_name']; ?></td>
                    <td><?php echo $row['total_amount']; ?></td>
                    <td><?php echo $row['payment_type']; ?></td>
                    <td><?php echo $row['transaction_id']; ?></td>
                    

                    <td class="apr_btn"><a href="admin_dashboard.php?add_o_ntf=<?php echo md5("5"); ?>&approve=<?php echo $row['order_id']; ?>">Approve</a></td>
                    <td class="apr_btn"><a href="admin_dashboard.php?add_o_ntf=<?php echo md5("5"); ?>&reject=<?php echo $row['order_id']; ?>">Reject</a></td>
                    
                    <td><a href=""><a style="text-decoration: none;" href="" onclick="MyWindow=window.open('indivisual_order_details.php?order_id=<?php echo $row['order_id']; ?>', 'MyWindow', 'width=800, height=700'); return false;">Details</a></a></td>
                </tr>

                <?php
                }
                if (isset($_GET['approve'])) {
                    $oid=$_GET['approve'];

                    $cus_row= get_orderd_customer_info($oid);
                    $result=get_ordered_product_quantity($oid);


                    $email= $cus_row['email'];
                    $cus_name= $cus_row['name'];
                    $subject="Order notification";

                    $message="Dear {$cus_name}, \nYour Order has been approved. \norder ID: {$oid}";
                    $headers="From: Online Shopping System";


                    $sql="UPDATE order_details SET approve_status=1 WHERE order_id='$oid'";
                    $sql2="UPDATE order_item SET approve_status=1 WHERE order_id='$oid'";



                    if (mysqli_query($conn, $sql) && mysqli_query($conn, $sql2)) {
                        // $_SESSION['app_status']="Order has been approved";
                        send_email($email,$subject,$message,$headers);
                        while ($qty_row =fetch_array($result)) {
                            $product_id =$qty_row['product_id'];
                            $sold_qty   =$qty_row['quantity'];

                            $sql_update="UPDATE product_info SET quantity=(quantity-'$sold_qty') WHERE p_id='$product_id'";
                            query($sql_update);

                        }


                        echo "<script>alert('Order is Approved'); window.location='admin_dashboard.php?add_o_ntf=<?php echo md5(5); ?>'</script>";
                    }
                }
                if (isset($_GET['reject'])) {
                    $oid=$_GET['reject'];

                    $sql="DELETE FROM order_details WHERE order_id='$oid'";
                    $sql2="DELETE FROM order_item WHERE order_id='$oid'";



                    if (mysqli_query($conn, $sql) && mysqli_query($conn, $sql2)) {
                        // $_SESSION['app_status']="Order has been approved";

                        echo "<script>alert('Order is Cancled'); window.location='admin_dashboard.php?add_o_ntf=<?php echo md5(5); ?>'</script>";
                    }
                }
                ?>
            </table>
        </section>
        <!-- <?php // unset($_SESSION['app_status']); ?> -->
    </body>
</html>
















