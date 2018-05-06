<?php
	if(isset($_POST['login'])){
		require("../functions/rna_con");
		$username = $_POST['username'];
		$upassword = $_POST['password'];
		$error = 5;
		$emsg = "ERROR";
		if(empty($username)){
			setcookie("u","Username could not be empty.",time()+120,"/");
			$error-=1;
		}else{
			setcookie("u","",time()-120,"/");
			setcookie("user",$username,time()+120,"/");
		}
		if(empty($upassword)){
			setcookie("p","Password could not be empty.",time()+120,"/");
			$error-=1;
		}else{
			setcookie("p","",time()-120,"/");
		}
		$check_uname = "SELECT userid,username,password,account_type FROM users WHERE username='$username' AND account_status='CONFIRMED'";
		$run_check = mysqli_query($conn,$check_uname);
		if(mysqli_num_rows($run_check)>=1){
			$check_data = mysqli_fetch_array($run_check);
				$cuserid = $check_data['userid'];
				$cuname = $check_data['username'];
				$cpass = $check_data['password'];
				$cacct_type = $check_data['account_type'];
			if($username!=$cuname){
				setcookie("u","Username is incorrect or doesn't exists.",time()+120,"/");
				$error-=1;
			}else{
				setcookie("u","",time()-120,"/");
				setcookie("user",$username,time()+120,"/");
			}
			if($upassword!=$cpass && !empty($upassword)){
				setcookie("p","Username and Password did not match.",time()+120,"/");
				$error-=1;
			}else{
				setcookie("iu","",time()-120,"/");
				setcookie("user",$username,time()+120,"/");
			}/**/
		}else{
			if(!empty($username)&&(!empty($upassword))){
				$emsg = "User doesn't exists. Or not Activated yet.";
			}
			$error-=1;
		}
		if($error>=1 && $error<=4){
				setcookie("log",$emsg,time()+120,"/");
				header("Location: ../login/");
		}elseif($error==5){
			session_start();
			date_default_timezone_set('Asia/Manila');
			$ctime = date("h:i A");
			$cdate = date("M d, Y");
			if($cacct_type=="USER"){
				$_SESSION['uid'] = $cuserid;
				$_SESSION['atype']= $cacct_type;
				if(mysqli_query($conn,"INSERT INTO users_logs(username,log_date,log_time,log_status) VALUES('$cuname','$cdate','$ctime','Login')")){
					header("Location: ../");
				}
			}else{
				$_SESSION['uid'] = $cuserid;
				$_SESSION['atype']= $cacct_type;
				if(mysqli_query($conn,"INSERT INTO users_logs(username,log_date,log_time,log_status) VALUES('$cuname','$cdate','$ctime','Admin - Login')")){
					header("Location: ../admin/");
				}
			}
		}
	}
?>