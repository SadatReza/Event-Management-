<?php
require_once('database.php');

$message_id = $_GET['id'] ?? 0;

$query = "UPDATE contact_messages SET is_read = 1 WHERE id = ?";
$stmt = mysqli_prepare($conn, $query);
mysqli_stmt_bind_param($stmt, "i", $message_id);
mysqli_stmt_execute($stmt);

// No output needed for AJAX call
?>