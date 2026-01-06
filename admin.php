<?php
session_start();

// Check if admin is logged in
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header("Location: admin_login.php");
    exit();
}
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header("Location: admin_login.php");
    exit();
}

require_once('database.php');

// Get all bookings
$bookings_query = "SELECT * FROM bookings ORDER BY event_date DESC";
$bookings_result = mysqli_query($conn, $bookings_query);

// Get all users
$users_query = "SELECT * FROM users ORDER BY created_at DESC";
$users_result = mysqli_query($conn, $users_query);

// Get all contact messages
$messages_query = "SELECT * FROM contact_submissions ORDER BY created_at DESC";
$messages_result = mysqli_query($conn, $messages_query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Event Planner</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Poppins', sans-serif; }
        .sidebar { transition: all 0.3s; }
        .dashboard-card:hover { transform: translateY(-5px); }
    </style>
</head>
<body class="bg-gray-100">
    <!-- Admin Navigation -->
    <div class="flex h-screen">
        <!-- Sidebar -->
        <div class="sidebar bg-gray-800 text-white w-64 space-y-6 py-7 px-2 fixed inset-y-0 left-0 transform -translate-x-full md:translate-x-0 transition duration-200 ease-in-out">
            <div class="text-white flex items-center space-x-2 px-4">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4" />
                </svg>
                <span class="text-xl font-extrabold">Event<span class="text-red-500">Planner</span></span>
            </div>
            <nav>
                <a href="#dashboard" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700 hover:text-white">
                    <span class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
                        </svg>
                        Dashboard
                    </span>
                </a>
                <a href="#bookings" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700 hover:text-white">
                    <span class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                        Bookings
                    </span>
                </a>
                <a href="#users" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700 hover:text-white">
                    <span class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg>
                        Users
                    </span>
                </a>
                <a href="#messages" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700 hover:text-white">
                    <span class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                        Messages
                    </span>
                </a>
                <a href="admin_logout.php" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700 hover:text-white">
                    <span class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                        </svg>
                        Logout
                    </span>
                </a>
            </nav>
        </div>

        <!-- Main Content -->
        <div class="flex-1 md:ml-64">
            <!-- Top Bar -->
            <div class="bg-white shadow-md py-4 px-6 flex justify-between items-center">
                <div class="flex items-center">
                    <button class="md:hidden text-gray-500 focus:outline-none">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                    <h1 class="text-xl font-bold text-gray-800 ml-4">Admin Dashboard</h1>
                </div>
                <div class="flex items-center space-x-4">
                    <span class="text-gray-600">Welcome, <?php echo $_SESSION['admin_name']; ?></span>
                </div>
            </div>

            <!-- Dashboard Content -->
            <div class="p-6">
                <!-- Dashboard Overview -->
                <div id="dashboard">
                    <h2 class="text-2xl font-bold text-gray-800 mb-6">Overview</h2>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                        <!-- Total Bookings Card -->
                        <div class="bg-white rounded-lg shadow-md p-6 dashboard-card">
                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="text-gray-500">Total Bookings</p>
                                    <h3 class="text-2xl font-bold mt-2">
                                        <?php 
                                        $total_bookings = mysqli_num_rows($bookings_result);
                                        echo $total_bookings;
                                        ?>
                                    </h3>
                                </div>
                                <div class="bg-red-100 p-3 rounded-full">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Total Users Card -->
                        <div class="bg-white rounded-lg shadow-md p-6 dashboard-card">
                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="text-gray-500">Total Users</p>
                                    <h3 class="text-2xl font-bold mt-2">
                                        <?php 
                                        $total_users = mysqli_num_rows($users_result);
                                        echo $total_users;
                                        ?>
                                    </h3>
                                </div>
                                <div class="bg-blue-100 p-3 rounded-full">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Total Messages Card -->
                        <div class="bg-white rounded-lg shadow-md p-6 dashboard-card">
                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="text-gray-500">Total Messages</p>
                                    <h3 class="text-2xl font-bold mt-2">
                                        <?php 
                                        $total_messages = mysqli_num_rows($messages_result);
                                        echo $total_messages;
                                        ?>
                                    </h3>
                                </div>
                                <div class="bg-green-100 p-3 rounded-full">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Recent Bookings -->
                    <h3 class="text-xl font-bold text-gray-800 mb-4">Recent Bookings</h3>
                    <div class="bg-white rounded-lg shadow-md overflow-hidden mb-8">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Event</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                <?php 
                                $recent_bookings_query = "SELECT * FROM bookings ORDER BY created_at DESC LIMIT 5";
                                $recent_bookings_result = mysqli_query($conn, $recent_bookings_query);
                                
                                while ($booking = mysqli_fetch_assoc($recent_bookings_result)): 
                                    $status_class = '';
                                    switch($booking['status']) {
                                        case 'Pending': $status_class = 'bg-yellow-100 text-yellow-800'; break;
                                        case 'Confirmed': $status_class = 'bg-green-100 text-green-800'; break;
                                        case 'Cancelled': $status_class = 'bg-red-100 text-red-800'; break;
                                        case 'Completed': $status_class = 'bg-blue-100 text-blue-800'; break;
                                        default: $status_class = 'bg-gray-100 text-gray-800';
                                    }
                                ?>
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm font-medium text-gray-900"><?php echo htmlspecialchars($booking['event_type']); ?></div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900"><?php echo htmlspecialchars($booking['email']); ?></div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900"><?php echo date('M d, Y', strtotime($booking['event_date'])); ?></div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full <?php echo $status_class; ?>">
                                            <?php echo $booking['status']; ?>
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        <a href="#bookings" class="text-red-600 hover:text-red-900">View</a>
                                    </td>
                                </tr>
                                <?php endwhile; ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Bookings Section -->
                <div id="bookings" class="hidden">
                    <div class="flex justify-between items-center mb-6">
                        <h2 class="text-2xl font-bold text-gray-800">Bookings Management</h2>
                        <div class="flex space-x-2">
                            <select id="booking-filter" class="border border-gray-300 rounded-md px-3 py-1 text-sm">
                                <option value="all">All Bookings</option>
                                <option value="pending">Pending</option>
                                <option value="confirmed">Confirmed</option>
                                <option value="cancelled">Cancelled</option>
                                <option value="completed">Completed</option>
                            </select>
                            <button id="export-bookings" class="bg-green-600 text-white px-3 py-1 rounded-md text-sm hover:bg-green-700">
                                Export
                            </button>
                        </div>
                    </div>
                    
                    <div class="bg-white rounded-lg shadow-md overflow-hidden">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Event</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Guests</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Budget</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                <?php 
                                mysqli_data_seek($bookings_result, 0); // Reset pointer to start
                                while ($booking = mysqli_fetch_assoc($bookings_result)): 
                                    $status_class = '';
                                    switch($booking['status']) {
                                        case 'Pending': $status_class = 'bg-yellow-100 text-yellow-800'; break;
                                        case 'Confirmed': $status_class = 'bg-green-100 text-green-800'; break;
                                        case 'Cancelled': $status_class = 'bg-red-100 text-red-800'; break;
                                        case 'Completed': $status_class = 'bg-blue-100 text-blue-800'; break;
                                        default: $status_class = 'bg-gray-100 text-gray-800';
                                    }
                                    
                                    // Create unique identifier for booking
                                    $booking_identifier = md5($booking['email'] . $booking['event_date'] . $booking['event_type']);
                                ?>
                                <tr class="booking-row" data-status="<?php echo strtolower($booking['status']); ?>">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm font-medium text-gray-900"><?php echo htmlspecialchars($booking['event_type']); ?></div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900"><?php echo htmlspecialchars($booking['email']); ?></div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900"><?php echo date('M d, Y', strtotime($booking['event_date'])); ?></div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        <?php echo $booking['guest_count']; ?>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        ৳<?php echo number_format($booking['estimated_budget'], 2); ?>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full <?php echo $status_class; ?>">
                                            <?php echo $booking['status']; ?>
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        <button onclick="showBookingDetails('<?php echo $booking_identifier; ?>')" class="text-red-600 hover:text-red-900 mr-2">View</button>
                                        <button onclick="editBooking('<?php echo $booking_identifier; ?>')" class="text-blue-600 hover:text-blue-900">Edit</button>
                                    </td>
                                </tr>
                                <?php endwhile; ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Users Section -->
                <div id="users" class="hidden">
                    <h2 class="text-2xl font-bold text-gray-800 mb-6">Users Management</h2>
                    
                    <div class="bg-white rounded-lg shadow-md overflow-hidden">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Phone</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Registered</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                <?php 
                                mysqli_data_seek($users_result, 0); // Reset pointer to start
                                while ($user = mysqli_fetch_assoc($users_result)): 
                                ?>
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm font-medium text-gray-900"><?php echo htmlspecialchars($user['name']); ?></div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900"><?php echo htmlspecialchars($user['email']); ?></div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        <?php echo htmlspecialchars($user['phone']); ?>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        <?php echo date('M d, Y', strtotime($user['created_at'])); ?>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        <button onclick="viewUser('<?php echo $user['email']; ?>')" class="text-red-600 hover:text-red-900 mr-2">View</button>
                                        <button onclick="editUser('<?php echo $user['email']; ?>')" class="text-blue-600 hover:text-blue-900">Edit</button>
                                    </td>
                                </tr>
                                <?php endwhile; ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Messages Section -->
                <div id="messages" class="hidden">
                    <h2 class="text-2xl font-bold text-gray-800 mb-6">Contact Messages</h2>
                    
                    <div class="bg-white rounded-lg shadow-md overflow-hidden">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Subject</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                <?php 
                                mysqli_data_seek($messages_result, 0); // Reset pointer to start
                                while ($message = mysqli_fetch_assoc($messages_result)): 
                                    // Handle missing is_read field
                                    $is_read = isset($message['is_read']) ? $message['is_read'] : 0;
                                    $status_class = $is_read ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800';
                                    $status_text = $is_read ? 'Read' : 'Unread';
                                    
                                    // Create unique identifier for message
                                    $message_identifier = md5($message['email'] . $message['created_at']);
                                ?>
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm font-medium text-gray-900"><?php echo htmlspecialchars($message['name']); ?></div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900"><?php echo htmlspecialchars($message['email']); ?></div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900"><?php echo htmlspecialchars($message['subject']); ?></div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        <?php echo date('M d, Y', strtotime($message['created_at'])); ?>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full <?php echo $status_class; ?>">
                                            <?php echo $status_text; ?>
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        <button onclick="viewMessage('<?php echo $message_identifier; ?>')" class="text-red-600 hover:text-red-900">View</button>
                                    </td>
                                </tr>
                                <?php endwhile; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Booking Details Modal -->
    <div id="booking-modal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden">
        <div class="relative top-20 mx-auto p-5 border w-11/12 md:w-2/3 shadow-lg rounded-md bg-white">
            <div class="flex justify-between items-center border-b pb-3">
                <h3 class="text-xl font-bold text-gray-800">Booking Details</h3>
                <button onclick="closeModal('booking-modal')" class="text-gray-500 hover:text-gray-700">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <div id="booking-details-content" class="mt-4">
                <!-- Content will be loaded via AJAX -->
            </div>
            <div class="mt-4 flex justify-end space-x-3 border-t pt-3">
                <button onclick="closeModal('booking-modal')" class="px-4 py-2 bg-gray-300 text-gray-800 rounded-md hover:bg-gray-400">Close</button>
                <button id="confirm-booking-btn" class="px-4 py-2 bg-green-600 text-white rounded-md hover:bg-green-700 hidden">Confirm</button>
                <button id="cancel-booking-btn" class="px-4 py-2 bg-red-600 text-white rounded-md hover:bg-red-700 hidden">Cancel</button>
                <button id="complete-booking-btn" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 hidden">Mark Complete</button>
            </div>
        </div>
    </div>

    <!-- User Details Modal -->
    <div id="user-modal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden">
        <div class="relative top-20 mx-auto p-5 border w-11/12 md:w-2/3 shadow-lg rounded-md bg-white">
            <div class="flex justify-between items-center border-b pb-3">
                <h3 class="text-xl font-bold text-gray-800">User Details</h3>
                <button onclick="closeModal('user-modal')" class="text-gray-500 hover:text-gray-700">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <div id="user-details-content" class="mt-4">
                <!-- Content will be loaded via AJAX -->
            </div>
            <div class="mt-4 flex justify-end space-x-3 border-t pt-3">
                <button onclick="closeModal('user-modal')" class="px-4 py-2 bg-gray-300 text-gray-800 rounded-md hover:bg-gray-400">Close</button>
                <button id="save-user-btn" class="px-4 py-2 bg-green-600 text-white rounded-md hover:bg-green-700 hidden">Save Changes</button>
            </div>
        </div>
    </div>

    <!-- Message Details Modal -->
    <div id="message-modal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden">
        <div class="relative top-20 mx-auto p-5 border w-11/12 md:w-2/3 shadow-lg rounded-md bg-white">
            <div class="flex justify-between items-center border-b pb-3">
                <h3 class="text-xl font-bold text-gray-800">Message Details</h3>
                <button onclick="closeModal('message-modal')" class="text-gray-500 hover:text-gray-700">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <div id="message-details-content" class="mt-4">
                <!-- Content will be loaded via AJAX -->
            </div>
            <div class="mt-4 flex justify-end space-x-3 border-t pt-3">
                <button onclick="closeModal('message-modal')" class="px-4 py-2 bg-gray-300 text-gray-800 rounded-md hover:bg-gray-400">Close</button>
                <button id="reply-message-btn" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">Reply</button>
            </div>
        </div>
    </div>

    <script>
        // Navigation between sections
        document.querySelectorAll('nav a').forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                const target = this.getAttribute('href').substring(1);
                
                // Hide all sections
                document.querySelectorAll('#dashboard, #bookings, #users, #messages').forEach(section => {
                    section.classList.add('hidden');
                });
                
                // Show target section
                document.getElementById(target).classList.remove('hidden');
            });
        });
        
        // Filter bookings by status
        document.getElementById('booking-filter').addEventListener('change', function() {
            const status = this.value;
            document.querySelectorAll('.booking-row').forEach(row => {
                if (status === 'all' || row.getAttribute('data-status') === status) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        });
        
        // Modal functions
        function showModal(modalId) {
            document.getElementById(modalId).classList.remove('hidden');
        }
        
        function closeModal(modalId) {
            document.getElementById(modalId).classList.add('hidden');
        }
        
        // Show booking details
        function showBookingDetails(bookingIdentifier) {
            // This would need to be implemented with actual database IDs
            alert("Booking details functionality requires a unique booking ID in the database");
        }
        
        // View user details
        function viewUser(userEmail) {
            fetch(`get_user_details.php?email=${encodeURIComponent(userEmail)}`)
                .then(response => response.text())
                .then(data => {
                    document.getElementById('user-details-content').innerHTML = data;
                    showModal('user-modal');
                });
        }
        
        // View message details
        function viewMessage(messageIdentifier) {
            // This would need to be implemented with actual database IDs
            alert("Message details functionality requires a unique message ID in the database");
        }
        
        // Edit booking
        function editBooking(bookingIdentifier) {
            // This would need to be implemented with actual database IDs
            alert("Edit booking functionality requires a unique booking ID in the database");
        }
        
        // Edit user
        function editUser(userEmail) {
            fetch(`get_user_edit_form.php?email=${encodeURIComponent(userEmail)}`)
                .then(response => response.text())
                .then(data => {
                    document.getElementById('user-details-content').innerHTML = data;
                    showModal('user-modal');
                    
                    // Show save button
                    document.getElementById('save-user-btn').classList.remove('hidden');
                });
        }
        
        // Initialize with dashboard shown
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('dashboard').classList.remove('hidden');
            
            // Handle hash on page load
            if (window.location.hash) {
                const target = window.location.hash.substring(1);
                document.querySelectorAll('#dashboard, #bookings, #users, #messages').forEach(section => {
                    section.classList.add('hidden');
                });
                document.getElementById(target).classList.remove('hidden');
            }
            // Update the booking status using AJAX
function updateBookingStatus(bookingIdentifier, newStatus) {
    // Send the status update request via AJAX
    fetch('update_booking_status.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: new URLSearchParams({
            'booking_identifier': bookingIdentifier,
            'new_status': newStatus
        })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            // Find the booking row and update the status text
            let bookingRow = document.querySelector(`[data-identifier="${bookingIdentifier}"]`);
            let statusCell = bookingRow.querySelector('.status-cell');
            statusCell.innerHTML = data.newStatus; // Update the status in the UI

            // Optionally, you can change the button based on the new status
            let actionCell = bookingRow.querySelector('.action-cell');
            actionCell.innerHTML = `<button onclick="updateBookingStatus('${bookingIdentifier}', '${newStatus === 'Pending' ? 'Confirmed' : 'Completed'}')">Confirm</button>`;
        } else {
            alert('Failed to update status. Please try again.');
        }
    })
    .catch(error => {
        console.error('Error updating booking status:', error);
        alert('Error updating status. Please try again.');
    });
}

        });
    </script>
    <script>
    // Enhanced logout function
    document.querySelector('a[href="admin_logout.php"]').addEventListener('click', function(e) {
        e.preventDefault();
        
        // Send logout request
        fetch('admin_logout.php')
            .then(response => {
                // Redirect to login page after logout
                window.location.href = 'admin_login.php';
            })
            .catch(error => {
                console.error('Logout error:', error);
                window.location.href = 'admin_login.php';
            });
    });
</script>

</body>
</html>