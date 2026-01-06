<?php
session_start();
require_once('database.php');

// Ensure the user is logged in as admin
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    echo json_encode(['success' => false, 'message' => 'Unauthorized access.']);
    exit();
}

// Get the POST data
$booking_identifier = $_POST['booking_identifier'];
$new_status = $_POST['new_status'];

// Get the booking's unique identifier (e.g., email and event date)
$booking_query = "SELECT * FROM bookings WHERE MD5(CONCAT(email, event_date, event_type)) = '$booking_identifier'";
$booking_result = mysqli_query($conn, $booking_query);

if ($booking_result && mysqli_num_rows($booking_result) > 0) {
    $booking = mysqli_fetch_assoc($booking_result);
    
    // Update the status in the database
    $update_query = "UPDATE bookings SET status = '$new_status' WHERE booking_id = " . $booking['booking_id'];
    if (mysqli_query($conn, $update_query)) {
        echo json_encode(['success' => true, 'newStatus' => $new_status]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Failed to update status.']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Booking not found.']);
}
?>
