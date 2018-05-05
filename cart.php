<?php require("functions/session_checker");
if(isset($_GET['del'])&&!empty($_GET['del'])){
	$dpcode = $_GET['del'];
	if(mysqli_query($conn,"DELETE FROM temp_cart WHERE product_code='$dpcode'")){
		header("Location: ".$cpage);
	}
}
if(isset($_GET['empty-cart'])){
	if(mysqli_query($conn,"TRUNCATE temp_cart")){
		header("Location: ".$cpage);
	}
}
if(isset($_POST['update-cart'])&&$_POST['update-cart']!=0){
	$upcount = $_POST['update-cart'];
	for($o=1; $o<=$upcount; $o++){
		$cart_prod = $_POST['cart_prod'.$o];
		$cart_qty = $_POST['qty'.$o];
		$prod_price = $_POST['prod_price'.$o] * $cart_qty;
		
		if(mysqli_query($conn,"UPDATE temp_cart SET product_quantity=$cart_qty,product_price=$prod_price WHERE product_code='$cart_prod'")){
			header("Location: ".$cpage);
		}
	}
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
	<?php require("parts/head-links");?>
	<title>RNA-MoZ | Cart</title>
  </head>
  <body>
   <?php include("parts/header");?>
    <div class="product-big-title-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-bit-title text-center">
                        <h2>MY CART</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="single-product-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-content-right">
                        <div class="woocommerce">
                                <table cellspacing="0" class="shop_table cart">
                                    <thead>
                                        <tr">
                                            <th style="background: rgba(0,0,0,0.8); color: white; class="product-remove">&nbsp;</th>
                                            <th style="background: rgba(0,0,0,0.8); color: white; class="product-thumbnail">&nbsp;</th>
                                            <th style="background: rgba(0,0,0,0.8); color: white; class="product-name">Product</th>
                                            <th style="background: rgba(0,0,0,0.8); color: white; class="product-price">Price</th>
                                            <th style="background: rgba(0,0,0,0.8); color: white; class="product-quantity">Quantity</th>
                                            <th style="background: rgba(0,0,0,0.8); color: white; class="product-subtotal">Total</th>
                                        </tr>
                                    </thead>
							<form action="cart.php" method="POST">
                                    <tbody>
										<?php
											$cart_items = "SELECT * FROM temp_cart";
											$run_items = mysqli_query($conn,$cart_items);
											$ccount = mysqli_num_rows($run_items);
											global $tbalance,$tquantity;$x=0;
											while($items=mysqli_fetch_array($run_items)){
												$ipcode = $items['product_code'];
												$sel_prod=mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM products WHERE product_code='$ipcode'"));
												$tquantity += $items['product_quantity'];
												$tbalance += $items['product_price'];
												$x++; 
										?>
                                        <tr class="cart_item">
											<input type="hidden" name="cart_prod<?php echo $x;?>" value="<?php echo $ipcode;?>">
											<input type="hidden" name="prod_price<?php echo $x;?>" value="<?php echo $sel_prod['product_price'];?>">
                                            <td class="product-remove">
                                                <a title="Remove this item" class="fa fa-trash" href="?del=<?php echo $ipcode;?>"></a> 
                                            </td>
                                            <td class="product-thumbnail">
                                                <a href="single-product.php?sel=<?php echo $ipcode;?>"><img width="145" height="145" alt="" class="shop_thumbnail" src="products/<?php echo $ipcode;?>"></a>
                                            </td>
                                            <td class="product-name">
                                                <a href="single-product.php?sel=<?php echo $ipcode;?>"><?php echo $sel_prod['product_name'];?></a> 
                                            </td>
                                            <td class="product-price">
                                                <span class="amount"><?php echo 'P'.$sel_prod['product_price'].'.00'?></span> 
                                            </td>
                                            <td class="product-quantity">
                                                <div class="quantity buttons_added">
                                                    <input name="qty<?php echo $x;?>" type="number" size="4" class="input-text qty text" title="Qty" value="<?php echo $items['product_quantity'];?>" min="1" step="1">
                                                </div>
                                            </td>
                                            <td class="product-subtotal">
                                                <span class="amount"><?php echo 'P'.$items['product_price'].'.00';?></span> 
                                            </td>
                                        </tr>
											<?php } if($ccount==0){?>
												<tr>
													<td colspan="6" align="center" style="background: orange;color: white;font-size: 20px;"><span class="fa fa-shopping-cart"></span> CART IS EMPTY</td>
												</tr>
											<?php }?>
										<tr style="background: rgba(0,0,0,0.8); color: white;">
											<td colspan="4"><b>TOTAL</b></td>
											<td><b><?php if($tquantity!=0){echo $tquantity;}else{echo '0';}?></b></td>
											<td><b>P<?php if($tbalance!=0){echo $tbalance;}else{echo '0';}?>.00</b></td>
										</tr>
                                        <tr>
                                            <td class="actions" colspan="6">
                                                <button name="update-cart" value="<?php echo $x;?>" style="float: right;background: green;padding: 10px 15px;color: white;font-size: 20px;border: none;"><span class="fa fa-refresh"></span> UPDATE CART</button>
                                </form>
												<a href="?empty-cart"><button style="float: left; background: green;padding: 10px 15px;color: white;font-size: 20px;border: none;"><span class="fa fa-trash"></span> EMPTY CART</button></a>
                                                <a href="checkout.php"><button style="float: right;margin-right: 10px;  background: green;padding: 10px 15px;color: white;font-size: 20px;border: none;"><span class="fa fa-money"></span> CHECKOUT</button></a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>                        
                    </div>                    
                </div>
            </div>
        </div>
    </div>
    <?php include("parts/footer");?>
  </body>
</html>