<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
<title> Login </title>
</head>
<body>
	        <style>
            body {
                background-image: url('Plm.jpg');
                background-size: 1500px;
            }
</style>
	<h2 style="color: white; text-align: center; font-size: 50px;">Login Form</h2>
	<form method="POST" action="try.php">
		<center><div style="color: white;">
	<label style="color: white; font-size: 30px;">Username:<br></label> <input style="width: 200px; height: 30px;" type="text" value="<?php if (isset($_SESSION["userName"])){echo $_SESSION["user"];}?>" name="username"><br>
	<label style="color: white; font-size: 30px;">Password:<br></label> <input style="width: 200px; height: 30px;" type="password" value="<?php if (isset($_SESSION["passWord"])){echo $_SESSION["pass"];}?>" name="password"><br><br>
	<input style="color: white; font-size: 15px;" type="checkbox" name="remember"> Remember me  <br><br>
	<input style="width: 100px; height: 30px;" type="submit" value="Login" name="login">
</div></center>
	</form>
 
	<span>
	<?php
		if (isset($_SESSION['message'])){
			echo $_SESSION['message'];
		}
		unset($_SESSION['message']);
	?>
</span>
</body>
</html>