<?php
include('db.php'); // Include database connection

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get and sanitize user inputs
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $age = (int) $_POST['age'];
    $dance_class = mysqli_real_escape_string($conn, $_POST['dance_class']);
    $schedule = mysqli_real_escape_string($conn, $_POST['schedule']);
    $experience = mysqli_real_escape_string($conn, $_POST['experience']);

    // Fetch the correct fees from the database based on selected dance class
    $query = "SELECT fees FROM dance_booking WHERE class_name = '$dance_class'";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $fees = $row['fees']; // Get fees from the database

        // Insert booking data into the database
        $insert_query = "INSERT INTO bookings (name, email, phone, age, dance_class, schedule, experience, fees) 
                         VALUES ('$name', '$email', '$phone', $age, '$dance_class', '$schedule', '$experience', $fees)";

        if (mysqli_query($conn, $insert_query)) {
            echo "<script>alert('Your booking has been successfully received!'); window.location.href='booking.php';</script>";
        } else {
            echo "<script>alert('Error: " . mysqli_error($conn) . "'); window.location.href='booking.php';</script>";
        }
    } else {
        echo "<script>alert('Invalid dance class selection.'); window.location.href='booking.php';</script>";
    }
}

// Close the database connection
mysqli_close($conn);
?>
