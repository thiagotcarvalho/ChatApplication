<?php
// MySQL login credentials
$host = "sql2.njit.edu";
$user = "tcd8";
$pass = "Ng6rIIq1";
$database = "tcd8";

// Setting up DB connection
$conn = new mysqli($host, $user, $pass, $database);
if ($conn->connect_error) {
	die('Connection Error ('.$conn->connect_errno.') '.$conn->connect_error);
}
?>