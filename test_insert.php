<?php
require_once('database.php');

$test_email = "test@example.com"; // Must exist in users table
$test_sql = "INSERT INTO bookings 
            (email, event_type, package, event_date, guest_count) 
            VALUES 
            ('$test_email', 'test', 'test', '2023-12-31', 5)";

if ($conn->query($test_sql)) {
    echo "Test record inserted successfully!";
} else {
    echo "Error: " . $conn->error;
}
?>