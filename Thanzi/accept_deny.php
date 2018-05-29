<?php $_SESSION['conex'] = $conID; echo $_SESSION['conex'];?>
<input type='hidden' id = 'conID' name='conID'  value='<?php echo $conID;?>' />
<label>ACCEPT or DENY</label>
<form action = "accept.php" method = "POST">
	<input type = "submit" name = "ACCEPT" value = "ACCEPT" >
</form>
<form action = "deny.php" method = "POST">
	<input type = "submit" name = "DENY" value = "DENY" onClick = "pageRedirect(deny.php)">
</form>


