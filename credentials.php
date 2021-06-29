<?php
	require('includes/connection.php');
	session_start();
	if (isset($_POST['register'])) {
		$errors = array();
		$firstname = mysqli_real_escape_string($con, trim(strip_tags($_POST['firstname'])));
		$lastname = mysqli_real_escape_string($con, trim(strip_tags($_POST['lastname'])));
		$email = mysqli_real_escape_string($con, trim(strip_tags($_POST['email'])));
		$gender = mysqli_real_escape_string($con, trim(strip_tags($_POST['gender'])));
		$level = mysqli_real_escape_string($con, trim(strip_tags($_POST['level'])));
		$dept = mysqli_real_escape_string($con, trim(strip_tags($_POST['dept_id'])));
		$password = mysqli_real_escape_string($con, trim(strip_tags($_POST['password'])));
		$confirm_password = mysqli_real_escape_string($con, trim(strip_tags($_POST['confirm_password'])));
		$status = 'Active';
		$role = 'student';

		if(empty($firstname)) {
			array_push($errors, 'Firstname field should not be empty');
		}

		if(empty($lastname)) {
			array_push($errors, 'Lastname field should not be empty');
		}

		if(empty($email)) {
			array_push($errors, 'Email field should not be empty');
		}

		if(empty($gender)) {
			array_push($errors, 'Gender field should not be empty');
		}

		if(empty($password)) {
			array_push($errors, 'Password field should not be empty');
		}

		if(empty($confirm_password)) {
			array_push($errors, 'Confirm Password field should not be empty');
		}

		if($password !== $confirm_password) {
			array_push($errors, 'Password and Confirm Password must match');
		}

		if (empty($errors)) {
			$query = "SELECT * FROM users WHERE email = $email";
			$result = mysqli_query($con, $query);
			
			if(mysqli_num_rows($result) > 0) {
				array_push($errors, "That Email is already registered");
			} else {
				$password_hashed = password_hash($password, PASSWORD_DEFAULT);
				$register = "INSERT INTO `users`(`firstname`, `lastname`, `email`, `gender`, `level`, `dept_id`, `role`, `status`, `password`) VALUES ('$firstname', '$lastname', '$email', '$gender', '$level', '$dept', '$role', '$status', '$password_hashed')";
				if (mysqli_query($con, $register)) {
					header('location: index.php');
				}
			}
		}
	}

	if (isset($_POST['login'])) {
		$errors = array();
		$email = mysqli_real_escape_string($con, trim(strip_tags($_POST['email'])));
		$password = mysqli_real_escape_string($con, trim(strip_tags($_POST['password'])));

		if (empty($email)) {
			array_push($errors, 'Email is required');
		}

		if (empty($password)) {
			array_push($errors, 'Password is required');
		}

		if (empty($errors)) {
			$query = "SELECT * FROM users WHERE email = '$email' ";
			$result = mysqli_query($con, $query);
			if (mysqli_num_rows($result)) {
				$row = mysqli_fetch_assoc($result);
				if (password_verify($password, $row['password'])) {
					$role = $row['role'];
					$status = $row['status'];
					$firstname = $row['firstname'];
					$lastname = $row['lastname'];
					$email = $row['email'];
					$gender = $row['gender'];
					$level = $row['level'];
				
					if ($status === 'Active') {
						if ($role === 'student') {
							$_SESSION['id'] = $row['id'];
							$_SESSION['firstname'] = $firstname;
							$_SESSION['lastname'] = $lastname;
							$_SESSION['email'] = $email;
							$_SESSION['gender'] = $gender;
							$_SESSION['level'] = $level;
							$_SESSION['status'] = $status;
							$_SESSION['role'] = $row['role'];
							header('location: includes/student');
						} elseif ($role === 'hod-ict') {
							$_SESSION['id'] = $row['id'];
							$_SESSION['firstname'] = $row['firstname'];
							$_SESSION['lastname'] = $row['lastname'];
							$_SESSION['role'] = $row['role'];
							$_SESSION['email'] = $row['email'];
							$_SESSION['gender'] = $row['gender'];
							$_SESSION['level'] = $row['level'];
							$_SESSION['status'] = $row['status'];
							header('location: includes/ict');
						}elseif ($role === 'accountant') {
							$_SESSION['id'] = $row['id'];
							$_SESSION['firstname'] = $row['firstname'];
							$_SESSION['lastname'] = $row['lastname'];
							$_SESSION['role'] = $row['role'];
							$_SESSION['email'] = $row['email'];
							$_SESSION['gender'] = $row['gender'];
							$_SESSION['level'] = $row['level'];
							$_SESSION['status'] = $row['status'];
							header('location: includes/accounts');
						}elseif ($role === 'librarian') {
							$_SESSION['id'] = $row['id'];
							$_SESSION['firstname'] = $row['firstname'];
							$_SESSION['lastname'] = $row['lastname'];
							$_SESSION['role'] = $row['role'];
							$_SESSION['email'] = $row['email'];
							$_SESSION['gender'] = $row['gender'];
							$_SESSION['level'] = $row['level'];
							$_SESSION['status'] = $row['status'];
							header('location: includes/library');
						}elseif ($role === 'sports-master') {
							$_SESSION['id'] = $row['id'];
							$_SESSION['firstname'] = $row['firstname'];
							$_SESSION['lastname'] = $row['lastname'];
							$_SESSION['role'] = $row['role'];
							$_SESSION['email'] = $row['email'];
							$_SESSION['gender'] = $row['gender'];
							$_SESSION['level'] = $row['level'];
							$_SESSION['status'] = $row['status'];
							header('location: includes/sports');
						}elseif ($role === 'cateress') {
							$_SESSION['id'] = $row['id'];
							$_SESSION['firstname'] = $row['firstname'];
							$_SESSION['lastname'] = $row['lastname'];
							$_SESSION['role'] = $row['role'];
							$_SESSION['email'] = $row['email'];
							$_SESSION['gender'] = $row['gender'];
							$_SESSION['level'] = $row['level'];
							$_SESSION['status'] = $row['status'];
							header('location: includes/cateress');
						}elseif ($role === 'register') {
							$_SESSION['id'] = $row['id'];
							$_SESSION['firstname'] = $row['firstname'];
							$_SESSION['lastname'] = $row['lastname'];
							$_SESSION['role'] = $row['role'];
							$_SESSION['email'] = $row['email'];
							$_SESSION['gender'] = $row['gender'];
							$_SESSION['level'] = $row['level'];
							$_SESSION['status'] = $row['status'];
							header('location: includes/registrar');
						}elseif ($role === 'warden') {
							$_SESSION['id'] = $row['id'];
							$_SESSION['firstname'] = $row['firstname'];
							$_SESSION['lastname'] = $row['lastname'];
							$_SESSION['role'] = $row['role'];
							$_SESSION['email'] = $row['email'];
							$_SESSION['gender'] = $row['gender'];
							$_SESSION['level'] = $row['level'];
							$_SESSION['status'] = $row['status'];
							header('location: includes/warden');
						}elseif ($role === 'matron') {
							$_SESSION['id'] = $row['id'];
							$_SESSION['firstname'] = $row['firstname'];
							$_SESSION['lastname'] = $row['lastname'];
							$_SESSION['role'] = $row['role'];
							$_SESSION['email'] = $row['email'];
							$_SESSION['gender'] = $row['gender'];
							$_SESSION['level'] = $row['level'];
							$_SESSION['status'] = $row['status'];
							header('location: includes/matron');
						}elseif ($role === 'workshop-managers') {
							$_SESSION['id'] = $row['id'];
							$_SESSION['firstname'] = $row['firstname'];
							$_SESSION['lastname'] = $row['lastname'];
							$_SESSION['role'] = $row['role'];
							$_SESSION['email'] = $row['email'];
							$_SESSION['gender'] = $row['gender'];
							$_SESSION['level'] = $row['level'];
							$_SESSION['status'] = $row['status'];
							header('location: includes/workshop');
						}elseif ($role === 'classmaster') {
							$_SESSION['id'] = $row['id'];
							$_SESSION['firstname'] = $row['firstname'];
							$_SESSION['lastname'] = $row['lastname'];
							$_SESSION['role'] = $row['role'];
							$_SESSION['email'] = $row['email'];
							$_SESSION['gender'] = $row['gender'];
							$_SESSION['level'] = $row['level'];
							$_SESSION['status'] = $row['status'];
							header('location: includes/classmaster');
						}elseif ($role === 'Hod_GST') {
							$_SESSION['id'] = $row['id'];
							$_SESSION['firstname'] = $row['firstname'];
							$_SESSION['lastname'] = $row['lastname'];
							$_SESSION['role'] = $row['role'];
							$_SESSION['email'] = $row['email'];
							$_SESSION['gender'] = $row['gender'];
							$_SESSION['level'] = $row['level'];
							$_SESSION['status'] = $row['status'];
							header('location: includes/gst');
						}
						else {
							$_SESSION['id'] = $row['id'];
							$_SESSION['firstname'] = $row['firstname'];
							$_SESSION['lastname'] = $row['lastname'];
							$_SESSION['role'] = $row['role'];
							$_SESSION['email'] = $row['email'];
							$_SESSION['gender'] = $row['gender'];
							$_SESSION['level'] = $row['level'];
							$_SESSION['status'] = $row['status'];
							header('location: includes/dashboard');
						}
					} else {
						array_push($errors, 'Your account is deactivated, see your admin');
					}
				} else {
					array_push($errors, 'Incorrect Email or Password');
				}
			} else {
				array_push($errors, 'Incorrect Email or Password');
			}
		}
	}

?>
