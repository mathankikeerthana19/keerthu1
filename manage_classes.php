<?php
session_start();
include('db.php');

// Handle class deletion
if (isset($_GET['delete_class'])) {
    $class_id = (int) $_GET['delete_class'];

    // Fetch and delete the image from the server
    $image_query = mysqli_query($conn, "SELECT image FROM dance_booking WHERE id = $class_id");
    $image_row = mysqli_fetch_assoc($image_query);
    if ($image_row['image'] && file_exists($image_row['image'])) {
        unlink($image_row['image']); // Delete the image file
    }

    mysqli_query($conn, "DELETE FROM dance_booking WHERE id = $class_id");
    header("Location: manage_classes.php");
    exit;
}

// Handle new class addition
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add_class'])) {
    $class_name = mysqli_real_escape_string($conn, $_POST['class_name']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $duration = mysqli_real_escape_string($conn, $_POST['duration']);
    $fees = mysqli_real_escape_string($conn, $_POST['fees']);
    $timing = mysqli_real_escape_string($conn, $_POST['timing']); // New timing field

    // Handle file upload
    $image_path = "";
    if (!empty($_FILES["class_image"]["name"])) {
        $target_dir = "uploads/"; // Ensure this folder exists
        $image_name = basename($_FILES["class_image"]["name"]);
        $image_path = $target_dir . time() . "_" . $image_name; // Unique filename
        move_uploaded_file($_FILES["class_image"]["tmp_name"], $image_path);
    }

    $query = "INSERT INTO dance_booking (class_name, description, duration, fees, timing, image) 
              VALUES ('$class_name', '$description', '$duration', '$fees', '$timing', '$image_path')";
    mysqli_query($conn, $query);
    header("Location: manage_classes.php");
    exit;
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
    <title>Class Management</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 0; padding: 20px; }
        .form-container { margin-bottom: 20px; background: #f9f9f9; padding: 15px; border-radius: 8px; }
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        table, th, td { border: 1px solid black; padding: 10px; text-align: left; }
        img { max-width: 100px; border-radius: 5px; }
    </style>
</head>
<body>

<h2>Class Management</h2>
<a href="admin.php">⬅ Back to Admin Panel</a>

<div class="form-container">
    <h3>Add a New Class</h3>
    <form method="POST" enctype="multipart/form-data">
        <label>Class Name:</label>
        <input type="text" name="class_name" required><br><br>

        <label>Description:</label>
        <textarea name="description" required></textarea><br><br>

        <label>Duration (minutes):</label>
        <input type="number" name="duration" required><br><br>

        <label>Fees ($):</label>
        <input type="number" name="fees" step="0.01" required><br><br>

        <label>Class Timing:</label>
        <input type="text" name="timing" required placeholder="e.g. 10:00 AM - 11:00 AM"><br><br>

        <label>Class Image:</label>
        <input type="file" name="class_image" accept="image/*"><br><br>

        <button type="submit" name="add_class">Add Class</button>
    </form>
</div>

<h3>Manage Existing Classes</h3>
<table>
    <tr><th>Image</th><th>Class Name</th><th>Description</th><th>Duration</th><th>Fees</th><th>Timing</th><th>Action</th></tr>
    <?php while ($row = mysqli_fetch_assoc($result_classes)): ?>
        <tr>
            <td>
                <?php if ($row['image']): ?>
                    <img src="<?php echo htmlspecialchars($row['image']); ?>" alt="Class Image">
                <?php else: ?>
                    No Image
                <?php endif; ?>
            </td>
            <td><?php echo htmlspecialchars($row['class_name']); ?></td>
            <td><?php echo htmlspecialchars($row['description']); ?></td>
            <td><?php echo htmlspecialchars($row['duration']); ?> minutes</td>
            <td>$<?php echo htmlspecialchars($row['fees']); ?></td>
            <td><?php echo htmlspecialchars($row['timing']); ?></td> <!-- Display Timing -->
            <td><a href="?delete_class=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure?');">Delete</a></td>
        </tr>
    <?php endwhile; ?>
</table>

</body>
</html>

<?php mysqli_close($conn); ?>
