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

                <input type="submit" name="create" value="Sign Up">
                
                <a href="Loginform.php">Login Form</a>
            </div>
        </form>
    </div>
</body>
</html>


