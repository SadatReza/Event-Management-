<?php
// admin_chat_handler.php
session_start();
require_once('database.php');
header('Content-Type: application/json');

// Check Login
if (!isset($_SESSION['admin_logged_in'])) {
    echo json_encode(['success' => false, 'error' => 'Unauthorized']);
    exit();
}

$action = $_POST['action'] ?? '';

// --- 1. FETCH CONVERSATION ---
if ($action == 'fetch_conversation') {
    $email = $_POST['email'];
    
    // Mark user messages as read
    $conn->query("UPDATE chat_messages SET is_read = 1 WHERE user_email = '$email' AND message_type = 'customer'");
    
    // Fetch history
    $stmt = $conn->prepare("SELECT * FROM chat_messages WHERE user_email = ? ORDER BY created_at ASC");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    
    $messages = [];
    while ($row = $result->fetch_assoc()) {
        $messages[] = $row;
    }
    
    echo json_encode(['success' => true, 'messages' => $messages]);
}

// --- 2. SEND REPLY ---
elseif ($action == 'send_reply') {
    $email = $_POST['email'];
    $user_name = $_POST['user_name'];
    $message = trim($_POST['message']);
    
    if (!empty($message) && !empty($email)) {
        // IMPORTANT: We save the reply using the CUSTOMER'S email so they can find it
        $stmt = $conn->prepare("INSERT INTO chat_messages (message, message_type, user_name, user_email, is_read, created_at) VALUES (?, 'admin', ?, ?, 1, NOW())");
        $stmt->bind_param("sss", $message, $user_name, $email);
        
        if ($stmt->execute()) {
            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['success' => false, 'error' => $conn->error]);
        }
    } else {
        echo json_encode(['success' => false, 'error' => 'Missing email or message']);
    }
}
?>