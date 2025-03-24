<?php
session_start();
include('db.php');


// Fetch payment and booking details from session or POST
$booking_id = $_POST['booking_id'] ?? $_SESSION['booking_id'] ?? '';
$transaction_id = $_POST['transaction_id'] ?? $_SESSION['transaction_id'] ?? '';
$student_name = $_POST['student_name'] ?? $_SESSION['student_name'] ?? '';
$contact_number = $_POST['contact_number'] ?? $_SESSION['contact_number'] ?? '';
$email = $_POST['email'] ?? $_SESSION['email'] ?? '';
$class_name = $_POST['class_name'] ?? $_SESSION['class_name'] ?? '';
$class_fee = $_POST['class_fee'] ?? $_SESSION['class_fee'] ?? '';
$class_timing = $_POST['class_timing'] ?? $_SESSION['class_timing'] ?? '';
$payment_method = $_POST['payment_method'] ?? 'UPI';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Payment Success - Dance Class Booking</title>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f9f9f9;
            color: #333;
        }
        .container {
            max-width: 900px;
            margin: 50px auto;
            background: #fff;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        .success-icon {
            font-size: 80px;
            color: #4CAF50;
            margin-bottom: 20px;
        }
        h2 {
            color: #2E7D32;
            margin-bottom: 20px;
        }
        .details {
            text-align: left;
            margin-top: 30px;
        }
        .details h3 {
            color: #1565C0;
            margin-bottom: 15px;
        }
        .details p {
            margin: 8px 0;
            font-size: 16px;
        }
        .print-btn {
            background-color: #4CAF50;
            color: white;
            padding: 12px 30px;
            border: none;
            border-radius: 30px;
            font-size: 16px;
            cursor: pointer;
            margin-top: 30px;
            transition: 0.3s;
        }
        .print-btn:hover {
            background-color: #388E3C;
        }
        @media print {
            .print-btn, .success-icon { display: none; }
        }
    </style>
</head>
<body>

<div class="container">
    <div class="success-icon">✔️</div>
    <h2>Payment Successful!</h2>
    <p>Thank you, <strong><?php echo htmlspecialchars($student_name); ?></strong>, for booking your dance class.</p>

    <div class="details">
        <h3>Class Details</h3>
        <p><strong>Class Name:</strong> <?php echo htmlspecialchars($class_name); ?></p>
        <p><strong>Timing:</strong> <?php echo htmlspecialchars($class_timing); ?></p>
        <p><strong>Fees Paid:</strong> ₹<?php echo htmlspecialchars($class_fee); ?></p>

        <h3>Student Details</h3>
        <p><strong>Name:</strong> <?php echo htmlspecialchars($student_name); ?></p>
        <p><strong>Contact:</strong> <?php echo htmlspecialchars($contact_number); ?></p>
        <p><strong>Email:</strong> <?php echo htmlspecialchars($email); ?></p>

        <h3>Booking Details</h3>
        <p><strong>Booking ID:</strong> <?php echo htmlspecialchars($booking_id); ?></p>
        <p><strong>Transaction ID:</strong> <?php echo htmlspecialchars($transaction_id); ?></p>
        <p><strong>Payment Method:</strong> <?php echo htmlspecialchars($payment_method); ?></p>
    </div>

    <button class="print-btn" onclick="window.print()">Print Receipt</button>
</div>

</body>
</html>


