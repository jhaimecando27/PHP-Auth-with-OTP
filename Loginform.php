<?php session_start();

    /* User summitted a form */
	if(isset($_POST['login'])){
 
        /* Assign sumitted email and password */
		$email = trim($_POST['email']);
		$password = trim($_POST['password']);

        /* Open database */
        $data = json_decode(file_get_contents("Account.json"), true);

        /* Check existence of sumitted data */
        foreach($data as $row) {

            /* Successful login */
            if ($row["email"] == $email && $row["password"] == $password) {

                /* Remember the user */
                $_SESSION['user_email'] = $row["email"];

                /* Go to index.php */
                header('location:otp.php');
                exit();
            }
        }

        /* Unsuccessful login */
        if (isset($_SESSION['user_email']) == false) {
            $_SESSION['message']="<span>Login Failed. User not Found!</span>";
        }
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>

<body>
    <?php
        if (isset($_SESSION['message'])) {
            echo $_SESSION['message'];
        }
        unset($_SESSION['message']);
    ?>

    <h2>Login Form</h2>
    <form method="POST" action="">
        <center>
            <div>
                <label for="inputEmail">Email:</label> 
                <input id="inputEmail" type="text" name="email">

                <label for="inputPassword">Password:</label> 
                <input id="inputPassword" type="password" name="password">

                <input type="submit" value="login" name="login">
            </div>
        </center>
    </form>
</body>
</html>
