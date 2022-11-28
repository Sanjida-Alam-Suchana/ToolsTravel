<?php
    $whereto = $_POST['whereto'];
    $howmany = $_POST['howmany'];
    $arrivals = $_POST['arrivals'];
    $leaving = $_POST['leaving'];
	// Database connection
	$conn = new mysqli('localhost','root','','travel');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into booknow(whereto,howmany, arrivals, leaving) values(?, ?, ?, ?)");
		$stmt->bind_param("siss", $whereto , $howmany ,$arrivals , $leaving);
		$execval = $stmt->execute();
		echo "Booked...";
		$stmt->close();
		$conn->close();
	}
?>