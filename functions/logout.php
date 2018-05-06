<?php
	session_start();
	if(isset($_SESSION['uid']) && isset($_SESSION['atype'])){
		include("rna_con");
		$uid = $_SESSION['uid'];
		$udata = mysqli_fetch_array(mysqli_query($conn,"SELECT username FROM users WHERE userid='$uid'"));
		date_default_timezone_set('Asia/Manila');
		$ctime = date("h:i A");
		$cdate = date("M d, Y");
		echo $cuname = $udata[0];
		if(mysqli_query($conn,"INSERT INTO users_logs(username,log_date,log_time,log_status) VALUES('$cuname','$cdate','$ctime','Logout')")){
			if(session_destroy()){
				header("Location: ../login/");
			}else{
				echo "ERROR";	
			}
		}
	}
?>