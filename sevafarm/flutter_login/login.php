<?php
	$db = new mysqli("localhost","root","","sevafarm");

	$username = $_POST['username'];
	$password = $_POST['password'];
	$password = md5($password);





	$sql = "SELECT * FROM login WHERE username = '".$username."' AND password = '".$password."'";

	$result = mysqli_query($db,$sql);
	$count = mysqli_num_rows($result);
	$row = mysqli_fetch_assoc($result);


	if ( $count > 0 ) {
		$status = "Success";
		$message = "Login Success";
		$user = $row;
		$response = array(
			'user' => $user,
			'status' => $status,
			'message' => $message,
		);

	}else{
		$response = array(
			'status' => "Error",
			'message' => "Invalid Username or Password",
		);

	}

	echo json_encode($response);
	die();

?>
