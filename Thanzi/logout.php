<?php
    session_start();
    include('databaseHelper.php');
	$sql1 = "SELECT * FROM `client` WHERE `email` = '{$_SESSION['email']}'";
	$rez = $conn->query($sql1);
	if($rez->num_rows == 1){
		session_destroy();
   		header("Location: index.php");
	}else{
		$sql2 = "SELECT * FROM `med_prac` WHERE `email` = '{$_SESSION['email']}'";
		$rez = $conn->query($sql2);
		if($rez->num_rows == 1){
		session_destroy();
    		header("Location: mp_login.php");
		}
	}
?>
