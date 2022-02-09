<?php 
session_start();
require_once "config.php";
require_once "functions.php";
remove();
$test = [];
$quantity = [];	
?>
<!DOCTYPE html>
<!--[if IE 8]> <html class="ie8 oldie" lang="en"> <![endif]-->
<!--[if gt IE 8]><!-->
<html lang="en">
<!--<![endif]-->

<head>
    <meta charset="utf-8">
    <title>Diana’s jewelry</title>
    <meta name="viewport"
        content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no">
    <link rel="stylesheet" media="all" href="css/style.css">
    <!--[if lt IE 9]>
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
</head>

<body>

    <header id="header">
        <div class="container">
            <a href="index.php" id="logo" title="Diana’s jewelry">Diana’s jewelry</a>
            <div class="right-links">
                <ul>
                    <li><a href="cart.php"><span class="ico-products"></span><?php
                products();
                ?></a></li>
                    <li><a href="login.php"><span class="ico-account"></span><?php   
                
              login();
                
                  ?></a></li>
                    <li><a href="logout.php"><span class="ico-signout"></span>Sign out</a></li>
                </ul>
            </div>
        </div>
        <!-- / container -->
    </header>
    <!-- / header -->


    <!-- / navigation -->

    <?php
     menu();
     ?>


    <div class="big-section">
        <div id="breadcrumbs">
            <div class="container">
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li>Cart</li>
                </ul>
            </div>
            <!-- / container -->
        </div>
        <!-- / body -->

        <div id="body">
            <div class="container">
                <div id="content" class="full">
                    <div class="cart-table">
                        <?php
                    $salestax = 0;
					$total = 0;
					$subtotal = 0;
					$shipment = 0;
					$items = [];
					
					if(isset($_SESSION['cart'])){
					$product_id = array_column($_SESSION['cart'],'product_id');
					$quant = array_column($_SESSION['cart'],'quantity');

					$result = mysqli_query($link1, "SELECT * FROM products UNION SELECT * FROM earrings UNION       SELECT * FROM bracelets" );
					$quant_length = count($quant);
					while($row = mysqli_fetch_assoc($result)){
						$i = 0;
						foreach ($product_id as $id) {
							if($row['id']== $id  ){
								echo "
								<form action='cart.php?action=remove&id={$row['id']}' method='POST'>
								<table>
								  <tr>
									<th class='items'>Items</th>
									<th class='price'>Price</th>
									<th class='qnt'>Quantity</th>
									<!-- / <th class='total'>Total</th> -->
									<th class='delete'></th>
								  </tr>
								  <tr>
									<td class='items'>
									  <div class='image'>
										<img src='{$row['img']}' alt='img'>
									  </div>
									  <h3>'{$row['name']}'</h3>
									   <p>{$row['description']}</p>
									</td>
									<td class='price'>{$row['price']}</td>
									<td class='quantity'> 	  $quant[$i]  </td>
									<td class='delete'><button type='submit' id='remove'  name='remove'>REMOVE</button></td>
								  </tr>
								  
								</table>
							  </form>";
							
							
							array_push($test, $row['price_id']);
							array_push($quantity, $quant[$i]);
							// $shipment = 8;
                            
								$subtotal = $subtotal + (int)$row['price'] * $quant[$i];
                                $salestax = .0775 * $subtotal;
								$total = $subtotal + $shipment + $salestax;
                               
								array_push($items, $row);
								
							}
						}
						$i++;
					  }
					}else{
						echo "CART IS EMPTY";
					}
					$json = json_encode($items);
					?>
                    </div>
                </div>

                <div class="total-count">
                    <h4>Subtotal: $<?php  
					if(isset($_SESSION['cart'])){
						echo "$subtotal";
					}
					
					else{
						echo "0";
					};
					?></h4>
                    <p>+shipment: $<?php 
					if(isset($_SESSION['cart'])){
						echo "$shipment";
					}
					else{
						echo "0";
					};?></p>
                    <p>+tax: $<?php 
					if(isset($_SESSION['cart'])){
						echo "$salestax";
					}
					else{
						echo "0";
					};?></p>
                    <h3>Total to pay: <strong>$<?php 
					if(isset($_SESSION['cart'])){
						echo "$total";
					}
					else{
						echo "0";
					};

					?></strong></h3>
                    <!-- send above data to backend -->
                    <form action="stripe.php" method="POST">
                        <input type="hidden" name="total" value="<?php echo $total ?>">
                        <?php foreach($test as $value) { ?>
                        <input type="hidden" name="order[]" value="<?php echo $value ?>">

                        <?php } ?>
                        <?php foreach($quantity as $value) { ?>
                        <input type="hidden" name="quantity[]" value="<?php echo $value ?>">

                        <?php } ?>

                        <!-- <?php foreach($items as $key => $value) { ?>
							<input type="hidden" name="name[]" value="<?php echo $value['name'] ?>">
						<?php } ?> -->

                        <button id="checkout" type="submit" class="btn-grey">Finalize and pay</button>
                    </form>
                </div>
            </div>
            <!-- / content -->
        </div>
        <!-- / container -->
    </div>
    <!-- / body -->

    <footer id="footer">
        <?php template_footer(); ?>
    </footer>
    <!-- / footer -->


    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script>
    window.jQuery || document.write("<script src='js/jquery-1.11.1.min.js'>\x3C/script>")
    </script>
    <script src="js/plugins.js"></script>
    <script src="js/main.js"></script>
    <script src="https://js.stripe.com/v3/"></script>
    <script type="text/javascript">
    var array = <?php echo $json; ?>;
    // console.log(array);
    </script>
</body>

</html>