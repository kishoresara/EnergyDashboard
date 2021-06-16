<?php
// mysqli
error_reporting(E_ERROR | E_PARSE);
$servername = "127.0.0.1";
$username = "root";
$password = "system91";
$dbname = "Helloworld";
$givenroll = "'" . $_POST['rollno'] . "'";
$givenpass = "'" . $_POST['password'] . "'";
$check = 0;

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
else{
  //echo "connected successfulllly";
}

//$sql = "SELECT firstname, lastname FROM Users WHERE rollno=$givenroll AND password=$givenpass";
$sql = "INSERT INTO customer (Cusid, Cusname, username, password, email, Phone, address) VALUES (003,  'Kishore Saravanan' , 'kish91' , 'system91' , 'kishore91@gmail.com' , 9566020744, 'abc street' );";


$result = $conn->query($sql);
if($result->num_rows > 0){
	echo $result;
}
?>