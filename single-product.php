<?php require("functions/session_checker");?>
<!DOCTYPE html>
<html lang="en">
  <head>
	<?php require("parts/head-links");?>
	<title>RNA-MoZ | Shop</title>
  </head>
  <body>
   <?php include("parts/header");?>
    <div class="product-big-title-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-bit-title text-center">
                        <h2>Shop</h2>
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
						<?php if(isset($_GET['sel'])){
							$selpcode = $_GET['sel'];
							$selprod = mysqli_query($conn,"SELECT * FROM products WHERE product_code='$selpcode'");
							$seldata = mysqli_fetch_array($selprod);
						}?>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="product-images">
                                    <div class="product-main-img">
                                        <img src="products/<?php echo $seldata['product_code'];?>" alt="">
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-sm-6">
                                <div class="product-inner">
                                    <h2 class="product-name"><?php echo $seldata['product_name'];?></h2>
                                    <div class="product-inner-price">
                                        <ins>P<?php echo $seldata['product_price'];?>.00</ins>
                                    </div>
                                        <div class="quantity">
                                            <input type="number" size="4" class="input-text qty text" title="Qty" value="1" name="quantity" min="1" max="<?php echo $seldata['product_quantity'];?>" step="1"> of <?php echo $seldata['product_quantity'];?>
                                        </div>
                                        <a href="?add=<?php echo $seldata['product_code'];?>"<button class="add_to_cart_button" type="submit">Add to cart</button></a>
                                    
                                    <div class="product-inner-category">
                                        <p>Category: <a href=""><?php echo $seldata['product_brand'];?></a></p>
                                    </div> 
                                    
                                    <div role="tabpanel">
                                        <ul class="product-tab" role="tablist">
                                            <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Description</a></li>
                                            <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Reviews</a></li>
                                        </ul>
                                        <div class="tab-content">
                                            <div role="tabpanel" class="tab-pane fade in active" id="home">
                                                <h2>Product Description</h2>  
                                                <p><?php echo $seldata['product_description'];?></p>
											</div>
                                            <div role="tabpanel" class="tab-pane fade" id="profile">
                                                <h2>Reviews</h2>
                                                <div class="submit-review">
                                                    <p><label for="name">Name</label> <input name="name" type="text"></p>
                                                    <p><label for="email">Email</label> <input name="email" type="email"></p>
                                                    <div class="rating-chooser">
                                                        <p>Your rating</p>

                                                        <div class="rating-wrap-post">
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                        </div>
                                                    </div>
                                                    <p><label for="review">Your review</label> <textarea name="review" id="" cols="30" rows="10"></textarea></p>
                                                    <p><input type="submit" value="Submit"></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
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