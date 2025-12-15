<?php
session_start(); // Start the session

// Check if the user is logged in
$is_logged_in = isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true;
$user_name = $is_logged_in ? $_SESSION['user_name'] : ''; // Get the username if logged in
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Poppins', sans-serif; }
        ..dropdown-content {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
    right: 0;
    border-radius: 4px;
}

.dropdown:hover .dropdown-content {
    display: block;
}

.dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
}

.dropdown-content a:hover {
    background-color: #f1f1f1;
}
    </style>
</head>
<body class="bg-white">

<!-- Top Bar -->
<div class="bg-gray-800 text-white text-sm">
    <div class="container mx-auto px-4 py-2 flex justify-between items-center">
        <div class="flex items-center space-x-6">
            <a href="tel:+880123456789" class="flex items-center hover:text-red-500">
                <span>+880 1234 56789</span>
            </a>
            <a href="mailto:info@dhakaeventplanner.com" class="hidden md:flex items-center hover:text-red-500">
                <span>info@dhakaeventplanner.com</span>
            </a>
        </div>

        <!-- Navbar based on login status -->
        <div class="flex items-center space-x-4">
            <?php if ($is_logged_in): ?>
                <!-- User is logged in, show name and logout dropdown -->
                <div class="relative dropdown">
                    <button class="text-white hover:text-red-500">
                        <?php echo $user_name; ?>
                    </button>
                    </div>
                </div>
            <?php else: ?>
                <!-- User is not logged in, show login and register buttons -->
            <?php endif; ?>
        </div>
    </div>
</div>

<!-- Your homepage content goes here -->

</body>
</html>





<!-- Main Navigation -->
<!-- Main Navigation -->
<nav class="bg-white shadow-md sticky top-0 z-50">
    <div class="container mx-auto px-4 py-3 flex justify-between items-center">
        <a href="#" class="text-2xl font-extrabold" onclick="showPage('homepage')">
            <span class="text-red-600">Event</span><span class="text-gray-900">Planner</span>
        </a>
        
        <div class="hidden md:flex items-center space-x-8 font-medium text-gray-600">
            <a href="#" class="text-red-600 font-bold" onclick="showPage('homepage')">Home</a>
            <a href="#" onclick="showPage('about-page')" class="hover:text-red-600">About Us</a>
            <a href="#" onclick="showPage('services-page')" class="hover:text-red-600">Services</a>
            <a href="#" onclick="showPage('gallery-page')" class="hover:text-red-600">Gallery</a>
            <a href="#" onclick="showPage('contact-page')" class="hover:text-red-600">Contact</a>
        </div>

        <div class="hidden md:flex items-center space-x-4">
            <?php if ($is_logged_in): ?>
                <!-- User is logged in - show dropdown with user name -->
                <div class="relative dropdown">
                    <button class="text-gray-800 hover:text-red-600 flex items-center">
                        <?php echo htmlspecialchars($user_name); ?>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div class="dropdown-content absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg z-50">
                        <a href="logout.php" class="block px-4 py-2 text-sm text-gray-700 hover:bg-red-600 hover:text-white">Logout</a>
                    </div>
                </div>
            <?php else: ?>
                <!-- User is not logged in - show login/register buttons -->
                <a href="#" onclick="showPage('login-page')" class="text-gray-600 hover:text-red-600">Login</a>
                <a href="#" onclick="showPage('register-page')" class="bg-red-600 text-white font-bold py-2 px-6 rounded-full hover:bg-red-700 transition duration-300">
                    Register
                </a>
            <?php endif; ?>
        </div>
        <div class="md:hidden">
            <button class="text-gray-800">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" /></svg>
            </button>
        </div>
    </div>
</nav>

<!-- ==================== PAGES ==================== -->

<!-- Homepage -->
<main id="homepage">
    <!-- Hero Section -->
    <header class="relative h-[60vh] md:h-[80vh] bg-cover bg-center" style="background-image: url('https://images.unsplash.com/photo-1511795409834-ef04bbd61622?q=80&w=2070');">
        <div class="absolute inset-0 bg-black bg-opacity-50"></div>
        <div class="relative z-10 flex flex-col items-center justify-center h-full text-center text-white px-4">
            <h1 class="text-4xl md:text-6xl font-extrabold leading-tight">Best Event Management Company</h1>
            <p class="mt-4 text-lg md:text-xl max-w-2xl">We are the best event management company in Dhaka, Bangladesh, creating unforgettable experiences.</p>
            <a href="#" onclick="showPage('services-page')" class="mt-8 bg-red-600 text-white font-bold py-3 px-8 rounded-full hover:bg-red-700 transition duration-300 uppercase text-sm tracking-wider">
                View Our Services
            </a>
        </div>
    </header>