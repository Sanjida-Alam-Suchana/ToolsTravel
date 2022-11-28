<?php
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $number = $_POST['number'];
    $email = $_POST['email'];
    $message = $_POST['message'];
	// Database connection
	$conn = new mysqli('localhost','root','','Travel');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into contact(firstname, lastname, number, email, message) values(?, ?, ?, ?, ?)");
		$stmt->bind_param("ssiss", $firstname, $lastname, $number, $email, $message);
		$execval = $stmt->execute();
		echo "Thank you for contacting!";
		$stmt->close();
		$conn->close();
	}
?>