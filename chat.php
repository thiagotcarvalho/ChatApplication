<?php
require('config.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Chat</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="chat-style.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>

	<div class="container">
		<!-- Lists the names of everyone able to chat -->
		<header>
			<div>
				<b>Active Users:</b>
				<?php
				// lists all users available to chat
				$users = "SELECT Username FROM Login_Credentials";
				$usersResult = $conn->query($users);
				if ($usersResult->num_rows > 0) {
					// output data from each row
					while ($row = $usersResult->fetch_assoc()) {
						echo " - " .$row["Username"]; 
					}
				}
				?>
			</div>
		</header>

		<br/>

		<!-- Login and textbox for user -->
		<main>
			<h4>To Send A Message, Please Login</h4><br/>
			<div id="chat-send">
				<div class="col-sm-6">
					<label>Username:</label><input type="text" id="username">
				</div>
				<div class="col-sm-6">
					<label>Password:</label><input type="password" id="password"><br/>
				</div>
				<textarea id="message" placeholder="enter content here" onkeyup="sendMessage()" rows="4" cols="50"></textarea><br/>
				<div id="login-status"></div>
			</div>
		</main>

		<br/>

		<!-- Name look-up and textbox for response from different user -->
		<footer>
			<h4>To Receive A Message, Please Enter the Username of A Valid User</h4><br/>
			<div id="chat-receive">
				<label>Username:</label><input type="text" id="user-receive" onkeyup="receiveMessage(); false;"><br/><br/>
				<!-- <div id="message-receive">...</div> -->
				<textarea id="message-receive" rows="4" cols="50"></textarea>
				<div id="user-existence"></div>
			</div>
		</footer>
	</div>

	<script src="chat-ajax.js"></script>
</body>
</html>