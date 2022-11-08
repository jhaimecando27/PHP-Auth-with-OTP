<?php session_start(); /* Starts the session */

/* Tandaan lng yung email */
if(!isset($_SESSION['user_email'])){
        header("location:Loginform.php");
        exit;
}
?>

Congratulation! You have logged into password protected page. <a href="logout.php">Click here</a> to Logout.
