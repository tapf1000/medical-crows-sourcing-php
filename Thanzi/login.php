<?php
if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["login"])){
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $password = mysqli_real_escape_string($conn, $_POST["password"]);
    $sql  = "SELECT * FROM `client` WHERE email =  '$email' AND password = '$password'";
    $result = $conn->query($sql);
    if($result->num_rows == 1){
        while($row = $result->fetch_assoc()){
        if($row["email"] == $email && $row["password"] == $password){
        		$_SESSION["name"] = $row["name"];
        		$_SESSION["surname"] = $row["surname"];
        		$_SESSION["email"] = $row["email"];
            header("Location: landing.php");
            die();
    		}else{$message = "<div class='alert'>User Not Registered!!!</div> <a href = \" register.php\"> Register Here</a>";}
      }
   }
}
?>
