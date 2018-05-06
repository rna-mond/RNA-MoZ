<?php require("../functions/session_checker");?>
<!DOCTYPE html>
<html lang="en">
<head>
	<?php require("../parts/head-links"); require("../functions/error_checker");?>
	<title>RNA-MoZ | Login</title>
</head>
<body>
   <?php include("../parts/header");?>
<!--/start-login-one-->
	<div class="login-01" id="form">
		<div class="one-login  hvr-float-shadow">
			<div class="one-login-head">
					<img src="../assets/img/top-lock.png" alt=""/>
					<h1>ACCESS MY ACCOUNT</h1>
					<span></span>
			</div>
			<form action="login.php" method="POST">
				<?php if(isset($_COOKIE['log'])&&$_COOKIE['log']!='ERROR'){echo '<div id="error">'.$_COOKIE['log'].'</div>';}?>
				<li class="col-1-in1">
					<input <?php if((isset($_COOKIE['u']) && $_COOKIE['u']!="")||(isset($_COOKIE['user']) && $_COOKIE['user']=='')||(isset($_COOKIE['log'])&& $_COOKIE['log']!='ERROR')||!isset($_COOKIE['log'])){echo 'autofocus';}?> name="username" value="<?php echo $euname;?>" type="text" placeholder="Username">
					<span class="myicon fa fa-user"></span>
					<?php if(isset($_COOKIE['u'])){echo '<div id="error">'.$_COOKIE['u'].'</div>';}?>
				</li>
				<li class="col-1-in1">
					<input <?php if(isset($_COOKIE['p']) && $_COOKIE['p']!=""){echo 'autofocus';}?> name="password" type="password" placeholder="Password"><span class="myicon fa fa-lock"></span>
					<?php if(isset($_COOKIE['p'])){echo '<div id="error">'.$_COOKIE['p'].'</div>';}?>
				</li>
				<div class="p-container">
					<label class="checkbox one"><input type="checkbox" name="checkbox" checked>Remember Me</label>
						<h6><a href="recover.php">Forgot Password ?</a> </h6>
							<div class="clear"> </div>
				</div>
				<div class="submit">
						<input name="login" type="submit" value="LOGIN">
				</div>
					<h5>Don't have an account ?<a href="../register/#form"><b> Sign Up </b></a></h5>
			</form>
		</div>
	</div>
    <?php include("../parts/footer");?>
</body>
</html>