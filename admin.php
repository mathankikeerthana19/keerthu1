<?php
session_start();
include('db.php');


// Handle class deletion
if (isset($_GET['delete_class'])) {
    $class_id = (int) $_GET['delete_class'];
    mysqli_query($conn, "DELETE FROM dance_booking WHERE id = $class_id");
    header("Location: admin.php?page=manage_classes");
    exit;
}

// Handle new class addition
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add_class'])) {
    $class_name = mysqli_real_escape_string($conn, $_POST['class_name']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $duration = mysqli_real_escape_string($conn, $_POST['duration']);

    $query = "INSERT INTO dance_booking (class_name, description, duration) VALUES ('$class_name', '$description', '$duration')";
    mysqli_query($conn, $query);
    header("Location: admin.php?page=manage_classes");
    exit;
}

// Fetch data for dashboard
$booking_count_query = mysqli_query($conn, "SELECT COUNT(*) as total FROM bookings");
$booking_count = $booking_count_query ? mysqli_fetch_assoc($booking_count_query)['total'] : 0;

$feedback_count_query = mysqli_query($conn, "SELECT COUNT(*) as total FROM feedback");
$feedback_count = $feedback_count_query ? mysqli_fetch_assoc($feedback_count_query)['total'] : 0;

$class_count_query = mysqli_query($conn, "SELECT COUNT(*) as total FROM dance_booking");
$class_count = $class_count_query ? mysqli_fetch_assoc($class_count_query)['total'] : 0;

// Fetch user bookings
$query_bookings = "SELECT * FROM bookings ORDER BY id DESC";
$result_bookings = mysqli_query($conn, $query_bookings);

// Fetch user feedback
// Fetch user feedback
$query_feedbacks = "SELECT * FROM feedback ORDER BY created_at DESC";
$result_feedbacks = mysqli_query($conn, $query_feedbacks); // Execute query

if (!$result_feedbacks) {
    die("Error fetching feedback: " . mysqli_error($conn)); // Debugging message
}


// Fetch classes
$query_classes = "SELECT * FROM dance_booking";
$result_classes = mysqli_query($conn, $query_classes);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <style>
        body { display: flex; font-family: Arial, sans-serif; margin: 0; }
        .sidebar { width: 200px; height: 100vh; background: rgb(167, 77, 216); color: white; padding: 20px; position: fixed; }
        .sidebar a { display: block; color: white; padding: 10px; text-decoration: none; }
        .sidebar a:hover { background: rgb(145, 60, 190); }
        .main-content { margin-left: 220px; padding: 20px; width: calc(100% - 220px); }
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        table, th, td { border: 1px solid black; padding: 10px; text-align: left; }
        .form-container { margin-bottom: 20px; background: #f9f9f9; padding: 15px; border-radius: 8px; }
        .dashboard-container { display: flex; gap: 20px; margin-bottom: 20px; }
        .dashboard-box { background: #f4f4f4; padding: 30px; border-radius: 8px; text-align: center; width: 250px; }
    </style>
</head>
<body>

    <div class="sidebar">
    <h2>Admin Panel</h2>
    <a href="admin.php?page=dashboard">Dashboard</a>
    <a href="admin.php?page=user_booking">User Booking</a>
    <a href="admin.php?page=user_feedback">User Feedback</a>
    <a href="manage_classes.php">Class Management</a>  

</div>

<div class="main-content">
    <?php
    $page = isset($_GET['page']) ? $_GET['page'] : 'dashboard';

    if ($page == "dashboard") { ?>
        <h2>Dashboard</h2>
        <div class="dashboard-container">
            <div class="dashboard-box">
                <h3>Total Bookings</h3>
                <p><?php echo $booking_count; ?></p>
            </div>
            <div class="dashboard-box">
                <h3>Total Feedback</h3>
                <p><?php echo $feedback_count; ?></p>
            </div>
            <div class="dashboard-box">
                <h3>Total Classes</h3>
                <p><?php echo $class_count; ?></p>
            </div>
        </div>
    <?php } elseif ($page == "user_booking") { ?>
        <h2>User Bookings</h2>
        <table>
            <tr><th>Name</th><th>Email</th><th>Phone</th><th>Age</th><th>Class</th><th>Schedule</th><th>Experience</th></tr>
            <?php while ($row = mysqli_fetch_assoc($result_bookings)): ?>
                <tr>
                    <td><?php echo htmlspecialchars($row['name']); ?></td>
                    <td><?php echo htmlspecialchars($row['email']); ?></td>
                    <td><?php echo htmlspecialchars($row['phone']); ?></td>
                    <td><?php echo htmlspecialchars($row['age']); ?></td>
                    <td><?php echo htmlspecialchars($row['dance_class']); ?></td>
                    <td><?php echo htmlspecialchars($row['schedule']); ?></td>
                    <td><?php echo nl2br(htmlspecialchars($row['experience'])); ?></td>
                </tr>
            <?php endwhile; ?>
        </table>
    <?php } elseif ($page == "user_feedback") { ?>
        <h2>User Feedback</h2>
        <table>
            <tr><th>Student Name</th><th>Email</th><th>Rating</th><th>Feedback</th><th>Date</th><th>Action</th></tr>
            <?php while ($row = mysqli_fetch_assoc($result_feedbacks)): ?>

                <tr>
                    <td><?php echo htmlspecialchars($row['student_name']); ?></td>
                    <td><?php echo htmlspecialchars($row['email']); ?></td>
                    <td><?php echo str_repeat("⭐", $row['rating']); ?></td>
                    <td><?php echo nl2br(htmlspecialchars($row['feedback'])); ?></td>
                    <td><?php echo $row['created_at']; ?></td>
                    <td><a href="?page=user_feedback&delete_feedback=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure?');">Delete</a></td>
                </tr>
            <?php endwhile; ?>
        </table>
    <?php } elseif ($page == "manage_classes") { ?>
        <div class="form-container">
            <h2>Add a New Class</h2>
            <form method="POST">
                <label>Class Name:</label>
                <input type="text" name="class_name" required><br><br>
                <label>Description:</label>
                <textarea name="description" required></textarea><br><br>
                <label>Duration (minutes):</label>
                <input type="number" name="duration" required><br><br>
                <button type="submit" name="add_class">Add Class</button>
            </form>
        </div>
        <h2>Manage Existing Classes</h2>
        <table>
            <tr><th>Class Name</th><th>Description</th><th>Duration</th><th>Action</th></tr>
            <?php while ($row = mysqli_fetch_assoc($result_classes)): ?>
                <tr>
                    <td><?php echo htmlspecialchars($row['class_name']); ?></td>
                    <td><?php echo htmlspecialchars($row['description']); ?></td>
                    <td><?php echo htmlspecialchars($row['duration']); ?> minutes</td>
                    <td><a href="?page=manage_classes&delete_class=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure?');">Delete</a></td>
                </tr>
            <?php endwhile; ?>
        </table>
    <?php } ?>
</div>

</body>
</html>

<?php mysqli_close($conn); ?>
