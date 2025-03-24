<?php
session_start();
include('db.php');

// Delete Class
if (isset($_GET['delete_class'])) {
    $class_id = (int)$_GET['delete_class'];
    mysqli_query($conn, "DELETE FROM dance_booking WHERE id = $class_id");
    header("Location: admin.php?page=manage_classes");
    exit;
}

// Add Class
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add_class'])) {
    $class_name = mysqli_real_escape_string($conn, $_POST['class_name']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $duration = mysqli_real_escape_string($conn, $_POST['duration']);
    $fees = mysqli_real_escape_string($conn, $_POST['fees']);
    $timing = mysqli_real_escape_string($conn, $_POST['timing']);
    $query = "INSERT INTO dance_booking (class_name, description, duration, fees, timing) 
              VALUES ('$class_name', '$description', '$duration', '$fees', '$timing')";
    mysqli_query($conn, $query);
    header("Location: admin.php?page=manage_classes");
    exit;
}

// Delete Feedback
if (isset($_GET['delete_feedback'])) {
    $feedback_id = (int)$_GET['delete_feedback'];
    mysqli_query($conn, "DELETE FROM feedback WHERE id = $feedback_id");
    header("Location: admin.php?page=user_feedback");
    exit;
}

// Approve Certificate
if (isset($_GET['approve_certificate'])) {
    $booking_id = (int)$_GET['approve_certificate'];
    mysqli_query($conn, "UPDATE bookings SET certificate_status='Approved' WHERE id=$booking_id");
    header("Location: admin.php?page=user_booking");
    exit;
}

// Dashboard Counts
$booking_count = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) as total FROM bookings"))['total'];
$feedback_count = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) as total FROM feedback"))['total'];
$class_count = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) as total FROM dance_booking"))['total'];
$approved_count = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) as approved FROM bookings WHERE certificate_status='Approved'"))['approved'];

// Fetch data
$result_bookings = mysqli_query($conn, "SELECT * FROM bookings ORDER BY id DESC");
$result_feedbacks = mysqli_query($conn, "SELECT * FROM feedback ORDER BY created_at DESC");
$result_classes = mysqli_query($conn, "SELECT * FROM dance_booking");

// Fetch Class-wise Report Data
$class_report = mysqli_query($conn, "SELECT * FROM dance_booking");
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Admin Panel</title>
<style>
body { display: flex; font-family: Arial, sans-serif; margin: 0; }
.sidebar { width: 200px; background: rgb(167, 77, 216); color: white; padding: 20px; position: fixed; height: 100vh; }
.sidebar a { display: block; color: white; padding: 10px; text-decoration: none; }
.sidebar a:hover { background: rgb(145, 60, 190); }
.main-content { margin-left: 220px; padding: 20px; width: calc(100% - 220px); }
table { width: 100%; border-collapse: collapse; margin-top: 10px; }
table, th, td { border: 1px solid black; padding: 10px; text-align: left; }
.form-container { background: #f9f9f9; padding: 15px; border-radius: 8px; margin-bottom: 20px; }
.dashboard-container { display: flex; gap: 20px; margin-bottom: 20px; }
.dashboard-box { background: #f4f4f4; padding: 30px; border-radius: 8px; text-align: center; width: 250px; }
.btn { padding: 8px 15px; background-color: #5cb85c; color: white; border: none; cursor: pointer; text-decoration: none; border-radius: 5px; }
.btn-danger { background-color: #d9534f; }
.btn-approve { background-color: #5cb85c; }
.btn-approved { background-color: #007bff; color: white; }
.btn:hover { opacity: 0.8; }
</style>
</head>

<body>
<div class="sidebar">
<h2>Admin Panel</h2>
<a href="admin.php?page=dashboard">Dashboard</a>
<a href="admin.php?page=user_booking">User Booking</a>
<a href="admin.php?page=user_feedback">User Feedback</a>
<a href="admin.php?page=manage_classes">Class Management</a>
<a href="admin.php?page=class_report">Class Report</a>
</div>

<div class="main-content">
<?php
$page = isset($_GET['page']) ? $_GET['page'] : 'dashboard';

if ($page == "dashboard") { ?>
<h2>Dashboard</h2>
<div class="dashboard-container">
    <div class="dashboard-box"><h3>Total Bookings</h3><p><?php echo $booking_count; ?></p></div>
    <div class="dashboard-box"><h3>Total Feedback</h3><p><?php echo $feedback_count; ?></p></div>
    <div class="dashboard-box"><h3>Total Classes</h3><p><?php echo $class_count; ?></p></div>
    <div class="dashboard-box"><h3>Total Approved</h3><p><?php echo $approved_count; ?></p></div>
</div>

<?php } elseif ($page == "user_booking") { ?>
<h2>User Bookings</h2>
<table>
<tr><th>Name</th><th>Email</th><th>Phone</th><th>Age</th><th>Class</th><th>Experience</th><th>Fees</th><th>Timing</th><th>Certificate Status</th><th>Action</th></tr>
<?php while ($row = mysqli_fetch_assoc($result_bookings)): ?>
<tr>
<td><?php echo htmlspecialchars($row['name']); ?></td>
<td><?php echo htmlspecialchars($row['email']); ?></td>
<td><?php echo htmlspecialchars($row['phone']); ?></td>
<td><?php echo htmlspecialchars($row['age']); ?></td>
<td><?php echo htmlspecialchars($row['dance_class']); ?></td>
<td><?php echo htmlspecialchars($row['experience']); ?></td>
<td><?php echo htmlspecialchars($row['fees']); ?></td>
<td><?php echo htmlspecialchars($row['timing']); ?></td>
<td><?php echo htmlspecialchars($row['certificate_status']); ?></td>
<td>
<?php if (strtolower($row['certificate_status']) != 'approved'): ?>
    <a class="btn btn-approve" href="?page=user_booking&approve_certificate=<?php echo $row['id']; ?>" onclick="return confirm('Approve Certificate for this student?');">Approve</a>
<?php else: ?>
    <span class="btn btn-approved">Approved</span>
<?php endif; ?>
</td>
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
<td><a class="btn btn-danger" href="?page=user_feedback&delete_feedback=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure?');">Delete</a></td>
</tr>
<?php endwhile; ?>
</table>

<?php } elseif ($page == "manage_classes") { ?>
<div class="form-container">
<h2>Add a New Class</h2>
<form method="POST">
<label>Class Name:</label><input type="text" name="class_name" required><br><br>
<label>Description:</label><textarea name="description" required></textarea><br><br>
<label>Duration (minutes):</label><input type="number" name="duration" required><br><br>
<label>Fees:</label><input type="number" name="fees" required><br><br>
<label>Timing:</label><input type="text" name="timing" required><br><br>
<button type="submit" name="add_class" class="btn">Add Class</button>
</form>
</div>
<h2>Manage Existing Classes</h2>
<table>
<tr><th>Class Name</th><th>Description</th><th>Duration</th><th>Fees</th><th>Timing</th><th>Action</th></tr>
<?php while ($row = mysqli_fetch_assoc($result_classes)): ?>
<tr>
<td><?php echo htmlspecialchars($row['class_name']); ?></td>
<td><?php echo htmlspecialchars($row['description']); ?></td>
<td><?php echo htmlspecialchars($row['duration']); ?> min</td>
<td><?php echo htmlspecialchars($row['fees']); ?></td>
<td><?php echo htmlspecialchars($row['timing']); ?></td>
<td><a class="btn btn-danger" href="?page=manage_classes&delete_class=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure?');">Delete</a></td>
</tr>
<?php endwhile; ?>
</table>

<?php } elseif ($page == "class_report") { ?>
<h2>Class Wise Student Report</h2>
<?php while ($class = mysqli_fetch_assoc($class_report)):
$class_name = $class['class_name'];
$class_students = mysqli_query($conn, "SELECT * FROM bookings WHERE dance_class='" . mysqli_real_escape_string($conn, $class_name) . "'");
?>
<h3><?php echo htmlspecialchars($class_name); ?></h3>
<table>
<tr><th>Name</th><th>Email</th><th>Phone</th><th>Age</th><th>Experience</th><th>Fees</th><th>Timing</th><th>Certificate Status</th></tr>
<?php while ($student = mysqli_fetch_assoc($class_students)): ?>
<tr>
<td><?php echo htmlspecialchars($student['name']); ?></td>
<td><?php echo htmlspecialchars($student['email']); ?></td>
<td><?php echo htmlspecialchars($student['phone']); ?></td>
<td><?php echo htmlspecialchars($student['age']); ?></td>
<td><?php echo htmlspecialchars($student['experience']); ?></td>
<td><?php echo htmlspecialchars($student['fees']); ?></td>
<td><?php echo htmlspecialchars($student['timing']); ?></td>
<td><?php echo htmlspecialchars($student['certificate_status']); ?></td>
</tr>
<?php endwhile; ?>
</table>
<?php endwhile; ?>

<?php } ?>
</div>
</body>
</html>
<?php mysqli_close($conn); ?>