<?php
require('config.php');

// for the main of the HTML document
$username = $_POST['username'];
$password = $_POST['password'];

$login = "SELECT * FROM Login_Credentials WHERE Username='".$username."' and password='".$password."'";
$loginResult = $conn->query($login);

if ($loginResult->num_rows == 1) {
	echo "Logged In";
} else {
	echo "Username and/or password is incorrect!";
}
?>