<?php
$conn = new mysqli("127.0.0.1","root","tapf1000","thanzi");
if($conn->connect_error){
	echo "error connectiing to DB ".$conn->connect_error;
  }
?>
