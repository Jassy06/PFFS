<?php
session_start();

$fullname = $_SESSION['fullname'] ?? '';
$role = $_SESSION['role'] ?? '';


if ($role !== 'admin') {
    header("Location: user/PI.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="Ahome.css">
    <title>Admin Home</title>
    <link rel="stylesheet" href="Ahome.png">
</head>

<style>
    body {
    display: flex;
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
}

.sidebar {
    width: 200px;
    background-color: #002f6c;
    padding: 20px;
    height: 95vh;
    color:white;
}

.sidebar ul {
    list-style: none;
    padding: 0;
}


.sidebar ul li {
    margin: 15px 0;
}

.sidebar ul li a {
    text-decoration: none;
    font-weight: bold;
    color: rgb(255, 255, 255);
}

.sidebar ul li a.active {
    color: rgb(255, 255, 255);
}

.logo {
    width: 1000px; 
    display: block;
    margin: 50px auto; 

}

.welcome-text {
    font-size: 40px; 
    font-weight: 700; 
    text-align: center;
    font-family: 'Poppins', sans-serif;
    text-shadow: 5px 5px 10px rgba(0, 0, 0, 0.3); 
    color: #333; 
}
body {
    display: flex;
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;

    background-image: url('../images/Ahome.png'); 
    background-size: cover;
    background-position: center; 
    background-repeat: no-repeat; 
    background-attachment: fixed;
    height: 100vh; 
}

.Ahome{
    background-image: url('//images/Ahome.png');
}

.sidebar {
    position: fixed; 
    top: 0;
    left: 0;
    width: 200px;
    background-color: #002f6c;
    padding: 20px;
    height: 100vh; 
    color: white;
    overflow: hidden;
}


.menu {
    flex-grow: 1; 
}

.logout {
    margin-top: auto; 
    color: white;
    font-weight: bold;
}



#logout {
    margin-top: auto; 
    color: white;
    font-weight: bold;
}
</style>

<body>
    <div class="sidebar">
    <ul>
                <h2>MENU</h2>
                <li><a href="Ahome.php">HOME</a></li>
                <li><a href="Adashboard.php"class="active" >DASHBOARD</a></li>
                <li><a href="Adocument.php" >DOCUMENT</a></li>        
                <li><a href="logout.php" id="logout">LOG OUT</a></li>
            </ul>
    </div>
    




    <script>
        document.getElementById("logout").addEventListener("click", function() {
    alert("Logging out...");
    window.location.href = "login.html";
});
function loadPage(page) {
    var contentArea = document.getElementById("content-area");

    if (page === "document") {
        contentArea.innerHTML = `<iframe src="Adocument.html" style="width: 100%; height: 600px; border: none;"></iframe>`;
    } else if (page === "dashboard") {
        contentArea.innerHTML = `<h2>DASHBOARD UI LOADED</h2><p>Dashboard content goes here...</p>`;
    } else {
        contentArea.innerHTML = `<img src="Slogo.png" alt="School Logo" class="logo">
                                 <h1 class="welcome-text">WELCOME ADMIN!</h1>`;
    }
}

    </script>
</body>
</html>
