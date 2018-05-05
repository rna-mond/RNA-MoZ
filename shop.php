<?php require("functions/session_checker");?>
<!DOCTYPE html>
<html lang="en">
  <head>
	<?php require("parts/head-links");?>
	<title>RNA-MoZ | Shop</title>
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
                        <h2>SHOP</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    
    <div class="single-product-area">
		<div class="col-md-12 col-sm-6" id="prod-nav">
			<form  id="search" action="" method="get" enctype="multipart/form-data">
				<span class="fa fa-search"></span>
				<input onfocus="this.select();" id="s-search" <?php if(isset($_GET['search'])){echo 'value="'.$_GET['search'].'"';}?> autocomplete="off" type="search" placeholder="Search Products" name="search" autofocus>
			</form>
		</div>
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
			<?php
				if(isset($_GET['search'])&&$_GET['search']!=""){
					$sprod = $_GET['search'];
					$opt = "WHERE product_name LIKE '%$sprod%' OR product_brand LIKE '%$sprod%'";
				}else{
					$opt = "";
				}
				if(isset($_GET['limit'])){
					$limit = $_GET['limit'];
				}else{
					$limit = "0,12";
				}
				$prod_query = "SELECT * FROM products $opt ORDER BY product_dateadded ASC LIMIT $limit";
				$run_pq = mysqli_query($conn,$prod_query);
				$prod_count = mysqli_num_rows($run_pq); 
				while($pdata = mysqli_fetch_array($run_pq)){
					$sqcode = $pdata['product_code'];
					$squantity = mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM temp_cart WHERE product_code='$sqcode'"));
					  $cquantity = $squantity['product_quantity'];
			?>
                <div class="col-md-3 col-sm-6">
				<?php date_default_timezone_set('Asia/Manila');
				if(substr($pdata['product_dateadded'],0,12)===date("M d, Y")){?>
					<div id="new-item"></div>
                <?php }?>
				   <div class="single-product" style="border: 1px solid green;">
						<div class="product-f-image" style="border: none;">
							<img src="products/<?php echo $sqcode;?>" alt="">
							<div class="product-hover">
								<a href="?add=<?php echo $sqcode;?>" class="add-to-cart-link"><i class="fa fa-shopping-cart"></i> Add to cart</a>
								<a href="single-product.php?sel=<?php echo $sqcode;?>" class="view-details-link"><i class="fa fa-link"></i> See details</a>
							</div>
						</div>
						<div class="product-carousel-price" style="background: rgba(0,150,0,0.8);padding: 5px 10px; border-top: 1px solid green;">
							<h2 style="margin: 0;"><a  style="color: white;" href="single-product.php?sel=<?php echo $sqcode;?>"><?php echo $pdata['product_name'];?></a></h2>
							<p style="color: rgba(0,0,0,1.0);margin: 0;"><?php echo $pdata['product_description'];?></p>
							<ins style="color: white;"><?php echo 'P'.$pdata['product_price'].'.00';?></ins><ins style="color: white; float: right;">QTY : <?php echo $pdata['product_quantity']-$pdata['product_sold'];?></ins>
						</div> 
					</div>
                </div>
				<?php }
				if($prod_count==0){?>
					<div class="col-md-12" style="margin:5px; text-align: center; background: orange;padding: 15px; color: white;">
						<h1 style="margin: 0 auto;"><span class="fa fa-search"></span> NO ITEMS TO SHOW</h1>
					</div>
			<?php }
				$tcount = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM products"));
				
				$ntcount = round($tcount / 12);
			 ?>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="product-pagination text-center">
                        <nav>
                          <ul class="pagination">
							<?php if($ntcount<=0){?>
                            <li><a href="?search=<?php echo $_GET['search'];?>&limit=0,12">1</a></li>
							<?php }else{
								$a=-12;$b=0;
								for($i=1; $i<=$ntcount; $i++){
							?>
                            <!--<li>
                              <a href="#" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                              </a>
                            </li>-->
                            <li><a href="?search=<?php $a += 12;$b +=12; 
										echo $_GET['search'];?>&limit=<?php echo $a.','.$b;?>"><?php echo $i;?></a></li>
                            <!--<li>
                              <a href="#" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                              </a>
                            </li>-->
							<?php }}?>
                          </ul>
                        </nav>                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include("parts/footer");?>
  </body>
</html>