<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dance Class Booking</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            height: 100%;
            display: flex;
            flex-direction: column;
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

        /* Styling for the Hero Section with Full-Screen Background Image */
        .hero-section {
            background-image: url('dan2.jpeg'); /* Path to your background image */
            background-size: cover; /* Ensures the image covers the entire section */
            background-position: center center; /* Centers the image */
            color: rgb(169, 0, 230);
            width: 100%; /* Make the image full width */
            height: 60vh; /* Adjust height for better scrolling behavior */
            object-fit: cover; /* Make the image cover the section */
            display: flex;
            justify-content: center; /* Center text horizontally */
            align-items: flex-end; /* Align text to the bottom */
            position: relative; /* To position the text */
        }

        .hero-section h2 {
            font-size: 48px;
            font-weight: bold;
            text-align: center;
            text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.7); /* Adding text shadow for readability */
            margin: 0;
            position: absolute; /* Position the text absolutely */
            bottom: 20px; /* Space from the bottom */
            width: 100%; /* Ensure text is centered */
        }

        .main-content {
            padding: 20px;
            text-align: center;
        }

        .main-content h2 {
            font-size: 28px;
            color: #333;
            margin-bottom: 20px;
        }

        .main-content p {
            font-size: 18px;
            color: #555;
            margin-bottom: 20px;
        }

        .main-content a {
            color: #007bff;
            text-decoration: none;
        }

        .main-content a:hover {
            text-decoration: underline;
        }

        footer {
            background-color: rgb(169, 0, 230); /* Semi-transparent background for footer */
            color: black
            
            ;
            text-align: center;
            padding: 10px 0;
            margin-top: auto; /* Pushes the footer to the bottom */
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

    <!-- Hero Section with Full-Screen Background Image and Centered Text -->
    <section class="hero-section">
        <h2>The Art of Movement</h2>
    </section>

    <div class="main-content">
        <h2 class="intro-text">Get Moving with Our Dance Classes!</h2>
        <p>Whether you're looking to learn the latest dance trends or improve your skills, we have a class for you! Join our passionate instructors and become part of the dance community.</p>

        <p><strong>Choose your favorite style and book a class today!</strong></p>

        <p><a href="classes.php">Browse Classes</a> and find the perfect fit for you!</p>
    </div>

    <footer>
        <p>&copy; 2025 Dance Class Booking System. All rights reserved.</p>
    </footer>

</body>
</html>
