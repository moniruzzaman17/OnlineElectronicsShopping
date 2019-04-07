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
            table, tr:hover td{
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
                <tr>
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
                        <td><a style="text-decoration: none;" href="">edit</a></td>
                        
                    </tr>
                <?php
                }
                ?>
            </table>
        </section>
    </body>
</html>
















