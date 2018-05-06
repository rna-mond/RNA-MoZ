<?php require("functions/session_checker");

	if(isset($_POST['checkout'])){
		$pcount = $_POST['pcount'];
		$myuid = $_SESSION['uid'];
		$country = $_POST['country'];
		$fname = $_POST['firstname'];
		$lname = $_POST['lastname'];
		$company = $_POST['company'];
		$address = $_POST['address'];
		$town = $_POST['town'];
		$province = $_POST['province'];
		$postcode = $_POST['postcode'];
		$email = $_POST['email'];
		$phone = $_POST['phone'];
		$payment_method = $_POST['payment_method'];
		$order_total = $_POST['order_total'];
		$ordered_products = "";
		for($r=1; $r<=$pcount; $r++){
			$ordered_products .= $_POST['ordered_products'.$r].';';
		}
		$ordered_products;
		
		date_default_timezone_set('Asia/Manila');
		$order_date = date("M d, Y h:i A");
		$datenow = date("M d, Y");
		
		if(empty($country) || empty($fname) || empty($lname) || empty($address) || empty($town) || empty($province) || empty($postcode) || empty($email) || empty($ordered_products)){
				setcookie("error","Some Field are empty. Please filled up all fields.",time()+30,"/");
				header("Location: ".$cpage);
		}else{
			$check_order = mysqli_query($conn,"SELECT * FROM users_order WHERE userid='$myuid' AND ordered_products='$ordered_products' AND date_ordered LIKE '%$datenow%'");
			$corder_count = mysqli_num_rows($check_order);
			if($corder_count==0){
				$insert_order = "INSERT INTO users_order(userid,country,firstname,lastname,company,address,town,province,postcode,email,mobilenumber,ordered_products,order_total,date_ordered,order_status) VALUES('$myuid','$country','$fname','$lname','$company','$address','$town','$province','$postcode','$email','$phone','$ordered_products','$order_total','$order_date','ON PROCESS')";
				if(mysqli_query($conn,$insert_order)){
					if(mysqli_query($conn,"TRUNCATE temp_cart")){
						for($e=1; $e<=$pcount; $e++){
							$prodcode = $_POST['products'.$e];
							$prodquant = $_POST['quantity'.$e];
							$sel_psold = mysqli_fetch_array(mysqli_query($conn,"SELECT product_sold FROM products WHERE product_code='$prodcode'"));
							$psold = $sel_prod[0];
							$new_psold = $prodquant + $psold;
							$up_sold = mysqli_query($conn,"UPDATE products SET product_sold=$new_psold WHERE product_code='$prodcode'");
							if($pcount==$e){
								setcookie("error","Your order is now on process. Expect your order in 5 days (estimated only). Kindly, please be patient.",time()+30,"/");
								header("Location: ".$cpage);
							}
						}
					}
				}else{
					setcookie("error","Unable to process your order at the moment. Please try again later.",time()+30,"/");
					header("Location: ".$cpage);
				}
			}else{
				setcookie("error","You have the same order at the same date. Please try again.",time()+30,"/");
				header("Location: ".$cpage);
			}
		}
	}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
	<?php require("parts/head-links");?>
	<title>RNA-MoZ | Online Mobile Shopping</title>
  </head>
  <body>
   <?php include("parts/header");?>
    <div class="product-big-title-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-bit-title text-center">
                        <h2>CHECKOUT YOUR ORDER</h2>
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
                            <form enctype="multipart/form-data" action="" class="checkout" method="POST" name="checkout">
                                <div id="customer_details" class="col-md-6">
                                    <div class="col-3">
                                        <div class="woocommerce-billing-fields">
                                            <h3>Billing Details</h3>
											<?php
												$suid = $_SESSION['uid'];
												$sel_udetails = mysqli_query($conn,"SELECT * FROM user_details WHERE userid='$suid'");
												$sdata = mysqli_fetch_array($sel_udetails);
											?>
                                            <p id="billing_country_field" class="form-row form-row-wide address-field update_totals_on_change validate-required woocommerce-validated">
                                                <label class="" for="billing_country">Country <abbr title="required" class="required">*</abbr>
                                                </label>
                                                <select class="country_to_state country_select" id="billing_country" name="country">
                                                    <option selected value="Philippines">Philippines</option>
                                                </select>
                                            </p>
                                            <p id="billing_first_name_field" class="form-row form-row-first validate-required">
                                                <label class="" for="billing_first_name">First Name <abbr title="required" class="required">*</abbr>
                                                </label>
                                                <input type="text" value="<?php echo $sdata['firstname'];?>" placeholder="" id="billing_first_name" name="firstname" class="input-text ">
                                            </p>

                                            <p id="billing_last_name_field" class="form-row form-row-last validate-required">
                                                <label class="" for="billing_last_name">Last Name <abbr title="required" class="required">*</abbr>
                                                </label>
                                                <input type="text" value="<?php echo $sdata['lastname'];?>" placeholder="" id="billing_last_name" name="lastname" class="input-text ">
                                            </p>
                                            <div class="clear"></div>
                                            <p id="billing_company_field" class="form-row form-row-wide">
                                                <label class="" for="billing_company">Company Name</label>
                                                <input type="text" autofocus value="" placeholder="" id="billing_company" name="company" class="input-text ">
                                            </p>

                                            <p id="billing_address_1_field" class="form-row form-row-wide address-field validate-required">
                                                <label class="" for="billing_address_1">Address <abbr title="required" class="required">*</abbr>
                                                </label>
                                                <input type="text" value="" placeholder="Street address" id="billing_address_1" name="address" class="input-text ">
                                            </p>

                                            <p id="billing_city_field" class="form-row form-row-wide address-field validate-required" data-o_class="form-row form-row-wide address-field validate-required">
                                                <label class="" for="billing_city">Town / City <abbr title="required" class="required">*</abbr>
                                                </label>
                                                <input type="text" placeholder="Town / City" id="billing_city" name="town" class="input-text ">
                                            </p>

                                            <p id="billing_state_field" class="form-row form-row-first address-field validate-state" data-o_class="form-row form-row-first address-field validate-state">
                                                <label class="" for="billing_state">Province</label>
                                                <input type="text" id="billing_state" name="province" placeholder="Province" value="" class="input-text ">
                                            </p>
                                            <p id="billing_postcode_field" class="form-row form-row-last address-field validate-required validate-postcode" data-o_class="form-row form-row-last address-field validate-required validate-postcode">
                                                <label class="" for="billing_postcode">Postcode <abbr title="required" class="required">*</abbr>
                                                </label>
                                                <input type="text" placeholder="Postcode / Zip" id="billing_postcode" name="postcode" class="input-text ">
                                            </p>

                                            <div class="clear"></div>

                                            <p id="billing_email_field" class="form-row form-row-first validate-required validate-email">
                                                <label class="" for="billing_email">Email Address <abbr title="required" class="required">*</abbr>
                                                </label>
                                                <input type="text" value="<?php echo $sdata['email'];?>" placeholder="" id="billing_email" name="email" class="input-text ">
                                            </p>

                                            <p id="billing_phone_field" class="form-row form-row-last validate-required validate-phone">
                                                <label class="" for="billing_phone">Phone <abbr title="required" class="required">*</abbr>
                                                </label>
                                                <input type="text" value="<?php echo $sdata['mobilenumber'];?>" placeholder="Mobile Phone" id="billing_phone" name="phone" class="input-text ">
                                            </p>
                                            <div class="clear"></div>
                                        </div>
                                    </div>
                                </div>
							<div class="col-md-6">
                                <h3 id="order_review_heading">Your order</h3>

                                <div id="order_review" style="position: relative;">
                                    <table class="shop_table">
                                        <thead>
                                            <tr style="color: white;">
                                                <th style="background: rgba(0,0,0,0.8);" class="product-name">Product</th>
                                                <th style="background: rgba(0,0,0,0.8);" class="product-total">Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
										<?php 
										$cart_items = "SELECT * FROM temp_cart";
											$run_items = mysqli_query($conn,$cart_items);
											$ccount = mysqli_num_rows($run_items);
											global $tbalance,$tquantity;$x=0;
											$myorder = array();
											while($items=mysqli_fetch_array($run_items)){
												$ipcode = $items['product_code'];
												$sel_prod=mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM products WHERE product_code='$ipcode'"));
												$tquantity += $items['product_quantity'];
												$tbalance += $items['product_price'];
												$x++;
											?>
                                            <tr class="cart_item">
                                                <td class="product-name" style="text-align:left;">
                                                    <table style="width: 100%; margin: -15px;">
														<tr style="border: none;">
															<td style="border: none;text-align: left;min-width:200px;"><?php echo $sel_prod['product_name'];?></td>
															<strong class="product-quantity">
																<td style="border: none;"> × </td>
																<td style="border: none;"><?php echo $items['product_quantity']?></td>
														</tr>
													</table></strong>
												</td>
                                                <td class="product-total">
                                                    <span class="amount">P<?php echo $items['product_price'];?>.00</span> </td>
													<input type="hidden" name="ordered_products<?php echo $x;?>" value="<?php echo $myorder[$x] = $sel_prod['product_name'].' x '.$items['product_quantity'];?>">
													<input type="hidden" name="products<?php echo $x;?>" value="<?php echo $myorder[$x] = $sel_prod['product_code'];?>">
													<input type="hidden" name="quantity<?php echo $x;?>" value="<?php echo $myorder[$x] = $items['product_quantity'];?>">
                                            </tr>
											<?php }?>
                                        </tbody>
                                        <tfoot>

                                            <tr class="cart-subtotal">
                                                <th style="background: rgba(0,0,0,0.2);">Cart Subtotal</th>
                                                <td style="background: rgba(0,0,0,0.2);"><span class="amount">P<?php echo $tbalance;?>.00</span>
                                                </td>
                                            </tr>

                                            <tr class="shipping">
                                                <th style="background: rgba(0,0,0,0.2);">Shipping and Handling</th>
                                                <td style="background: rgba(0,0,0,0.2);">
                                                    ON DELIVERY
                                                </td>
                                            </tr>
                                            <tr class="order-total" style="color: white;">
                                                <th style="background: rgba(0,0,0,0.5);">Order Total</th>
                                                <td style="background: rgba(0,0,0,0.5);"><strong>P<span class="amount"><?php echo $tbalance;?></span>.00</strong> </td>
                                            </tr>

                                        </tfoot>
                                    </table>
                                    <div id="payment">
                                        <ul class="payment_methods methods">
                                            <li class="payment_method_bacs">
                                                <input type="radio" data-order_button_text="" checked="checked" value="ON DELIVERY" name="payment_method" class="input-radio" id="payment_method_bacs">
												<input type="hidden" name="pcount" value="<?php echo $x;?>">
												<input type="hidden" name="order_total" value="<?php echo $tbalance;?>">
                                                <label for="payment_method_bacs">Direct On Delivery</label>
                                                <div class="payment_box payment_method_bacs">
                                                    <p>
														We will receive your payment when we delivered your order.
														Please make sure you are in your house in the delivery date.
														Please make sure that your billing details are all Correct.
														If we get an issue on delivery, we will directly goes to the police station to report our issues.
													</p>
                                                </div>
                                            </li>
                                        </ul>

                                        <div class="form-row place-order">
                                            <center><button type="submit" name="checkout" class="btn-yes" style="width: 50%;"><span class="fa fa-money"></span> CHECKOUT NOW </button></center>
                                        </div>
                                        <div class="clear"></div>
                                    </div>
                                </div>
                            </div>
                            </form>

                        </div>                       
                    </div>                    
                </div>
            </div>
        </div>
    </div>
    <?php include("parts/footer");?>
  </body>
</html>