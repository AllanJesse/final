<?php
	session_start();
	$con = mysqli_connect('localhost', 'allan', 'allanjesse', 'final');
	if (isset($_POST['uploadBtn'])) {
		$file = $_FILES['file'];
		$name = $file['name'];
		$size = $file['size'];
		$error = $file['error'];
		$tmp_name = $file['tmp_name'];
		$cat = $_POST['cat'];
		$id = $_POST['user_id'];

		$ext = explode('.', $name);
		$actualExt= strtolower(end($ext));

		$allowed = array('pdf', 'doc', 'ppt', 'jpg', 'png');

		if (in_array($actualExt, $allowed)) {
			if ($error === 0) {
				if ($size < 2097152) {
					$newName = 'finish'.'.'.uniqid('', true).'.'.$actualExt;
					$dest = 'uploads/'.$newName;
					move_uploaded_file($tmp_name, $dest);
					$query = "INSERT INTO `files`(`user_id`, `cat`, `file`) VALUES ('{$id}', '$cat', '$dest')";
					if (mysqli_query($con, $query)) {
						$_SESSION['success'] = "File uploaded successfully";
						header('location: upload.php');
					}
				} else {
					echo "The file you are trying to upload is too large";
				}
			} else {
				echo "There was an error while uploading the file";
			}
		} else {
			echo "That file type is not allowed";
		}
		if ($update_result) {
			$update_contact = "<span class='alert alert-success text-success'>File has been Updated Successfully</span>";
		}
		else {
			$update_contact_error = "<span class='alert alert-danger text-danger'>Error File Did not Upload</span>";
		}
	}
 ?>