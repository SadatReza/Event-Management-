<?php
require_once('database.php');

// Retrieve message ID from the URL or set it to 0 if not available
$message_id = $_GET['id'] ?? 0;

// Query to fetch message details based on the provided message ID
$query = "SELECT * FROM contact_submissions WHERE id = ?";
$stmt = mysqli_prepare($conn, $query);

// Bind the message ID parameter to the prepared statement
mysqli_stmt_bind_param($stmt, "i", $message_id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

// Fetch the result as an associative array
$message = mysqli_fetch_assoc($result);

if ($message) {
    // Display the message details if found
    echo '<div class="space-y-4">';
    echo '<div class="grid grid-cols-1 md:grid-cols-2 gap-4">';
    echo '<div><p class="text-gray-600">Message ID:</p><p class="font-medium">' . $message['id'] . '</p></div>';
    echo '<div><p class="text-gray-600">Date:</p><p class="font-medium">' . date('F j, Y H:i', strtotime($message['created_at'])) . '</p></div>';
    echo '</div>';
    
    echo '<div class="grid grid-cols-1 md:grid-cols-2 gap-4">';
    echo '<div><p class="text-gray-600">From:</p><p class="font-medium">' . htmlspecialchars($message['name']) . '</p></div>';
    echo '<div><p class="text-gray-600">Email:</p><p class="font-medium">' . htmlspecialchars($message['email']) . '</p></div>';
    echo '</div>';
    
    echo '<div><p class="text-gray-600">Subject:</p><p class="font-medium">' . htmlspecialchars($message['subject']) . '</p></div>';
    
    echo '<div><p class="text-gray-600">Message:</p><p class="font-medium">' . nl2br(htmlspecialchars($message['message'])) . '</p></div>';
    
    // Hidden input for the message ID (if needed for further processing)
    echo '<input type="hidden" name="id" value="' . $message['id'] . '">';
    echo '</div>';
} else {
    // Display error message if message not found
    echo '<p class="text-red-600">Message not found.</p>';
}
?>
