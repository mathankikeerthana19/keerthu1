<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Payment Page</title>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: #f0f4f8;
            margin: 0;
            padding: 0;
            color: #333;
        }
        .container {
            max-width: 600px;
            margin: 50px auto;
            background: #fff;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.1);
        }
        h2 {
            text-align: center;
            color: #007bff;
            margin-bottom: 30px;
        }
        p {
            font-size: 16px;
            margin: 10px 0;
            color: #555;
        }
        form {
            margin-top: 20px;
        }
        input[type="text"] {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 8px;
            margin-bottom: 20px;
            font-size: 16px;
        }
        button {
            width: 100%;
            padding: 14px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 8px;
            font-size: 18px;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
        }
        .details {
            background: #f9f9f9;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Payment for <?php echo htmlspecialchars($_SESSION['dance_class']); ?></h2>

    <div class="details">
        <p><strong>Name:</strong> <?php echo htmlspecialchars($_SESSION['name']); ?></p>
        <p><strong>Email:</strong> <?php echo htmlspecialchars($_SESSION['email']); ?></p>
        <p><strong>Phone:</strong> <?php echo htmlspecialchars($_SESSION['phone']); ?></p>
        <p><strong>Age:</strong> <?php echo htmlspecialchars($_SESSION['age']); ?></p>
        <p><strong>Experience:</strong> <?php echo htmlspecialchars($_SESSION['experience']); ?></p>
    </div>

    <form action="payment_success.php" method="POST">
        <label for="upi">Enter UPI ID</label>
        <input type="text" name="upi_id" id="upi" required placeholder="example@upi">
        <div class="upi-instruction">
            <strong>UPI Payment Instructions:</strong><br>
            - Open your UPI App (Google Pay, PhonePe, Paytm, etc.)<br>
            - Choose 'Send Money' or 'Pay to UPI ID'<br>
            - Enter the UPI ID exactly as shown below<br>
            - Complete the payment<br>
            - Enter your UPI ID below for verification
        </div>

        <button type="submit">Pay Now</button>
    </form>
</div>

</body>
</html>
