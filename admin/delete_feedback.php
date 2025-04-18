<?php
session_start();


$role = $_SESSION['role'] ?? '';
if ($role !== 'admin') {
    header("Location: user/PI.php");
    exit();
}

include("../connection.php");

$id = $_GET['id'] ?? '';
if (!$id || !is_numeric($id)) {
    echo "Invalid ID.";
    exit();
}


$sql = "DELETE FROM feedback WHERE id = ?";
$stmt = $con->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();

if ($stmt->affected_rows > 0) {
    header("Location: Adocument.php?message=deleted"); 
    exit();
} else {
    echo "Failed to delete feedback.";
}
