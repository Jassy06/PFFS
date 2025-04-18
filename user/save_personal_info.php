<?php
include("../connection.php");


session_start();


$fullname = $_POST['fullname'] ?? ($_SESSION['fullname'] ?? '');
$address  = $_POST['address'] ?? '';
$email    = $_POST['email'] ?? '';
$phone    = $_POST['phone'] ?? '';
$gender   = $_POST['gender'] ?? '';
$status   = $_POST['status'] ?? '';

if (empty($fullname)) {
 
    $fullname = $_SESSION['fullname'] ?? '';
}


$stmt = $con->prepare("INSERT INTO personal_info (fullname, address, email, phone, gender, status) VALUES (?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssssss", $fullname, $address, $email, $phone, $gender, $status);

if ($stmt->execute()) {
   
    if ($status === 'Student') {
        $_SESSION['user'] = [
            'fullname' => $fullname,
            'address' => $address,
            'email' => $email,
            'phone' => $phone,
            'gender' => $gender,
            'status' => $status,
        ];
        
    
        echo "<script>alert('Personal information saved successfully!'); window.location.href='FF.php';</script>";
    } else {

        echo "<script>alert('Personal information saved successfully!'); window.location.href='FF.php';</script>";
    }
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$con->close();
?>
