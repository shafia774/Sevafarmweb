<?php
session_start();
$conn=mysqli_connect("localhost","root","","sevafarm");

if (isset($_POST['uname']) && isset($_POST['password'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$uname = validate($_POST['uname']);
	$pass = validate($_POST['password']);

	if (empty($uname)) {
		header("Location: alogin.php?error=User Name is required");
	    exit();
	}else if(empty($pass)){
        header("Location: alogin.php?error=Password is required");
	    exit();
	}else{
		// hashing the password
        $pass = md5($pass);


		$sql = "SELECT * FROM users WHERE user_name='$uname' AND password='$pass'";

		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) === 1) {
			$row = mysqli_fetch_assoc($result);
            if ($row['user_name'] === $uname && $row['password'] === $pass) {
            	$_SESSION['user_name'] = $row['user_name'];
            	$_SESSION['name'] = $row['name'];
            	$_SESSION['id'] = $row['id'];
            	header("Location: sevafarm.php");
		        exit();
            }else{
				header("Location: alogin.php?error=Incorect User name or password");
		        exit();
			}
		}else{
			header("Location: alogin.php?error=Incorect User name or password");
	        exit();
		}
	}

}else{
	header("Location: loginasst
  .php");
	exit();
}
