<?php
$fullname = $_POST['fullname'];
$email = $_POST['email'];
$gender = $_POST['gender'];
$mobile = $_POST['mobile'];
$fulladdress = $_POST['fulladdress'];
$DOB = $_POST['DOB'];
$plan = $_POST['plan'];

if(!empty($fullname) || !empty($email) || !empty($gender) || !empty($mobile) || !empty($fulladdress) || !empty($DOB) || !empty($plan))
{

    $host = "localhost";
    $username = "root";
    $password = "";
    $dbname = "iron_paradise";


    //create connection

    $conn = mysqli_connect($host, $username, $password, $dbname);
    if(mysqli_connect_errno())
    {
        die("Connect Error:" .mysqli_connect_error());
    }
    
    $sql = "INSERT INTO book_now (fullname, email, gender,mobile,fulladdress, DOB, plan)
    VALUES (?, ?, ?, ?, ?, ?, ?)";

    $stmt = mysqli_stmt_init($conn);

    if ( ! mysqli_stmt_prepare($stmt, $sql)) {
      
         die(mysqli_error($conn));
    }
    mysqli_stmt_bind_param($stmt, "sssssss",$fullname,$email,$gender,$mobile,$fulladdress,$DOB,$plan);
    
    mysqli_stmt_execute($stmt);

    echo "Record saved.";

                         
    
}


?>