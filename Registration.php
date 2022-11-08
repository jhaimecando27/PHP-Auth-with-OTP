<?php session_start();

    /* User summitted a form */
	if(isset($_POST['register'])){
 
        /* Assign sumitted email and password */
		$email = trim($_POST['email']);
		$password = trim($_POST['password']);

        /* Add key to each data */
        $newData = array(
            "email" => $email,
            "password" => $password,
            "otp" => ""
        );

        /* Open json file */
        $json = file_get_contents("Account.json");

        /* Add new data */
        $tempArray = json_decode($json);
        array_push($tempArray, $newData);
        $jsonData = json_encode($tempArray);

        /* Update json file */
        file_put_contents("Account.json", $jsonData);

        /* Remember the new user */
        $_SESSION['user_email'] = $email;

        /* Go to otp.php */
        header('location:otp.php');
        exit();
    }
?>

<!DOCTYPE html>
<html>
<head>
        <title>Registration Form</title>
</head>

<body>
    <?php
        if(isset($_POST['create'])){
            echo 'User Submitted.';
        }
    ?>

    <div>
         <form action="Registration.php" method="post">
            <div class="container">
                <h1>Registration</h1>
                <p> Fill up the form </p>

                <label for="inputEmail">Name</label>
                <input id="inputEmail" type="text" name="email">

                <label for="inputPassword">Password</label>
                <input id="inputPassword" type="password" name="password">

                <input type="submit" name="register" value="Sign Up">
                
                <a href="Loginform.php">Login Form</a>
            </div>
        </form>
    </div>
</body>
</html>


