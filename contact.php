<?php
	$name = $_POST['name'];
	$email = $_POST['email'];
	$mobile = $_POST['mobile'];
	$message = $_POST['message'];
	

	// Database connection
	$conn = new mysqli('localhost','root','','contactus');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into contactus(name, email, mobile, message) values(?, ?, ?, ?)");
		$stmt->bind_param("ssis", $name, $email, $mobile, $message);
		$execval = $stmt->execute();
		echo $execval;
		// echo "Registration successfully...";
        if (!$execval) {
            echo "Error: " . $stmt->error;
         } else {
             header("Location: submit.html");
exit;
         }

		$stmt->close();
		$conn->close();
	}
?>