  <?php
  	session_start();
  	include('databaseHelper.php');
  	if($_SERVER["REQUEST_METHOD"] == "POST"){
    	   $email = mysqli_real_escape_string($conn, $_POST["e-mail"]);
	   $password = mysqli_real_escape_string($conn, $_POST["password"]);
        $sql  = "SELECT * FROM `med_prac` WHERE email =  '$email' AND password = '$password'";
	   $result = $conn->query($sql);
	   if($result->num_rows == 1){
		   $row = $result->fetch_assoc();
		   if($row["email"] == $email && $row["password"] == $password){
		   		$_SESSION["name"] = $row["name"];
		   		$_SESSION["surname"] = $row["surname"];
		   		$_SESSION["email"] = $row["email"];
			  header("Location: mp_home.php");
			  die();
	    		}
	   }else{$message = "<div class='alert'>Your Account Is Not Registered!!!</div>";}
  	}
  ?>
  <DOCTYPE! html>
  <html>
  	<head>
  		<title></title>
  	</head>
  	<meta/>
  	<body>
  		<form action = "<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method = "POST" >
	  		<label>Enter Email Here</label>
	  		<div id="field_wrap">
	  			<input type = "email" required placeholder = "example@domain.com" name = "e-mail"/>
	  		</div>
			<div id="field_wrap">
				<label>PASSWORD</label>
				<input type = "password" required placeholder = "*****************" name = "password"/>
			</div>
				<button name = "sign-in"  class = "button_group" >LOGIN </button>
				<?php if(isset($message)){echo $message;}?>
  		</form>
  	</body>
  </html>
