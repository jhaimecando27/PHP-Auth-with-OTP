<?php
	if(isset($_POST['login'])){
 
		session_start();
 
		$username=trim($_POST['username']);
		$password=trim($_POST['password']);
		$confirms = true;
 
		echo $username;
		echo $password;
		
	$data = file_get_contents("Account.json");
			$data = json_decode($data,true);
			foreach($data as $row){
				if ($row["user"] == $username && $row["password"]== $password)
				{
					if (isset($_POST['remember'])){
						//set up cookie
						setcookie("user", $row['username'], time() + (86400 * 30)); 
						setcookie("pass", $row['password'], time() + (86400 * 30)); 
						
					}
					$confirms = true;
					$_SESSION['userId']=$row['user_id'];
					header('location:Loginsuccess.php');
					
					break;
				}
				else {
					
						$confirms = false;
				}

			}

			if ($comfirms == false)
			{
				$_SESSION['message']="Login Failed. User not Found!";
				header('location:Loginform.php');
			}
			else;
		}
		else{
			header('location:Loginform.php');
			$_SESSION['message']="Please Login!";
		}
?>