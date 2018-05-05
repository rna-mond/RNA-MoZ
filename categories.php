<?php require("functions/session_checker");?>
<!DOCTYPE html>
<html lang="en">
  <head>
	<?php require("parts/head-links");?>
	<title>RNA-MoZ | Categories</title>
  </head>
  <body>
   <?php
	include("parts/header");
   ?>
    <div class="product-big-title-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-bit-title text-center">
                        <h2>CATEGORIES</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    
    <div class="single-product-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
			<?php
				$sel_brand1 = mysqli_query($conn,"SELECT DISTINCT(product_brand) FROM products");
				while($brand=mysqli_fetch_array($sel_brand1)){
			?>
                <div class="col-md-3 col-sm-6">
                    <div class="single-shop-product">
                        <div class="product-upper" style="border: 1px solid green;background: rgba(0,0,0,0.1);">
                            <img src="assets/img/brands/<?php echo $brand[0].'.png';?>" alt="">
                        </div>
                        <a href="shop.php?search=<?php echo $brand[0];?>" style="color: white;text-decoration: none;"><div class="product-carousel-price" style="background: green;padding: 5px 10px;">
							<h2><?php echo $brand[0];?></h2>
                        </div></a>
                    </div>
                </div>
			<?php }?>
            </div>
        </div>
    </div>
    <?php include("parts/footer");?>
  </body>
</html>