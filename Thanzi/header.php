<?php 
	include('databaseHelper.php');
	$sql1 = "SELECT * FROM `client` WHERE `email` = '{$_SESSION['email']}'";
	$rez = $conn->query($sql1);
	if($rez->num_rows == 1){
	$header = "landing.php";
	$_GLOBALS['$viewTreatments'] = '<div class="header_item_wrap"><li><a class="header_item" href="view_treament.php">VIEW TREATMENTS</a></li> </div>'; 
	}else{
		$sql2 = "SELECT * FROM `med_prac` WHERE `email` = '{$_SESSION['email']}'";
		$rez = $conn->query($sql2);
		if($rez->num_rows == 1){
		$header ="mp_home.php"; 
		$_GLOBALS['viewPendingTreatments'] = '<li class="header_item_wrap"><a class="header_item" href="pending_treatments.php">PENDING TREATMENTS</a></li>';
		}
	}
?>
<ul id = "header_item_wrap">
		<li class="header_item_wrap"><img src="img/ttec.png" alt="Thanzi Logo"  class="logo" /></li>
		<li class="header_item_wrap"><a class="header_item" href="<?php echo $header ?>">HOME</a></li>
		<li class="header_item_wrap"><a class="header_item" href="">ABOUT US</a></li>
		<li class="header_item_wrap"><a class="header_item" href="">CONTACT US</a></li>
		<li class="header_item_wrap"><a class="header_item" href="message.php">MESSAGES</a></li>
		<?php if(isset($_GLOBALS['$viewTreatments'])){echo $_GLOBALS['$viewTreatments'];}  ?>
		<?php if(isset($_GLOBALS['viewPendingTreatments'])){echo $_GLOBALS['viewPendingTreatments'];}  ?>
		<li class="header_item_wrap"><a class="header_item" href="logout.php">SIGN OUT</a></li>
</ul>
