<?php
	session_start();
	if(!isset($_SESSION["name"]) && !isset( $_SESSION["surname"]) && !isset($_SESSION['email'])){
		header("Location: mp_login.php");
	}
	require("header.php");
?>
<DOCTYPE! html>
<html>
	<head>
		<title></title>
	</head>
	<body>
		<form action= "<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method = "POST" class="float-over">
			<label>Fee To Charge ($)</label>
			<input type="text" value="0.00" name="fee">
			<input type="submit" name="ACCEPT" value="ACCEPT">
		</form>
		<?php
			if($_SERVER['REQUEST_METHOD'] == "POST"){
				$sqli = "SELECT * FROM `treatment_requests` WHERE `treatment_requests`.`condition_id` = '{$_SESSION['idD']	}' ";
				$rizo = $conn->query($sqli);
				while($conID = $rizo->fetch_assoc()){
					$conn->query("INSERT INTO `treatment_request_confirmation` VALUES ('{$conID['condition_id']}','{$_SESSION['email']}','{$_POST['fee']}','0')");
					echo "<h3>REQUESTED FOR CLIENT CONFIRMATION</h3>";
				}
			}
		?>
	</body>
</html>
