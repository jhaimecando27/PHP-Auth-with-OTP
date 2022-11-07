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

                <input id="remember" type="checkbox" name="remember">
                <label for="remember">Remeber me</label> 

                <input type="submit" value="login" name="login">
            </div>
        </center>
    </form>
</body>
</html>
