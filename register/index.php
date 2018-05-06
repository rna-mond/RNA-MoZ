<?php require("../functions/session_checker");?>
<!DOCTYPE html>
<html lang="en">
<head>
	<?php require("../parts/head-links"); require("../functions/error_checker");?>
	<title>RNA-MoZ | Registration</title>
</head>
<body>
   <?php include("../parts/header");?>
	<!--/start-login-one-->
	<div class="login-01" id="form">
		<div class="two-login  hvr-float-shadow">
			<div class="one-login-head">
					<img src="../assets/img/top-note.png" alt=""/>
					<h1>CREATE ACCESS TO RNA - MoZ</h1>
					<span></span>
			</div>
			<?php if((isset($_COOKIE['error']) && $_COOKIE['error']!='SUCCESS')|| !isset($_COOKIE['error']) && !isset($_GET['confirm'])){ ?>
			<form action="register.php" method="POST">
				<?php if(isset($_COOKIE['error'])&&$_COOKIE["error"]!="ERROR"){echo '<div id="error1" style="padding: 10px; font-size: 15px;">'.$_COOKIE['error'].'</div>';}?>
				<li class="col-3-in">
					<input style="text-transform:capitalize;" <?php if(isset($_COOKIE['ef'])){echo'autofocus';}?>  name="firstname" type="text" value="<?php echo $efirstname;?>" placeholder="Firstname" ><span class="myicon fa fa-pencil"></span>
					<?php if(isset($_COOKIE['ef'])){echo '<div id="error2">'.$_COOKIE['ef'].'</div>';}?>
				</li>
				<li class="col-3-in">
					<input style="text-transform:capitalize;" <?php if(isset($_COOKIE['em'])){echo'autofocus';}?>  name="middlename" type="text" value="<?php echo $emiddlename;?>" placeholder="Middlename" ><span class="myicon fa fa-pencil"></span>
					<?php if(isset($_COOKIE['em'])){echo '<div id="error2">'.$_COOKIE['em'].'</div>';}?>
				</li>
				<li class="col-3-in">
					<input style="text-transform:capitalize;" <?php if(isset($_COOKIE['el'])){echo'autofocus';}?>  name="lastname" type="text" value="<?php echo $elastname;?>" placeholder="Lastname" ><span class="myicon fa fa-pencil"></span>
					<?php if(isset($_COOKIE['el'])){echo '<div id="error2">'.$_COOKIE['el'].'</div>';}?>
				</li>
				<li class="col-1-in">
					<input <?php if(isset($_COOKIE['eu'])||isset($_COOKIE['euin'])){echo'autofocus';}?>  name="username" type="text" value="<?php echo $eusername;?>" placeholder="Username" ><span class="myicon fa fa-user"></span>
					<?php if(isset($_COOKIE['eu'])){echo '<div id="error1">'.$_COOKIE['eu'].'</div>';}?>
					<?php if(isset($_COOKIE['euin'])){echo '<div id="error1">'.$_COOKIE['euin'].'</div>';}?>
				</li>
				<div>
					<li class="col-2-in">
						<input pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" <?php if(isset($_COOKIE['ep'])){echo'autofocus';}?> name="mypassword" type="password" value="<?php echo $epassword;?>" placeholder="Password"><span class="myicon fa fa-lock"></span>
					</li>
					<li class="col-2-in c2i">
						<input pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" name="confirm" value="<?php echo $econ;?>" class="spl1" type="password" value="" placeholder="Confirm Password"><span class=" spl myicon fa fa-lock"></span>
					</li>
					<?php if(isset($_COOKIE['ep'])){echo '<div id="error3">'.$_COOKIE['ep'].'</div>';}?>
				</div>
				<li class="col-1-in">
					<input pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" <?php if(isset($_COOKIE['ee'])||isset($_COOKIE['eein'])){echo'autofocus';}?>  name="email" type="email" value="<?php echo $eemail;?>" placeholder="E-mail"><span class="myicon fa fa-envelope"></span>
					<?php if(isset($_COOKIE['ee'])){echo '<div id="error1">'.$_COOKIE['ee'].'</div>';}?>
					<?php if(isset($_COOKIE['eein'])){echo '<div id="error1">'.$_COOKIE['eein'].'</div>';}?>
				</li>
				<li class="col-1-in">
					<input pattern="^(?:0|\(?\+63\)) \d{3} \d{3} \d{4}$" title="Pattern is (+63) 9xx xxx xxxx" <?php if(isset($_COOKIE['emob'])){echo'autofocus';}?>  name="mobile" type="text" value="<?php if($emobile!=""){echo $emobile;}else{echo '(+63) ';}?>" placeholder="Mobile Number"><span class="myicon fa fa-phone"></span>
					<?php if(isset($_COOKIE['emob'])){echo '<div id="error1">'.$_COOKIE['emob'].'</div>';}?>
				</li>
				<li class="col-1-in">
					<input style="text-transform:capitalize;" <?php if(isset($_COOKIE['eadd'])){echo'autofocus';}?>  name="address" type="text" value="<?php echo $eaddress;?>" placeholder="Address"><span class="myicon fa fa-home"></span>
					<?php if(isset($_COOKIE['eadd'])){echo '<div id="error1">'.$_COOKIE['eadd'].'</div>';}?>
				</li>
				<div class="p-container">
					<label class="checkbox one"><input  name="agree" type="checkbox" name="checkbox" checked>I agree to the <a href="#">Terms and Condition of Service</a></label>
				</div>
				<div class="submit one">
						<input name="register" type="submit" value="SIGN UP" >
				</div>
					<h5>Already a member ?<a href="../login/#form"> Login Here</a></h5>
			</form>
			<?php }elseif(isset($_COOKIE['error'])&& $_COOKIE['error']=="SUCCESS"){?>
				<div id="form">
					<h1 class="msg">Your acount has been successfully created. Click the button below to confirm your Account.</h1>
					<a href="http://<?php if(isset($_COOKIE['emailhost'])){echo $_COOKIE['emailhost'];}?>" target="_blank"><button class="confirm-btn">CONFIRM</button></a>
				</div>
			<?php }elseif(isset($_GET['confirm'])){
					$cuid = substr($_GET['confirm'],0,strrpos($_GET['confirm'],"-"));
					$ccode = $_GET['confirm'];
					require_once("../functions/rna_con");
					if(mysqli_num_rows(mysqli_query($conn,"SELECT userid FROM users WHERE account_status='$ccode' AND userid='$cuid'"))>=1){
						if(mysqli_query($conn,"UPDATE users SET account_status='CONFIRMED' WHERE userid='$cuid'")){
							$cnfrmd = "Your account has been successfully Activated. You can access it now, click the button below to Login.";
							$cerror = 0;
						}else{
							$cnfrmd = "Sorry for inconvenience. Error to activate your account at the moment. Please try again tomorrow.";
							$cerror = 1;
						}
					}else{
						$cnfrmd = "Your confirmation code is Invalid. Please SignUp now by clicking the button below and get the valid Confirmation Code.";
						$cerror = 2;
					}
			?>
				<div id="form">
					<h1 class="msg"><?php echo $cnfrmd;?></h1>
					<a href="<?php if($cerror==0){echo '../login/';}elseif($cerror==1){echo '';}elseif($cerror==2){echo '../register/';}?>">
						<button class="confirm-btn"><?php if($cerror==0){echo 'LOGIN NOW';}elseif($cerror==1){echo '';}elseif($cerror==2){echo 'REGISTER NOW';}?></button>
					</a>
				</div>
			<?php }?>
		</div>
	</div>
    <?php include("../parts/footer");?>
</body>
</html>