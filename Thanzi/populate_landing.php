<?php
if(isset($_SESSION["name"]) && isset( $_SESSION["surname"])){
	$name = $_SESSION["name"];
	$surname = $_SESSION["surname"];
}else{header("Location: index.php");}
 require('databaseHelper.php');
			
			//list treatments	
				$sql = "SELECT treatment_title, description FROM treatments";
				$result = $conn->query($sql);
				$max_records = $result->num_rows;
				if($max_records > 0){
					if( $max_records > 15) {return;}
					while($row = $result->fetch_assoc()){
						$k = $row['treatment_title'];
						$v = $row['description'];
						$treatments_array[$k] = $v;
					}
				}
			//inserting a new treatment request
			if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_REQUEST['condxn'])){
					$condxn = mysqli_real_escape_string($conn, $_REQUEST['condxn']);
					$date = date("d-m-Y");
					$id = $_SESSION["email"];
					$con_id = $id.$date.date("h-i-s");
					 $sql = "INSERT INTO `treatment_requests` (`client_id`,`client_condition`,`date_posted`, `condition_id`) VALUES ('$id','$condxn','{$date}','$con_id')";
					if($result = $conn->query($sql)){$message = "Request Sent!!!";}
					else{$message = "Request Not Sent, Try Again!!! ".$conn->error;}
				} 
				//search for conditions
			if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_REQUEST['query'])){
				$query =  mysqli_real_escape_string($conn,$_REQUEST['query']);
				$query = htmlspecialchars($query);
				$result = $conn->query("SELECT * FROM `treatments`  WHERE (`treatment_title` LIKE '%$query%') OR (`description` LIKE '%$query%')");
				if($result->num_rows > 0){
				unset($GLOBALS['treatments_array'] );
					while($row = $result->fetch_assoc()){
						$k = $row['treatment_title'];
						$v = $row['description'];
						$treatments_array[$k] = $v;
					}
				}else{ $treatments_array["Results"] = "Nothing To Show"; }
			}
?>
