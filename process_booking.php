
<?php
session_start();
require_once('database.php');

// Check if user is logged in
if (!isset($_SESSION['email'])) {
    $_SESSION['booking_errors'] = ["You must be logged in to make a booking."];
    header("Location: index.php#login-page");
    exit();
}

// Initialize error array
$errors = [];

// Get and sanitize form data
$event_type = trim($_POST['event_type'] ?? '');
$event_date = trim($_POST['event_date'] ?? '');
$guest_count = (int)($_POST['guests'] ?? 0);
$package = trim($_POST['package'] ?? '');
$venue_preference = trim($_POST['venue'] ?? '');
$estimated_budget = (int)($_POST['budget'] ?? 0);
$special_requests = trim($_POST['special_requests'] ?? '');
$email = $_SESSION['email'];

// Validate data
if (empty($event_type)) {
    $errors[] = "Event type is required";
}

if (empty($event_date)) {
    $errors[] = "Event date is required";
} elseif (strtotime($event_date) < strtotime('today')) {
    $errors[] = "Event date cannot be in the past";
}

if ($guest_count < 1) {
    $errors[] = "Number of guests must be at least 1";
}

if (empty($package)) {
    $errors[] = "Package selection is required";
}

// If no errors, proceed with database insertion
if (empty($errors)) {
    try {
        $stmt = $conn->prepare("INSERT INTO bookings 
            (email, event_type, package, event_date, venue_preference, guest_count, estimated_budget, special_requests, status, created_at) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, 'pending', NOW())");
        
        if ($stmt === false) {
            throw new Exception("Prepare failed: " . $conn->error);
        }
        
        $stmt->bind_param("sssssiis", 
            $email,
            $event_type,
            $package,
            $event_date,
            $venue_preference,
            $guest_count,
            $estimated_budget,
            $special_requests
        );
        
        if (!$stmt->execute()) {
            throw new Exception("Execute failed: " . $stmt->error);
        }
        
        $_SESSION['booking_success'] = "Your booking request has been submitted successfully!";
        $stmt->close();
    } catch (Exception $e) {
        error_log("Booking error: " . $e->getMessage());
        $errors[] = "An error occurred while processing your booking. Please try again.";
    }
}

// Store errors in session if any
if (!empty($errors)) {
    $_SESSION['booking_errors'] = $errors;
}

// Redirect back to booking page
header("Location: index.php#booking-page");
exit();
?>