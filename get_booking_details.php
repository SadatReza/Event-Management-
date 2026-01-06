<?php
require_once('database.php');

$booking_id = $_GET['id'] ?? 0;

$query = "SELECT b.*, u.name as client_name, u.email as client_email, u.phone as client_phone 
          FROM bookings b 
          JOIN users u ON b.user_id = u.id 
          WHERE b.id = ?";
$stmt = mysqli_prepare($conn, $query);
mysqli_stmt_bind_param($stmt, "i", $booking_id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$booking = mysqli_fetch_assoc($result);

if ($booking) {
    echo '<div class="space-y-4">';
    echo '<div class="grid grid-cols-1 md:grid-cols-2 gap-4">';
    echo '<div><p class="text-gray-600">Booking ID:</p><p class="font-medium">' . $booking['id'] . '</p></div>';
    echo '<div><p class="text-gray-600">Status:</p><p class="font-medium"><span class="px-2 py-1 rounded-full ' . 
         ($booking['status'] === 'Pending' ? 'bg-yellow-100 text-yellow-800' : 
          ($booking['status'] === 'Confirmed' ? 'bg-green-100 text-green-800' : 
           ($booking['status'] === 'Cancelled' ? 'bg-red-100 text-red-800' : 'bg-blue-100 text-blue-800'))) . 
         '">' . $booking['status'] . '</span></p></div>';
    echo '</div>';
    
    echo '<div class="grid grid-cols-1 md:grid-cols-2 gap-4">';
    echo '<div><p class="text-gray-600">Client:</p><p class="font-medium">' . htmlspecialchars($booking['client_name']) . '</p></div>';
    echo '<div><p class="text-gray-600">Contact:</p><p class="font-medium">' . htmlspecialchars($booking['client_email']) . '<br>' . htmlspecialchars($booking['client_phone']) . '</p></div>';
    echo '</div>';
    
    echo '<div class="grid grid-cols-1 md:grid-cols-2 gap-4">';
    echo '<div><p class="text-gray-600">Event Type:</p><p class="font-medium">' . htmlspecialchars($booking['event_type']) . '</p></div>';
    echo '<div><p class="text-gray-600">Event Date:</p><p class="font-medium">' . date('F j, Y', strtotime($booking['event_date'])) . '</p></div>';
    echo '</div>';
    
    echo '<div class="grid grid-cols-1 md:grid-cols-2 gap-4">';
    echo '<div><p class="text-gray-600">Number of Guests:</p><p class="font-medium">' . $booking['guests'] . '</p></div>';
    echo '<div><p class="text-gray-600">Estimated Budget:</p><p class="font-medium">৳' . number_format($booking['budget'], 2) . '</p></div>';
    echo '</div>';
    
    if (!empty($booking['venue'])) {
        echo '<div><p class="text-gray-600">Venue Preference:</p><p class="font-medium">' . htmlspecialchars($booking['venue']) . '</p></div>';
    }
    
    if (!empty($booking['special_requests'])) {
        echo '<div><p class="text-gray-600">Special Requests:</p><p class="font-medium">' . nl2br(htmlspecialchars($booking['special_requests'])) . '</p></div>';
    }
    
    echo '<input type="hidden" name="id" value="' . $booking['id'] . '">';
    echo '<input type="hidden" name="status" value="' . $booking['status'] . '">';
    echo '</div>';
} else {
    echo '<p class="text-red-600">Booking not found.</p>';
}
?>