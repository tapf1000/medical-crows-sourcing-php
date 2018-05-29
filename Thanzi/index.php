<?php 
session_start();
require('databaseHelper.php');
if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["login"])){
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $password = mysqli_real_escape_string($conn, $_POST["password"]);
    $sql  = "SELECT * FROM `client` WHERE email =  '$email' ";
    $result = $conn->query($sql);
    if($result->num_rows == 1){
        while($row = $result->fetch_assoc()){
        if($row["email"] == $email && $row["password"] == $password){
        		$_SESSION["name"] = $row["name"];
        		$_SESSION["surname"] = $row["surname"];
        		$_SESSION["email"] = $row["email"];
            header("Location: landing.php");
            die();
    		}else{
    			$message = "INCORRECT PASSWORD!!! <br/>";
    			$add_recover = true;
    			}
      }
   }else{$message = "<div class='alert'>User Not Registered!!! <a href = \" register.php\"> Register Here</a></div> ";}
}

?>
<!DOCTYPE html>
<html>
<head>
  <title>Sign-Up/Login Form</title>
</head>
<body>
	<ul>
	<div class="header_item_wrap">
		<li><a href="register.php">REGISTER</a></li>
	</div>
	<div class="header_item_wrap">	
		<li><a href="">ABOUT US</a></li>
	</div>
	<div class="header_item_wrap">	
		<li><a href="">CONTACT US</a></li>
	</div>	
</ul>
	<form action = "<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method = "POST">
		<div id="field_wrap">
			<label>EMAIL</label>
			<input type="email" required placeholder="example@domain.com" name="email"/>
		</div>
		<div id="field_wrap">
			<label>PASSWORD</label>
			<input type="password" required placeholder="*****************" name="password"/>
		</div>
			<button name = "login"  class = "button_group" >LOGIN </button>
	</form>
	<br/>
	<?php 
	if(isset($message)){
		echo "<div class='alert'>$message </div>";
	}
	if(isset($add_recover) ){
		require('recover_password.php');
		}
	?>
</body>
</html>
