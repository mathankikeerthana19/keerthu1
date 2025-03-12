<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - Dance Class Booking</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f8f8;
            display: flex;
            flex-direction: column;
            min-height: 100vh; /* Ensure body takes full viewport height */
        }

        header {
            background-color: rgb(167, 77, 216); /* Semi-transparent background for readability */
            color: black;
            text-align: center;
            padding: 20px 0;
        }

        nav a {
            color: white;
            margin: 0 15px;
            text-decoration: none;
        }

        nav a:hover {
            text-decoration: underline;
        }

        /* Styling for the image after the navigation bar */
        .about-image {
            width: 100%; /* Make the image full width */
            height: 800px; /* Maintain aspect ratio */
            object-fit: cover; /* Ensure the image covers the section */
        }

        /* About Section */
        .about-section {
            padding: 50px 20px;
            text-align: center;
            background-color: #fff;
            margin: 30px 0;
            flex: 1; /* Allow the content to take the available space */
        }

        .about-section h2 {
            font-size: 36px;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .about-section p {
            font-size: 18px;
            color: #333;
            line-height: 1.6;
            margin-bottom: 20px;
        }

        .about-section .mission,
        .about-section .vision {
            font-size: 20px;
            font-weight: bold;
            color: #444;
        }

        footer {
            background-color: rgb(169, 0, 230); /* Semi-transparent background for footer */
            color: black;
            text-align: center;
            padding: 10px 0;
            margin-top: auto; /* Push the footer to the bottom */
        }
    </style>
</head>
<body>

    <header>
        <h1>Welcome to Our Dance Class Booking System</h1>
        <nav>
            <a href="index.php">Home</a> 
            <a href="about.php">About</a> 
            <a href="classes.php">Classes</a> 
            <a href="registration.php">Booking</a> 
            <a href="admin.php">Admin</a>
          
            <a href="feedback.php">Feedback</a>
        </nav>
    </header>

    <!-- Image Section After Navigation Bar -->
    <img src="about.jpeg" alt="Dance Class Image" class="about-image"> <!-- Replace 'about-image.jpg' with your image path -->

    <!-- About Section -->
    <section class="about-section">
        <h2>About Us</h2>
        <p>Welcome to the best online platform to book dance classes. We offer a variety of dance styles for all levels and ages. Whether you're a beginner or an experienced dancer, we have classes that cater to your needs.</p>
        
        <h3 class="mission">Our Mission</h3>
        <p>Our mission is to make dance education accessible, fun, and exciting. We aim to provide a platform where anyone can easily discover and book dance classes that match their skills and preferences.</p>

        <h3 class="vision">Our Vision</h3>
        <p>We envision a world where dance is a universal language of expression. Through our dance classes, we hope to foster creativity, improve physical health, and bring people together to celebrate the art of movement.</p>

        <h3>Why Choose Us?</h3>
        <p>With professional instructors, easy booking systems, and a wide range of dance styles, we ensure that you get the best dance experience. Our classes are designed to help you grow and improve in a supportive environment.</p>
    </section>

    <!-- Footer -->
    <footer>
        <p>&copy; 2025 Dance Class Booking System. All rights reserved.</p>
    </footer>

</body>
</html>
