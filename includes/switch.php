<?php
	session_start();
	require ('./connection.php');
	$id = $_GET['id'];
	$query = "SELECT * FROM users WHERE id = $id";
	$result = mysqli_query($con, $query);
	if (mysqli_num_rows($result)) {
		$row = mysqli_fetch_assoc($result);
		$status = $row['status'];
		$adminId = $_SESSION['id'];
		if ($adminId !== $id) {
			if ($status === 'Active') {
				mysqli_query($con, "UPDATE users SET status = 'Inactive' WHERE id = $id");
				header ('location: dashboard/user.php');
			} else {
				mysqli_query($con, "UPDATE users SET status = 'Active' WHERE id = $id");
				header ('location: dashboard/user.php');
			}
		} else {
			$_SESSION['error_msg'] = "You can't Deactivate your own account";
			header('location: dashboard/user.php');
		}
	}
 ?>
