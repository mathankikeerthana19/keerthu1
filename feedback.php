<?php
session_start();
include('db.php');


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $rating = (int) $_POST['rating'];
    $feedback = mysqli_real_escape_string($conn, $_POST['feedback']);

    $query = "INSERT INTO feedback (student_name, email, rating, feedback) 
              VALUES ('$name', '$email', '$rating', '$feedback')";

    if (mysqli_query($conn, $query)) {
        $success_message = "Thank you for your feedback!";
    } else {
        $error_message = "Error: " . mysqli_error($conn);
    }
}


$feedbacks = mysqli_query($conn, "SELECT * FROM feedback ORDER BY created_at DESC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback</title>
    <style>
        body {
        
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 600px;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            margin: auto;
        }
        h2 {
            text-align: center;
        }
        label {
            font-weight: bold;
        }
        input, textarea, select, button {
            width: 100%;
            padding: 10px;
            margin-top: 8px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }
        button {
            background-color: #28a745;
            color: white;
            cursor: pointer;
        }
        button:hover {
            background-color: #218838;
        }
        .feedback-list {
            margin-top: 20px;
        }
        .feedback-item {
            background: #fff;
            padding: 15px;
            border-radius: 5px;
            box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.1);
            margin-bottom: 10px;
        }
        .rating {
            color: gold;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Give Your Feedback</h2>

    <!-- Feedback Form -->
    <form action="feedback.php" method="POST">
        <label>Name:</label>
        <input type="text" name="name" required>

        <label>Email:</label>
        <input type="email" name="email">

        <label>Rating:</label>
        <select name="rating" required>
            <option value="5">⭐⭐⭐⭐⭐ Excellent</option>
            <option value="4">⭐⭐⭐⭐ Good</option>
            <option value="3">⭐⭐⭐ Average</option>
            <option value="2">⭐⭐ Poor</option>
            <option value="1">⭐ Very Poor</option>
        </select>

        <label>Feedback:</label>
        <textarea name="feedback" rows="4" required></textarea>

        <button type="submit">Submit Feedback</button>
    </form>

    <!-- Success/Error Message -->
    <?php if (isset($success_message)) echo "<p style='color: green;'>$success_message</p>"; ?>
    <?php if (isset($error_message)) echo "<p style='color: red;'>$error_message</p>"; ?>

    <!-- Display Submitted Feedback -->
    <div class="feedback-list">
        <h2>User Feedback</h2>
        <?php while ($row = mysqli_fetch_assoc($feedbacks)) : ?>
            <div class="feedback-item">
                <strong><?php echo htmlspecialchars($row['student_name']); ?></strong> 
                <span class="rating"><?php echo str_repeat("⭐", $row['rating']); ?></span>
                <p><?php echo nl2br(htmlspecialchars($row['feedback'])); ?></p>
                <small><?php echo $row['created_at']; ?></small>
            </div>
        <?php endwhile; ?>
    </div>
</div>

</body>
</html>
