<?php
require('config.php');

$username = $_POST['username'];
// echo $username;

// $retrieveMsg = "SELECT Message FROM Chat_Entry WHERE Username='joe'";
// $retrieveMsgResult = $conn->query($retrieveMsg);

// if ($retrieveMsgResult->num_rows == 1) {
// 	echo "Hello";
// } else {
// 	echo "World";
// }

$sql = "SELECT * FROM Chat_Entry WHERE Username='".$username."'";
$result = $conn->query($sql);
$Msg = "";

if ($result->num_rows > 0) {
    //output data of each row
    while($row = $result->fetch_assoc()) {
        $Msg = $row['Message'];
    }
} else {
    echo "0 results";
}
// echo "(" .date("h:i:sa"). ") " .$Msg;
echo $Msg;
?>