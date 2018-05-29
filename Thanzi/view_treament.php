<DOCTYPE! html>
<html>
     <head>
    		 <title>VIEW TREATMENTS</title>
    		 <script  type="text/javascript">
			function accept(){
				//call accept.php
				window.location = "accept.php";
			}
			function deny(){
				//call deny.php
				location.href = "deny.php";
			}
			function sayHello() {
				window.location = "localhost/Thanzi/landing.php";
			}
		</script>
     </head>
     <body> 
		<?php
			session_start();
			require("header.php");
			require('databaseHelper.php');
			function pageRedirect($location){
				 header("location: $location");
			}
			$sql = "SELECT * FROM `treatment_requests`, `treatment_request_confirmation`  WHERE `treatment_requests`.`client_id` = '{$_SESSION['email']}' && `treatment_request_confirmation`.`condition_id` = 								`treatment_requests`.`condition_id`";
			$res = $conn->query($sql);
			if($res->num_rows<1){
			echo "<center><h3>You Have No Accepted Requests Yet</h3></center>";
			}else{
				while($row = $res->fetch_assoc()){
					$res2 = $conn->query("SELECT name, surname FROM `med_prac` WHERE `email` = '{$row['mp_id']}'");
					$row2 = $res2->fetch_assoc();
					echo "<a href = 'view_treament.php?cid={$row['condition_id']}'><ul><li>{$row['client_condition']}</li><li>FEE CHARGED BY MEDICAL PRACTITIONER {$row2['name']} {$row2['surname']} is: \${$row['fee']}</li></ul></a>";
				}
			}
			if(isset($_GET['cid'])){
				$conID = $_GET['cid'];
     			
				include("accept_deny.php");
				
			}
		?>
			
     </body>
</html>
