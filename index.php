<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Punta Elementary School - Feedback Form</title>
    <style>
     
        body {
            background: linear-gradient(to right, #001f3f, #0074D9); 
            font-family: 'Arial', sans-serif;
            color: white;
            margin: 0;
            padding: 0;
        }

      
        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: rgba(0, 31, 63, 0.9); 
            padding: 15px 20px;
            position: fixed;
            width: 100%;
            top: 0;
            left: 0;
            z-index: 1000;
        }

        .navbar h1 {
            margin: 0;
            font-size: 22px;
            font-weight: bold;
        }

        .navbar ul {
            list-style: none;
            display: flex;
            padding: 0;
            margin: 0;
            
        }

        .navbar ul li {
            margin: 0 15px;
        }

        .navbar ul li a {
            text-decoration: none;
            color: white;
            font-size: 16px;
            font-weight: bold;
            padding: 8px 12px;
            transition: all 0.3s ease;
            text-align: right;
        }

        .navbar ul li a:hover {
            background: #ffcc00;
            color: black;
            border-radius: 5px;
        }

      
        .hero {
            height: 85vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            background: url('images/school.jpg') no-repeat center center/cover;
            position: relative;
            margin-top: 60px; 
        }

        .hero::before {
            content: "";
            position: absolute;
            top: 0; left: 0; width: 100%; height: 100%;
            background: rgba(0, 0, 0, 0.5); 
        }

        .hero h2 {
            position: relative;
            font-size: 40px;
            margin-bottom: 10px;
        }

        .hero p {
            position: relative;
            font-size: 18px;
            width: 60%;
        }

        .btn {
            position: relative;
            display: inline-block;
            padding: 12px 20px;
            background: #ffcc00;
            color: black;
            font-size: 16px;
            font-weight: bold;
            text-decoration: none;
            border-radius: 5px;
            transition: 0.3s;
            margin-top: 20px;
        }

        .btn:hover {
            background: white;
        }

 
        main {
            background: rgba(255, 255, 255, 0.1);
            padding: 40px;
            margin: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(255, 255, 255, 0.2);
        }

        h2 {
            text-align: center;
            font-size: 30px;
        }


        .contact {
            text-align: center;
            margin-top: 40px;
        }

        .contact ul {
            list-style: none;
            padding: 0;
        }

        .contact ul li {
            margin: 10px 0;
        }

        .contact a {
            color: #ffcc00;
            text-decoration: none;
            font-weight: bold;
        }

        .contact a:hover {
            text-decoration: underline;
        }
        .navbar-logo {
    height: 300px;
    width: auto;  
}


        footer {
            text-align: center;
            background: rgba(0, 31, 63, 0.9);
            padding: 20px;
            margin-top: 40px;
        }

        footer p {
            margin: 0;
            font-weight: bold;
        }

        footer a {
            color: #ffcc00;
            text-decoration: none;
        }

        footer a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar">
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="#contact">Contact Us</a></li>
            <li><a href="login.php">Login</a></li>
            
        </ul>
    </nav>

    <!-- Hero Section -->
    <section class="hero">
        <a href="index.html">
            <img src="images/Slogo.png" alt="Punta Elementary School Logo" class="navbar-logo">
        </a>
        <h2>Welcome to Punta Elementary School</h2>
        <p>Your trusted institution for quality education and student empowerment. Join us today to shape a brighter future.</p>
        <a href="signup.php" class="btn">Get Started</a>
    </section>

    <!-- Main Content -->
    <main>
        <section id="about">
            <h2>About Our School</h2>
            <p>Punta Elementary School provides a nurturing learning environment that fosters academic excellence, creativity, and social responsibility. Our feedback system allows for effective communication between parents, teachers, and students.</p>
        </section>

        <section id="contact" class="contact">
            <h2>Contact Us</h2>
            <ul>
                <li>📧 Email: <a href="mailto:131501@deped.gov.ph">131501@deped.gov.ph</a></li>
                <li>🔗 Facebook: <a href="https://www.facebook.com/share/15E2jAt9Nw/">Visit our page</a></li>
            </ul>
        </section>
    </main>

    <!-- Footer -->
    <footer>
        <p>All Rights Reserved &copy; Punta Elementary School 2025</p>
        <a href="#top">Back to Top</a>
    </footer>

</body>
</html>
