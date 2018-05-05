<?php require("functions/session_checker");?>
<!DOCTYPE html>
<html lang="en">
  <head>
	<?php require("parts/head-links");?>
	<title>RNA-MoZ | Online Mobile Shopping</title>
  </head>
  <body>
   <?php
	include("parts/header");
	include("parts/slider");
   ?>
    <?php require("functions/rna_con");require("functions/error_checker");?>
    <div class="promo-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <div class="single-promo promo1">
                        <i class="fa fa-refresh"></i>
                        <p>30 Days return</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="single-promo promo2">
                        <i class="fa fa-truck"></i>
                        <p>Low Shipping Price</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="single-promo promo3">
                        <i class="fa fa-lock"></i>
                        <p>Secure payments</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="single-promo promo4">
                        <i class="fa fa-gift"></i>
                        <p>New products</p>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End promo area -->
    
    <div class="maincontent-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="latest-product">
                        <h2 class="section-title">Latest Products</h2>
                        <div class="product-carousel">
							<?php
								$sel_latest = "SELECT * FROM products ORDER BY product_dateadded ASC LIMIT 10";
								$run_sel = mysqli_query($conn,$sel_latest);
								while($sel_data = mysqli_fetch_array($run_sel)){
							?>
                            <div class="single-product" style="border: 1px solid green;">
                                <div class="product-f-image" style="border: none;">
                                    <img src="products/<?php echo $sel_data['product_code'];?>" alt="">
                                    <div class="product-hover">
                                        <a href="?add=<?php echo $sel_data['product_code'];?>" class="add-to-cart-link"><i class="fa fa-shopping-cart"></i> Add to cart</a>
                                        <a href="single-product.php" class="view-details-link"><i class="fa fa-link"></i> See details</a>
                                    </div>
                                </div>
                                <div class="product-carousel-price" style="background: rgba(0,150,0,0.8);padding: 5px 10px; border-top: 1px solid green;">
									<h2 style="margin: 0;"><a  style="color: white;" href="single-product.html"><?php echo $sel_data['product_name'];?></a></h2>
									<p style="color: rgba(0,0,0,1.0);margin: 0;"><?php echo $sel_data['product_description'];?></p>
                                    <ins style="color: white;"><?php echo 'P'.$sel_data['product_price'].'.00';?></ins>
                                </div> 
                            </div>
								<?php }?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End main content area -->
    <div class="product-widget-area" style="background: rgba(255,255,255,1);border-top:2px solid green;">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="single-product-widget">
                        <h2 class="product-wid-title">5 Top Sellers</h2>
                        <a href="" class="wid-view-more">View All</a>
						<?php
							$sel_sold = "SELECT * FROM products ORDER BY product_sold ASC LIMIT 5";
							$run_sold = mysqli_query($conn,$sel_sold);
							$new_count = mysqli_num_rows($run_sold);
							while($sel_sdata = mysqli_fetch_array($run_sold)){
						?>
                        <div class="single-wid-product">
                            <a href="single-product.php?sel=<?php echo $sel_sdata['product_code'];?>"><img src="products/<?php echo $sel_sdata['product_code'];?>" alt="" class="product-thumb"></a>
                            <h2><a href="single-product.php?sel=<?php echo $sel_sdata['product_code'];?>"><?php echo $sel_sdata['product_name'];?></a></h2>
                            <div class="product-wid-rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <div class="product-wid-price">
                                <ins><?php echo 'P'.$sel_sdata['product_price'].'.00';?></ins>
                            </div>                            
                        </div>
							<?php }?>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="single-product-widget">
                        <h2 class="product-wid-title">Top 5 New</h2>
                        <a href="shop.php" class="wid-view-more">View All</a>
						<?php
							date_default_timezone_set('Asia/Manila');
							$dnow = date("M d, Y");
							$sel_newest = "SELECT * FROM products WHERE product_dateadded LIKE '%$dnow%' ORDER BY product_dateadded ASC LIMIT 5";
							$run_new = mysqli_query($conn,$sel_newest);
							$new_count = mysqli_num_rows($run_new);
							while($sel_ndata = mysqli_fetch_array($run_new)){
						?>
                        <div class="single-wid-product">
                            <a href="single-product.php?sel=<?php echo $sel_ndata['product_code'];?>"><img src="products/<?php echo $sel_ndata['product_code'];?>" alt="" class="product-thumb"></a>
                            <h2><a href="single-product.php?sel=<?php echo $sel_ndata['product_code'];?>"><?php echo $sel_ndata['product_name'];?></a></h2>
                            <div class="product-wid-rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <div class="product-wid-price">
                                <ins><?php echo 'P'.$sel_ndata['product_price'].'.00';?></ins>
                            </div>                            
                        </div>
						<?php }
							if($new_count==0){ ?>
							<div style="background: rgba(0,0,0,0.5); color: white; text-align: center;padding: 10px;"><h1 style="margin: 0 auto;">Sorry, No New Items To Show at the Moment.</h1></div>	
						<?php }?>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End product widget area -->
    <?php include("parts/footer");?>
  </body>
</html>