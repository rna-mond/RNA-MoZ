<!DOCTYPE html>
<html lang="en">
<head>
	<?php require("../parts/head-links");?>
	<title>RNA-MoZ | Login</title>
</head>
<body>
   <?php include("../parts/header");?>
		<!--/start-login-three-->
	<div class="login-03" style="margin-top: 5%;">
		<div style="width: 40%;" class="three-login  hvr-float-shadow">
			<div class="three-login-head">
					<img src="../assets/img/top-key.png" alt=""/>
					<h3>account reset</h3>
					<lable style="left: 47%;"></lable>
			</div>
			<form style="background: rgba(231,231,232,1); padding: 30px 4%; border-bottom: 4px solid orangered;">
				<h5>Forgot Password or Username?</h5>
				<p>To reset your account password or username, enter the
					email address and we will send your instruction.</p>
				<li style="background: none;">
					<input style="border: 1px solid orangered; border-right: 5px solid orangered;" type="text" class="text" placeholder="E-mail"><span class="myicon fa fa-envelope" style="height: 52px;width: 64.5px; background: orangered;"></span>
				</li>
				<div class="submit three">
					<input type="submit" value="RECOVER MY ACCOUNT" >
				</div>
			</form>
		</div>
	</div>
    <?php include("../parts/footer");?>
</body>
</html>