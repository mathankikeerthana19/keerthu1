<?php
include('db.php'); // Database connection

// Fetch all students' booking and certificate status
$query = "SELECT * FROM bookings";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Certificates</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f1f1f1;
            padding: 20px;
        }
        h2 {
            text-align: center;
            color: #6a1b9a;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            background: #fff;
        }
        th, td {
            padding: 15px;
            border: 1px solid #ddd;
            text-align: center;
        }
        th {
            background-color: #6a1b9a;
            color: white;
        }
        .btn {
            padding: 8px 15px;
            background-color: #6a1b9a;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }
        .btn:hover {
            background-color: #4a0072;
        }
    </style>
</head>
<body>

<h2>Student Certificates</h2>

<table>
    <tr>
        <th>Student Name</th>
        <th>Dance Class</th>
        <th>Certificate Status</th>
        <th>Action</th>
    </tr>

    <?php
    if (mysqli_num_rows($result) > 0) {
        while ($student = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($student['name']) . "</td>";
            echo "<td>" . htmlspecialchars($student['dance_class']) . "</td>";
            echo "<td>" . htmlspecialchars(ucfirst($student['certificate_status'])) . "</td>";

            if (strtolower($student['certificate_status']) == 'approved') {

                echo "<td><a class='btn' href='generate_certificate.php?id=" . $student['id'] . "' target='_blank'>View / Download</a></td>";
            } else {
                echo "<td>Pending Approval</td>";
            }

            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='4'>No student data found.</td></tr>";
    }
    ?>
</table>

</body>
</html>

<?php mysqli_close($conn); ?>
