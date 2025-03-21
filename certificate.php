<!---✅ Database table bookings must have a completed column
sql
Copy
Edit
ALTER TABLE bookings ADD COLUMN completed TINYINT(1) DEFAULT 0;
✅ Admin marks student as completed by updating:
sql
Copy
Edit
UPDATE bookings SET completed = 1 WHERE id = [student_booking_id];
✅ After completion, student visits certificate.php to download their certificate.
✅ Print/Download as PDF by clicking the button (uses browser print-to-PDF).
✅ Example Flow
Student finishes the course.
Admin marks completed = 1 for that student in the database.
Student logs in and accesses certificate.php.
Certificate displays with their name, course, and date.
Student clicks Download/Print to save it.
Would you like me to add: ✅ Admin "Mark Completed" button code?
✅ Auto-generate PDF (PHP FPDF)?
✅ Completion Date fetch from DB?

Let me know if you want those next!---->
<?php
session_start();
include('db.php'); // Include your database connection

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

// Fetch student booking and completion status
$query = "SELECT * FROM bookings WHERE id = '$user_id' LIMIT 1";
$result = mysqli_query($conn, $query);

if ($result && mysqli_num_rows($result) > 0) {
    $student = mysqli_fetch_assoc($result);
    
    if ($student['completed'] == 1) {
        $student_name = htmlspecialchars($student['name']);
        $class_name = htmlspecialchars($student['dance_class']);
        $completion_date = date("d-m-Y"); // You can fetch actual completion date if stored
    } else {
        echo "<h2>You have not completed the course yet!</h2>";
        exit();
    }
} else {
    echo "<h2>Booking not found!</h2>";
    exit();
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Certificate of Completion</title>
    <style>
        body {
            background-color: #f9f9f9;
            font-family: 'Georgia', serif;
            text-align: center;
            padding: 50px;
        }
        .certificate {
            border: 10px solid #6a1b9a;
            padding: 50px;
            background-color: #fff;
            width: 80%;
            margin: auto;
            border-radius: 20px;
        }
        h1 {
            color: #6a1b9a;
            font-size: 50px;
        }
        .student-name {
            font-size: 35px;
            margin: 20px 0;
            color: #333;
        }
        .course-name {
            font-size: 30px;
            margin: 20px 0;
            color: #555;
        }
        .date {
            font-size: 20px;
            color: #777;
            margin-top: 30px;
        }
        .signature {
            margin-top: 50px;
            font-size: 18px;
            color: #333;
        }
        button {
            margin-top: 30px;
            padding: 15px 30px;
            font-size: 18px;
            background-color: #6a1b9a;
            color: white;
            border: none;
            border-radius: 8px;
            cursor: pointer;
        }
        button:hover {
            background-color: #4a0072;
        }
    </style>
</head>
<body>

    <div class="certificate">
        <h1>Certificate of Completion</h1>
        <p>This is to certify that</p>
        <div class="student-name"><?php echo $student_name; ?></div>
        <p>has successfully completed the course</p>
        <div class="course-name"><?php echo $class_name; ?></div>
        <div class="date">Date: <?php echo $completion_date; ?></div>

        <div class="signature">Instructor Signature</div>
    </div>

    <button onclick="window.print()">Download / Print Certificate</button>

</body>
</html>
