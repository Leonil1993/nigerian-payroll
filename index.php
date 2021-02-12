<?php 
	session_start();
	isset($_SESSION['adminID']) ? header('location:client/static/index.php') : header('location:client/pages/sign-in.php');
?>