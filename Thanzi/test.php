<DOCTYPE! html>
<html>
	<body>
	<h1>test page</h1>
	
	<?php
	echo "<a href='test.php?ab=12345678'>click here to test php</a>";
	if(isset($_GET['ab'])){
		echo "<br/>get isset {$_GET['ab']}";
	}
	?>
	</body>
</html>
