<!DOCTYPE html>
<html>
	<head>
	  	<title>Sign-Up/Login Form</title>
	</head>
	<body>	
		<form action = "<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method = "POST">
				<div id="field_wrap">
					<label>EMAIL</label>
					<input type="email" required placeholder="example@domain.com" name="email"/>
				</div>
				<div id="field_wrap">
					<label>First Name</label>
					<input type="text" required placeholder="John" name="first_name"/>
				</div>
				<div id="field_wrap">
					<label>Last Name</label>
					<input type="text" required placeholder="Smith" name="last_name"/>
				</div>
				<div id="field_wrap">
					<label>AGE</label>
					<input type="number" required placeholder="e.g 28" name="age"/>
				</div>
				<div id="field_wrap">
					<input type="radio" id="male" required value = "MALE" value = "m" name="gender"/>
					<label for = "male">MALE</label>
				</div>
				<div id="field_wrap">
					<input type="radio" id="female" required  value = "f" name="gender"/>
					<label for = "female">FEMALE</label>
				</div>
				<div id="field_wrap">
					<label>PHONE NUMBER</label>
					<input type="text" required placeholder="e.g +263 XXX XXX XXX" name="email"/>
				</div>
				<div id="field_wrap">
					<label>ADDRESS</label><br>
					<textarea rows = 5 cols = 20 required placeholder="e.g 53 Houstone Road, Berkley Park, New York" name="address"/></textarea>
				</div>
				<div id="field_wrap">
					<label>PASSWORD</label>
					<input type="password" required placeholder="**************" name="email"/>
				</div>
				<div id="field_wrap">
					<label>PASSWORD</label>
					<input type="password" required placeholder="**************" name="email"/>
				</div>
				<div id="field_wrap">
					<label>DISPLAY PICTURE</label>
					<input type="FILE" required  name="image"/>
				</div>
				<button name = "register">REGISTER</button>
		</form>
	</body>
</html>
