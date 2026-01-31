<?php
// test_chat.php
session_start();
echo json_encode([
    'success' => true,
    'message' => 'API is working',
    'session_id' => session_id(),
    'timestamp' => date('Y-m-d H:i:s')
]);
?>