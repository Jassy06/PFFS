<?php

include("connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullname = $_POST['fullName'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];

  
    if ($password !== $confirmPassword) {
        echo "<script>alert('Passwords do not match!');</script>";
    } else {
       
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    
        $stmt = $con->prepare("INSERT INTO user (fullname, email, username, password) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $fullname, $email, $username, $hashedPassword);

        if ($stmt->execute()) {
            echo "<script>alert('Registration successful!'); window.location.href = 'login.php';</script>";
        } else {
            echo "<script>alert('Error: " . $stmt->error . "');</script>";
        }

        $stmt->close();
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up Page</title>
    <link rel="stylesheet" href="signup.css">
    <link rel="stylesheet" href="login.css">
</head>

<style>

body {
    font-family: Arial, sans-serif;
    background-image: url('images/signup.png');
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    height: 100vh;
    margin: 0;
    display: flex;
    align-items: center;
    justify-content: center;
}

.signup-container {
    background: rgba(255, 255, 255, 0.8);
    backdrop-filter: blur(12px);
    -webkit-backdrop-filter: blur(12px);
    padding: 40px 30px;
    border-radius: 12px;
    box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
    width: 100%;
    max-width: 450px;
    text-align: left;
}

.signup-container h2 {
    text-align: center;
    margin-bottom: 25px;
    color: #333;
}

.input-group {
    position: relative;
    margin-bottom: 20px;
}

.input-group input {
    width: 100%;
    padding: 12px 40px 12px 12px;
    border: 1px solid #ccc;
    border-radius: 8px;
    font-size: 15px;
    box-sizing: border-box;
}

.toggle-password {
    position: absolute;
    right: 12px;
    top: 50%;
    transform: translateY(-50%);
    cursor: pointer;
    font-size: 18px;
    color: #888;
    user-select: none;
}

button {
    width: 100%;
    padding: 12px;
    background-color: #007bff;
    border: none;
    color: white;
    font-size: 16px;
    border-radius: 8px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

button:hover {
    background-color: #0056b3;
}

.signup-container p {
    text-align: center;
    margin-top: 20px;
    font-size: 14px;
}

.signup-container a {
    color: #007bff;
    text-decoration: none;
}

.signup-container a:hover {
    text-decoration: underline;
}

</style>

<body>
    <div class="signup-container">
        <h2>Sign Up</h2>
        <form id="signupForm" method="POST" action="signup.php">
            <div class="input-group">
                <input type="text" name="fullName" placeholder="Full Name" required>
            </div>
            <div class="input-group">
                <input type="email" name="email" placeholder="Email" required>
            </div>
            <div class="input-group">
                <input type="text" name="username" placeholder="Username" required>
            </div>
            <div class="input-group">
                <input type="password" name="password" placeholder="Password" required>
                <span class="toggle-password" onclick="togglePassword('password')">👁</span>
            </div>
            <div class="input-group">
                <input type="password" name="confirmPassword" placeholder="Confirm Password" required>
                <span class="toggle-password" onclick="togglePassword('confirmPassword')">👁</span>
            </div>
            <button type="submit">Sign Up</button>
        </form>
        <p>Already have an account? <a href="login.php">Log in</a></p>
    </div>
    <script>
        function togglePassword(fieldName) {
            const field = document.querySelector(`input[name="${fieldName}"]`);
            field.type = field.type === 'password' ? 'text' : 'password';
        }



        document.getElementById("signupForm").addEventListener("submit", function(event) {
    event.preventDefault(); 

    let fullName = document.getElementById("fullName").value;
    let email = document.getElementById("email").value;
    let username = document.getElementById("username").value;
    let password = document.getElementById("password").value;
    let confirmPassword = document.getElementById("confirmPassword").value;

    if (password !== confirmPassword) {
        alert("Passwords do not match!");
        return;
    }

    let user = {
        fullName: fullName,
        email: email,
        username: username,
        password: password
    };

    localStorage.setItem(username, JSON.stringify(user));

    alert("Sign-up successful! Redirecting to login page.");
    window.location.href = "login.html"; 
});
localStorage.setItem(username, JSON.stringify(user)); 

alert("Sign-up successful! You can now log in.");
window.location.href = "signup.html"; 
function togglePassword(inputId) {
var passwordField = document.getElementById(inputId);
var toggleIcon = passwordField.nextElementSibling; 

if (passwordField.type === "password") {
    passwordField.type = "text"; 
    toggleIcon.textContent = "Hide"; 
} else {
    passwordField.type = "password"; 
    toggleIcon.textContent = "Unhide"; 
}
}
    </script>
</body>
</html>

<?php
$con->close();  
?>      