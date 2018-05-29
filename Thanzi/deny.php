<?php
	session_start();
	require('databaseHelper.php');
	$sqli = "UPDATE `treatment_request_confirmation` SET `confirmation` = 2 WHERE `treatment_request_confirmation`.`condition_id` = '{$_SESSION['conex']}'";
	if($conn->query($sqli) === TRUE){echo "YOU HAVE DENIED TREATMENT REQUEST";}else{echo "Error: ".$conn->error;}
	header("location: view_treament.php");
?>
