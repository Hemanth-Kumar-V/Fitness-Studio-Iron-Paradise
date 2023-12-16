<?php
	$fullname = $_POST['fullname'];
	$email = $_POST['email'];
	$gender = $_POST['gender'];
	$mobile = $_POST['mobile'];
	$fulladdress = $_POST['fulladdress'];
	$DOB = $_POST['DOB'];
    $plan = $_POST['plan'];

	// Database connection
	$conn = new mysqli('localhost','root','','fitness');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into booknow(fullname, email, gender, mobile, fulladdress, DOB, plan) values(?, ?, ?, ?, ?, ?,?)");
		$stmt->bind_param("sssisss", $fullname, $email, $gender, $mobile, $fulladdress, $DOB, $plan);
		$execval = $stmt->execute();
		echo $execval;
		// echo "Registration successfully...";
        if (!$execval) {
            echo "Error: " . $stmt->error;
        } else {
            echo "Registration successfully...";
        }

		$stmt->close();
		$conn->close();
	}
?>