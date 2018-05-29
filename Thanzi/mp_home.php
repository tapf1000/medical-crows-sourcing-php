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
		<title>HOME</title>
		<link href="css/style.css" type="text/css" rel="stylesheet"/>
	</head>
	<body>
	<h2>Welcome back <?php echo $_SESSION["name"]." ". $_SESSION["surname"] ?></h2>
	<div class = "left_float">
		<?php include('populate_mp_home.php');?>
	</div>
	<form action = "<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method = "POST" autocomplete = "off">
		<label>Treatment</label>
		<input type = "text" name = "treatment" placeholder  = "Treatment Title">
		<label>Description*</label><br/>
		<textarea name = "description" required></textarea>
		<button>SUBMIT TREATMENT</button>
		<?php if(isset($message)){echo "<div class='alert'>$message </div>";}?>
	</form>
	</body>
</html>
