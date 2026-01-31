[file name]: get_chat_message.php
[file content begin]
<?php
session_start();

// Check if admin is logged in
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header("Location: admin_login.php");
    exit();
}

require_once('database.php');

$message_id = $_GET['id'] ?? 0;

// Get chat message details
$query = "SELECT * FROM chat_message WHERE chat_message_id = ?";
$stmt = mysqli_prepare($conn, $query);
mysqli_stmt_bind_param($stmt, 'i', $message_id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$chat = mysqli_fetch_assoc($result);

if ($chat) {
    ?>
    <div class="space-y-4">
        <div>
            <label class="block text-sm font-medium text-gray-700">From:</label>
            <p class="mt-1 text-lg font-semibold <?php echo $chat['from_user_id'] == 'admin' ? 'text-purple-600' : 'text-blue-600'; ?>">
                <?php echo htmlspecialchars($chat['from_user_id'] == 'admin' ? 'Admin' : 'User: ' . $chat['from_user_id']); ?>
            </p>
        </div>
        
        <div>
            <label class="block text-sm font-medium text-gray-700">To:</label>
            <p class="mt-1 text-lg font-semibold <?php echo $chat['to_user_id'] == 'admin' ? 'text-purple-600' : 'text-blue-600'; ?>">
                <?php echo htmlspecialchars($chat['to_user_id'] == 'admin' ? 'Admin' : 'User: ' . $chat['to_user_id']); ?>
            </p>
        </div>
        
        <div>
            <label class="block text-sm font-medium text-gray-700">Message:</label>
            <div class="mt-1 p-3 bg-gray-50 rounded-lg">
                <p class="text-gray-800"><?php echo nl2br(htmlspecialchars($chat['msg'])); ?></p>
            </div>
        </div>
        
        <div>
            <label class="block text-sm font-medium text-gray-700">Timestamp:</label>
            <p class="mt-1 text-gray-600"><?php echo date('F j, Y, g:i a', strtotime($chat['timestamp'])); ?></p>
        </div>
        
        <div>
            <label class="block text-sm font-medium text-gray-700">Status:</label>
            <span class="mt-1 inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium <?php echo $chat['status'] == 1 ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800'; ?>">
                <?php echo $chat['status'] == 1 ? 'Delivered' : 'Sent'; ?>
            </span>
        </div>
        
        <?php if ($chat['from_user_id'] != 'admin'): ?>
        <div class="mt-6">
            <label class="block text-sm font-medium text-gray-700 mb-2">Reply to User:</label>
            <form id="reply-form" onsubmit="return sendReply(<?php echo $message_id; ?>)">
                <textarea id="reply-message" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-purple-500" rows="3" placeholder="Type your reply here..."></textarea>
                <div class="mt-2">
                    <button type="submit" class="bg-purple-600 text-white px-4 py-2 rounded-md hover:bg-purple-700">Send Reply</button>
                </div>
            </form>
        </div>
        <?php endif; ?>
    </div>
    
    <script>
    function sendReply(messageId) {
        const message = document.getElementById('reply-message').value;
        
        if (!message.trim()) {
            alert('Please enter a reply message');
            return false;
        }
        
        fetch('send_chat_reply.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({
                original_message_id: messageId,
                message: message,
                to_user_id: '<?php echo $chat['from_user_id']; ?>'
            })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert('Reply sent successfully');
                document.getElementById('reply-message').value = '';
            } else {
                alert('Failed to send reply: ' + data.message);
            }
        })
        .catch(error => {
            console.error('Error sending reply:', error);
            alert('Error sending reply');
        });
        
        return false;
    }
    </script>
    <?php
} else {
    echo '<p class="text-red-600">Message not found.</p>';
}
?>