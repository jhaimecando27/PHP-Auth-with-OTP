<?php session_start();

	session_destroy();
 
    /* Redirect to index */
	header('location:index.php');
    exit();
 
?>
