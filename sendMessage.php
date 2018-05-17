<?php
require('config.php');

$username = $_POST['username'];
$message = $_POST['message'];
$message = addslashes($message);
// echo $username. " " .$message;

// adding message to DB
// $username = mysql_real_escape_string($username);
// $message = mysql_real_escape_string($message);

$sendMsg = "INSERT INTO Chat_Entry (Message, Username) VALUES ('".$message."', '".$username."')";
$sendMsgResult = $conn->query($sendMsg);
?>