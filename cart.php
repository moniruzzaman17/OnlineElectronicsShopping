<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Cart</title>
	<!-- link to the css -->
	<link rel="stylesheet" href="css/index.css">
</head>
<body>
<?php 
	include 'includes/header.php'; // including the header class 

?>
	<h2 style="text-align: center; margin-top: 10%;">Here is your cart details</h2>
<?php
	if(!isset($_SESSION['cart']))
	{
	$_SESSION['cart'] = array();

	}

  if(isset($_POST['add_to_cart']))
  {
      
      $product_id = $_POST['p_id'];
      // $food_image = $_POST['food_image'];
      // $price = $_POST['price'];
      // $quantity = $_POST['quantity'];
      // $description = $_POST['description'];
      // $name = $_POST['name'];

      $result = get_product_details($product_id);

      while($r = mysqli_fetch_row($result))
      {
        $items[] = $r;        
      }


    $itemArray = array($items[0][0]=>array('product_id' => $items[0][0],'p_name' => $items[0][1], 'p_qty'=>$_POST["p_qty"], 'price'=>$items[0][6], 'p_image'=> $items[0][7]));
    
    $_SESSION['cart'] += $itemArray;
    
    
  }

  elseif(empty($_SESSION['cart']))
  {       
    echo "<h2 style='text-align:center; color: red; margin-top: 5%;'>No Items added to cart!!</h2>";
  }

  elseif(isset($_GET['action']))
  {
    foreach($_SESSION["cart"] as $k => $v) 
    {
      if($_GET["id"] == $k)
      {
        unset($_SESSION["cart"][$k]);       
        
      }
      
    } 
      if(empty($_SESSION['cart']))
      {
  
        echo "<h2 style='text-align:center; color: red; margin-top: 5%;'>No Items</h2>";
  
      }
    
  }
 ?>	
 <div class="cart_container">
		<!-- creating a table for organizing all the product in cart -->
		<div class="table_container">
		<table class="cart_table">
			<thead>
				<th>Sl.</th>
				<th>Image</th>
				<th>Product Code</th>
				<th>Product Name</th>
				<th>Quantity</th>
				<th>Price</th>
				<th>Total</th>
				<th>Action</th>
			</thead> <!-- END of the thead -->
			<tbody>
<?php
$tp2 = 0;
$sl=1;

foreach ($_SESSION["cart"] as $item)
{
  $id = $item['product_id'];
  $tp = $item['p_qty'] * $item['price'];
  $tp2 += $tp;

?>
				<tr>
					<td><?php echo $sl++; ?></td>
					<td><img style="width: 100px; height: 100px;" src="uploads/<?php echo $item['p_image']; ?>" alt="Product Image"></td>
					<td><?php echo $item['product_id']; ?></td>
					<td><?php echo $item['p_name']; ?></td>
					<!-- <td><?php // echo $item['p_qty']; ?></td> -->
					<td><?php echo $item['p_qty']; ?></td>
					<td><span>&#2547;</span> <?php echo $item['price']; ?></td>
					<td><span>&#2547;</span> <?php echo $tp; ?></td>
					<td><a href ='cart.php?action&id=<?php echo $id; ?>'> Remove </a></td>
				</tr>
<?php
}

$_SESSION['cart_qty']=count($_SESSION["cart"]);
?>
			</tbody> <!-- END of the tbody -->

			<thead>
				<th style="border:none;"></th>
				<th style="border:none;"></th>
				<th style="border:none;"></th>
				<th style="border:none;"></th>
				<th style="border:none;"></th>
				<th>Grand Total=</th>
				<th><span>&#2547;</span> <?php echo $tp2; ?></th>
				<th style="border:none;"></th>
			</thead> <!-- END of the thead -->
		</table> <!-- END of the table -->
		</div> <!-- END of the table_container -->
		<br>
		<br>
		<div class="bellow_cart_div">
		<!-- creating a form to continue shopping -->
		<?php

	      if(!empty($_SESSION['cart']))
	      { ?>
	  
		<form action="order.php" method="post">
			<button class="continue_shopping_btn">Continue Shopping</button>
		</form>
	  
	      <?php
	      }
		?>
		</div>
	</div> <!-- END of the cart_container -->
<?php include 'includes/footer.php'; ?>  <!-- including the header class -->
</body> <!-- END of the body tag -->
</html>