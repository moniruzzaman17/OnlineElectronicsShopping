<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Order Details</title>
        <style>
            body{

            }
            .first, .first th{
                font-size:18px;
                text-align: left;
                font-family:Arial;
                

            }
            .first td{
                font-size:18px;
                text-align: left;
                padding-left:1%;
                font-family:Arial;

            }
            .second{
                width:800px;
                margin:auto;
                text-align:center;
                table-layout:fixed;
            }
            .first{
                width:400px;
                margin:auto;
                text-align:center;
                table-layout:fixed;
            }
            .second , .second tr, .second th, .second td{
                padding:20px;
                color:white;
                border:1px solid #a6d8a8;
                border-collapse:collapse;
                font-size:18px;
                font-family:Arial;
                color: black;
            }
            .first_tr{
                background:linear-gradient(top, #4caf50 0%, #4caf50 100%);
                background:-webkit-linear-gradient(top, #4caf50 0%, #4caf50 100%);
            }

          /*  .second, .second tr:hover td{
                background:#e83f33;

            }*/
          /*  .second td{
                background:linear-gradient(top, #95d097 0%, #95d097 100%);
                background:-webkit-linear-gradient(top, #95d097 0%, #95d097 100%);

            }*/
            h2{
                font-style: italic;
                font-size: 1.2em;
                color:black;
            }
            h1{
                width:800px;
                margin:auto;
                font-size: 2em;
                text-align:center;
                color:black;
                font-family:Arial;
                padding:20px;
            }
            

            center{
                font-size:25px;
                margin-top:25px;
                text-align: center;
                font-family:Arial;
            }
        </style>
    </head>
    <body>
        <section>
            <h1>Order Details</h1>
        </section>
        <section>
            <table class="first">
                <?php
                include 'functions/init.php';
                $oid=$_GET['order_id'];
                    $cus_row= get_orderd_customer_info($oid);
                ?>
                <caption>
                    <h2>Customer Information</h2>
                </caption>
                <tr>
                    <th>Customer Name:</th>
                    <td><?php echo $cus_row['name']; ?></td>
                </tr>

                <tr>
                    <th>Customer Phone:</th>
                    <td><?php echo $cus_row['contact_num']; ?></td>
                </tr>

                <tr>
                    <th>Customer Email:</th>
                    <td><?php echo $cus_row['email']; ?></td>
                </tr>

                <tr>
                    <th>Shipping Address:</th>
                    <td><?php echo $cus_row['ship_address']; ?></td>
                </tr>

                <tr>
                    <th>Payment Type:</th>
                    <td><?php echo $cus_row['payment_type']; ?></td>
                </tr>

                <tr>
                    <th>Order Date:</th>
                    <td><?php echo $cus_row['order_date']; ?></td>
                </tr>
            </table>
        </section>
        <section>
            <table class="second">
                <caption>
                    <h2>Product Information</h2>
                </caption>
                <tr class="first_tr">
                    <th>SL</th>
                    <th>Product Id</th>
                    <th>Product Name</th>
                    <th>Quantity</th>
                    <th>Unit Price</th>
                    <th>Total Price</th>
                </tr>
                <?php
                    $result=get_orderd_product_info($oid);
                    $sl=1;
                    while ($row= mysqli_fetch_array($result)) {
                ?>
                <tr class="p_row">
                    <td><?php echo $sl++; ?></td>
                    <td><?php echo $row['product_id']; ?></td>
                    <td><?php echo $row['product_name']; ?></td>
                    <td><?php echo $row['quantity']; ?></td>
                    <td><?php echo $row['unit_price']; ?></td>
                    <td><?php echo $row['sub_total']; ?></td>
                </tr>
                <?php
                    }
                ?>
            </table>
        </section>
        <section>
        <center>
            <a href="indivisual_order_details.php?bk=<?php echo md5("str"); ?>">Back</a>
        </center>
        </section>

        <?php
            if (isset($_GET['bk'])) {
                echo "<script>window.close();</script>";
            }
        ?>
    </body>
</html>
















