<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $email = $_POST['email'];
    $password = $_POST['password'];
    
	// Database connection
	$conn = new mysqli('localhost','root','','travel');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("select * from signup where email = ?");
		$stmt->bind_param("s", $email);
		$stmt->execute();
        $stmt_result = $stmt->get_result();
        if($stmt_result->num_rows > 0){
            $data = $stmt_result->fetch_assoc();
            if($data['password'] = $password){
                echo "Login successful..";
            }else {
                echo "Invalid Email or Password!";
            }
        }else {
            echo "Invalid Email or Password!";
        }
	}
}
?>