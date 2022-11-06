<!DOCTYPE html>
<html>
    <head>
        <title> Registration Form </title>
</head>
<body>
    <div>
        <?php
        if(isset($_POST['create'])){
            echo 'User Submitted.';
        }
        ?>
     </div>
        <style>
            body {
                background-image: url('Plm.jpg');
                background-size: 1500px;
            }
</style>
<div>
     <form action="Registration.php" method="post">
        <div class="container">
            <h1> Registration </h1>
            <p> Fill up the form </p>
            <label for=<"name"><b>Name:  </b></label>
            <input type="text" name="Name" required>

            <label for=<"username"><b>Username: </b></label>
            <input type="text" name=" username" required>
    
            <label for=<"Password"><b>Password </b></label>
            <input type="password" name="password" required>

            <input type="submit" name="create" value="Sign Up">
            
            <a href="Loginform.php">Login Form</a>
</div>
</form>
</div>
</body>
</html>


