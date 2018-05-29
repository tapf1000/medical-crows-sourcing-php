<?php
	session_start();
	require("header.php");
	require('databaseHelper.php');
	echo '<DOCTYPE! html>
		<head>
			<title>PENDING TREATMENTS</title>
			<link href="css/style.css" type="text/css" rel="stylesheet" />
		</head>
		<body>
	';
	$sql = "SELECT * FROM `treatment_request_confirmation` WHERE `mp_id` = '{$_SESSION['email']}' && `confirmation` = 1";
	$result = $conn->query($sql);
	$sql1 = "SELECT * FROM `treatment_request_confirmation` WHERE `mp_id` = '{$_SESSION['email']}' && `confirmation` = 2";
	$result1 = $conn->query($sql1);
	$sql2 = "SELECT * FROM `treatment_request_confirmation` WHERE `mp_id` = '{$_SESSION['email']}' && `confirmation` = 0";
	$result2 = $conn->query($sql2);
	echo '<div class="background">';
	if($result->num_rows > 0){
		echo "<div class = 'title'>YOU HAVE {$result->num_rows} JOBS PENDING </div>";
		echo "<ul>";
		while($rows = $result->fetch_assoc()){
			$sqli = "SELECT * FROM `treatment_requests` WHERE `condition_id` ='{$rows['condition_id']}'";
			$res = $conn->query($sqli);
			$rho = $res->fetch_assoc();
			$sqly = "SELECT name, surname FROM `client` WHERE `client`.`email` = '{$rho['client_id']}'";
			$rez = $conn->query($sqly);
			$rhow = $rez->fetch_assoc();
			echo "<li class= 'content'> Treatment for {$rhow['name']} {$rhow['surname']} at fee \${$rows['fee']} is pending, here's a reminder of the problem: <p>{$rho['client_condition']}</p></li>";
		}
		echo "</ul>";
	}else{
		echo "<ul><li class= 'content'>YOU HAVE NO PENDING JOBS</li></ul>";
	} 
	if($result1->num_rows > 0){
		echo "<div class = 'title'>YOU HAVE {$result1->num_rows} JOBS REJECTED </div>";
		echo "<ul>";
		while($rows = $result1->fetch_assoc()){
			$sqli = "SELECT * FROM `treatment_requests` WHERE `condition_id` ='{$rows['condition_id']}'";
			$res = $conn->query($sqli);
			$rho = $res->fetch_assoc();
			$sqly = "SELECT name, surname FROM `client` WHERE `client`.`email` = '{$rho['client_id']}'";
			$rez = $conn->query($sqly);
			$rhow = $rez->fetch_assoc();
			echo "<li class= 'content'>Treatment for {$rhow['name']} {$rhow['surname']} at fee {$rows['fee']} was rejected, here's a reminder of the problem: <p>{$rho['client_condition']}</p></li>";
		}
		echo "</ul>";
	}
	if($result2->num_rows > 0){
		echo "<div class = 'title'>YOU HAVE {$result2->num_rows} JOBS AWAITING CONFIRMATION </div>";
		echo "<ul>";
		while($rows = $result2->fetch_assoc()){
			$sqli = "SELECT * FROM `treatment_requests` WHERE `condition_id` ='{$rows['condition_id']}'";
			$res = $conn->query($sqli);
			$rho = $res->fetch_assoc();
			$sqly = "SELECT name, surname FROM `client` WHERE `client`.`email` = '{$rho['client_id']}'";
			$rez = $conn->query($sqly);
			$rhow = $rez->fetch_assoc();
			echo "<li class= 'content'>Treatment for {$rhow['name']} {$rhow['surname']} at fee {$rows['fee']} was is awaiting confirmation, here's a reminder of the problem: <p>{$rho['client_condition']}</p></li>";
		}
		echo "</ul>";
	}
	echo "</div>";
	echo "<div id='footer'>
		 <p>&copy; Copyright 2018</p>
	 </div>";
	echo "</body>";
?>
