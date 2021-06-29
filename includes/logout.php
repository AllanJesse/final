<?php
session_start();
	//if (isset($_GET['logout'])) {
		// unset($_SESSION['id']);
		session_unset();
		session_destroy();
		header('location: ../index.php');
	//}
