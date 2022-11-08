<?php session_start();

/* User entered a otp code */
if (isset($_POST['verifyOtp'])) {

    /* Assign sumitted email and password */
    $inputOtp = trim($_POST['inputOtp']);

    /* Open database */
    $data = json_decode(file_get_contents("Account.json"), true);

    /* Find the user */
    foreach ($data as $key => $value) {
        /* Successful login */
        if ($value["email"] == $_SESSION['user_email']) {
            /* If otp is correct clear the otp in db */
            if ($value["otp"] == $inputOtp && $value["otp"] != "") {
                $data[$key]['otp'] = "";
                file_put_contents('Account.json', json_encode($data));

                /* Logged in the user in */
                header('location:index.php');
                exit();

            /* if otp incorrect */
            } else {
                echo "Incorrect OTP";
                break;
            }
        }
    }
}

/* User want to send otp to his email */
if (isset($_POST['sendOtp'])) {

    /* Open database */
    $data = json_decode(file_get_contents("Account.json"), true);

    /* Generate otp 
     * ref: https://www.geeksforgeeks.org/generating-otp-one-time-password-in-php/
     */
    $generator = "1357902468";
    $otp = "";
    for ($i = 1; $i <= 5; $i++) {
        $otp .= substr($generator, (rand() % (strlen($generator))), 1);
    }

    /* Put otp in db */
    foreach ($data as $key => $value) {
        /* Store otp code in db */
        if ($value["email"] == $_SESSION['user_email']) {
            $data[$key]['otp'] = $otp;
            break;
        }
    }
    file_put_contents('Account.json', json_encode($data));

    /* send email 
     * Ref: https://www.milople.com/blogs/how-to-send-mail-from-localhost-xampp-using-gmail/
     */
    $to_email = $_SESSION['user_email'];
    $subject = "SWE OTP Exercise";
    $body = $otp;
    $headers = "From: no.reply.jhaime@gmail.com"; // Palitan yung email

    if (mail($to_email, $subject, $body, $headers)) {
        $_SESSION['message'] = "Email successfully sent to $to_email...";
    } else {
        $_SESSION['message'] = "Email sending failed!";
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

    <form method="post" action="">
        <input type="text" name="inputOtp" placeholder="OTP code">
        <input type="submit" name="verifyOtp" value="Submit" />
    </form>

    <form method="POST" action="">
        <input type="submit" name="sendOtp" value="Send OTP" />
    </form>
</body>

</html>