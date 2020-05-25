<?php
  
$db_name = "book";
$mysql_username = "root";
$mysql_password = "";
$server_name = "localhost";

$conn = mysqli_connect($server_name, $mysql_username, $mysql_password, $db_name);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if(isset($_POST['submit'])){
	$field1 = $_POST['field1'];
	$field2 = $_POST['field2'];
	$field3 = $_POST['field3'];
	$field4 = $_POST['field4'];
	$field5 = $_POST['field5'];
	$field6 = $_POST['field6'];
	$field7 = $_POST['field7'];

	$sql = "INSERT INTO book(name, email, phone, date, city, time, address) VALUES ('$field1', '$field2', '$field3', '$field4', '$field5', '$field6', '$field7')";
 	if (mysqli_query($conn, $sql)) {
		echo "<p style='margin-top: 100px; font-family: sans-serif; text-align: center; font-size: 30px;'>Your Appointment Booked Successfully.<br> Our Professionals will contact you shortly...</font> </p> ";
		header('refresh:3; url=../index.html');
	 } else {
		echo "Error: " . $sql . "" . mysqli_error($conn);
	 }
	 mysqli_close($conn);
}
?>

