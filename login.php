<?php
session_start();

include("connection.php"); 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $con->prepare("SELECT * FROM user WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();

        if (password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['fullname'] = $user['fullname'];
            $_SESSION['role'] = $user['role']; 

            echo "<script>alert('Login successful!');</script>";

            if ($user['role'] === 'admin') {
                echo "<script>window.location.href = 'admin/Ahome.php';</script>";
            } else {
                echo "<script>window.location.href = 'user/PI.php';</script>";
            }
        } else {
            echo "<script>alert('Invalid password.');</script>";
        }
    } else {
        echo "<script>alert('User not found.');</script>";
    }

    $stmt->close();
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="login.css">
</head>

<style>

body {
    font-family: Arial, sans-serif;
    background-image: url('images/Log in.png');
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    margin: 0;
    height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
}

.login-container {
    background: rgba(255, 255, 255, 0.85);
    backdrop-filter: blur(10px);
    -webkit-backdrop-filter: blur(10px);
    padding: 40px 30px;
    border-radius: 12px;
    box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
    width: 100%;
    max-width: 420px;
    text-align: left;
}

.login-container .logo {
    display: block;
    margin: 0 auto 20px auto;
    width: 80px;
    border-radius: 50%;
}

.login-container h2 {
    text-align: center;
    margin-bottom: 30px;
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

.options {
    display: flex;
    flex-direction: column;
    align-items: left;
    justify-content: left;
    font-size: 14px;
    margin-bottom: 25px;
    gap: 10px;
    text-align: left;
}

.options-left {
    display: flex;
    align-items: left;
    justify-content: left;
    gap: 0;
}


.options label {
    margin-left: 0;
}


.options a {
    color: #007bff;
    text-decoration: none;
}

.options a:hover {
    text-decoration: underline;
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

.login-container p {
    text-align: center;
    margin-top: 20px;
    font-size: 14px;
}

.login-container a {
    color: #007bff;
    text-decoration: none;
}

.login-container a:hover {
    text-decoration: underline;
}

</style>


<body>
    <div class="login-container">
        <img src="images/logo.jpg" alt="School Logo" class="logo">
        <h2>Log in</h2>
        <form id="loginForm" method="POST" action="login.php">
    <div class="input-group">
        <input type="text" name="username" placeholder="Username" required>
    </div>
    <div class="input-group">
        <input type="password" name="password" placeholder="Password" required>
        <span class="toggle-password" onclick="togglePassword()">👁</span>
    </div>

    <div class="options">
    <div class="options-left">
    <label for="rememberMe" style="display: flex; align-items: left; gap: 0;">
  <input type="checkbox" name="rememberMe" id="rememberMe" style="margin: 0;">
  <span style="margin: 0;">Remember Me</span>
</label>


    </div>
   
</div>



    <button type="submit">Log in</button>
</form>

        <p> <a href="#">Forgot Password?</a> or <a href="signup.php">Sign up</a></p>
    </div>

    <script>
        function togglePassword() {
            const input = document.querySelector('input[name="password"]');
            input.type = input.type === 'password' ? 'text' : 'password';
        }
    </script>
</body>
</html>
