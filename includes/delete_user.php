<?php
session_start();
	if (!isset($_SESSION['id'])) {
		header('location: index.php');
	}
require('./connection.php');

$userToDeleteId = $_GET['id'];
$adminId = $_SESSION['id'];
if ($userToDeleteId !== $adminId) {
	$query = "DELETE FROM users WHERE id = $userToDeleteId";
	if (mysqli_query($con, $query)) {
		$_SESSION['success_msg'] = "User has been Deleted successfully";
	  header("Location: dashboard/user.php");
	}
} else {
	$_SESSION['error_msg'] = "You can't Delete yourself";
	header('location: dashboard/user.php');
}
