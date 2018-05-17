<?php
require('config.php');

$username = $_POST['username'];

$checkUser = "SELECT Username FROM Login_Credentials WHERE Username='".$username."'";
$checkUserResult = $conn->query($checkUser);

if ($checkUserResult->num_rows == 1) {
	echo "Exists";
} else {
	echo "Username could not be found.";
}
?>