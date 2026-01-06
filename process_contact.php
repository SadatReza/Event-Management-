<?php
// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();

// Include database connection - verify the path is correct
require_once 'database.php';

// Verify connection exists
if (!isset($connection)) {
    die("Database connection not established. Check database.php");
}

// Debug: Show received form data
echo "<pre>Form data received:\n";
print_r($_POST);
echo "</pre>";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sanitize inputs
    $name = mysqli_real_escape_string($connection, $_POST['name'] ?? '');
    $email = mysqli_real_escape_string($connection, $_POST['email'] ?? '');
    $subject = mysqli_real_escape_string($connection, $_POST['subject'] ?? '');
    $message = mysqli_real_escape_string($connection, $_POST['message'] ?? '');

    // Debug: Show sanitized values
    echo "<pre>Sanitized values:\n";
    echo "Name: $name\nEmail: $email\nSubject: $subject\nMessage: $message\n";
    echo "</pre>";

    // Check if email exists
    $check_query = "SELECT email FROM contact_submissions WHERE email = '$email'";
    $check_result = mysqli_query($connection, $check_query);
    
    if (!$check_result) {
        die("Query failed: " . mysqli_error($connection));
    }

    // Prepare appropriate query
    if (mysqli_num_rows($check_result) > 0) {
        $query = "UPDATE contact_submissions SET 
                 name = '$name', 
                 subject = '$subject', 
                 message = '$message'
                 WHERE email = '$email'";
    } else {
        $query = "INSERT INTO contact_submissions (name, email, subject, message)
                 VALUES ('$name', '$email', '$subject', '$message')";
    }

    // Execute query
    if (mysqli_query($connection, $query)) {
        $_SESSION['success_message'] = "Thank you for contacting us!";
    } else {
        $_SESSION['error_messages'] = ["Error: " . mysqli_error($connection)];
    }

    // Redirect back
    header("Location: index.php#contact");
    exit();
}
?>