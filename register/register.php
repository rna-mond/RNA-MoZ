<?php
	if(isset($_POST['register'])){
		require("../functions/rna_con");
		$firstname = $_POST['firstname'];
		$middlename = $_POST['middlename'];
		$lastname = $_POST['lastname'];
		$username = $_POST['username'];
		$mypassword = $_POST['mypassword'];
		$confirm = $_POST['confirm'];
		$email = $_POST['email'];
		$mobile = $_POST['mobile'];
		$address = $_POST['address'];
		$userid = md5($_POST['username']);
		$atype = "USER";
		$subject = "CONFIRM YOUR ACCOUNT";
		$code = $userid.'-'.md5(date("YdM"));
		$message = '<html style="margin: 0 auto; font-family: Century Gothic;">
				<body style="margin: 0 auto;">
					<div style="width: 100%; background: green; height: 50px;padding: 10px;">
						<img src="http://rnadaone.x10host.com/RNA%20-%20MoZ/assets/img/logo.png" height="50px" width="150px"/>
					</div>
					<div style="width: 100%;text-align: center;">
						<h1 style=" width: 95%;margin: 0 auto; font-size: 15px; text-align: justify;">Hello '.$firstname.',</h1>
					</div>
							
					<div style="width: 100%;background: lightgrey;padding: 50px 20px;">
						<hr style="width: 75%;">
						<h1 style="width: 65%;margin: 0 auto; font-size: 15px; text-align: justify;">
						</br>&nbsp;&nbsp;&nbsp;Please Click the Button or directly click the link below to Confirm your Account.
						 And Kindly please don\'t reply to this message.</h1>
						<hr  style="width: 75%;">
					</div>
					</br><center><div style="witdh:100%;">
						<a href="http://rnadaone.x10host.com/RNA%20-%20MoZ/register/?confirm='.$code.'">
							<button style="width: 30%;background: orangered; padding: 2% 5%;font-size:
								100%;border-radius: 10px;border: none; color: white;">CONFIRM</button>
						</a>
					</div>
					<div style="width:100%;">
						<hr style="width: 40%;display: inline-block;border: 1px solid green;">
						<h1 style="display: inline-block;padding: 10px; border-radius: 100%; background: lightgreen; color: green;
						 font-size: 15px;border: 2px solid green;">OR</h1>
						<hr style="border: 1px solid green;width: 40%;display: inline-block;">
					</div>
					<div style="width: 100%;">
						<a href="http://rnadaone.x10host.com/RNA%20-%20MoZ/register/?confirm='.$code.'">
						http://rnadaone.x10host.com/RNA%20-%20MoZ/register/?confirm='.$code.'</a>
					</div></center>
					<div style="width: 100%;">
						<hr>
						<h1 style="width: 95%;margin: 0 auto; font-size: 15px; text-align: justify;">Sencerely Yours,</br>ADMIN</h1>
					</div>
					<div style="width: 100%; background: green; height: 50px;padding: 10px;">
						<p style="text-align: center;color: white;">&copy; RNA - Mobile Zone | '.date("Y").'. All Rights Reserved.</p>
					</div>
				</body>
			</html>';
		// Always set content-type when sending HTML email
                $headers = "MIME-Version: 1.0" . "\r\n";
                $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

                // More headers
                $headers .= 'From: <admin@rnadaone.x10host.com>' . "\r\n";
                $headers .= 'Cc: adminraymond@rnadaone.x10host.com' . "\r\n";
		$error = 11;
		
		date_default_timezone_set('Asia/Manila');
		$reg_date = date("M d, Y h:i A");
		
		if(empty($firstname)){
			setcookie("ef","Firstname could not be empty.",time()+120,"/");
			$error-=1;
		}else{
			setcookie("ef","",time()-120,"/");
			setcookie("fname",$firstname,time()+120,"/");
		}
		if(empty($middlename)){
			setcookie("em","Middlename could not be empty.",time()+120,"/");
			$error-=1;
		}else{
			setcookie("em","",time()-120,"/");
			setcookie("mname",$middlename,time()+120,"/");
		}
		if(empty($lastname)){
			setcookie("el","Lastname could not be empty.",time()+120,"/");
			$error-=1;
		}else{
			setcookie("el","",time()-120,"/");
			setcookie("lname",$lastname,time()+120,"/");
		}
		if(empty($username)){
			setcookie("eu","Username could not be empty.",time()+120,"/");
			$error-=1;
		}else{
			setcookie("eu","",time()-120,"/");
			setcookie("uname",$username,time()+120,"/");
		}
		if(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM users WHERE username='$username'"))>=1){
			setcookie("euin","Username Already in use.",time()+120,"/");
			$error-=1;
		}else{
			setcookie("euin","",time()-120,"/");
			setcookie("uname",$username,time()+120,"/");
		}
		if($mypassword!=$confirm || empty($mypassword)){
			setcookie("ep","Password and Confirm Password did not match.",time()+120,"/");
			$error-=1;
		}else{
			setcookie("ep","",time()-120,"/");
			if(!($mypassword!=$confirm)&&!empty($mypassword)&&!empty($confirm)){
				setcookie("cpword",$confirm,time()+120,"/");
				setcookie("mpword",$mypassword,time()+120,"/");
			}
		}
		if(empty($email)){
			setcookie("ee","Email could not be empty.",time()+120,"/");
			$error-=1;
		}else{
			setcookie("ee","",time()-120,"/");
			setcookie("email",$email,time()+120,"/");
		}
		if(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM user_details WHERE email='$email'"))>=1){
			setcookie("eein","Email already in use.",time()+120,"/");
			$error-=1;
		}else{
			setcookie("eein","",time()-120,"/");
			setcookie("email",$email,time()+120,"/");
		}
		if(empty($mobile)){
			setcookie("emob","Mobile could not be empty.",time()+120,"/");
			$error-=1;
		}else{
			setcookie("emob","",time()-120,"/");
			setcookie("mob",$mobile,time()+120,"/");
		}
		if(empty($address)){
			setcookie("eadd","Address could not be empty.",time()+120,"/");
			$error-=1;
		}else{
			setcookie("eadd","",time()-120,"/");
			setcookie("add",$address,time()+120,"/");
		}
		if($error>=1 && $error<=10){
			setcookie("error","ERROR",time()+120,"/");
			header("Location: ../register/");
		}elseif($error==11){
			$insert_user = "INSERT INTO users(userid,username,password,account_type,account_status) VALUES('$userid','$username','$mypassword','$atype','$code');";
			$insert_details = "INSERT INTO user_details(userid,firstname,middlename,lastname,email,mobilenumber,address,date_registered) VALUES('$userid','$firstname','$middlename','$lastname','$email','$mobile','$address','$reg_date');";
			if(mysqli_query($conn,$insert_user) && mysqli_query($conn,$insert_details)){
				if(mail($email,$subject,$message,$headers)){
					setcookie("error","SUCCESS",time()+120,"/");
					setcookie("emailhost",substr($email,strrpos($email,"@")+1),time()+120,"/");
					header("Location: ../register/");
				}else{
					setcookie("error","ERROR",time()+120,"/");
					header("Location: ../register/");
				}
			}else{
				setcookie("error","ERROR",time()+120,"/");
				header("Location: ../register/");
			}
		}
	}
?>