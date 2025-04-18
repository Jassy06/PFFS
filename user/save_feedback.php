<?php
include("../connection.php");
session_start(); // Required at the top of every file that uses $_SESSION

// Set JSON response header
header('Content-Type: application/json');

// Get fullname from session
$fullname = $_SESSION['fullname'] ?? '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $questions = [];
    for ($i = 1; $i <= 15; $i++) {
        $key = "q" . $i;
        $questions[$key] = $_POST[$key] ?? '';
    }

    // Prepare SQL to insert including fullname
    $stmt = $con->prepare("INSERT INTO feedback (fullname, q1, q2, q3, q4, q5, q6, q7, q8, q9, q10, q11, q12, q13, q14, q15) 
                           VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

    $stmt->bind_param(
        "ssssssssssssssss",
        $fullname,
        $questions['q1'], $questions['q2'], $questions['q3'], $questions['q4'], $questions['q5'],
        $questions['q6'], $questions['q7'], $questions['q8'], $questions['q9'], $questions['q10'],
        $questions['q11'], $questions['q12'], $questions['q13'], $questions['q14'], $questions['q15']
    );

    if ($stmt->execute()) {
        // Store feedback responses in session for receipt-style display
        $_SESSION['feedback_data'] = $questions;

        echo json_encode(["success" => true, "message" => "Feedback saved!"]);
    } else {
        echo json_encode(["success" => false, "message" => "Error: " . $stmt->error]);
    }

    $stmt->close();
    $con->close();
} else {
    echo json_encode(["success" => false, "message" => "Invalid request method."]);
}
