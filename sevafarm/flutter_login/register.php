<?php
//creates order
$mysqli = new mysqli("localhost","root","","sevafarm");

// Check connection
if ($mysqli -> connect_errno) {
  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
  exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$username = $_POST["username"];
	$password = $_POST["password"];
  $password = md5($password);

	$name = $_POST["name"];

$sql = "INSERT into login (username,password,name) values ('$username','$password','$name')";
    // The request is using the POST method
if ($mysqli->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $mysqli->error;
}

$mysqli->close();
}
?>
