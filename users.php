<?php require("../functions/admin_session_checker");
	if(isset($_GET['confirm']) && $_GET['confirm']!=""){
		$conuid = $_GET['confirm'];
		if(mysqli_query($conn,"UPDATE users SET account_status='CONFIRMED' WHERE userid='$conuid'")){
			header("Location: ".$cpage);
		}
	}
	if(isset($_GET['unconfirm']) && $_GET['unconfirm']!=""){
		$unconuid = $_GET['unconfirm'];
		$uncode = $unconuid.'-'.md5(date("YdM"));
		if(mysqli_query($conn,"UPDATE users SET account_status='$uncode' WHERE userid='$unconuid'")){
			header("Location: ".$cpage);
		}
	}
?>
<!DOCTYPE HTML>
<html>
<head>
	<title>RNA - MoZ | Users Panel</title>
	<?php require("parts/head-links");?>
</head>
<body>	
<div class="page-container sidebar-collapsed">	
   <div class="left-content">
	   <div class="mother-grid-inner">
		<?php require("parts/header");?>
<!--heder end here-->
<!--inner block start here-->
<div class="inner-block">
<!--mainpage chit-chating-->
<div class="chit-chat-layer1">
	<div class="col-md-12 chit-chat-layer1-left">
               <div class="work-progres">
			   <div class="pro-head">
					<h2>ALL RNA - MoZ REGISTERED USERS</h2>
					<div id="prod-nav">
						<form  id="search" action="" method="get" enctype="multipart/form-data">
							<span class="fa fa-search"></span>
							<input onfocus="this.select();" id="s-search" <?php if(isset($_GET['search'])){echo 'value="'.$_GET['search'].'"';}?> autocomplete="off" type="search" placeholder="Search Users" name="search" autofocus>
						</form>
					</div>
				</div>
				<div class="table-responsive">
					<table class="table table-hover">
						<thead>
							<tr>
							  <th style="text-align:center;">#</th>
							  <th style="text-align:center;">USERNAME</th>
							  <th style="text-align:center;">PASSWORD</th>
							  <th style="text-align:center;">COMPLETE NAME</th>
							  <th style="text-align:center;">E-MAIL</th>
							  <th style="text-align:center;">MOBILE</th>
							  <th style="text-align:center;">ADDRESS</th>
							  <th style="text-align:center;">REG DATE</th>
							  <th style="text-align:center;">STATUS</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$num = 0;
							if((isset($_GET['search'])&&$_GET['search']=="")||(!isset($_GET['search']))){
								$sel_condition = "WHERE users.userid=user_details.userid AND users.account_type='USER'";
							}elseif(isset($_GET['search'])&&$_GET['search']!=""){
								$que = $_GET['search'];
								$sel_condition = "WHERE (user_details.firstname LIKE '%$que%' OR user_details.middlename LIKE '%$que%' OR user_details.lastname LIKE '%$que%' OR users.username LIKE '%$que%') AND users.userid=user_details.userid AND users.account_type='USER'";
							}
							$sel_data = mysqli_query($conn,"SELECT * FROM users,user_details $sel_condition ORDER BY date_registered ASC");
							$sel_count = mysqli_num_rows($sel_data);
							while($tdata = mysqli_fetch_array($sel_data)){
									$num++;
							?>
							<tr style="font-size: 11px;font-weight: bold;">
								<td><?php echo $num;?></td>
								<td><?php echo $tdata['username'];?></td>
								<td><?php echo $tdata['password'];?></td>
								<td><?php echo $tdata['firstname'].' '.$tdata['middlename'].' '.$tdata['lastname'];?></td>                                 
														 
								<td><?php echo $tdata['email'];?></td>
								<td><?php echo $tdata['mobilenumber'];?></td>
								<td><?php echo $tdata['address'];?></td>
								<td><?php echo $tdata['date_registered'];?></td>
								<td><?php if($tdata['account_status']=="CONFIRMED"){?><a href="?unconfirm=<?php echo $tdata['userid'];?>"><button id="btn-cnfrmd">UNCONFIRM</button></a>
									<?php }else{?><a href="?confirm=<?php echo $tdata['userid'];?>"><button id="btn-ntcnfrmd">CONFIRM</button></a><?php }?>
								</td>
							</tr>
							<?php }
							if($sel_count==0){?>
							<tr style="background: rgba(255,152,0,1.0);color: white;font-size: 30px; text-align: center;">
								<td colspan="8"><span class="fa fa-search"></span> NO DATA TO SHOW</td>
							</tr>
							<?php }?>
						</tbody>
					</table>
				</div>
			</div>
      </div>
     <div class="clearfix"> </div>
</div>
<!--main page chit chating end here-->
</div>
<!--inner block end here-->
<?php include("parts/footer");?>
</div>
</div>
<?php require("parts/navbar");?>
</body>
</html>                     