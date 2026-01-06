<?php
require_once('database.php');

$user_id = $_GET['id'] ?? 0;

$query = "SELECT * FROM users WHERE id = ?";
$stmt = mysqli_prepare($conn, $query);
mysqli_stmt_bind_param($stmt, "i", $user_id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$user = mysqli_fetch_assoc($result);

if ($user) {
    echo '<div class="space-y-4">';
    echo '<div class="grid grid-cols-1 md:grid-cols-2 gap-4">';
    echo '<div><p class="text-gray-600">User ID:</p><p class="font-medium">' . $user['id'] . '</p></div>';
    echo '<div><p class="text-gray-600">Registered:</p><p class="font-medium">' . date('F j, Y', strtotime($user['created_at'])) . '</p></div>';
    echo '</div>';
    
    echo '<div><p class="text-gray-600">Full Name:</p><p class="font-medium">' . htmlspecialchars($user['name']) . '</p></div>';
    
    echo '<div class="grid grid-cols-1 md:grid-cols-2 gap-4">';
    echo '<div><p class="text-gray-600">Email:</p><p class="font-medium">' . htmlspecialchars($user['email']) . '</p></div>';
    echo '<div><p class="text-gray-600">Phone:</p><p class="font-medium">' . htmlspecialchars($user['phone']) . '</p></div>';
    echo '</div>';
    
    echo '<input type="hidden" name="id" value="' . $user['id'] . '">';
    echo '</div>';
} else {
    echo '<p class="text-red-600">User not found.</p>';
}
?>