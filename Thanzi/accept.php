<?php
	session_start();
	require('databaseHelper.php');
	if($_SERVER['REQUEST_METHOD'] == "POST" ){
		$sqli = "UPDATE `treatment_request_confirmation` SET `confirmation` = 1 WHERE `treatment_request_confirmation`.`condition_id` = '{$_SESSION['conex']}'";
		if($conn->query($sqli) === TRUE) {echo "YOU HAVE ACCEPTED TREATMENT REQUEST";}else{echo "Error: ".$conn->error;}
		header("location: view_treament.php");
}
		
?>
