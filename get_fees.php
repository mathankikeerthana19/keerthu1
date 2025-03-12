<?php
include('db.php');

if (isset($_POST['class_name'])) {
    $class_name = mysqli_real_escape_string($conn, $_POST['class_name']);
    $query = "SELECT fees FROM dance_booking WHERE class_name='$class_name'";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        echo $row['fees']; // Return fees value
    } else {
        echo "0"; // If class not found, return 0
    }
}
mysqli_close($conn);
?>
