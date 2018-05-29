<?php
session_start();
require("header.php");
require("populate_landing.php");
?>
<DOCTYPE! html>
<html>
     <head>
    		 <title>LANDING</title>
		<link href="css/style.css" type="text/css" rel="stylesheet"/>
     </head>
     <body>
		<h2>Welcome back <?php echo  $_SESSION["name"]." ". $_SESSION["surname"] ?></h2>
		<form action = "<?php htmlspecialchars($_SERVER['PHP_SELF'])?>" method = "POST" >
			 <input type = "text" placeholder="SEARCH" name = "query">
			<img src = "">
			<div class = "button_group">
				<button name = "SEARCH" class = "button_group"> SEARCH </button>
			</div>
			</form>
		<div id=treatments_wrap>
			<?php
				if(isset($treatments_array)){
					foreach($treatments_array as $k => $v){echo "<div class=treatment_title>".$k ."</div><div class=treatment_desc><p>". $v."</p></div>";}
				}else{echo "No Treatments";}
			?>
		</div>
	    <form action = "<?php htmlspecialchars($_SERVER['PHP_SELF'])?>" method = "POST">
			<label>ENTER CONDITION HERE</label><br/>
			<textarea required name = "condxn" placeholder = "Request help from a trained medical practitioner by entering a description of your problem here" ></textarea><br/>
			<button name = "submit_condition" class = "button_group" >SUBMIT CONDITION REQUEST </button>
			<h6><?php if(isset($message)){echo"$message";}?></h6>
		</form>
     </body>
</html>
