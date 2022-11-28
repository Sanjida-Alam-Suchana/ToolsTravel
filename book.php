<?php
	$name = $_POST['name'];
    $numberofguest = $_POST['numberofguest'];
    $email = $_POST['email'];
    $fromwhere = $_POST['fromwhere'];
    $arrivals = $_POST['arrivals'];
    $leaving = $_POST['leaving'];
    $address = $_POST['address'];
	// Database connection
	$conn = new mysqli('localhost','root','','travel');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into packagebook(name,number,email,fromwhere, arrivals, leaving, address) values(?, ?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("sisssss", $name , $number ,$email , $fromwhere ,$arrivals , $leaving , $address);
		$execval = $stmt->execute();
		echo "Booked...";
		$stmt->close();
		$conn->close();
	}
?>