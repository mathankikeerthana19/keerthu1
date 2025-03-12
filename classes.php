<?php
// Include your database connection file
include('db.php');

// Fetch data from the 'dance_booking' table
$query = "SELECT * FROM dance_booking";
$result = mysqli_query($conn, $query);

// Error handling for query
if (!$result) {
    die("Query failed: " . mysqli_error($conn));
}

// Check if there are any rows returned
$no_classes_message = (mysqli_num_rows($result) == 0) ? "No classes available at the moment." : null;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dance Classes</title>
    <link rel="stylesheet" href="styles.css"> <!-- Link to your CSS file -->
</head>
<body>

    <!-- Header with Navbar -->
    <header>
        <h1>Welcome to Our Dance Class Booking System</h1>
        <nav>
            <a href="index.php">Home</a> |
            <a href="about.php">About</a> |
            <a href="classes.php">Classes</a> |
            <a href="registration.php">Booking</a> |
            <a href="admin.php">Admin</a> |
            <a href="feedback.php">Feedback</a>
        </nav>
    </header>

    <!-- Hero Section -->
    <section class="hero-section">
        <h2>Explore Our Dance Classes</h2>
    </section>

    <div class="main-content">
        <h2 class="intro-text">Choose the Dance Class That Fits You!</h2>
        <p>We offer various dance styles for every level. Whether you're a beginner or an advanced dancer, there's something for you!</p>
        <p><strong>Browse through our available classes and book today!</strong></p>
        <p><a href="booking.php">Book a Class</a> and start your dance journey!</p>
    </div>

    <div class="container">
        <!-- Display a message if no classes are available -->
        <?php if ($no_classes_message): ?>
            <p><?php echo $no_classes_message; ?></p>
        <?php else: ?>
            <div class="grid">
                <?php while ($row = mysqli_fetch_assoc($result)): ?>
                    <div class="class-card">
                        <!-- Fetch image directly from the database -->
                        <img src="<?php echo htmlspecialchars($row['image']); ?>" alt="<?php echo htmlspecialchars($row['class_name']); ?>" class="class-image">

                        <h2><?php echo htmlspecialchars($row['class_name']); ?></h2>
                        <p><?php echo nl2br(htmlspecialchars($row['description'])); ?></p>
                        <p><strong>Duration:</strong> <?php echo htmlspecialchars($row['duration']); ?> minutes</p>
                        
                        <p><strong>Fees:</strong> ₹<?php echo number_format($row['fees'], 2); ?></p>
<p><strong>Timing:</strong> <?php echo htmlspecialchars($row['timing']); ?></p> <!-- Display timing -->
 <!-- Display fees properly -->
                    </div>
                <?php endwhile; ?>
            </div>
        <?php endif; ?>
    </div>

</body>
</html>

<?php
// Close database connection
mysqli_close($conn);
?>
