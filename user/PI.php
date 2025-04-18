<?php
session_start();
$fullname = $_SESSION['fullname'] ?? '';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personal Information - Punta Elementary School</title>
    <link rel="stylesheet" href="PI.css">
    <style>
        body {
            background-image: url('../images/PerInfo.png');
            background-color: #f0f0f0;
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center top;
            background-attachment: fixed;

            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .container {
            background: rgba(255, 255, 255, 0.35);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            padding: 30px 40px;
            border-radius: 15px;
            box-shadow: 0px 8px 24px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 500px;
            box-sizing: border-box;
        }

        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 25px;
        }

        label {
            font-weight: 600;
            margin-top: 15px;
            display: block;
            color: #222;
        }

        input[type="text"],
        input[type="email"],
        input[type="tel"],
        select {
            width: 100%;
            padding: 12px;
            margin-top: 6px;
            border: 1px solid #ccc;
            border-radius: 6px;
            box-sizing: border-box;
            font-size: 15px;
            transition: 0.3s;
        }

        input:focus,
        select:focus {
            outline: none;
            border-color: #1e00ff;
            box-shadow: 0 0 5px rgba(30, 0, 255, 0.3);
        }

        button {
            background: #1e00ff;
            color: #fff;
            border: none;
            padding: 12px;
            margin-top: 25px;
            width: 100%;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            border-radius: 6px;
            transition: background 0.3s ease;
        }

        button:hover {
            background: #1500cc;
        }

        a {
            display: block;
            margin-top: 15px;
            text-align: center;
            color: #555;
            text-decoration: none;
            font-size: 14px;
        }

        a:hover {
            color: #1e00ff;
        }

        @media (max-width: 600px) {
            .container {
                padding: 20px;
                margin: 10px;
            }

            input, select, button {
                font-size: 14px;
            }
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Enter Your Personal Information</h2>
    <form id="personalInformation" method="POST" action="save_personal_info.php">
        <label for="name">Full Name:</label>
        <input type="text" name="name" id="name" value="<?= htmlspecialchars($fullname) ?>" required>

        <label for="address">Address:</label>
        <input type="text" name="address" id="address" required>

        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required>

        <label for="phone">Phone:</label>
        <input type="tel" name="phone" id="phone" required>

        <label for="gender">Gender:</label>
        <select name="gender" id="gender" required>
            <option value="">Select</option>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
            <option value="Other">Other</option>
        </select>

        <label for="Status">Status:</label>
        <select name="status" id="Status" required>
            <option value="">Select</option>
            <option value="Student">Student</option>
            <option value="Teacher">Teacher</option>
            <option value="Parent">Parent</option>
            <!-- <option value="Administrator">Administrator</option> -->
        </select>

        <button type="submit">Proceed</button>
        <a href="logout.php">Logout</a>
    </form>
</div>

</body>
</html>
