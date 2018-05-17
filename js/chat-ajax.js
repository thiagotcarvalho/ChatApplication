function sendMessage()
{
	var username = document.getElementById('username').value;
	var password = document.getElementById('password').value;
	var dataString = "username=" + username + "&password=" + password;

	if (username == "" || password == "") {
		document.getElementById('login-status').innerHTML = "Please enter a username and password";
	} else {
		$(document).ready(function() {
			$.post("checkLogin.php", dataString, function(response1) {
					if (response1 == "Logged In") {
						document.getElementById('login-status').innerHTML = "";

						var message = document.getElementById('message').value;
						var data = "username=" + username + "&message=" + message;

						$.post("sendMessage.php", data, function(response2) {
							console.log(response2);
						});
					} else {
						document.getElementById('login-status').innerHTML = response1;
					}
				});
		});
	}
}

function receiveMessage()
{
	var username = document.getElementById('user-receive').value;
	var dataString = "username=" + username;

	if (username == "") {
		document.getElementById('user-existence').innerHTML = "Please enter a valid username.";
	} else if (username == document.getElementById('username').value) {
		document.getElementById('user-existence').innerHTML = "Enter a username different than yours.";
	} else {
		$(document).ready(function () {
			$.post("checkExistence.php", dataString, function(response1) {
				// console.log(response);
				if (response1 == "Exists") {
					document.getElementById('user-existence').innerHTML = "";
					
					$.post("receiveMessage.php", dataString, function(response2) {
						// console.log(response2);
						// document.getElementById('message-receive').innerHTML = response2;
						document.getElementById('message-receive').value = response2;
					});
				} else {
					document.getElementById('user-existence').innerHTML = "";
				}
			});
		});
	}
}

var myVar = setInterval(receiveMessage, 500);