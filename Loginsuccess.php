<?php
	session_start();
 	$name= "";

	if (!isset($_SESSION['userId']) ||(trim($_SESSION['userId']) == '')) {
		header('Loginform.php');
		exit();
	}
	$data = file_get_contents("account.json");
	$data = json_decode($data,true);
	foreach($data as $row){
		if ($_SESSION['userId'] == $row['user_id'] )
		{
			$name=$row["name"] ;
			break;
			
	}
}

		
?>
<!DOCTYPE html>
<html>
<head>
<title>Login</title>
</head>
<body>
	<style>
            body {
                background-image: url('Plm.jpg');
                background-size: 1500px;
            }
</style>
	<h2 style="color: white; text-align: center; font-size: 50px;">Login Success!!!</h2>
	<div style="color: white;  text-align: center; font-size: 50px;">
	<?php echo $name; ?>
	<br>
	<a href="Try.php">Logout</a>
</div>
</body>
</html>