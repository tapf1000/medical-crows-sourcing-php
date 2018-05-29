<?php
	echo "Click To Communicate With Client";
	$sql = "SELECT * FROM `treatment_requests`";
	$result = $conn->query($sql);
	if($result->num_rows > 0){
		while($rows = $result->fetch_assoc()){
			$sql = "SELECT * FROM `client` WHERE email = '{$rows['client_id']}' ";
			$res = $conn->query($sql);
			if($res->num_rows > 0){
			$_SESSION['conId'] = $GLOBALS['conId'] = $rows['condition_id'];
				$row = $res->fetch_assoc();
				echo "<a href = mp_home.php?id={$rows['condition_id']}&&cid=cli>
						<li class = \"user_info\">
						<img class = \"dp\" src ={$row['img']}> {$row['name']} {$row['surname']} 
						<p class = \"col16\">{$rows['client_condition']}</p>
						<div class = \"time\">{$rows['date_posted']}</div>
						</li>
						</a>";
			}
		}
	}
	if(isset($_GET['id'])){
		$_SESSION['idD'] = $_GET['id'];
		header("Location: confirm.php");
	}
	if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['description'])){
		$id = $_SESSION['email'].date('Y-m-d').date('s-i-h');
		$sql = "INSERT INTO `treatments` VALUES ('$id','{$_SESSION['email']}','{$_POST['treatment']}','{$_POST['description']}')";
		if($result){
		$message = "Treatment Posted Successfully";
		}else{$message = "Treatment Posting Failed ".$conn->error;}
	}
?>
