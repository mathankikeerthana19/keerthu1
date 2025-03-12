<?php
session_start();

// Initialize error message and success message variables
$error_message = "";
$success_message = ""; // Initialize success message to prevent warnings

// Database connection
$servername = "localhost";  // Your database host
$username = "root";         // Your database username
$password = "";             // Your database password
$dbname = "dance_booking";  // Your database name

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Redirect logged-in users to the booking page
if (isset($_SESSION['user_id'])) {
    header("Location: booking.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Collect input data
    $username = trim($_POST['username']);  // Trim any leading or trailing spaces
    $password = $_POST['password'];

    // Debugging: Check if username is trimmed correctly
    // echo "Trimmed username: " . $username . "<br>";  // Uncomment to debug

    // Validate user credentials
    $sql = "SELECT * FROM login WHERE username=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);  // Bind parameters to prevent SQL injection
    $stmt->execute();
    $result = $stmt->get_result();

    // Debugging: Check if we got any result
    // var_dump($result->num_rows); // Uncomment to debug if result is returned

    if ($result->num_rows > 0) {
        // User found, now check the password
        $row = $result->fetch_assoc();
        
        // Verify the password using password_verify
        if (password_verify($password, $row['password'])) {
            // Password is correct, login successful
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['username'] = $row['username'];

            // Set success message
            $success_message = "Login successful! Redirecting to booking page...";
            header("refresh:2;url=booking.php");  // Redirect after 2 seconds
            exit();
        } else {
            // Invalid password
            $error_message = "Invalid password.";
        }
    } else {
        // No user found with this username
        $error_message = "No user found with this username.";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url('login.jpeg'); /* Set the background image */
            background-size: cover; /* Make the image cover the entire background */
            background-position: center center; /* Center the background image */
            background-attachment: fixed; /* Keep the background fixed while scrolling */
            height: 100vh; /* Ensure the page takes up full height */
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .login-container {
            background-color: white;
            padding: 30px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            width: 300px;
        }

        input {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
        }

        button {
            width: 100%;
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }

        h2 {
            text-align: center;
        }

        .error-message {
            color: red;
            text-align: center;
            margin-top: 10px;
        }

        .success-message {
            color: green;
            text-align: center;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2>Login to Book Dance Classes</h2>
        <form method="POST" action="login.php">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <a href="booking.php">
    <button type="button">Login</button>
</a>

        </form>

        <!-- Display success or error message below the form -->
        <?php if ($error_message): ?>
            <div class="error-message">
                <?php echo $error_message; ?>
            </div>
        <?php elseif ($success_message): ?>
            <div class="success-message">
                <?php echo $success_message; ?>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>
