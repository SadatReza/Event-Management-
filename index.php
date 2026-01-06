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

    <!-- About Us Section -->
    <section class="py-20 bg-gray-50">
        <div class="container mx-auto px-4 grid md:grid-cols-2 gap-12 items-center">
            <div class="relative">
                <div class="absolute -top-4 -left-4 w-full h-full bg-red-100 rounded-lg transform -rotate-3"></div>
                <img src="https://images.squarespace-cdn.com/content/v1/550ef862e4b0ecb79919d4bb/1667072665606-ZDRLS3GFE2UFCBM7WG4Q/Events-2.png" alt="About Us Image" class="relative rounded-lg shadow-xl z-10">
            </div>
            <div>
                <h2 class="text-sm font-bold uppercase text-red-600 tracking-wider">About Us</h2>
                <h3 class="mt-2 text-3xl md:text-4xl font-extrabold text-gray-900">25+ Years of Experience in Event Management</h3>
                <p class="mt-4 text-gray-600">
                    We are a team of passionate professionals dedicated to planning and executing flawless events. From corporate gatherings to dream weddings, we handle every detail with precision and creativity to bring your vision to life.
                </p>
                <a href="#" onclick="showPage('about-page')" class="mt-6 inline-block bg-gray-800 text-white font-bold py-3 px-6 rounded-full hover:bg-gray-900 transition duration-300">
                    Learn More
                </a>
            </div>
        </div>
    </section>

    <!-- Our Services Section -->
    <section class="py-20 bg-white">
        <div class="container mx-auto px-4">
            <div class="text-center">
                <h2 class="text-sm font-bold uppercase text-red-600 tracking-wider">Our Services</h2>
                <h3 class="mt-2 text-3xl md:text-4xl font-extrabold text-gray-900">What We Provide</h3>
            </div>

            <div class="mt-12 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Service Card 1 -->
                <div class="bg-white p-8 rounded-lg shadow-lg text-center transform transition duration-300 hover:shadow-2xl hover:-translate-y-2">
                    <div class="inline-block p-4 bg-red-100 rounded-full">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" /></svg>
                    </div>
                    <h4 class="mt-6 text-xl font-bold text-gray-900">Wedding Planning</h4>
                    <p class="mt-2 text-gray-600 text-sm">Crafting your perfect day with elegance and style, ensuring every moment is memorable.</p>
                    <a href="#" onclick="showPage('wedding-planning-page')" class="mt-4 inline-block text-red-600 font-medium hover:underline">Learn More</a>
                </div>
                <!-- Service Card 2 -->
                <div class="bg-white p-8 rounded-lg shadow-lg text-center transform transition duration-300 hover:shadow-2xl hover:-translate-y-2">
                    <div class="inline-block p-4 bg-red-100 rounded-full">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" /></svg>
                    </div>
                    <h4 class="mt-6 text-xl font-bold text-gray-900">Corporate Events</h4>
                    <p class="mt-2 text-gray-600 text-sm">Professional planning for conferences, product launches, and company meetings.</p>
                    <a href="#" onclick="showPage('corporate-events-page')" class="mt-4 inline-block text-red-600 font-medium hover:underline">Learn More</a>
                </div>
                <!-- Service Card 3 -->
                <div class="bg-white p-8 rounded-lg shadow-lg text-center transform transition duration-300 hover:shadow-2xl hover:-translate-y-2">
                    <div class="inline-block p-4 bg-red-100 rounded-full">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19V6l12-3v13M9 19c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zm12-3c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zM9 6l12-3" /></svg>
                    </div>
                    <h4 class="mt-6 text-xl font-bold text-gray-900">Birthday Parties</h4>
                    <p class="mt-2 text-gray-600 text-sm">Creating fun and exciting birthday celebrations for all ages, tailored to your theme.</p>
                    <a href="#" onclick="showPage('birthday-parties-page')" class="mt-4 inline-block text-red-600 font-medium hover:underline">Learn More</a>
                </div>
            </div>
        </div>
    </section>
</main>

<!-- Login Page -->
 
<main id="login-page">
    <!-- Page Header -->
    <header class="relative h-64 bg-cover bg-center" style="background-image: url('https://images.unsplash.com/photo-1513151233558-d860c5398176?q=80&w=2070');">
        <div class="absolute inset-0 bg-black bg-opacity-60"></div>
        <div class="relative z-10 flex flex-col items-center justify-center h-full text-center text-white px-4">
            <h1 class="text-4xl md:text-5xl font-extrabold">Login</h1>
            <p class="mt-2 text-lg">Home / Login</p>
        </div>
    </header>

    <!-- Login Form Section -->
    <section class="py-20 bg-white">
        <div class="container mx-auto px-4 max-w-md">
            
            <!-- Display error messages if any -->
            <?php if (isset($_SESSION['error'])): ?>
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                    <strong class="font-bold">Error!</strong>
                    <span class="block sm:inline"><?php echo $_SESSION['error']; ?></span>
                    <?php unset($_SESSION['error']); // Clear error after displaying ?>
                </div>
            <?php endif; ?>

            <!-- Login Form -->
            <form action="login.php" method="POST" class="space-y-6">
                <div>
                    <label for="email" class="sr-only">Email Address</label>
                    <input id="email" name="email" type="email" required class="w-full p-3 border border-gray-300 rounded-md" placeholder="Email Address">
                </div>
                <div>
                    <label for="password" class="sr-only">Password</label>
                    <input id="password" name="password" type="password" required class="w-full p-3 border border-gray-300 rounded-md" placeholder="Password">
                </div>

                <div>
                    <button type="submit" name="submit" class="w-full bg-blue-600 text-white p-3 rounded-md">Login</button>
                </div>
            </form>

        </div>
    </section>
</main>

        <!-- Login Button -->
    </div>
</form>
<script>
    // Function to handle the login submission
    function handleLogin(event) {
        event.preventDefault(); // Prevent the default form submission

        // Simulate a login (you would replace this with actual login logic)
        setTimeout(() => {
            // On successful login, change the button to a login logo (Google Chrome icon)
            changeToLoginLogo();
        }, 1000); // Simulating login delay
    }

    // Function to change the login button to a logo (Google Chrome icon)
    function changeToLoginLogo() {
        const loginButton = document.getElementById("login-button");

        // Replace the login button text with an icon (Google Chrome-like icon)
        loginButton.innerHTML = `
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 16c-2.79 0-5-2.21-5-5s2.21-5 5-5 5 2.21 5 5-2.21 5-5 5zm-1-5h2v2h-2zm0-4h2v2h-2z" />
            </svg>
        `;
        loginButton.classList.add("bg-gray-500", "cursor-not-allowed"); // Change style to indicate logged-in state
        loginButton.disabled = true; // Disable the button after login
    }
</script>



<!-- Navigation: Show login/logout buttons based on session state -->
<nav>
    <div class="social-login-links">
        <?php if (isset($_SESSION['user_id'])): ?>
            <!-- User is logged in, show logout link -->
            <a href="logout.php" class="hover:text-red-500">Logout (<?php echo $_SESSION['user_name']; ?>)</a>
        <?php else: ?>
            <!-- User is not logged in, show login/register links -->
        <?php endif; ?>
    </div>
</nav>


<!-- Registration Page -->
<main id="register-page" class="min-h-screen flex items-center justify-center bg-gray-50 py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full space-y-8 bg-white p-10 rounded-lg shadow-lg">
        <div>
            <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">
                Create a new account
            </h2>
            <p class="mt-2 text-center text-sm text-gray-600">
                Already have an account? <a href="#" onclick="showPage('login-page')" class="font-medium text-red-600 hover:text-red-500">Sign in here</a>
            </p>
        </div>
<form class="mt-8 space-y-6" action="index.php" method="POST">
    <div class="rounded-md shadow-sm space-y-4">
        <div>
            <label for="full-name" class="sr-only">Full Name</label>
            <input id="full-name" name="name" type="text" autocomplete="name" required
                class="appearance-none rounded-none relative block w-full px-3 py-3 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-red-500 focus:border-red-500 focus:z-10 sm:text-sm"
                placeholder="Full Name">
        </div>
        <div>
            <label for="email-address" class="sr-only">Email address</label>
            <input id="email-address" name="email" type="email" autocomplete="email" required
                class="appearance-none rounded-none relative block w-full px-3 py-3 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-red-500 focus:border-red-500 focus:z-10 sm:text-sm"
                placeholder="Email address">
        </div>
        <div>
            <label for="phone" class="sr-only">Phone Number</label>
            <input id="phone" name="phone" type="tel" autocomplete="tel" required
                class="appearance-none rounded-none relative block w-full px-3 py-3 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-red-500 focus:border-red-500 focus:z-10 sm:text-sm"
                placeholder="Phone Number">
        </div>
        <div>
            <label for="password" class="sr-only">Password</label>
            <input id="password" name="password" type="password" autocomplete="new-password" required
                class="appearance-none rounded-none relative block w-full px-3 py-3 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-red-500 focus:border-red-500 focus:z-10 sm:text-sm"
                placeholder="Password (min 8 characters)">
        </div>
        <div>
            <label for="confirm-password" class="sr-only">Confirm Password</label>
            <input id="confirm-password" name="confirm_password" type="password" required
                class="appearance-none rounded-none relative block w-full px-3 py-3 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-red-500 focus:border-red-500 focus:z-10 sm:text-sm"
                placeholder="Confirm Password">
        </div>
    </div>

    <div>
        <button type="submit" name="submit"
            class="group relative w-full flex justify-center py-3 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
            Register
        </button>
    </div>
</form>
 <div class="text-center">
            <button onclick="showPage('homepage')" class="mt-4 text-sm text-gray-600 hover:text-red-500">
                ← Back to home
            </button>
        </div>
    </div>
</main>



<?php
require_once('database.php');

if (isset($_POST["submit"])) {
    $fullname = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $password = $_POST["password"];
    $repeatpassword = $_POST["confirm_password"];
    $error = array();

    // Check for empty fields
    if (empty($fullname)) {
        array_push($error, "Full name is required");
    }
    if (empty($email)) {
        array_push($error, "Email is required");
    }
    if (empty($phone)) {
        array_push($error, "Phone number is required");
    }
    if (empty($password)) {
        array_push($error, "Password is required");
    }
    if (empty($repeatpassword)) {
        array_push($error, "Confirm password is required");
    }

    // Validate email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        array_push($error, "Enter a valid email address");
    }

    // Validate phone number (must be 11 digits and only numbers)
    if (strlen($phone) != 11 || !preg_match('/^[0-9]+$/', $phone)) {
        array_push($error, "Enter a valid 11-digit phone number");
    }

    // Check password length
    if (strlen($password) < 8) {
        array_push($error, "Password must be at least 8 characters long");
    }

    // Check if passwords match
    if ($password !== $repeatpassword) {
        array_push($error, "Passwords do not match");
    }
    

    // Check if email already exists
    $sql = "SELECT * FROM users WHERE email='$email'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        array_push($error, "Email already exists");
    }

    // Show errors if any
    if (count($error) > 0) {
        foreach ($error as $err) {
            echo "<div class='text-red-600 font-medium text-sm mb-2'>$err</div>";
        }
    } else {
        // Hash the password before storing
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        
        // Insert user into database
        $sql1 = "INSERT INTO users (email, name, phone,password, created_at)
                 VALUES ('$email', '$fullname', '$phone','$hashed_password', NOW())";

        if (mysqli_query($conn, $sql1)) {
            echo "<div class='text-green-600 font-medium text-sm mb-2'>You are registered successfully</div>";
            // Redirect to login page after successful registration
            echo "<script>setTimeout(function(){ showPage('login-page'); }, 2000);</script>";
        } else {
            echo "<div class='text-red-600 font-medium text-sm mb-2'>Error: " . mysqli_error($conn) . "</div>";
        }
    }
    
    // Close connection
    mysqli_close($conn);
}
?>





<!-- Gallery Page -->
<main id="gallery-page">
    <!-- Page Header -->
    <header class="relative h-64 bg-cover bg-center" style="background-image: url('https://images.unsplash.com/photo-1513151233558-d860c5398176?q=80&w=2070');">
        <div class="absolute inset-0 bg-black bg-opacity-60"></div>
        <div class="relative z-10 flex flex-col items-center justify-center h-full text-center text-white px-4">
            <h1 class="text-4xl md:text-5xl font-extrabold">Our Gallery</h1>
            <p class="mt-2 text-lg">Home / Gallery</p>
        </div>
    </header>

    <section class="py-20">
        <div class="container mx-auto px-4">
            <!-- Filter Buttons -->
            <div class="flex justify-center space-x-2 md:space-x-4 mb-12">
                <button class="bg-red-600 text-white font-semibold py-2 px-6 rounded-full">All</button>
                <button class="bg-gray-200 text-gray-700 font-semibold py-2 px-6 rounded-full hover:bg-red-600 hover:text-white">Weddings</button>
                <button class="bg-gray-200 text-gray-700 font-semibold py-2 px-6 rounded-full hover:bg-red-600 hover:text-white">Corporate</button>
                <button class="bg-gray-200 text-gray-700 font-semibold py-2 px-6 rounded-full hover:bg-red-600 hover:text-white">Parties</button>
            </div>

            <!-- Image Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Image Item 1 -->
                <div class="group overflow-hidden rounded-lg shadow-lg h-80">
                    <img src="https://w0.peakpx.com/wallpaper/491/578/HD-wallpaper-wedding-work-kwpeventskochi-events-stagedecoration-weddingworks-marriagedecoration.jpg" alt="Wedding Event" class="w-full h-full object-cover transform transition-transform duration-300 group-hover:scale-110">
                </div>
                <!-- Image Item 2 -->
                <div class="group overflow-hidden rounded-lg shadow-lg h-80">
                    <img src="https://images.unsplash.com/photo-1511578314322-379afb476865?fm=jpg&q=60&w=3000&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8Y29ycG9yYXRlJTIwZXZlbnRzfGVufDB8fDB8fHww" alt="Corporate Event" class="w-full h-full object-cover transform transition-transform duration-300 group-hover:scale-110">
                </div>
                <!-- Image Item 3 -->
                <div class="group overflow-hidden rounded-lg shadow-lg h-80">
                    <img src="https://images.unsplash.com/photo-1514933651103-005eec06c04b?q=80&w=1974" alt="Party Event" class="w-full h-full object-cover transform transition-transform duration-300 group-hover:scale-110">
                </div>
                <!-- Image Item 4 -->
                <div class="group overflow-hidden rounded-lg shadow-lg h-80">
                    <img src="https://images.unsplash.com/photo-1540039155733-5bb30b53aa14?q=80&w=1974" alt="Concert Event" class="w-full h-full object-cover transform transition-transform duration-300 group-hover:scale-110">
                </div>
                <!-- Image Item 5 -->
                 <div class="group overflow-hidden rounded-lg shadow-lg h-80">
                    <img src="https://images.unsplash.com/photo-1587825140708-dfaf72ae4b04?fm=jpg&q=60&w=3000&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NHx8Y29uZmVyZW5jZSUyMGhhbGx8ZW58MHx8MHx8fDA%3D" alt="Conference Event" class="w-full h-full object-cover transform transition-transform duration-300 group-hover:scale-110">
                </div>
                <!-- Image Item 6 -->
                 <div class="group overflow-hidden rounded-lg shadow-lg h-80">
                    <img src="https://media.istockphoto.com/id/1411971240/photo/wine-and-champain-glass-in-luxury-weddings-and-events.jpg?s=612x612&w=0&k=20&c=YVSlq0UuN0rpB252gO77eKcqc5DI0aNRQZI8lTSAZhY=" alt="Dinner Event" class="w-full h-full object-cover transform transition-transform duration-300 group-hover:scale-110">
                </div>
            </div>
        </div>
    </section>
</main>

<!-- Wedding Planning Service Page -->
<main id="wedding-planning-page">
    <!-- Page Header -->
    <header class="relative h-64 bg-cover bg-center" style="background-image: url('https://media.istockphoto.com/id/2023423778/vector/wedding-horizontal-web-banner-elegant-marriage-invitation-with-abstract-white-flowers-with.jpg?s=612x612&w=0&k=20&c=CSdaRk0c5hueqwcr9lP_oIXm4Fhx3MONYOZoytEqjbw=');">
        <div class="absolute inset-0 bg-black bg-opacity-60"></div>
        <div class="relative z-10 flex flex-col items-center justify-center h-full text-center text-white px-4">
            <h1 class="text-4xl md:text-5xl font-extrabold">Wedding Planning</h1>
            <p class="mt-2 text-lg">Home / Services / Wedding Planning</p>
        </div>
    </header>

    <section>
        <!-- Service Introduction Section -->
        <div class="py-20 bg-gray-50">
            <div class="container mx-auto px-4 grid md:grid-cols-2 gap-12 items-center">
                <div class="order-2 md:order-1">
                    <h2 class="text-3xl md:text-4xl font-extrabold text-gray-900">Your Dream Wedding, Perfectly Planned</h2>
                    <p class="mt-4 text-gray-600 leading-relaxed">
                        From venue selection to the final farewell, we are dedicated to creating your dream wedding day. Our team of experienced planners handles every detail with creativity and precision, ensuring a stress-free journey to "I do." We believe that your wedding should be a true reflection of your love story, and we work tirelessly to bring that vision to life.
                    </p>
                    <p class="mt-4 text-gray-600">Let us manage the complexities so you can focus on making memories that will last a lifetime.</p>
                </div>
                <div class="order-1 md:order-2">
                    <img src="https://png.pngtree.com/thumb_back/fh260/background/20240724/pngtree-portrait-of-a-happy-indian-wedding-couple-sitting-together-on-mandap-photo-image_16104863.jpg" alt="Happy couple at their wedding" class="rounded-lg shadow-xl">
                </div>
            </div>
        </div>

        <!-- What's Included Section -->
        <div class="py-20 bg-white">
            <div class="container mx-auto px-4">
                <div class="text-center">
                    <h2 class="text-3xl font-extrabold text-gray-900">Our Wedding Services Include</h2>
                    <p class="mt-2 max-w-2xl mx-auto text-gray-600">We offer a comprehensive suite of services to cover every aspect of your special day.</p>
                </div>

                <div class="mt-12 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    <div class="bg-gray-50 p-6 rounded-lg"><h4 class="text-xl font-bold text-gray-900">Full-Service Planning</h4></div>
                    <div class="bg-gray-50 p-6 rounded-lg"><h4 class="text-xl font-bold text-gray-900">Venue Selection</h4></div>
                    <div class="bg-gray-50 p-6 rounded-lg"><h4 class="text-xl font-bold text-gray-900">Vendor Management</h4></div>
                    <div class="bg-gray-50 p-6 rounded-lg"><h4 class="text-xl font-bold text-gray-900">Design & Decor</h4></div>
                    <div class="bg-gray-50 p-6 rounded-lg"><h4 class="text-xl font-bold text-gray-900">Budget Management</h4></div>
                    <div class="bg-gray-50 p-6 rounded-lg"><h4 class="text-xl font-bold text-gray-900">Day-of Coordination</h4></div>
                </div>
            </div>
        </div>

        <!-- Pricing Packages Section -->
        <div class="py-20 bg-gray-50">
            <div class="container mx-auto px-4">
                <div class="text-center mb-12">
                    <h2 class="text-3xl font-extrabold text-gray-900">Our Wedding Packages & Estimated Costs</h2>
                    <p class="mt-2 max-w-2xl mx-auto text-gray-600">Choose a package that suits your needs. Costs are estimates and will be finalized after a consultation.</p>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 max-w-5xl mx-auto">
                    <!-- Package 1: Essential -->
                    <div class="border rounded-lg shadow-lg p-8 flex flex-col">
                        <h3 class="text-2xl font-bold text-gray-900">The Essential</h3>
                        <p class="text-gray-500 mt-1">Day-Of Coordination</p>
                        <p class="text-3xl font-extrabold text-gray-900 mt-4">Starts at ৳80,000</p>
                        <p class="text-gray-600 mt-2 text-sm">Perfect for couples who have planned everything but want a professional to ensure a flawless wedding day.</p>
                        <ul class="space-y-2 text-gray-600 mt-6 text-sm flex-grow">
                            <li class="flex items-center"><span class="text-green-500 mr-2">✔</span> Wedding Day Management</li>
                            <li class="flex items-center"><span class="text-green-500 mr-2">✔</span> Timeline Creation</li>
                            <li class="flex items-center"><span class="text-green-500 mr-2">✔</span> Vendor Coordination</li>
                        </ul>
                        <a href="#" onclick="showPage('login-page')" class="mt-8 text-center bg-gray-800 text-white font-bold py-2 px-6 rounded-full hover:bg-gray-900 transition duration-300">Request Info</a>
                    </div>

                    <!-- Package 2: Signature (Most Popular) -->
                    <div class="border-2 border-red-600 rounded-lg shadow-2xl p-8 flex flex-col relative">
                        <span class="absolute top-0 right-4 -mt-4 bg-red-600 text-white text-xs font-bold uppercase py-1 px-3 rounded-full">Most Popular</span>
                        <h3 class="text-2xl font-bold text-gray-900">The Signature</h3>
                        <p class="text-gray-500 mt-1">Partial Planning</p>
                        <p class="text-3xl font-extrabold text-red-600 mt-4">Starts at ৳1,50,000</p>
                        <p class="text-gray-600 mt-2 text-sm">Ideal for couples who need help with design, vendor selection, and overall logistics, but still want to be involved.</p>
                        <ul class="space-y-2 text-gray-600 mt-6 text-sm flex-grow">
                           <li class="flex items-center"><span class="text-green-500 mr-2">✔</span> All Essential Features</li>
                           <li class="flex items-center"><span class="text-green-500 mr-2">✔</span> Venue & Vendor Assistance</li>
                           <li class="flex items-center"><span class="text-green-500 mr-2">✔</span> Design & Theme Development</li>
                           <li class="flex items-center"><span class="text-green-500 mr-2">✔</span> Budget Guidance</li>
                        </ul>
                         <a href="#" onclick="showPage('login-page')" class="mt-8 text-center bg-red-600 text-white font-bold py-2 px-6 rounded-full hover:bg-red-700 transition duration-300">Request Info</a>
                    </div>
                    
                    <!-- Package 3: Luxe -->
                    <div class="border rounded-lg shadow-lg p-8 flex flex-col">
                        <h3 class="text-2xl font-bold text-gray-900">The Luxe</h3>
                        <p class="text-gray-500 mt-1">Full-Service Planning</p>
                        <p class="text-3xl font-extrabold text-gray-900 mt-4">Starts at ৳3,00,000</p>
                        <p class="text-gray-600 mt-2 text-sm">Our all-inclusive package. We handle every detail from start to finish for a completely stress-free experience.</p>
                         <ul class="space-y-2 text-gray-600 mt-6 text-sm flex-grow">
                           <li class="flex items-center"><span class="text-green-500 mr-2">✔</span> All Signature Features</li>
                           <li class="flex items-center"><span class="text-green-500 mr-2">✔</span> Complete Vendor Booking</li>
                           <li class="flex items-center"><span class="text-green-500 mr-2">✔</span> Full Event Design & Execution</li>
                           <li class="flex items-center"><span class="text-green-500 mr-2">✔</span> Guest Management</li>
                        </ul>
                         <a href="#" onclick="showPage('login-page')" class="mt-8 text-center bg-gray-800 text-white font-bold py-2 px-6 rounded-full hover:bg-gray-900 transition duration-300">Request Info</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Mini Gallery Section -->
        <div class="py-20 bg-white">
            <div class="container mx-auto px-4">
                <div class="text-center mb-12">
                     <h2 class="text-3xl font-extrabold text-gray-900">A Glimpse of Our Weddings</h2>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                    <div class="group overflow-hidden rounded-lg shadow-lg h-80">
                        <img src="https://images.unsplash.com/photo-1480074568708-e7b720bb3f09?q=80&w=2074" alt="Elegant wedding table setting" class="w-full h-full object-cover transform transition-transform duration-300 group-hover:scale-110">
                    </div>
                    <div class="group overflow-hidden rounded-lg shadow-lg h-80">
                        <img src="https://images.unsplash.com/photo-1545006326-9744155b40d3?q=80&w=2070" alt="Outdoor wedding ceremony arch" class="w-full h-full object-cover transform transition-transform duration-300 group-hover:scale-110">
                    </div>
                    <div class="group overflow-hidden rounded-lg shadow-lg h-80">
                        <img src="https://images.unsplash.com/photo-1522040811373-b373864d60e5?q=80&w=1964" alt="Wedding decoration with flowers and lights" class="w-full h-full object-cover transform transition-transform duration-300 group-hover:scale-110">
                    </div>
                </div>
            </div>
        </div>

        <!-- Call to Action Section -->
        <div class="bg-red-700 text-white">
            <div class="container mx-auto px-4 py-16 text-center">
                <h2 class="text-3xl font-bold">Ready to Plan Your Perfect Day?</h2>
                <p class="mt-2 max-w-2xl mx-auto">Contact us today for a free, no-obligation consultation to discuss your wedding dreams.</p>
                <a href="#" onclick="showPage('contact-page')" class="mt-6 inline-block bg-white text-red-700 font-bold py-3 px-8 rounded-full hover:bg-gray-200 transition duration-300">
                    Get a Free Consultation
                </a>
            </div>
        </div>
    </section>
</main>

<!-- Corporate Events Service Page -->
<main id="corporate-events-page">
    <!-- Page Header -->
    <header class="relative h-64 bg-cover bg-center" style="background-image: url('https://images.unsplash.com/photo-1542744095-291d1f67b221?q=80&w=2070');">
        <div class="absolute inset-0 bg-black bg-opacity-60"></div>
        <div class="relative z-10 flex flex-col items-center justify-center h-full text-center text-white px-4">
            <h1 class="text-4xl md:text-5xl font-extrabold">Corporate Event Planning</h1>
            <p class="mt-2 text-lg">Home / Services / Corporate Events</p>
        </div>
    </header>

    <section>
        <!-- Service Introduction Section -->
        <div class="py-20 bg-gray-50">
            <div class="container mx-auto px-4 grid md:grid-cols-2 gap-12 items-center">
                <div class="order-2 md:order-1">
                    <h2 class="text-3xl md:text-4xl font-extrabold text-gray-900">Professionalism, Precision, and Impact</h2>
                    <p class="mt-4 text-gray-600 leading-relaxed">
                        We specialize in managing professional corporate events that enhance your brand's reputation. From large-scale conferences and innovative product launches to exclusive seminars, we provide seamless logistical support and execution. Our goal is to create an environment that fosters engagement, reflects your company's prestige, and achieves your strategic objectives.
                    </p>
                    <p class="mt-4 text-gray-600">Trust us to handle the complexities while you focus on your business and stakeholders.</p>
                </div>
                <div class="order-1 md:order-2">
                    <img src="https://images.unsplash.com/photo-1556761175-5973dc0f32e7?q=80&w=2232" alt="Professional speaker at a corporate conference" class="rounded-lg shadow-xl">
                </div>
            </div>
        </div>

        <!-- What's Included Section -->
        <div class="py-20 bg-white">
            <div class="container mx-auto px-4">
                <div class="text-center">
                    <h2 class="text-3xl font-extrabold text-gray-900">Our Corporate Services Include</h2>
                    <p class="mt-2 max-w-2xl mx-auto text-gray-600">End-to-end solutions for any type of corporate gathering.</p>
                </div>

                <div class="mt-12 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    <div class="bg-gray-50 p-6 rounded-lg"><h4 class="text-xl font-bold text-gray-900">Conference Management</h4></div>
                    <div class="bg-gray-50 p-6 rounded-lg"><h4 class="text-xl font-bold text-gray-900">Product Launches</h4></div>
                    <div class="bg-gray-50 p-6 rounded-lg"><h4 class="text-xl font-bold text-gray-900">Gala Dinners & Awards</h4></div>
                    <div class="bg-gray-50 p-6 rounded-lg"><h4 class="text-xl font-bold text-gray-900">Venue Sourcing & Logistics</h4></div>
                    <div class="bg-gray-50 p-6 rounded-lg"><h4 class="text-xl font-bold text-gray-900">Audio/Visual & Tech Support</h4></div>
                    <div class="bg-gray-50 p-6 rounded-lg"><h4 class="text-xl font-bold text-gray-900">Guest Registration & Management</h4></div>
                </div>
            </div>
        </div>

        <!-- Pricing Packages Section -->
        <div class="py-20 bg-gray-50">
            <div class="container mx-auto px-4">
                <div class="text-center mb-12">
                    <h2 class="text-3xl font-extrabold text-gray-900">Our Corporate Packages & Estimated Costs</h2>
                    <p class="mt-2 max-w-2xl mx-auto text-gray-600">Choose a package that fits your event's scale and objectives. Costs are estimates and subject to customization.</p>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 max-w-5xl mx-auto">
                    <!-- Package 1: Seminar -->
                    <div class="border rounded-lg shadow-lg p-8 flex flex-col">
                        <h3 class="text-2xl font-bold text-gray-900">The Seminar</h3>
                        <p class="text-gray-500 mt-1">Single-Day Event</p>
                        <p class="text-3xl font-extrabold text-gray-900 mt-4">Starts at ৳1,00,000</p>
                        <p class="text-gray-600 mt-2 text-sm">Ideal for workshops, training sessions, and small-scale professional meetings.</p>
                        <ul class="space-y-2 text-gray-600 mt-6 text-sm flex-grow">
                            <li class="flex items-center"><span class="text-green-500 mr-2">✔</span> Venue Logistics</li>
                            <li class="flex items-center"><span class="text-green-500 mr-2">✔</span> Basic A/V Setup</li>
                            <li class="flex items-center"><span class="text-green-500 mr-2">✔</span> On-site Coordination</li>
                        </ul>
                        <a href="#" onclick="showPage('booking-page')" class="mt-8 text-center bg-red-600 text-white font-bold py-2 px-6 rounded-full hover:bg-red-700 transition duration-300">
    Book Now
</a>
                    </div>

                    <!-- Package 2: Conference (Most Popular) -->
                    <div class="border-2 border-red-600 rounded-lg shadow-2xl p-8 flex flex-col relative">
                        <span class="absolute top-0 right-4 -mt-4 bg-red-600 text-white text-xs font-bold uppercase py-1 px-3 rounded-full">Most Popular</span>
                        <h3 class="text-2xl font-bold text-gray-900">The Conference</h3>
                        <p class="text-gray-500 mt-1">Multi-Day Event</p>
                        <p class="text-3xl font-extrabold text-red-600 mt-4">Starts at ৳3,50,000</p>
                        <p class="text-gray-600 mt-2 text-sm">A comprehensive solution for conferences, summits, and major product launches.</p>
                        <ul class="space-y-2 text-gray-600 mt-6 text-sm flex-grow">
                           <li class="flex items-center"><span class="text-green-500 mr-2">✔</span> All Seminar Features</li>
                           <li class="flex items-center"><span class="text-green-500 mr-2">✔</span> Guest Registration System</li>
                           <li class="flex items-center"><span class="text-green-500 mr-2">✔</span> Advanced A/V & Staging</li>
                           <li class="flex items-center"><span class="text-green-500 mr-2">✔</span> Branding Integration</li>
                        </ul>
                         <a href="#" onclick="showPage('booking-page')" class="mt-8 text-center bg-red-600 text-white font-bold py-2 px-6 rounded-full hover:bg-red-700 transition duration-300">
    Book Now
</a>
                    </div>
                    
                    <!-- Package 3: Gala -->
                    <div class="border rounded-lg shadow-lg p-8 flex flex-col">
                        <h3 class="text-2xl font-bold text-gray-900">The Prestige</h3>
                        <p class="text-gray-500 mt-1">Gala & Awards Night</p>
                        <p class="text-3xl font-extrabold text-gray-900 mt-4">Custom Pricing</p>
                        <p class="text-gray-600 mt-2 text-sm">A bespoke, high-end package for prestigious award ceremonies and VIP gala dinners.</p>
                         <ul class="space-y-2 text-gray-600 mt-6 text-sm flex-grow">
                           <li class="flex items-center"><span class="text-green-500 mr-2">✔</span> All Conference Features</li>
                           <li class="flex items-center"><span class="text-green-500 mr-2">✔</span> Thematic Design & Decor</li>
                           <li class="flex items-center"><span class="text-green-500 mr-2">✔</span> Entertainment Sourcing</li>
                           <li class="flex items-center"><span class="text-green-500 mr-2">✔</span> VIP & Speaker Management</li>
                        </ul>
                        <a href="#" onclick="showPage('booking-page')" class="mt-8 text-center bg-red-600 text-white font-bold py-2 px-6 rounded-full hover:bg-red-700 transition duration-300">
    Book Now
</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Mini Gallery Section -->
        <div class="py-20 bg-white">
            <div class="container mx-auto px-4">
                <div class="text-center mb-12">
                     <h2 class="text-3xl font-extrabold text-gray-900">A Look at Our Corporate Work</h2>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                    <div class="group overflow-hidden rounded-lg shadow-lg h-80">
                        <img src="https://images.unsplash.com/photo-1543269865-cbf427effbad?q=80&w=2070" alt="Panel discussion at a conference" class="w-full h-full object-cover transform transition-transform duration-300 group-hover:scale-110">
                    </div>
                    <div class="group overflow-hidden rounded-lg shadow-lg h-80">
                        <img src="https://images.unsplash.com/photo-1528605248644-14dd04022da1?q=80&w=2070" alt="Professionals networking" class="w-full h-full object-cover transform transition-transform duration-300 group-hover:scale-110">
                    </div>
                    <div class="group overflow-hidden rounded-lg shadow-lg h-80">
                         <img src="https://images.unsplash.com/photo-1551823326-f7360a375d65?q=80&w=2070" alt="Elegant gala dinner setup" class="w-full h-full object-cover transform transition-transform duration-300 group-hover:scale-110">
                    </div>
                </div>
            </div>
        </div>

        <!-- Call to Action Section -->
        <div class="bg-red-700 text-white">
            <div class="container mx-auto px-4 py-16 text-center">
                <h2 class="text-3xl font-bold">Elevate Your Next Corporate Event</h2>
                <p class="mt-2 max-w-2xl mx-auto">Contact us to discuss your requirements and receive a detailed proposal tailored to your needs.</p>
                <a href="#" onclick="showPage('contact-page')" class="mt-6 inline-block bg-white text-red-700 font-bold py-3 px-8 rounded-full hover:bg-gray-200 transition duration-300">
                    Get a Corporate Proposal
                </a>
            </div>
        </div>
    </section>
</main>

<!-- Birthday Parties Service Page -->
<main id="birthday-parties-page">
    <!-- Page Header -->
    <header class="relative h-64 bg-cover bg-center" style="background-image: url('https://images.unsplash.com/photo-1513151233558-d860c5398176?q=80&w=2070');">
        <div class="absolute inset-0 bg-black bg-opacity-60"></div>
        <div class="relative z-10 flex flex-col items-center justify-center h-full text-center text-white px-4">
            <h1 class="text-4xl md:text-5xl font-extrabold">Birthday Party Planning</h1>
            <p class="mt-2 text-lg">Home / Services / Birthday Parties</p>
        </div>
    </header>

    <section>
        <!-- Service Introduction Section -->
        <div class="py-20 bg-gray-50">
            <div class="container mx-auto px-4 grid md:grid-cols-2 gap-12 items-center">
                <div class="order-2 md:order-1">
                    <h2 class="text-3xl md:text-4xl font-extrabold text-gray-900">Fun-Filled, Themed Celebrations for All Ages</h2>
                    <p class="mt-4 text-gray-600 leading-relaxed">
                        Birthdays are milestones worth celebrating! We specialize in creating fun-filled, themed birthday parties that bring joy to guests of all ages. From a child's first birthday to a grand 50th celebration, we handle all the details so you can enjoy the party stress-free. Our creative team designs personalized themes, exciting entertainment, and delicious treats to make the day truly special.
                    </p>
                    <p class="mt-4 text-gray-600">Let's work together to create a birthday bash that will be remembered for years to come!</p>
                </div>
                <div class="order-1 md:order-2">
                    <img src="https://th.bing.com/th/id/OIP.26Jy7tmtfeXdhnNP5ndLLgHaHa?r=0&rs=1&pid=ImgDetMain&cb=idpwebpc2" alt="Colorful birthday party setup" class="rounded-lg shadow-xl">
                </div>
            </div>
        </div>

        <!-- What's Included Section -->
        <div class="py-20 bg-white">
            <div class="container mx-auto px-4">
                <div class="text-center">
                    <h2 class="text-3xl font-extrabold text-gray-900">Our Birthday Services Include</h2>
                    <p class="mt-2 max-w-2xl mx-auto text-gray-600">Everything you need for the perfect birthday celebration.</p>
                </div>

                <div class="mt-12 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    <div class="bg-gray-50 p-6 rounded-lg"><h4 class="text-xl font-bold text-gray-900">Creative Theme Development</h4></div>
                    <div class="bg-gray-50 p-6 rounded-lg"><h4 class="text-xl font-bold text-gray-900">Themed Decorations & Balloons</h4></div>
                    <div class="bg-gray-50 p-6 rounded-lg"><h4 class="text-xl font-bold text-gray-900">Entertainment & Activities</h4></div>
                    <div class="bg-gray-50 p-6 rounded-lg"><h4 class="text-xl font-bold text-gray-900">Custom Cakes & Catering</h4></div>
                    <div class="bg-gray-50 p-6 rounded-lg"><h4 class="text-xl font-bold text-gray-900">Photography & Videography</h4></div>
                    <div class="bg-gray-50 p-6 rounded-lg"><h4 class="text-xl font-bold text-gray-900">Venue Sourcing & Setup</h4></div>
                </div>
            </div>
        </div>

        <!-- Pricing Packages Section -->
        <div class="py-20 bg-gray-50">
            <div class="container mx-auto px-4">
                <div class="text-center mb-12">
                    <h2 class="text-3xl font-extrabold text-gray-900">Our Birthday Packages & Estimated Costs</h2>
                    <p class="mt-2 max-w-2xl mx-auto text-gray-600">Find the perfect package for your celebration. Costs are estimates and can be customized.</p>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 max-w-5xl mx-auto">
                    <!-- Package 1: Kids Party -->
                    <div class="border rounded-lg shadow-lg p-8 flex flex-col">
                        <h3 class="text-2xl font-bold text-gray-900">The Kids' Bash</h3>
                        <p class="text-gray-500 mt-1">Essential Party Pack</p>
                        <p class="text-3xl font-extrabold text-gray-900 mt-4">Starts at ৳40,000</p>
                        <p class="text-gray-600 mt-2 text-sm">A complete package for a fun and memorable children's birthday party.</p>
                        <ul class="space-y-2 text-gray-600 mt-6 text-sm flex-grow">
                            <li class="flex items-center"><span class="text-green-500 mr-2">✔</span> Basic Decorations & Balloons</li>
                            <li class="flex items-center"><span class="text-green-500 mr-2">✔</span> Cake & Basic Snacks</li>
                            <li class="flex items-center"><span class="text-green-500 mr-2">✔</span> Simple Games & Activities</li>
                        </ul>
                        <a href="#" onclick="showPage('login-page')" class="mt-8 text-center bg-gray-800 text-white font-bold py-2 px-6 rounded-full hover:bg-gray-900 transition duration-300">Book Now</a>
                    </div>

                    <!-- Package 2: Themed Party (Most Popular) -->
                    <div class="border-2 border-red-600 rounded-lg shadow-2xl p-8 flex flex-col relative">
                        <span class="absolute top-0 right-4 -mt-4 bg-red-600 text-white text-xs font-bold uppercase py-1 px-3 rounded-full">Most Popular</span>
                        <h3 class="text-2xl font-bold text-gray-900">The Themed Gala</h3>
                        <p class="text-gray-500 mt-1">Custom Themed Party</p>
                        <p class="text-3xl font-extrabold text-red-600 mt-4">Starts at ৳75,000</p>
                        <p class="text-gray-600 mt-2 text-sm">A fully personalized party with a unique theme for kids or adults.</p>
                        <ul class="space-y-2 text-gray-600 mt-6 text-sm flex-grow">
                           <li class="flex items-center"><span class="text-green-500 mr-2">✔</span> All Kids' Bash Features</li>
                           <li class="flex items-center"><span class="text-green-500 mr-2">✔</span> Full Thematic Decoration</li>
                           <li class="flex items-center"><span class="text-green-500 mr-2">✔</span> Professional Entertainment</li>
                           <li class="flex items-center"><span class="text-green-500 mr-2">✔</span> Themed Cake & Catering</li>
                        </ul>
                         <a href="#" onclick="showPage('login-page')" class="mt-8 text-center bg-red-600 text-white font-bold py-2 px-6 rounded-full hover:bg-red-700 transition duration-300">Book Now</a>
                    </div>
                    
                    <!-- Package 3: Milestone Event -->
                    <div class="border rounded-lg shadow-lg p-8 flex flex-col">
                        <h3 class="text-2xl font-bold text-gray-900">The Milestone</h3>
                        <p class="text-gray-500 mt-1">Grand Celebration</p>
                        <p class="text-3xl font-extrabold text-gray-900 mt-4">Starts at ৳1,20,000</p>
                        <p class="text-gray-600 mt-2 text-sm">For major milestones like 18th, 21st, or 50th birthdays, requiring a larger production.</p>
                         <ul class="space-y-2 text-gray-600 mt-6 text-sm flex-grow">
                           <li class="flex items-center"><span class="text-green-500 mr-2">✔</span> All Themed Gala Features</li>
                           <li class="flex items-center"><span class="text-green-500 mr-2">✔</span> Premium Venue Sourcing</li>
                           <li class="flex items-center"><span class="text-green-500 mr-2">✔</span> DJ & Professional Sound</li>
                           <li class="flex items-center"><span class="text-green-500 mr-2">✔</span> Full Photography Coverage</li>
                        </ul>
                         <a href="#" onclick="showPage('login-page')" class="mt-8 text-center bg-gray-800 text-white font-bold py-2 px-6 rounded-full hover:bg-gray-900 transition duration-300">Book Now</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Mini Gallery Section -->
        <div class="py-20 bg-white">
            <div class="container mx-auto px-4">
                <div class="text-center mb-12">
                     <h2 class="text-3xl font-extrabold text-gray-900">A Look at Our Fun Parties</h2>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                    <div class="group overflow-hidden rounded-lg shadow-lg h-80">
                        <img src="https://images.unsplash.com/photo-1543477587-86c4293046eb?q=80&w=1974" alt="Room decorated with golden balloons" class="w-full h-full object-cover transform transition-transform duration-300 group-hover:scale-110">
                    </div>
                    <div class="group overflow-hidden rounded-lg shadow-lg h-80">
                        <img src="https://images.unsplash.com/photo-1566576912381-8197c3629b3a?q=80&w=2070" alt="Happy children at a birthday party" class="w-full h-full object-cover transform transition-transform duration-300 group-hover:scale-110">
                    </div>
                    <div class="group overflow-hidden rounded-lg shadow-lg h-80">
                         <img src="https://images.unsplash.com/photo-1555996323-93649557431b?q=80&w=2070" alt="Elegant dinner party setting" class="w-full h-full object-cover transform transition-transform duration-300 group-hover:scale-110">
                    </div>
                </div>
            </div>
        </div>

        <!-- Call to Action Section -->
        <div class="bg-red-700 text-white">
            <div class="container mx-auto px-4 py-16 text-center">
                <h2 class="text-3xl font-bold">Let's Plan an Unforgettable Party!</h2>
                <p class="mt-2 max-w-2xl mx-auto">Tell us your ideas, and we'll bring them to life. Contact us today for a free consultation.</p>
                <a href="#" onclick="showPage('contact-page')" class="mt-6 inline-block bg-white text-red-700 font-bold py-3 px-8 rounded-full hover:bg-gray-200 transition duration-300">
                    Get a Free Consultation
                </a>
            </div>
        </div>
    </section>
</main>

<!-- Services Page -->
<main id="services-page">
    <!-- Page Header -->
    <header class="relative h-64 bg-cover bg-center" style="background-image: url('https://my-businessmail.com/images/our_services.png');">
        <div class="absolute inset-0 bg-black bg-opacity-60"></div>
        <div class="relative z-10 flex flex-col items-center justify-center h-full text-center text-white px-4">
            <h1 class="text-4xl md:text-5xl font-extrabold">Our Services</h1>
            <p class="mt-2 text-lg">Home / Services</p>
        </div>
    </header>

    <section class="py-20 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="text-center">
                <h2 class="text-sm font-bold uppercase text-red-600 tracking-wider">What We Offer</h2>
                <h3 class="mt-2 text-3xl md:text-4xl font-extrabold text-gray-900">Comprehensive Event Solutions</h3>
            </div>

            <div class="mt-12 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Service Card (Repeat for each service) -->
                <div class="bg-white p-8 rounded-lg shadow-lg text-center transform transition duration-300 hover:shadow-2xl hover:-translate-y-2">
                    <h4 class="text-xl font-bold text-gray-900">Wedding Planning</h4>
                    <p class="mt-2 text-gray-600 text-sm">From venue selection to decor, we create your dream wedding day.</p>
                    <a href="#" onclick="showPage('wedding-planning-page')" class="mt-4 inline-block text-red-600 font-medium hover:underline">Learn More</a>
                </div>
                <div class="bg-white p-8 rounded-lg shadow-lg text-center transform transition duration-300 hover:shadow-2xl hover:-translate-y-2">
                    <h4 class="text-xl font-bold text-gray-900">Corporate Events</h4>
                    <p class="mt-2 text-gray-600 text-sm">Conferences, seminars, and product launches managed with professionalism.</p>
                    <a href="#" onclick="showPage('corporate-events-page')" class="mt-4 inline-block text-red-600 font-medium hover:underline">Learn More</a>
                </div>
                <div class="bg-white p-8 rounded-lg shadow-lg text-center transform transition duration-300 hover:shadow-2xl hover:-translate-y-2">
                    <h4 class="text-xl font-bold text-gray-900">Birthday Parties</h4>
                    <p class="mt-2 text-gray-600 text-sm">Fun-filled, themed birthday celebrations for all ages.</p>
                    <a href="#" onclick="showPage('birthday-parties-page')" class="mt-4 inline-block text-red-600 font-medium hover:underline">Learn More</a>
                </div>
                <div class="bg-white p-8 rounded-lg shadow-lg text-center transform transition duration-300 hover:shadow-2xl hover:-translate-y-2">
                    <h4 class="text-xl font-bold text-gray-900">Social Gatherings</h4>
                    <p class="mt-2 text-gray-600 text-sm">Anniversaries, family reunions, and cultural festivals.</p>
                </div>
                <div class="bg-white p-8 rounded-lg shadow-lg text-center transform transition duration-300 hover:shadow-2xl hover:-translate-y-2">
                    <h4 class="text-xl font-bold text-gray-900">Venue Decoration</h4>
                    <p class="mt-2 text-gray-600 text-sm">Stunning floral arrangements and thematic decor to transform any space.</p>
                </div>
                <div class="bg-white p-8 rounded-lg shadow-lg text-center transform transition duration-300 hover:shadow-2xl hover:-translate-y-2">
                    <h4 class="text-xl font-bold text-gray-900">Catering & Sound</h4>
                    <p class="mt-2 text-gray-600 text-sm">Top-quality food services and professional audio-visual setups.</p>
                </div>
            </div>
        </div>
    </section>
</main>

<!-- About Us Page -->
<main id="about-page">
    <!-- Page Header -->
    <header class="relative h-64 bg-cover bg-center" style="background-image: url('https://images.unsplash.com/photo-1523580494863-6f3031224c94?q=80&w=2070');">
        <div class="absolute inset-0 bg-black bg-opacity-60"></div>
        <div class="relative z-10 flex flex-col items-center justify-center h-full text-center text-white px-4">
            <h1 class="text-4xl md:text-5xl font-extrabold">About Our Company</h1>
            <p class="mt-2 text-lg">Home / About Us</p>
        </div>
    </header>

    <section class="py-20">
        <div class="container mx-auto px-4 grid md:grid-cols-2 gap-12 items-center">
            <div>
                <h2 class="text-sm font-bold uppercase text-red-600 tracking-wider">Who We Are</h2>
                <h3 class="mt-2 text-3xl md:text-4xl font-extrabold text-gray-900">25+ Years of Experience in Event Management</h3>
                <p class="mt-4 text-gray-600 leading-relaxed">
                    Dhaka Event Planner is more than just a company; we are a team of passionate storytellers, creative designers, and meticulous coordinators. Founded with the vision to create truly unforgettable moments, we have grown into one of Dhaka's most trusted event management firms.
                </p>
                <p class="mt-4 text-gray-600 leading-relaxed">
                    Our philosophy is simple: your vision is our mission. We listen, we collaborate, and we execute with precision, ensuring every detail reflects your personal style and objectives.
                </p>
            </div>
            <div class="relative">
                 <img src="https://cdn.vectorstock.com/i/500p/16/85/banner-event-management-concept-vector-26611685.jpg" alt="Our Team" class="rounded-lg shadow-xl">
            </div>
        </div>
    </section>

    <!-- Why Choose Us Section -->
    <section class="py-20 bg-white">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-3xl font-extrabold text-gray-900">Why Choose Us?</h2>
            <p class="mt-2 max-w-2xl mx-auto text-gray-600">We blend creativity with flawless execution to deliver events that exceed expectations.</p>
            <div class="mt-12 grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Feature Card 1 -->
                <div class="p-8">
                    <h4 class="text-xl font-bold text-gray-900">Creative Vision</h4>
                    <p class="mt-2 text-gray-600">Innovative concepts and unique themes that make your event stand out.</p>
                </div>
                <!-- Feature Card 2 -->
                <div class="p-8">
                    <h4 class="text-xl font-bold text-gray-900">Meticulous Planning</h4>
                    <p class="mt-2 text-gray-600">Every detail is carefully planned and executed for a seamless experience.</p>
                </div>
                <!-- Feature Card 3 -->
                <div class="p-8">
                    <h4 class="text-xl font-bold text-gray-900">Trusted Partners</h4>
                    <p class="mt-2 text-gray-600">A network of reliable vendors to ensure quality and value.</p>
                </div>
            </div>
        </div>
    </section>
</main>

<!-- Contact Us Page -->

<main id="contact-page">
    <!-- Page Header -->
    <header class="relative h-64 bg-cover bg-center" style="background-image: url('https://images.unsplash.com/photo-1596524430615-b46475ddff6e?q=80&w=2070');">
        <div class="absolute inset-0 bg-black bg-opacity-60"></div>
        <div class="relative z-10 flex flex-col items-center justify-center h-full text-center text-white px-4">
            <h1 class="text-4xl md:text-5xl font-extrabold">Contact Us</h1>
            <p class="mt-2 text-lg">Home / Contact</p>
        </div>
    </header>

    <section class="py-20">
        <div class="container mx-auto px-4">
            <!-- Display Success Message -->
            <?php if (isset($_SESSION['success_message'])): ?>
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                    <span class="block sm:inline"><?php echo $_SESSION['success_message']; ?></span>
                </div>
                <?php unset($_SESSION['success_message']); ?>
            <?php endif; ?>

            <!-- Display Error Messages -->
            <?php if (isset($_SESSION['error_messages'])): ?>
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                    <strong class="font-bold">Error!</strong>
                    <ul class="mt-1">
                        <?php foreach ($_SESSION['error_messages'] as $error): ?>
                            <li class="block sm:inline"><?php echo $error; ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
                <?php unset($_SESSION['error_messages']); ?>
            <?php endif; ?>

            <!-- Contact Form -->
            <div class="bg-white p-8 rounded-lg shadow-lg">
                <form action="process_contact.php" method="POST">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <input type="text" name="name" placeholder="Your Name" required class="w-full p-3 border border-gray-300 rounded-md focus:ring-red-500 focus:border-red-500">
                        <input type="email" name="email" placeholder="Your Email" required class="w-full p-3 border border-gray-300 rounded-md focus:ring-red-500 focus:border-red-500">
                    </div>
                    <div class="mt-6">
                        <input type="text" name="subject" placeholder="Subject" required class="w-full p-3 border border-gray-300 rounded-md focus:ring-red-500 focus:border-red-500">
                    </div>
                    <div class="mt-6">
                        <textarea name="message" rows="5" placeholder="Your Message" required class="w-full p-3 border border-gray-300 rounded-md focus:ring-red-500 focus:border-red-500"></textarea>
                    </div>
                    <div class="mt-6">
                        <button type="submit" name="submit" class="w-full bg-red-600 text-white font-bold py-3 px-6 rounded-md hover:bg-red-700 transition duration-300">
                            Send Message
                        </button>
                    </div>
                </form>
                <!-- Map Section -->
            <div class="mt-20">
                <h2 class="text-center text-3xl font-extrabold text-gray-900 mb-8">Find Us On The Map</h2>
                
                <!-- START: Google Maps Embed -->
                <div class="rounded-lg shadow-md overflow-hidden">
                    <iframe 
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3650.892161471373!2d90.4131610759881!3d23.78696088746533!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c7a097dcb989%3A0x4933339a68617865!2sEmbassy%20of%20the%20United%20States%20of%20America!5e0!3m2!1sen!2sbd!4v1701077591748!5m2!1sen!2sbd" 
                        width="100%" 
                        height="384" 
                        style="border:0;" 
                        allowfullscreen="" 
                        loading="lazy" 
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>
                <!-- END: Google Maps Embed -->
                
            </div>
        </div>
            </div>
        </div>
    </section>
</main>

<!-- Booking Page -->
<main id="booking-page">
    <!-- Page Header -->
    <header class="relative h-64 bg-cover bg-center" style="background-image: url('https://images.unsplash.com/photo-1519671482749-fd09be7ccebf?q=80&w=2070');">
        <div class="absolute inset-0 bg-black bg-opacity-60"></div>
        <div class="relative z-10 flex flex-col items-center justify-center h-full text-center text-white px-4">
            <h1 class="text-4xl md:text-5xl font-extrabold">Book Your Event</h1>
            <p class="mt-2 text-lg">Home / Booking</p>
        </div>
    </header>

    <section class="py-20 bg-gray-50">
        <div class="container mx-auto px-4 max-w-4xl">
            <?php if (!$is_logged_in): ?>
                <div class="bg-white p-8 rounded-lg shadow-lg text-center">
                    <h2 class="text-2xl font-bold text-gray-900 mb-4">Please Login to Book Events</h2>
                    <p class="text-gray-600 mb-6">You need to be logged in to access our booking system.</p>
                    <a href="#" onclick="showPage('login-page')" class="bg-red-600 text-white font-bold py-3 px-6 rounded-full hover:bg-red-700 transition duration-300 inline-block">
                        Login Now
                    </a>
                </div>
            <?php else: ?>
                <!-- Display success/error messages -->
                <?php if (isset($_SESSION['booking_success'])): ?>
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-6" role="alert">
                        <span class="block sm:inline"><?php echo $_SESSION['booking_success']; ?></span>
                        <?php unset($_SESSION['booking_success']); ?>
                    </div>
                <?php endif; ?>
                
                <?php if (isset($_SESSION['booking_errors'])): ?>
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-6" role="alert">
                        <strong class="font-bold">Error!</strong>
                        <ul class="mt-1">
                            <?php foreach ($_SESSION['booking_errors'] as $error): ?>
                                <li class="block sm:inline"><?php echo $error; ?></li>
                            <?php endforeach; ?>
                        </ul>
                        <?php unset($_SESSION['booking_errors']); ?>
                    </div>
                <?php endif; ?>

                <div class="bg-white p-8 rounded-lg shadow-lg">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6">Event Booking Form</h2>
                    
                    <form action="process_booking.php" method="POST">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Left Column -->
                            <div>
                                <div class="mb-4">
                                    <label for="event-type" class="block text-gray-700 font-medium mb-2">Event Type *</label>
                                    <select id="event-type" name="event_type" required class="w-full p-3 border border-gray-300 rounded-md focus:ring-red-500 focus:border-red-500">
                                        <option value="">Select Event Type</option>
                                        <option value="wedding">Wedding</option>
                                        <option value="corporate">Corporate Event</option>
                                        <option value="birthday">Birthday Party</option>
                                        <option value="social">Social Gathering</option>
                                        <option value="other">Other</option>
                                    </select>
                                </div>
                                
                                <div class="mb-4">
                                    <label for="event-date" class="block text-gray-700 font-medium mb-2">Event Date *</label>
                                    <input type="date" id="event-date" name="event_date" min="<?php echo date('Y-m-d'); ?>" required class="w-full p-3 border border-gray-300 rounded-md focus:ring-red-500 focus:border-red-500">
                                </div>
                                
                                <div class="mb-4">
                                    <label for="guests" class="block text-gray-700 font-medium mb-2">Number of Guest *</label>
                                    <input type="number" id="guests" name="guests" min="1" required class="w-full p-3 border border-gray-300 rounded-md focus:ring-red-500 focus:border-red-500">
                                </div>
                            </div>
                            
                            <!-- Right Column -->
                            <div>
                                <div class="mb-4">
                                    <label for="package" class="block text-gray-700 font-medium mb-2">Package *</label>
                                    <select id="package" name="package" required class="w-full p-3 border border-gray-300 rounded-md focus:ring-red-500 focus:border-red-500">
                                        <option value="">Select Package</option>
                                        <option value="essential">Essential</option>
                                        <option value="standard">Standard</option>
                                        <option value="premium">Premium</option>
                                        <option value="custom">Custom</option>
                                    </select>
                                </div>
                                
                                <div class="mb-4">
                                    <label for="venue" class="block text-gray-700 font-medium mb-2">Venue Preference</label>
                                    <input type="text" id="venue" name="venue" class="w-full p-3 border border-gray-300 rounded-md focus:ring-red-500 focus:border-red-500" placeholder="(Optional) Your preferred venue">
                                </div>
                                
                                <div class="mb-4">
                                    <label for="budget" class="block text-gray-700 font-medium mb-2">Estimated Budget (৳)</label>
                                    <input type="number" id="budget" name="budget" min="0" class="w-full p-3 border border-gray-300 rounded-md focus:ring-red-500 focus:border-red-500">
                                </div>
                            </div>
                        </div>
                        
                        <div class="mb-4">
                            <label for="special-requests" class="block text-gray-700 font-medium mb-2">Special Requests</label>
                            <textarea id="special-requests" name="special_requests" rows="4" class="w-full p-3 border border-gray-300 rounded-md focus:ring-red-500 focus:border-red-500" placeholder="Tell us about your vision for the event..."></textarea>
                        </div>
                        
                        <div class="flex justify-between items-center mt-8">
                            <button type="button" onclick="showPage('homepage')" class="text-gray-600 hover:text-red-600 font-medium">
                                ← Back to Home
                            </button>
                            <button type="submit" class="bg-red-600 text-white font-bold py-3 px-8 rounded-full hover:bg-red-700 transition duration-300">
                                Submit Booking Request
                            </button>
                        </div>
                    </form>
                </div>
                
                <!-- Booking Process Info -->
                <div class="mt-12 bg-white p-8 rounded-lg shadow-lg">
                    <h3 class="text-xl font-bold text-gray-900 mb-4">Our Booking Process</h3>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <div class="flex items-start">
                            <div class="bg-red-100 p-3 rounded-full mr-4">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                            </div>
                            <div>
                                <h4 class="font-bold text-gray-900">1. Submit Request</h4>
                                <p class="mt-1 text-gray-600 text-sm">Fill out this form with your event details and preferences.</p>
                            </div>
                        </div>
                        
                        <div class="flex items-start">
                            <div class="bg-red-100 p-3 rounded-full mr-4">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                </svg>
                            </div>
                            <div>
                                <h4 class="font-bold text-gray-900">2. Consultation</h4>
                                <p class="mt-1 text-gray-600 text-sm">We'll contact you within 24 hours to discuss your event.</p>
                            </div>
                        </div>
                        
                        <div class="flex items-start">
                            <div class="bg-red-100 p-3 rounded-full mr-4">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                                </svg>
                            </div>
                            <div>
                                <h4 class="font-bold text-gray-900">3. Confirmation</h4>
                                <p class="mt-1 text-gray-600 text-sm">We'll finalize details and confirm your booking.</p>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </section>
</main>
<!-- Footer -->
<footer class="bg-gray-900 text-gray-300">
    <div class="container mx-auto px-4 py-16">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <!-- About Column -->
            <div>
                <h3 class="text-xl font-extrabold text-white">Event<span class="text-red-500">Planner</span></h3>
                <p class="mt-4 text-sm">The best event management company to make your dreams come true with our experience and creativity.</p>
                <div class="mt-4 flex space-x-4">
                    <!-- Footer Social Icons -->
                </div>
            </div>
            <!-- Quick Links Column -->
            <div>
                <h4 class="text-lg font-semibold text-white">Quick Links</h4>
                <ul class="mt-4 space-y-2 text-sm">
                    <li><a href="#" onclick="showPage('about-page')" class="hover:text-red-500">About Us</a></li>
                    <li><a href="#" onclick="showPage('services-page')" class="hover:text-red-500">Services</a></li>
                    <li><a href="#" onclick="showPage('gallery-page')" class="hover:text-red-500">Gallery</a></li>
                    <li><a href="#" onclick="showPage('contact-page')" class="hover:text-red-500">Contact Us</a></li>
                </ul>
            </div>
            <!-- Our Services Column -->
            <div>
                <h4 class="text-lg font-semibold text-white">Our Services</h4>
                <ul class="mt-4 space-y-2 text-sm">
                    <li><a href="#" onclick="showPage('wedding-planning-page')" class="hover:text-red-500">Wedding Planning</a></li>
                    <li><a href="#" onclick="showPage('corporate-events-page')" class="hover:text-red-500">Corporate Events</a></li>
                    <li><a href="#" onclick="showPage('birthday-parties-page')" class="hover:text-red-500">Birthday Parties</a></li>
                    <li><a href="#" class="hover:text-red-500">Social Events</a></li>
                </ul>
            </div>
            <!-- Contact Info Column -->
            <div>
                <h4 class="text-lg font-semibold text-white">Contact Us</h4>
                <ul class="mt-4 space-y-3 text-sm">
                    <li class="flex items-start"><span class="mr-2 mt-1">📍</span><span>100 feet,Madani ave,Dhaka, Bangladesh</span></li>
                    <li class="flex items-center"><span class="mr-2">📞</span><span>+880 1234 56789</span></li>
                    <li class="flex items-center"><span class="mr-2">✉️</span><span>info@eventplanner.com</span></li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Copyright Bar -->
    <div class="bg-black text-gray-500 text-center py-4 text-sm">
        <p>© 2024 EventPlanner. All Rights Reserved. Recreated with Tailwind CSS.</p>
    </div>
</footer>

<?php
// Start session (if not already started)
// Check for messages in URL or session
$successMessage = '';
$errorMessages = [];

// Check URL parameters first (for GET requests)
if (isset($_GET['message']) && $_GET['message'] === 'success') {
    $successMessage = 'Your message has been sent successfully! We will contact you soon.';
    // Clear the parameter from URL
    echo '<script>history.replaceState({}, document.title, window.location.pathname);</script>';
}

if (isset($_GET['error'])) {
    $errorMessages = explode('|', $_GET['error']);
    // Clear the parameter from URL
    echo '<script>history.replaceState({}, document.title, window.location.pathname);</script>';
}

// Check session messages (for POST requests)
if (isset($_SESSION['success_message'])) {
    $successMessage = $_SESSION['success_message'];
    unset($_SESSION['success_message']); // Clear after displaying
}

if (isset($_SESSION['error_messages'])) {
    $errorMessages = $_SESSION['error_messages'];
    unset($_SESSION['error_messages']); // Clear after displaying
}

// Your existing code...
?>

<!-- In your contact-page section -->
<main id="contact-page">
    <!-- ... other contact page content ... -->
    
    <!-- Display messages -->
    <?php if (!empty($successMessage)): ?>
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
            <span class="block sm:inline"><?php echo htmlspecialchars($successMessage); ?></span>
        </div>
    <?php endif; ?>
    
    <?php if (!empty($errorMessages)): ?>
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
            <strong class="font-bold">Error!</strong>
            <ul class="mt-1">
                <?php foreach ($errorMessages as $error): ?>
                    <li class="block sm:inline"><?php echo htmlspecialchars($error); ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>
    
    <!-- Your contact form -->
    <div class="bg-white p-8 rounded-lg shadow-lg">
        <form action="process_contact.php" method="POST">
            <!-- ... form fields ... -->
        </form>
    </div>
</main>

<!-- JavaScript for Page Navigation -->
<script>
    // Function to show a specific page and hide others
    function showPage(pageId) {
        // Hide all pages
        document.querySelectorAll('main').forEach(main => {
            main.style.display = 'none';
        });
        
        // Show the requested page
        const pageToShow = document.getElementById(pageId);
        if (pageToShow) {
            pageToShow.style.display = 'block';
        }
        
        // Scroll to top
        window.scrollTo(0, 0);
        
        // Update active link in navigation
        updateActiveNavLink(pageId);
        
        // Show/hide social/login links based on current page
        const socialLinks = document.querySelector('.social-login-links');
        if (pageId === 'homepage') {
            socialLinks.style.display = 'flex';
        } else {
            socialLinks.style.display = 'none';
        }
    }
    
    // Function to update active navigation link
    function updateActiveNavLink(pageId) {
        const navLinks = document.querySelectorAll('nav a');
        navLinks.forEach(link => {
            link.classList.remove('text-red-600', 'font-bold');
            link.classList.add('hover:text-red-600');
        });
        
        // Determine which link to highlight based on pageId
        let activeLink;
        switch(pageId) {
            case 'homepage':
                activeLink = document.querySelector('nav a[onclick="showPage(\'homepage\')"]');
                break;
            case 'about-page':
                activeLink = document.querySelector('nav a[onclick="showPage(\'about-page\')"]');
                break;
            case 'services-page':
                activeLink = document.querySelector('nav a[onclick="showPage(\'services-page\')"]');
                break;
            case 'gallery-page':
                activeLink = document.querySelector('nav a[onclick="showPage(\'gallery-page\')"]');
                break;
            case 'contact-page':
                activeLink = document.querySelector('nav a[onclick="showPage(\'contact-page\')"]');
                break;
            case 'login-page':
            case 'register-page':
                // Don't highlight any nav link for login/register pages
                return;
        }
        
        if (activeLink) {
            activeLink.classList.add('text-red-600', 'font-bold');
            activeLink.classList.remove('hover:text-red-600');
        }
    }
    
    // Initialize - show homepage by default
    document.addEventListener('DOMContentLoaded', function() {
        showPage('homepage');
    });
</script>

</body>
</html>