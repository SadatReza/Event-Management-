[file name]: delete_chat_message.php
[file content begin]
<?php
session_start();

// Check if admin is logged in
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header("HTTP/1.1 401 Unauthorized");
    echo json_encode(['success' => false, 'message' => 'Unauthorized']);
    exit();
}

require_once('database.php');

// Get the message ID from the request
$data = json_decode(file_get_contents('php://input'), true);
$message_id = $data['id'] ?? $_GET['id'] ?? 0;

if (!$message_id) {
    echo json_encode(['success' => false, 'message' => 'No message ID provided']);
    exit();
}

// Delete the chat message
$query = "DELETE FROM chat_message WHERE chat_message_id = ?";