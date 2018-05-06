<?php
include("../../functions/rna_con");
if(isset($_POST['save'])){
	$pcode=$_POST['productcode'];
	$pname=$_POST['productname'];
	$pprice=$_POST['productprice'];
	$pbrand=$_POST['productbrand'];
	$pdesc=$_POST['productdescription'];
	$pquantity=$_POST['productquantity'];
	date_default_timezone_set('Asia/Manila');
	$padded=date("M d, Y H:i A");
	
	if ($pcode=="" || $pname=="" || $pprice=="" || $pbrand=="" || $pquantity==""){
		setcookie("error","Some fields are empty.",time()+120,"/");
		if(!empty($pcode)){setcookie("code",$pcode,time()+120,"/");}
		if(!empty($pname)){setcookie("name",$pname,time()+120,"/");}
		if(!empty($pprice)){setcookie("price",$pprice,time()+120,"/");}
		if(!empty($pbrand)){setcookie("brand",$pbrand,time()+120,"/");}
		if(!empty($pdesc)){setcookie("desc",$pdesc,time()+120,"/");}
		if(!empty($pquantity)){setcookie("quantity",$pquantity,time()+120,"/");}
		header('Location: ../product.php?add-new');
	}else{
		if ((($_FILES["file"]["type"] == "image/png")|| ($_FILES["file"]["type"] == "image/jpg")
			|| ($_FILES["file"]["type"] == "image/jpeg")|| ($_FILES["file"]["type"] == "image/gif")
			)&& ($_FILES["file"]["size"] < 10000000)){
			if ($_FILES["file"]["error"] > 0){
				echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
			}else{
				$_FILES["file"]["name"]=$pcode;
				$snum = $pcode;
				if (file_exists("../../products/" . $_FILES["file"]["name"])){
					setcookie("error","$snum are already exists!",time()+120,"/");
					if(!empty($pcode)){setcookie("code",$pcode,time()+120,"/");}
					if(!empty($pname)){setcookie("name",$pname,time()+120,"/");}
					if(!empty($pprice)){setcookie("price",$pprice,time()+120,"/");}
					if(!empty($pbrand)){setcookie("brand",$pbrand,time()+120,"/");}
					if(!empty($pdesc)){setcookie("desc",$pdesc,time()+120,"/");}
					if(!empty($pquantity)){setcookie("quantity",$pquantity,time()+120,"/");}
					header('Location: ../product.php?add-new');
				}else{
					$ppic = $snum;
					echo $upload_avatar="INSERT INTO products(product_code,product_name,product_price,product_brand,product_description,product_quantity,product_dateadded)
									VALUES ('$pcode','$pname','$pprice','$pbrand','$pdesc','$pquantity','$padded')";
					$run=mysqli_query($conn,$upload_avatar);
					if($run){
						move_uploaded_file($_FILES["file"]["tmp_name"],"../../products/" .$ppic);
						setcookie("success","New Product has been successfully Added!",time()+60,"/");
						header('Location: ../product.php?add-new');
					}
				}
			}
		}else{
			setcookie("error","Failed to add new Product. Please try Again!",time()+120,"/");
			if(!empty($pcode)){setcookie("code",$pcode,time()+120,"/");}
			if(!empty($pname)){setcookie("name",$pname,time()+120,"/");}
			if(!empty($pprice)){setcookie("price",$pprice,time()+120,"/");}
			if(!empty($pbrand)){setcookie("brand",$pbrand,time()+120,"/");}
			if(!empty($pdesc)){setcookie("desc",$pdesc,time()+120,"/");}
			if(!empty($pquantity)){setcookie("quantity",$pquantity,time()+120,"/");}
			header('Location: ../product.php?add-new');
		}
	}
}
?>