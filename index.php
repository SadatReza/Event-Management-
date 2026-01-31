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
                    <button type="submit" name="submit" class="group relative w-full flex justify-center py-3 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">Login</button>
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
    <header class="relative h-64 bg-cover bg-center" style="background-image: url('https://wallpapers.com/images/hd/red-and-gold-background-tczm6i4uj2rk8b8z.jpg');">
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
                <!-- Service Card 1: Wedding Planning -->
                <div class="bg-white p-8 rounded-lg shadow-lg text-center transform transition duration-300 hover:shadow-2xl hover:-translate-y-2">
                    <div class="inline-block p-4 bg-red-100 rounded-full">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" /></svg>
                    </div>
                    <h4 class="mt-6 text-xl font-bold text-gray-900">Wedding Planning</h4>
                    <p class="mt-2 text-gray-600 text-sm">From venue selection to decor, we create your dream wedding day.</p>
                    <a href="#" onclick="showPage('wedding-planning-page')" class="mt-4 inline-block text-red-600 font-medium hover:underline">Learn More</a>
                </div>
                
                <!-- Service Card 2: Corporate Events -->
                <div class="bg-white p-8 rounded-lg shadow-lg text-center transform transition duration-300 hover:shadow-2xl hover:-translate-y-2">
                    <div class="inline-block p-4 bg-red-100 rounded-full">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" /></svg>
                    </div>
                    <h4 class="mt-6 text-xl font-bold text-gray-900">Corporate Events</h4>
                    <p class="mt-2 text-gray-600 text-sm">Conferences, seminars, and product launches managed with professionalism.</p>
                    <a href="#" onclick="showPage('corporate-events-page')" class="mt-4 inline-block text-red-600 font-medium hover:underline">Learn More</a>
                </div>
                
                <!-- Service Card 3: Birthday Parties -->
                <div class="bg-white p-8 rounded-lg shadow-lg text-center transform transition duration-300 hover:shadow-2xl hover:-translate-y-2">
                    <div class="inline-block p-4 bg-red-100 rounded-full">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19V6l12-3v13M9 19c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zm12-3c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zM9 6l12-3" /></svg>
                    </div>
                    <h4 class="mt-6 text-xl font-bold text-gray-900">Birthday Parties</h4>
                    <p class="mt-2 text-gray-600 text-sm">Fun-filled, themed birthday celebrations for all ages.</p>
                    <a href="#" onclick="showPage('birthday-parties-page')" class="mt-4 inline-block text-red-600 font-medium hover:underline">Learn More</a>
                </div>
                
                <!-- Service Card 4: Social Gatherings -->
                <div class="bg-white p-8 rounded-lg shadow-lg text-center transform transition duration-300 hover:shadow-2xl hover:-translate-y-2">
                    <div class="inline-block p-4 bg-red-100 rounded-full">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" /></svg>
                    </div>
                    <h4 class="mt-6 text-xl font-bold text-gray-900">Social Gatherings</h4>
                    <p class="mt-2 text-gray-600 text-sm">Anniversaries, family reunions, and cultural festivals.</p>
                </div>
                
                <!-- Service Card 5: Venue Decoration -->
                <div class="bg-white p-8 rounded-lg shadow-lg text-center transform transition duration-300 hover:shadow-2xl hover:-translate-y-2">
                    <div class="inline-block p-4 bg-red-100 rounded-full">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" /></svg>
                    </div>
                    <h4 class="mt-6 text-xl font-bold text-gray-900">Venue Decoration</h4>
                    <p class="mt-2 text-gray-600 text-sm">Stunning floral arrangements and thematic decor to transform any space.</p>
                </div>
                
                <!-- Service Card 6: Custom Events (REPLACED Catering & Sound) -->
                <div class="bg-white p-8 rounded-lg shadow-lg text-center transform transition duration-300 hover:shadow-2xl hover:-translate-y-2">
                    <div class="inline-block p-4 bg-red-100 rounded-full">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                        </svg>
                    </div>
                    <h4 class="mt-6 text-xl font-bold text-gray-900">Custom Events</h4>
                    <p class="mt-2 text-gray-600 text-sm">Tailor-made events with Catering, Photography, Entertainment & more.</p>
                    <a href="#" onclick="showPage('custom-events-page')" class="mt-4 inline-block text-red-600 font-medium hover:underline">Learn More</a>
                </div>
            </div>
        </div>
    </section>
</main>

<!-- About Us Page -->
<main id="about-page">
    <!-- Page Header -->
    <header class="relative h-64 bg-cover bg-center" style="background-image: url('https://images.unsplash.com/photo-1545235617-9465d2a55698?q=80&w=2080');">
        <div class="absolute inset-0 bg-black bg-opacity-60"></div>
        <div class="relative z-10 flex flex-col items-center justify-center h-full text-center text-white px-4">
            <h1 class="text-4xl md:text-5xl font-extrabold">About Us</h1>
            <p class="mt-2 text-lg">Home / About Us</p>
        </div>
    </header>

    <section class="py-20 bg-white">
        <div class="container mx-auto px-4">
            <!-- Our Story Section -->
            <div class="grid md:grid-cols-2 gap-12 items-center mb-16">
                <div>
                    <h2 class="text-3xl md:text-4xl font-extrabold text-gray-900 mb-4">Our Story</h2>
                    <p class="text-gray-600 mb-4">
                        Founded over 25 years ago, EventPlanner began with a simple vision: to create unforgettable experiences through meticulous planning and creative execution. What started as a small family business has grown into Dhaka's premier event management company.
                    </p>
                    <p class="text-gray-600">
                        Our journey has been marked by thousands of successful events, from intimate gatherings to grand celebrations, each one crafted with the same dedication and attention to detail that has become our hallmark.
                    </p>
                </div>
                <div class="relative">
                    <div class="absolute -top-4 -left-4 w-full h-full bg-red-100 rounded-lg transform -rotate-3"></div>
                    <img src="https://images.unsplash.com/photo-1511795409834-ef04bbd61622?q=80&w=2070" alt="Our Story" class="relative rounded-lg shadow-xl z-10">
                </div>
            </div>

            <!-- Mission & Vision Section -->
            <div class="grid md:grid-cols-2 gap-12 items-center mb-16">
                <div class="order-2 md:order-1">
                    <img src="https://images.unsplash.com/photo-1559136555-9303baea8ebd?q=80&w=2070" alt="Mission & Vision" class="rounded-lg shadow-xl">
                </div>
                <div class="order-1 md:order-2">
                    <h2 class="text-3xl md:text-4xl font-extrabold text-gray-900 mb-4">Mission & Vision</h2>
                    <div class="mb-6">
                        <h3 class="text-xl font-bold text-gray-900 mb-2">Our Mission</h3>
                        <p class="text-gray-600">
                            To exceed client expectations by delivering innovative, seamless, and memorable event experiences through professional expertise and personalized service.
                        </p>
                    </div>
                    <div>
                        <h3 class="text-xl font-bold text-gray-900 mb-2">Our Vision</h3>
                        <p class="text-gray-600">
                            To be the most trusted and sought-after event management company in Bangladesh, setting industry standards for creativity, reliability, and customer satisfaction.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Our Values Section -->
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-extrabold text-gray-900 mb-4">Our Core Values</h2>
                <p class="text-gray-600 max-w-2xl mx-auto">These principles guide everything we do and form the foundation of our company culture.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Value 1 -->
                <div class="bg-gray-50 p-8 rounded-lg text-center">
                    <div class="inline-block p-4 bg-red-100 rounded-full mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                        </svg>
                    </div>
                    <h4 class="text-xl font-bold text-gray-900 mb-2">Excellence</h4>
                    <p class="text-gray-600">We strive for perfection in every detail, ensuring flawless execution of every event.</p>
                </div>

                <!-- Value 2 -->
                <div class="bg-gray-50 p-8 rounded-lg text-center">
                    <div class="inline-block p-4 bg-red-100 rounded-full mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                    </div>
                    <h4 class="text-xl font-bold text-gray-900 mb-2">Teamwork</h4>
                    <p class="text-gray-600">We collaborate closely with clients, vendors, and team members to achieve shared success.</p>
                </div>

                <!-- Value 3 -->
                <div class="bg-gray-50 p-8 rounded-lg text-center">
                    <div class="inline-block p-4 bg-red-100 rounded-full mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                        </svg>
                    </div>
                    <h4 class="text-xl font-bold text-gray-900 mb-2">Innovation</h4>
                    <p class="text-gray-600">We embrace creativity and new ideas to deliver unique and memorable event experiences.</p>
                </div>
            </div>

            <!-- Team Section -->
            <div class="mt-20">
                <div class="text-center mb-12">
                    <h2 class="text-3xl md:text-4xl font-extrabold text-gray-900 mb-4">Meet Our Team</h2>
                    <p class="text-gray-600 max-w-2xl mx-auto">Our experienced professionals are passionate about bringing your vision to life.</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    <!-- Team Member 1 -->
                    <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                        <img src="data:image/jpeg;base64,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" alt="Team Member" class="w-full h-64 object-cover">
                        <div class="p-6">
                            <h4 class="text-xl font-bold text-gray-900">Mohammad Abul Kalam</h4>
                            <p class="text-red-600 font-medium">CEO & Founder</p>
                            <p class="text-gray-600 mt-2">With 25+ years in event management, Mohammad leads our team with passion and expertise.</p>
                        </div>
                    </div>

                    <!-- Team Member 2 -->
                    <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                        <img src="data:image/jpeg;base64,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" alt="Team Member" class="w-full h-64 object-cover">
                        <div class="p-6">
                            <h4 class="text-xl font-bold text-gray-900">Sadat Reza Apon</h4>
                            <p class="text-red-600 font-medium">Creative Director</p>
                            <p class="text-gray-600 mt-2">Sadat innovative designs have won numerous awards in the event industry.</p>
                        </div>
                    </div>

                    <!-- Team Member 3 -->
                    <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                        <img src="https://scontent.fdac31-2.fna.fbcdn.net/v/t39.30808-6/473335021_3011788265644343_4584770389891267215_n.jpg?_nc_cat=100&ccb=1-7&_nc_sid=6ee11a&_nc_eui2=AeGRuTWKoZxig1I9lzv7i65Xju3h5iDBfGqO7eHmIMF8asyykIayuALuTHCWqbFneCtvnDL65Pj8Rp4kmQNWK9uW&_nc_ohc=DpMd0gF-qg4Q7kNvwEpwatX&_nc_oc=AdldWwe93Z8nugRMg1FkWwIKpoJeKRyDbrsd5WbFli1ibrmIHJltQG0Bh84SXIpAChs&_nc_zt=23&_nc_ht=scontent.fdac31-2.fna&_nc_gid=svs1itoV95DHfUKbMZnXSQ&oh=00_Afq983jImbTPWT-9li2Cz5ISJqm3qyyP95DfPjuxPxAO1w&oe=697ECB4C" alt="Team Member" class="w-full h-64 object-cover">
                        <div class="p-6">
                            <h4 class="text-xl font-bold text-gray-900">Mehedi Hasan Khan</h4>
                            <p class="text-red-600 font-medium">Operations Manager</p>
                            <p class="text-gray-600 mt-2">Mehedi ensures every event runs smoothly with her exceptional organizational skills.</p>
                        </div>
                    </div>

                    <!-- Team Member 4 -->
                    <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                        <img src="data:image/jpeg;base64,/9j/4gHYSUNDX1BST0ZJTEUAAQEAAAHIAAAAAAQwAABtbnRyUkdCIFhZWiAH4AABAAEAAAAAAABhY3NwAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAQAA9tYAAQAAAADTLQAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAlkZXNjAAAA8AAAACRyWFlaAAABFAAAABRnWFlaAAABKAAAABRiWFlaAAABPAAAABR3dHB0AAABUAAAABRyVFJDAAABZAAAAChnVFJDAAABZAAAAChiVFJDAAABZAAAAChjcHJ0AAABjAAAADxtbHVjAAAAAAAAAAEAAAAMZW5VUwAAAAgAAAAcAHMAUgBHAEJYWVogAAAAAAAAb6IAADj1AAADkFhZWiAAAAAAAABimQAAt4UAABjaWFlaIAAAAAAAACSgAAAPhAAAts9YWVogAAAAAAAA9tYAAQAAAADTLXBhcmEAAAAAAAQAAAACZmYAAPKnAAANWQAAE9AAAApbAAAAAAAAAABtbHVjAAAAAAAAAAEAAAAMZW5VUwAAACAAAAAcAEcAbwBvAGcAbABlACAASQBuAGMALgAgADIAMAAxADb/2wCEAAUGBgsICwsLCwsNCwsLDQ4ODQ0ODg8NDg4ODQ8QEBARERAQEBAPExITDxARExQUExETFhYWExYVFRYZFhkWFhIBBQUFCgcKCAkJCAsICggLCgoJCQoKDAkKCQoJDA0LCgsLCgsNDAsLCAsLDAwMDQ0MDA0KCwoNDA0NDBMUExMTnP/CABEICAAGAAMBIgACEQEDEQH/xADvAAEBAQEBAQEBAAAAAAAAAAAAAQIDBAUGBxAAAgIABQMDAwQDAQADAQEBAAECEQMQEiExBCBBEyJRMDJABVBhcBRCYDMVI1JiQ6ARAAEDAwIDBwIEBQMDBQEAAAABAgMQERIEIBMiMAUhMTJAQlAUUhVgYnIjM0FRggZTokOSshYkYXCgwhIAAQEFBQUGBgIBAwMEAwAAAQAQEUFRYQIgITHwMEBxkbESIjKBocEDQlBScNFi4fETYIJykqIjM0OyU8LgEwABAwIFAwQDAQEBAQAAAAABABEhMUEQUWFxgZGhsSDB0fAwQOHxUGBw/9oADAMBAAIBAwEAAAL7dzc0ABcjUCwiwoBUCwWCygUSkAqUJQgqUAAssKAlKgoAKgoAAAFQLFCgSpRYWpUWCpQAlAAAAAACCgJQAAAAAAAAQoAALYKlCUtzaqCgtyNJSoNILYKBZQAlKgAILAIggAIXqEWCpRYABCwACD5aWagRYLci2Q0QqUsAACxQBRCCgAFCUAAAqACpQCpQACgJQAABYAFlILbFCVFgqFoSoKlACUAAAAiwWCgAEFAAlJYKBAAqCgAtzSoKCpaWUAWDTNLYKCpQCpSVC3I1AIAEsggAA6pQlAFgqAAgAA+UJoAAhKFqEqUJSoNQKQ0gAqEoCUAqUJQBYAFgAqUINIKBYKgoBCpQQtgLBYtsBZQACpQEAqCoLKAECwAAABCkKABYBCgsQoJZSgAAqUWCpSoq2CgWUWC3NKBYKgqCoKgAWBCAAEU6AAWCkKgsAAAg+WqWWxYEKEUiiUJQFIBYKlKgqUsEVCgAFEsKAgoAABRApCgWUIKABYKgoLAAqLbBKlVYFlQAAACoAAAJUAAAAAAKgAWCoFgoKgoAFgtyNJQKtgoAKgtg0gAqACwhYKgAILEKlOqUAAAAAQAAPl0lsFLBKQBLTNBYAAKlIBZSwKQpBQqVAFgAVCgAALBULKCCgJQCpQgUAKCoAtWUixFBUWgAESpQAgWCwABCpQAACWCoLAAFCUsCkKBYKACoNILYq2CgAAtyNIKlBIqUAIACAFFk6VKAqCoFgsAlBAD5hZogqUrNSxSKIsCwLAACUAFQqUWUQKlKEAAAAWCgAAAoEUFEoAAlABYKgpCilgoAVUSoKgsBYLAAIKlIABYLAAsAAAABYKgoFgoFkNJQBZSygCpRYqoKlgAACwAAAAUJAOpKWCpQQpCwFgELA+asmgRYWoKhNILZCyhKIoiwAsoigQoCwqCywoCUqVAFgVCpQAACoNQFAAAACUBCpQBZQLVhKlFgsAAQsAAAAAQWCgAAAASiAWWApYKgoKgpC2CgqC3NKQtgoAAAFgsBYLABQAkWDqKAEKAAlICwBD5wmgKgVAIsWpRAAFgqC2AAQLCgAAAAFICpQCoioqpRYSpQlLFKzoAAFEAAAAACwKlCCoKg1CgAAEsAFgoIBYFgWCgAShCAKgqWgAKBYKlFgoAFg0zSpRYLAsCoLAWCoKlgAQWU6oqoFlJYLLAAQsAD5yM6ooIACgFgAoQBYKQVCkKAlCCpQlLAALAsBC1CoKACxSs0oRYLZQABYAAAAAJUAFgWCgAWAKAAAWAAAAACoioABCpQAAKqUAAoALYKlAAFg1IKg0lBCkKkNyWABCpQU6EqpQAAQqAAAD5ozoCwFgoAAqwFhFlBCgWUIKgqUELAoJQApBc0LABQAAAWDSWFhKlpUKAsCUJQABKEUgJQAWCpQlAAAoAAlCCgJQiLAWAAABYKgqWgFgqUAWC2CxSxQAgoCUAWCoVYkpCgWCwhc6Og0AWAAAAkLYBDwEzpQASiUFirFIpIoiwWUJQlJYFgqUAAAWUJQlAAFCWUAAAqCoKg1co0hNMgWqAAAAgqUhSLCUCCgLACoKlpKhAWCpSApAABLCoCFtiKLAFgooFAqEqUWCpVWCkKgoRYWoKJAAAAAUBZTqLCUJQCAAAgAPnrM6AqBQsCwAKgqKUSAqBYAAALAqCgJRc6CUWCoFlJULFEsFlAAAAFzSoNJYWLLABQAAKlKhJQAJRQgABCgsUQCUEKlAIsBIqLSDTNLZZCWiUoBCgC0CoKg0gpEqC2FWJKgqC2CoKlCIJbRC6zTqubKlVYSwAEBYACDwDOgAKgqCpQAKCFhFlqUIogAAJQJRYLFBDUCoKQoABSQNJQAQoBCpQABYKgqUAqUAWACykgltiwACyUAlgpACwKgAqAASVKqKIoWWAsqBYKg0gqCgAAqCpQALaiSgAWCoKSKS2oKgazo6wsBQAQgUUQAA8CXNIKCwAAFgUIoABAoACwABSLAUzVJQlQ1JQUiiWUAUIBZQQWUlAlAABClACwWUAAAALBRCIqCkoAABLCoihYqooSyAqLAACpSokooUgBSWDSCoLAqUWCoKlAAKgoBCoWwFgqBvGo6kspCgJRAAEtoEsPArNlQsACgAWBYFgqUBAAFiqgpCyhKJQAJQAgWUAFCUrNBCpSwKQKEsLYLAsoihYFQoAAAAAAAJZQJAoAlBAFsBZRKEACLAIShc0qWlhKQtgXNgQqDUKWUAAoAAKgqUEKlUgqCoKlGsbOqEsCoAABCwtAEPDZM2gWCoKgqCgAAqCoKRKgqUWCoFSqgqCgJQCFJQEKiKKsCgSwsoAFJAqUtlgKlAAUllACUABAUgEKQtiQKssBRCUKAFJZRKM0IIEKCWUWWhIosElpKqUINJZAqwKgtgqCkKQqFqIoogqWCUAbxs6CwAABLAAlCCkPBUmqgoAAAKBKAAFgAqUSkAAAWCpQlpc0lAAlCUAAAWBYLLCpQlBSFIC3NKAgqCkKlFgsBZQgAiwAAoKlSFIFlAAAAgsIAASgQoJSgAABCgFFyNIkqDSKoJYWpQgpCoKQpIqDSC6xs6ksWCoCCgQLAAEPFKmkoIFQsoALBQSgAAUixFlIoAAAqAKqUEFlAEoAShKAAgspQAAALACpQCwFgqCoKBYACCwCwUAFlAIsLAAIKQACAEogKlBCoqgAAAAAAoAAFgpCpQAAQogABYHXl0OsLAEUiwssLAELAA8JZoQoEUllAEoAqCgAAAqVAAAAAAAFirCKiigAICrLAIWKqUALCoLAAAqAUlQoAFgqCpRKEoSiWCpQBYLAlBLAAAIAAEABSKAoAAAAAABZRApCoKAgpCiABCgWUEL15dDohCFsKACAAsAA8ImgKlAAAAAAFCUAFgAWChAAAAAAABSUqVCgCApLIopYipaWUiwFJYLLACxSUEoAAAAqAAAACgAAAEAAIsKiKBAAWCpQQpKpCgAAAAAAAAAACFgqCoLAqUJR059DYoAAAAlAIAI8SF0gWABYKAAUlgWAUlAABYKlIVCBZQAAACwFiioEqgAioAAsACigLAAAVBQJQAAAAAAAABYKgqCwAAAAiAAAAAqUJRLACoqgIKlAAAAJUKAlJZYAJQAAAC9OXQ6QpYFAAAQqAAQ8ViUUWAACgAAWCpQAQpCgAAWCoRQQKlAAFgAAsURQACwLKIolQKAAoWEqoUllJQAAAAAAAAAAAAASgCUhFIQoIsKgsCpQAAlAoBc0qCywqCpQBAAqIAAWUlQsCywoV05dU2SqBYFlEAAQqUgPFSUAAAACpQQqCpQCoKQUAAAKgWBZUlBKAAAAAFgWUAAUEoJQAgoAFgLKqUEFgoABCrAAAAAAAlAAAEqIBKCCyiAFIUlCKCUlgINJaELKALCBSWAKSyFlAAAAVYSpSdeXU2ilgqCgAEKQAA8cqVKLAJQQoAFgLABYKCywsUJQAlCUAWAEAoAAAAChLCgAAqURQlAAJQAJQKJYWCpaAAlAAAABKAAACUJYSwqACLAAgqUqUAARSAJQlpYFlgloIAASwAAqBYFAFAAdeXROkKlABYKBAAAlQ8iWUlJQRRKJZSUAAAKlJQJQlAFlCCywoAAARQAJQBYAAFgqUAApBZQlCUSgCVCkFgqWqlgKJQAgoACUAASglAEqIsAEoRSLCLACgWAAABKAoIlCoAAABCmTUUlQqCgWVYEqFvXj1NksqUAAAAJSAA8kJQLFEAABZQAAsAFgsUiwqCgssFlBCpQAAARNIKlAAAAKQsCgAlACoFlACUAAAAAssLFoAAlABCoFgsCkikLYAEozQgEsAFAABLAAAUECgAABKEUxNwzuUABagqUAAdePdNSygKgqCwABCpSUPHNSWUCwsBYCwqUAASiUAAFgsCgAsBYFBAUAAAQBZQQqUAAFICpQCUAJVCCywKAAFgFJZRFIKCFgAKqWBKgKCAAAAIsABBZQAACUJYBQBKECoKgsAAAABAoAAVYKgvXj2TRKoAAAEoigADxiWoLAWUAllAEUAlAAAAAlALAqCoKBZQAgqUAAWAEFJQAAAAWCgAEKCwLAoCUJRUKQpAsAAFiqlCUQiyiLBKIoJQQoEsEoigAgoLAAgFlBACwAABCoKlCABYKgqFoAJ34d00iqlCBZQQpCoKgA8glAqBUKgpCkKAlIUJQCUCUAWCwCwApCgAqCxQlEsSpVAWVAALAAAWCwLFIUlAAAoSgAAgqUsAAAAKWIsABYAAJUKgAELLACoLAVCoAAAAAJQIFlEAAAAAAFAWCoHbj2TQFSgAgCoAoAI8gUUlQWBLmNJqiCywsoJQCKAAAAAAAFgqUAAqCoFgoARYKgoCUEKABYAAKlEoSwoFgqAABUKBKJYKBKJZQlAAABAAACWAAAAAAAAAAABAAAAAAAABQAAAHbj3SkKgqUAAAACkDy2M0WoABKKlJYLLACxQAQqCghQAAAABYKlACwAWAoBAAAFgFJQAALCywWUlAAAAQtgAFIoIKQoAEoEKBKAAIsABBZSAEKAAAAAAABKIAAAAAAAAFAAAAduHdLKBQAAAQoJUJQ80JbApKKhLCkKlEWoURRLCkCwqAUlAlAAAABSUAFlEolAAEAAAAWUJQgoFgFJUKgVCyiA0lIoiiWUlQFIoFIACUABAAACUJYAJUKAAAAAAAgsAAAAAAAACWBYWoKgpB249yhFgssALAAqUkADzCUBULFJUAAKBClgAFIsBSWCwKCLBZQAAoAAsUEKAAAEBREoAFlAAFgsCpSUIoASgBQgLLAABQlAAQoEollEAABLAAAAlAAAABCxSAAAAAAIBQgsFIShUBZRLC9uPdKlCUsAAABLAAF8wgBFKgFICoFQpAUllqKJZSWCxSUJQlQqUAWCgSggqUWCgEKlAEsSgJQBZRKAAAAALKABC2CywWUgAALFICoKABALAACUIsLAAIKgoACUQAAAAAAAAEBUKhbAESwUAAB6OHdCwUCCgAEUAQsDziAACwAAWBZSWBYKgpCggosAFgpCgAAFIQoFgtlACCgABABCgAKAAAAFgoAAFgsAlKlCCgShKIoiwqUSiLCwAIsAAEsAVYSyiLBYAAAAAAAAIsAABAVYEBQBCgvfz+hAKlUhAFgAIWwAPOIAAAALAAAoQCwAWAsFilAAlCUAKIsAAFgtgqUEKABLEoUAAEWUAAAKJZSUAALLAAACgAllJQAJQBKBAAAgssAIsAFgLCyiLAAAAAAAABKIAgAABQACUJR6OHoSBQCgQsCAAAA84gAUgALAAVAAAURSLBQIKCUoAQoALAFIsLLBQVCgAAABAAAFAAABQEKlAAFCAWAUlAlCCpQAACKIAlJQSiAASiAAAWCwAAAAAAAAEoQEsAABCylELAA1149koUEWUBUAEBQQF84gAAAACUACwLCoLKEoiiUAAAoAAAQqUWCgASgUllAAAQFBAFAAABZQgoAAFgAAAAAWUiiLCpQBLAAAAgsAAQqUSwAAAAAAAAAAAQLKJLAAARbAAAAejh3QQoFlEQqChQIEpF4CAFQoEUllCABZSUJYCiAoAAJQJQKAAFICxQsJZRZSUJZQAAEBVlIsKEAAAAssKgoECgFIsAAAFACUEoELKIUQAIogAUEShLCxSLAAAAACUAABCwCCwAJZRFWAAAAvfh3BEoAAAUQqUSwsDglgAUiwpCpQCKCUAShAqUiiWUJQAAKAAAqDUlAFQqUAAAAKAAAQAAAAsAAFlEsKlFlJQiiKAAECpQAAgqCoACCwABCgEAAAAAAAJQAAgEBYAAIAAFSwqUINd+HZBQFQRYWwLAssCwA4CAAFgqUIFAAQAWUSiUJQAAAAACgAAKBYLFIoEKgoFlEUlAEAAsAolBKEoEFBFJQFJUCwpCgihFJYFAAAQLBLAsAABCpSAAAAAAAlAAAQAgAAAAWLBLCwAAN9ePZCxVRAUABYKgAA4CLALAABZRFJUAKgLCwLAsCgAAAACgBSAsWJQLKWCgiiUACgAEAWBYLAUJQZ1CglCKAAFAAlJQgLLCpSUABCwFgEAAAEsAUEAAAAAAAAAQAIsAAAIFAQAAAN9eXUsEEWgAsAAAADgILAUgFgWAAUhQACLBYKgoAABCigALLCxYILAoFlAoAAUllCUABLAKJQIKAABZQDNCyiUIoigCUAAAAEsAAEogAAIsAAAAAAAAAAAJYAIsAABAACBQAAN9uPUAlQoAAAAAAOMqIUgABSVAAsKCWCxQCUEsFQpBQAAlmjNUlAgVSAWAUAAqAKVCpQCxQlQCFIUAAAAoJQAAEKAAAAAAQssKgASwssAEogAAAAAAAAAAEolCAQAAJZSAIUAAADp059AQVBQAWAAAAQ4qhKIUgAKgsoASgQoABCgllAAACUKLAlCFCAAoihQAWCgiqAAAAWEWBUKCwCwAqCgWAlJULeQ6M6CjNAAABKIAABLCkAAIAAAAAAAAAAgsogIAAAQAixQAAAOm+fQAWCpQAAAACWE42JbcgUSwqBQgAFlJQlgsoAAAALABQlAsEoigAUihLCgALAUlAAKLABURZSVCqIUAAlUhCzPM6b4ZO/F8qzr5uLc69/FD7vr/M+nL77z982hYsAEoEFlEACAAAiiLAAAAAAAQqUhSASiAAAQAEsAUQApDfXl0KlFlIoJUJVAILLAE4iUVUEALBYFgWAolCUJQlABKAABRAqBZQlFQLAsLKAAAAFAlAAqoiglKlEJVFQlCUFIQrXIr5Pz9T7XzfO1Ncs2t3hDvrz7NFS/U+Ol/WX4H3cas1IAAJRLCywAgAAAJQgAAABCgAQAAEsAAAIACLFAShKGWTt059BYKUASgBBLKUCLDislBBRKIsCiFCUSwoAEoAAAAAsCgAKIUhSLCgJQAAACgAAAWBZQACwsUllLBQQXPwz1/H5XeekzdNRzJLyEuDrvhs665U6xg36vIj9Xv83+jxaWWAAAgBAAAAQLAAABKAABBYBCyhAAAlQAAQUAZJAUOnXn0LAoAKlAIoSwASw5FlgFhFABLBQSiWCyggoABBQAKIoAWBYKCLAoAEKAAACxQlAAAFgtgWAsqgFIsQvjPD8eTc3c5s6ZxqnXGzlntzjGOmTPSbpOmTHbHM66ZN+3w5l/Yz5P1+aLFAAlCSyAAAoABLAAAACFJYAAEsAAAEAAQBREuNYUlLA7dOfQWUJQBZSUAIABLk5qlgFEJQBFABCglAACUIUAsUECiUAFAAQoAAAAAACwWCgAAWUAAKAFBLLH5b7X5rUJNxYN750us6OjNzc467l887ZOepNZ3M2s7mTeudifqfzHSX9czcVKACUksgFESgCkohSLAAAAAQAASiAAAQAUQABHPpzUCiO28bqUKAAAAEBRC41kwqUCUAACVAAJQIKAQoAAFgsBZQlBSWUEKlIlLLAoAAAFICpSVCgAWUlAUAWCxaHJPz3guOkSLGpDWsaNax0jXR2zvD0XGvHn1Yrjz9PNPK7ct5MrFzbN4aj7n2PyH63FollCLBLIAAlAKAQCwAAAAEABCywsAAQsAFEAAHPpzAKI7bxqrYKAACwAEoSwZsMUlEKAAsAEolsIpCUAAAAQFCUKlEoWUQAFzozqUlAAAAAACwCgCxSFJQWUQLKFlJ8z6f5yz5uNY6Zpalg1caOnTHpxrfqz259GdzOueemTjO3Ozj5/Xy1PHntw3zsNZusWp+o/MfTzf0krFiiAksgAFBAoCUIUgAAAIUhSSiAAAAIAEsWwAHPpzFlAO28bFgWUAAAAAijMDIlWAUzQASiKBSSkBQSwACUAAAAFJQihKCUWCgAAAAWCxSUAAABRYKACWULLJ+P/T/AJLUkmtyywIi9eftzrXtno5dcdO8l4O2I5c/RleXPtmzhz9OLPD5/b5d48+sunNvNq75yX9vrx+znQIsJLIABQAQKAlgsAAAQoAECAAAAQAUCAAc+nMqWAO+s2qBZSUAAAEsAMkM0mhEoKgsABUCwLCoBChAUEihAsBZQACoKlBC2BUKgqCkKABYAKlACiFFzoEKQtgpK+T+d+r8feZ057s1mwm9e/Op6zn079vl5T7XP42T7M+T2mvc4al1lFuc8bnXn58N4nG56c+iSukI+/8AY/OfocXYliwgiBQQAAKASwAAAAARRLBLAAABKIFSxAUBz6cxYioPRrG6AAoCUAASwSwgMkmqAVEsFCLBQECiAAFICwBTNRKlABCgWUuaAKQllACwFJQiiUAKgoBQQoKBKLLC51ys/KeLpdznPq/MNM+k9vq104d/J5vZz1njz9HGuM3LnF3ovfh0zrvjGVz5++dY4W51HDtzs56xvWdM2Pf+n/H/AK3F7LJYIixYsQAAAKASwAAAAAAiwAiwAABYBLAABz3gCAPRrG6AAqUAAASwZ1kIJKmhSFJREUSgsIohSNQRSLCwAAQAgAApAUWCoKAQsCpRYKAgsoAAsCpRYKAUWCkHk9ny7Py/Xl229nk93mxvze3y+vWfqbzvz9vN5fd5dT5k9/Ppz8He99Z83aZzr1dufq59OD18Dxce3Hpjhz9eN4nm9nlSazrUXOi/r/yP6LF+rZc1nUiAiwAAACgEsAAAAAJQSwSwAAJVAgEsAAJjfMWIoO+8bqUFlAAACAsJLBFMWpqKJQAABJQJSVCgAsCFIAAAESiKALEKACUJQFIUiioFAAAAUllAKlFCagJR8f7Pw7Pz3o8++k+l5/X5uPadriz6nTnvl01jvo+dy+rw0+bn6C5+fv2o4+i6munl93A+fy9O7jwvXy08vn9vLWfDntx6c7ZbNfb+J9PN/S3OsWLFSyAIAAEGa0lEoSwAAAAASiASxQQFAgEsAAJjWSUgDvrO6lQoKBLCgSiAkQsCKmooigohCyiUIpAEolgqCwFQAAKEAJAIABQCiFspJQsDUAsBQgoAKBYKQqaCiAfE+58ez81K65+t08P2OHf5m/R57Po9ePbl03049JrpnMplxs3z827PT3m47cVt+dPR81n6GvH6Dn5/dxPl+P6fze3JY3zvr8faX9q8/o50sEshLFLAEACgCAsAAAAAlSrECLFAlgsUhABKAM43gKgDvrOqqCgoACUSiAzLC5olsmgBCwC0zYKlBAsgsAAKiywCIqWqgsBZJFBLSBZULKIoKolEsKESgQtlAFgqCgqC2CwLKJ8r6nzrPyyzpm/oPgbmvtePfkzfsdvP2499uUm+mMYs6cJx1mfQ8sT6HD52D608Nl9e/mbuXq8+T3TGprzfL+r8rpzwOvG9ePWX9N7/AI/1ed7SyIFAEQAAKAASiKIAsAAlCwJYsqLIASqksAAAM43gsqFlO2s7qUAFQqUELKIsMLACwzpEKlAACClJYAAFkKAABKQFBAEsFgpSSiUCCgCqgWCoKgqCpUoAFgqC2CxSs6LAz5fT57PyGd46S759LOfPrzP0Pbxe3zejnJiavPPHWd9fNuz19/Dprv5XNCWzr6fLZenk3yufT18Pplny/ofM3hrOunO9OW5ft/X+L9fF9GpckFQSwAAAoABLAogAAEpQAAiSwEqwEsABCgxLkogDvvNqgWUJQAlAGdZICTULnUzqLABZCgSjl0oWAgqUllAAABClIEABQAQAAQoBCgSylIIq3I1AoSpQAAlKlFlLAzw68a/Jc+3HphrKrnWT3fV+H9Xh23z64x058u/O55/P+zjU8/bl67fJr6noT8/0+ts+Px+j4q8Pq9Ekxu5l8/zvT5uvHWpdS6x1l+n9v8/+j53teXWGbFKSABQQKAAgALCUKBAUIAQICUqLIAiwCgjEsoSKDvvNqpRZQAAAguNYKISiCaAiwSgCAoIsFgqCoKCUACUlBKJQTUCUJQAACKJUKlIEKJYCglpLSwQoAAqUWC5o58enKz8x5/R59yRNTpm5ifY+P686+peHTj3pS7z0l48vTi3z6zjd778xPRydpJjtzznHDr8veONzrty0lL24+iX0fp/yX6vB34981LFlCLAAAKBEsLBQQAAFCAAIsIKlIIAEABKMZ1kFJQ9FmqlgoKlICywAksAiLBUm7FMrEsoQAACUhSWUIKAgqUAssBTNBNQlQoAJULAsAok1ABYSkWoQLdBKQoRKBSUBDKaOfh9fzLPleb0+bcxE1OkVc9uPfL19cTl19G/P0zvv18/aXeOkl809E1PPrrtMdEjjxeLeOfiO3G6xuyhdd/P6o3+m/O/dxfR24+jNQUBKIAAKBEoQAUUARYgoIEECwAEACAAAxmwVClO9loCgoICwCwkAIECpuKIEAARCpQsJZQABKJVIBYLAsBUAEoJRYGdQAAWUgCiKAEollFLBSWVBSIKoJDXPKufxuvns+fx1jcyss6TWSerye/GvXO149vFrtx1OnTzJff1+d1l9jyF9c8sPV5+fzdY6/PTtwpbGs7UC+jzeiPT9j5f1ca93o8nqzQJLAAAAECgIAFCAAAAEsIAABAEAABDEsBQD02WoUlAAAAsMiABCiaEWxpM0UElCSgUkogBRFAAJKFlALm0ysCwhSUEsALAFCUlAAAlAKlssUESrBGjMvnrvjweVPrfO8PLTv8/ss8s9WLPNtgS7Hu4evn09m89ePTly9GTzZ9ONPNn0Ys5Z6c7Ji8tZ4+fpz6c7Ksm86WbzoTUL6PN0j6f0vn/Qxr1ezy+nKwVAAAAAAhSFIACKAEuS0GdQSwAAQBAAgsuTABSUPRqKtyilBAKAEIIAlAJqUAAAICwAEuZbc0sLAKQLBYNQCCwAFglgUEUgAEosUihLBQlAQtlqwkWK08/xrPteD4fPU9/iz16Z576uk57zzrlOnHF1JcpNw6ei+rh059rrG+vXnrOqhJjrg48+vPU5cunPUz5/R5NY4Zs686Fag1ZoSwaiPrfQ+T9XF+l35dM2kWLAAAAAABAAAAAAAiiSiLBKEsEsAIsLjeDIBQU9BagFIClliCkuYAAAMpuqJRJYEoy1JagWQ1AIKAgUBCwFlFlsEBCywqUEKgoIAAACgIKACoLLiy/P4ebeeHn79O2fF09PLpl1552zdc8s3WY5ztzzZz6WMmx9T5Hu4dPe1rz9cEW6xTeHNHLfLU543jU5eL0+Ppzys3i0WwNywsCxT6fu+V9PGvt9uXTCLFiwAAAAAJaiyAAAAAABAQAASwgAIoc+nMgAFlPSBZQAUJSWBnWQAABDOwALLBKCCwABCgTUAAEsLKICiiUshKAAsAAJQSiVCyiAAS0ktEuCfJ7/AC+uNzn5vRn1a8Ok9F5tN578dSZ1I3rx/oeN/P6udpN5yqK6OVPr+r4n1vJ2s3OXSNYJz3izOOmLOXHt59Z83n6c+3KFqWUsU0gpDQO/1/kfSxf0ms6xbkWUAEogAAAEogAAAABAQAAELLBKIACY3zAAFmj0FJQAqUEKCZ1kAAEFjOywrIqCoJrA3JoEBoysAACwAlCUAAEsALcrNSUglELZDUgAtlsAlAgqUmOnNPiePfL0c+mJvq449mE8PocMX2zyb6T041Nzl9b53Dm1jtwrpM9M3E7c4mdqx7/Ezfv6830PF34Y9HHOuOOudTGOubPN5fV5t58vD0cOvLOs6sLFQNs6Fg0U6+/5vuzf1e+PbncqWAApACxSAlBLAAAAAACSwAAJRAlQAAnPeAABrOj0LAC3NKlJQSjMsAABAM7LAAlGd5FAlEoSiFIohSAAlCKJQlQKIAABKIUiwWUgKBYsefX5uz6Hm8/0NZ83sz8c/W+X819DTjGu2c3XOrvnrUefvs+du8ubv38XXT1cd76ThRMROd6Ruaw3gyuU3+m/M+nlv9Bys8vfGO/NOXL08zyeb6Pj6Z+f5/X5evLFs1mpViwusbEUtzovfh2l/Y+j835o/WzyezFxbJUogAAAAAJQSiAAAAk1kAASiLBKIADGdZAAFmj0wFBKFlABCQAABAjO6lAAJlS3ItlVBKAkNECxUUgKhKhQFlIsSUAACBZRAFJYLLAU83k9XWy+jzSu3zPD4+2OHqxvrma56gt0mGD0cNLOnh9OY8nTp58O+/P30e3xfS1PN5P135LnW+d06zElllTLWT6v0fz/AN3y9+jTjvlq9jz+H6Hl3n5Pi9nj78by9HDWVlXNlGs01FFzTdzT1uW+2fR+h/K+yv1efJ7fH0yJUoiwWUhSAAAIAAAAIBLABKIsAIADnLAABqaPRKIsKBUKCLDIAAEsIlzvUQ1ILnUM3QQBFqABZSwLEQVU1BLAAAQqUAAILAAlAoBAEQLTOufavzPh+n8318ZZOk7b8+zriemMebrZePbz6jprN1OPk9nly1ePXLr24b6T6/xe2ImA6ZmpdRiXUZR9b5XTGv0t4+rx+jK8zn5PV4tZ+b5O/D0cd8unOy51zJrHQWw0zRQ1c7l3383fvjHp83o656/p/wAl1539bPJ7fH1wJQEsACwAASiAAAAyoiwASwssAIADnAAAu+fQ7gEKCkKgudZIAAAlMjPQAAEEKlUgAAWCxQCWCyiAASglJZQgqAAQJogKlCUAELZTHXntPz3g9nj93FjpN5xqI6XN3Hbzazczp5+d6RtdeH1cE47zcvTHTpMXSvPZcnXlo6XFlzqjXNa+n9j8r+m8nbfLpz4dOPh9nzumPn8tZ9HECcunJL059FsohDVmzO8jp0576Zvbj0752zdTft8LF/Xa/O/pPF1zDGpYLLAsLAASwAAAASwgAAIACASw5gKJYLvn0O4AABSUJnWQAACLCIz0sEBSZzrbkzro5Jrs5VN3E1nol1kLAKlAEogCWEKslJqCwgirFICWUuLRYKgATQWULpPzXj9Xl93Bc3pMy5i9uO7M56czpnFl56meV7c7qvF059crvn009v0fhd4xx+p8izdwrumtLvOpXLryjP0vnXF/U85rxd/N8j6/wemOM1O/PJY5464M2U3rnTWdwzvEO0Udeau2+fT087ctTe+dH2/i6xf2Gfm/T8XWSzOlBLAAQsAAAAgJSVAAQLABLBnWDIFlEUnTGzssAFlFlAJnWQAABLDLjPP6+18qX1c8eTWefe749+PbHkX368HRPZfLqa7znqXV5aTfTzt49N81uek46l6a4Je7nzs9WeA7Ocl7TmOucjVxY6OcrrONs6OdOjmNsjTA3ecs7Z4Z1n0a8u867XlqNMRek56l+D5vRw+z82U6c5maM0OmJ0rlLnLfDpqXlMTncduO41qZrvnMrrx9PlEpPReXTTprj10hTnnXPF+r9T879/ydvN8P6fzt45TeN4zSVy78TOdZLrNTUuF3Zoz1wO157XfTnvvz0l6yhN656rX3/wA9ed/Xzh38PYJUsAEogAAAAEozbCAlQsUgIBz6cyAFJQbx0OwIoAKQlXOdQAAAA+fvxb8P0+2Jg6Z4TWc+nytTvx15DTjN49nb5npl+j3+Z6Oe/bPPvOuucl1FMbRlnVFm15uklsmhpIud4HTELYNc95NY3DnbzrpEjrMVKhefP0+ezrrhtd65E3eY6M+fefjOe/tfKWXWc56K5tYhvA3z686yTKcfTxxeNy53UnsPJ+p/Pq+t8SaC71G+XbTGk1Ol5ZluZnF6fovzX2OG/DyY6ZmbmTXPXOO3LpxXXPrzSalLmltmwoWU6ejy9tzdzfRhZbNCiDt+n/J9uG/1kxvydEslAAQAAAJQQCABKCACAc+nMgKgoHTn0O0oRQQ1ApCQAACUA+TG/F9OM5Ln0Q+Tx9/xPR5vr4az043vF82vREz6PPvN9OvN3zrprnrN6udl63l1OWuvIupIublesDWcjctIxo0uYssKuSyxOPTfO23ls6JYmNWvPrtxOnPZnlcXU34Pb8b08OHXn0+n4Mtc9S6xTWVMSyNsdK553jJrOjy8/X5+Ou/0vm+o48tctHXj0S7xdNs71IvKW885xd41cnt8djedZtmevLMmN4jpytW5vQ5XQjWjlvGi2xDebda59LOsT0Y6M7prN1JrI1Yl9f6X8d9Dz7/QzU8u4FJRAAAASwsCKIBKBACAnPpggLFAHTn0OxAoAFEsMgAASgD5fn9E8X05XSMc+3KvJ8T7nxPT5fX7/n+qa66z059V1iXOeuLMbzTfTz6j1a8nXN9Nxc63rFixLblzTWpk7Yxmz0a8+pe2Gozc5t7OeJO8mDpM2jNjWS0xE7zluLZyOuUsvn641M/D+l833+O9ePX2eXcy1GNYNCJNQzrnY6Y0rlYjXLtmOdzMauNyN6zdy9eetKkTPLWOdazpd5kRvFlZ0y641iXlOiMb6ec1359jny7cjc1gytNZkrpcbS6x01Nl75i70lLEoW1bEj7X1/xn6XydPbLOGwIAAAACASiAELLAQsDON4KlAAHTn0O0olgsoFGdZIAACKIo+frc+f8AU57vKseXr4emJ4dev0+X0ej6Pl1OPi9nzufXvvjrl17MIs1kk6ZJvI678/SX1a4aze+NSWJCEs5lsb5aOvTjrNLlTCzrMU64g1cw3nfOWSTWZ38uj0Z49IaxizXThjpj5/n78vp+GdOfTpjOrNZLa5bmcrWSFFkJz78Yt57lxrO45zojXozNpjrK5zfPLnN5wEpJqVc4y6XNysiXa4Hn3zPVvELJDVg1nGTdXUnVmNaxvpN2TtnepDbgO1xqy3NpnUlnTnvL9P6vyX6Dy9PY3nluEgAlAAIoSwgAEBLCwM41CUAAHTn0OywAKJQZuQAAACWU8eE8H1Jx1x1nhnTpjw46eLv5v0/Px3W/R5PX5MOt4duXbWWs1YWTeE3IJbTrnnuXvvz9M3tlZc478rMTSzHPrzresQ6XnYWUhzrtrnY6SAyXNixz3zTThrU65zzZ357x9nnkr2ebNxbLrKxULIhJIpmt51CzcPPpjF6894DPvynr+b9dfmX7XwhMeuvFLhLCMampZnfKNXDNu+O43zozOmTrnIaxss1zM6UbdNS87Dps75srRz3iMssX0YctTbncvRvh03Omop05j6O/l48+v2d/JfrvP0yslAAAARAAgASwAxmwWUFginXn0O2aACC2UmdZAAAAEsPlzWfF9N5+vK5zdWz53zvo/O9Pm+/Ov09z5vj+l8jNz04OXX268vbO/Rzbzrnq6OfPtlmSatt52Tr08219HTgze0uZY6K4Z687GN5sm8WN3jTbG1ZlTe+VXpw75OW+e7N65dpfFy93g3zm/Pd53y3n6HkY1nrzZ3EhE3cbpnQ5zpI5XfOGkLZaeb0yOVz0zfPvNze31Pl/Wjn9D8/wie3yarOe2jzyyzG8bl3w684ZM3Nm43y3k1rPQxnro49Ogzjpg0zyO/Lmrt259+2JbrpI2rnx68cOaOevT5e/Czdz2V0Y1N9/L2jp9Hp9Xx7x29E5a03z05TWdUAAAQQAIACASwxKColiqB059I6rKAlBQzLAAAAAD5LDxfSxb0sxz6eezweH2+P0+X2dPNtdOmM9PSb578864rp18yPV38m8673nqXle+Tyb6c7nGma7b4WPVfN3mukzmXpz65M8uqzksszoJvGjXLtyJq4O3Xy+mXlz78Um+SztxmLnzTefRxzE+j5ElNTOU3efRMbxTpcaoKmO+Y453yxddOea6jU5TtxymOvDF9H0PleuXh6vFC9OPojz7yRjfOroXMsyzVzeXXGoubQaOWt5OmJome3AZdKy689Tv349e2LY0sc4nPXLFz14enNxmDXfXbc5X066TzfQ82Mvo9/h55a/WdvxVxf6HPwX2ON+5N4zuAASwRSAILAEAEsMAWCxQIdeXSu0ABZQDMAAAABLD5Fzvx/SwuTPDv5N4+fw6cvR5fVvl3z0uPRyzvpvil6XnVA63Fy7bxvOt3nuaY6c0Y6Ysy1lJ289r064dM3Vtms53ExLazblIKZ3gSLNb42PZxz1lxx68dZzy1jeM8OOvd4/RnO/Rzjauc7k4O2TE0M7zTcmqxvt5jfHsy4ZrNz147s0Wufn9PDFa46xdosvs8WlmsCRtLKrEslS8stxMrdZVtlNxsxklziqz7PP21Ovm68bPTtrrBNTHPtyzccus509fbc8PsuNztniro5Zj0PPTpnPWXnjpmIiPqfo/wAV6OWv2E49vPsJYAgAAgEogGdZJKgQFqoHXl1josqpQBLDILAAWaJNwlD4908P08HDWeXl06c/F5/oeDvw7dcbzrux0x17Tp1xvyT3cjzY9KzzXWknbzWX23h1zrqzZWOmCTtizzzus46YO9wl62SXM3mya1kw68bE6ZMTeES87L6PPo68unM58O/HeL9LwfqdcvF4vu4zy/M8P1XHc/M6+34/RjxN8PRnedOk5Omazc9TLXM1nfONcO+MufL0cZbvGrN8eqvn7ThrXTha9WeXWy8G1alsSwjVOevT2rh5/TjF9/zvT7o83zfreKPNzsOZmN6vTRTczM9Y7ddcu2dc9Dk+h2xfXw4sXx/Q8n0tPi76Z3PPN5jN1kliEuZfRPN1suO/Ks51nF9P6/8ADfoeOvuxeO5LAAAQAAgGN4iClgWUAdeXY6SgABnUMgAGhQAgPlcunHxfTx5u/n6c8bu7PP4voePfPn6PP11Om5259MejEzrvvhvOu859peDtbPJn06PHvay656l7ONXpi80s10OGe+U5XUrZqVnoiY0rM680xuZpJtMc++LMXOK785zs786T6v1PB6uXDtrhzzj285xsc+9rx79WD4/g/RO2fzG/t/N9ePLjWvVnn0znZrmHPvyjOpI5yyNb47Ofl+l4sXG52zZzuTWmq0rU53vzM3Sz1+Xr3lfZ/OpfpfL7fSjyfL+r5MvDLzFzMvVprtJnds8vq7Ka06SbksY1M3nXv53w9fBuX2Ony093X5/ot9/g9/ikce96PI78suWeuMV38tPRzu64fZ+P9zlf0JPP0SwAECiAAiic+nMFIoSiwHbj2OgAALm5IBVJoAEoiw+FjPm8v0NXXayZ3rN4eD6Xy+nPn38/bpz79fN6ufX0b8/q59c56SMukJZDeZzGbzsmpqx0mpSBrOjNDLWbJc03rlqNWVbm5TDpyq50RhKwsszy3nWG+XdP1PV2nm6Z5a6Z8nu8nGPqfNt5prz+xcef63Dc+L19/uPzHg/SePT85Ps/H9nOMXvLjbTjrUkzjSOc6Yl6THQ8uO3HnZ1bXNqydeXQ59bLDTabkPXy5D7fyecxXnvKMZTnVz1j1am/Rm6rb2+fNy5drz0mGDrw7fU415Lnncefvwrv4PV2MfP9fmM3OU7dPLdPXvw2vfPDo9HF0jhvpyO37T8b+446ks5bgAABCwAAJjeABKBQgvbj2jYoABnUJaAAAAIsPzTpfL751z1zqcN+ar4PZy6cfm+vw+rry69+fo59nflrHT0TlrOtb56jWchqUZ1KRRz2KzpLJoyujPPWE1jpys10zTPTGlWIvO2o1zKSznm5ucYk3h7vF9Jn62uLHHt7vn9dT1+fXlsnp8XqwuOezXr8nSz19vD6ek4+nHor5d9PSvyXy/2Hz+k/P28/VjrizpMzVMZ3led1mN8O2o8+ozbLCduXSqXUlKstJLiGM8sW82edsucnqz7ds9J7+s82N43nU+h87OtSctZ6459DN0ze3myxcLTq4eiWfT8GMPHz+l4a4zus4PQPO9GjhfTDn7fPK7ftPi/a824Mak0MqICKJQiwAznWQCUFlEoduPY2AACpRKIsAAAID4e48f0plDlOk1nHDtz1j43XPfvw6evw+nn29FXn0vTnJdrZc6zoIKzUlczpeeLOuc6N3lqNXO15tEmOmayuqxrHWNYCY6czeNZQSnDvxueLV3nn9j5H27j63WbnGdeUk7ODU9OuGY7uffU43PoPLj12zxY+jiOHoua8E9fm5vH8L9Dy0/LdPV4/bhmO+alty1DPp8/aOPHviM6BZaVampSS8Y1yxy5XeMzndZbXHV9DU7cbe2dznrTvrz6j054zN9Hh1mufP080x055j2Ty6rqxtbjYfQ+ZMt8t2zF1uuL0dtTeeHDGs8PV053ye36H1uOu/bPbnrk7Q5NZEoysABCpSLDMsIogKAB24dzYAAFgWUSiAAShA+Fa8f0s3nmyY3x1lz6S5+Z7fF6OvLprz9c79WuVx06656zb0xpYz0glMs7rEsQZKZs1rj1NaxJeszsjWTOoFQ1z3ySzWK0lSRmnMubjUrHo8/n6cvqeTxZ9Pm+jjw9LPbv5nQ9np+NuPser81vL9Lr8j3j9bfxXY/b9f5/9DF/dX8f7sP1fH5ntPR4vXT878f8Ad/nD4fj+34fTnxo9Gd3N1Lc9DXDvwXNSGpC6zDXLjx53tyyxU6o5CVb6U6dNT0Z0ua3LkxqWXd47rfPezz+rzdUnL7XzI8mfb6T5Wv1X5vnbrz9es3qXbGt4Su2bcZebM6e/5fbhq/pPN9zz9J0XnpQEjUmqzjrU8j2Zry59HIw0MgQMLBKIoAAd+Hc0AAAACoLAFICLD4uefTx/R58+jU556YRx3x3n5/q8vr6cpOuc76dOG86765dM66MZl65mTSC5KqRN5uSXeCdMDpeW4XGzWYXpcU0Bx3lMtTUxrfISYssYudXnoZZ1nzY9Xj9fl6Z53Wda45PVfMr068iz23xWvROKTW+Ml104w9WOKPr+781MP23u/n+o/feD8b7c37Pi39KvzWP1/wArpn4++eO89GZvUzmlxZ5cOvmt5aybjHTpvcmPRwrza1053Xp491rpjpJNTczZbJcXNz05w7459auuyzHPeK6dOHavs/F6e7jfkz6fk3PNudOjPXFrm+jz5vkzt9fnfh/U836Hhv2dprh0tg1ELcjUUSUUNsWy8utTy8/fk8U9XGuMogAAC0nbl1jQoAQoAAAAABD8/pfJ9HNxoNVPLz7c9Y+T6/H6+3Lprn0x1lkNb4dJel5SPQ8+jteHSXec0upoxnpkTpkuZs56mqlzuGsaKmTpvlYZ1myWaM2Kxy687mS41kzmzfNmycemd8/PO/LrymsZ3PTvhrU1iZOmA5VrLLW6xrtrWeE7jzZ9mF8174kxe+K559nWvn9fZDXj9uLPHfXjTG8Q35vV544731xc7XcpNM+b0+bndeq/ofN28ePo44dvNfdhPicvofO9vnMuuMmrMrTPp8/Rfo+Hl0NXDc6crxk9N4aXv9X4e43DpGsZjXBrhvl9DxfR5X0/c8fu8/Tdyl0lNSUMikjVyNsquoRvOTesBvInHtbPBn6PGvI3glUiwvbj3KAAAQoAABSLBLD4EmfJ9HdzUzrkEl1n43r8fp78OvbjefX0XhZqZ1iy757hjcprOY7TmO94dZdCXWsUz0czSZK1izczszvlTcmE65mDvOOjW+NHLWNZ1jXOzMs1nmk1mZuLmyO3LEt1Fm7I3dTm6QzrOTu8+66teWzpnjcXTt6tzz9973PL0zY1PJzzfa8WY9rw2PXvx09fXx9uk9OuHbc3x6YXHP1co45kwmuX3uW+/p7cvF6nWdIeb0+ZfJ4vY3n5nP3eD08JrDvzaxa1z6Zss6c41FWd/PtPfx8/WXz9tY3G7izp5WcXXrufPvP1vN9Hjv39cdMab47jbG6ZImoNZ0MtBKFzTVYrecI6Tnmu+fMT0zy5X38/J0sy787MLB24djYAAAABDSCoLAA/Pc2vL9DWs7lw6U8/m9fg3z+f6fP6O3HW+fTHTpvFzqOiXlOssms2XXPtk4T0crJnam+W4252Xprjs1lErOl1MaGsDfPfOy3MsusjUmRlLm43zsVmzlnfPWXPpy6c5k685c6TNuTbfO31zz9dZxe11Naz03N8uqvL0csXq8vDL3Tws31+v5NjtOWzK7L6M9ujm69NTzZ7RMNCduWV6cLI9v0Hr5Pk8Pv/AAOk7dPPnWvr9fh9Od/Q+L53r83beus49PB4Pf5+mPJj1eXpi55de/LV573KxtF5dVuembJ1rTO89dTy8/T5+Ose7xXF6e3z+zjrv9HxfT5b774dJe2ZI6Xlo1YrWZYaQms6MVBcimDWOCq3Bc4O+OQ6MjW+e03itTPXl0joKAAAAALAAAQ/OdM68n0LM6XfKZTHk9vHePmd/N6+3GW3PTp38usa9bG87zbY53rgxOsTld5rnVs5qrAS2DcwNbwLcbrFSLmyzWbkamTcksYluWbmxlixizWbz1O/GXWemZvPpyxy9fhzdSc9TrM7M0rW/PI9k8eTrjCKli2bqWasv0vn9T1eZrc5qr068Oq9HTN3MY9GDy49mMvL7M/QPH9/y/IxfvfB82I9eNVW7jU1reeufT6/l3z9dzGvL3eD3fMufP25Ttx9m8665uV01NRLYrXL0aLnWq8HfhjlrXXl3y9fbj38+/b7fD7M69euHSW752NXn1BCrDcQrNLnWRGB5XUy6cjeJmunG5KzmO2uUO15WvReO7OvTl2sXG4CgAAAAAAEuT4DOPJ9DcsrayM+f2+XWfi+rx+jvw9GuXTHTeuO5rpqbzrTNl1efWM6xSRKubmxESY6Zpm1M2aM6ma1qQgQzom8VMtCTWLOdTUy3i5nPphGNzeee5r1efOenNSiZshjcIvON4yy1O3TTyPTk4T0bTyX1ZOF6chYlu+Q664Wz0ZvqrwT3Szyfa8PbTWJ16S41mkDlz9OcPM68Ma9HX5/bL3TfDTU53pms6lLc2fM93g8+5Zd59mvA1PdfF7rLz22aizW88q6cM753nrr5M273yT6/Xj283X2+zxe2Xtvj2ltzmOmsI3i6JrFN650rWaxnpzLwzTRmMy8zpMSrmjnSLZRrMOu+NPR6vF69RuLKAQoABSAsoShnWD861jy/Q1lDrmZO3Fm5+J0T0efv05bzvprn0xvrcs6u8pdM06TIllGSxnUEo5qpFSSLCwubCalslzSxC5vKzUqy41EkqzGOnLeLZfZ58SzNsqs52jDeZMzUXE9CJuTS2LNdOWrOu+OtzVxThPV0jw9uvWsce8rO3Kt3nyjrzvTNl57JOVjesq3zx0L5cOdvThY7a4arV1k9GjUzdTUc+o+W+n8zhuUSejgN5lPR28Pq0ucXUlnHLW2q643dT39fL7PJ19Pp8nuzrtefSXeueob57CSNzeKu8I3M4NY156qyGNYEgZ1kENS4NZ3DWcjW8016vH6LPY1mxKpZSLBQAAAAY3g/N6w8vv046Ol5dS59HE+FN8/T5uvTlqa7b47xvtrG861M7lzuYNax0JAXeVl1qOHSas5TYmdjmSyKs5aAiyxSW4Lz7ckTebCSyYudZYuNY1qPXxiITQRzNM1LneIqaXWe3mjq53TpOdN3kTreVO+vPdT0vPa9PPiN3EjpOWl6fS+Mw9Dzq2xDtMQ68XKN4jKgXWqxvna7b42vZrDS61c37HXn9Lxej8z8f8AfY1n8A/VfD68/C3npjPfFKkrPWasW3Te871Hu+X9Lzb9np8ns49PTrnJd7xuLrFHTmNXKN6503nGq88SNRguQzNQ1M6MzeDedZBQzoM03vA+qjeQKAAAAAACSw/LM68/um5I6dGppx3xT5eN59Pm1trO5qpqdeWpe2uOs3VzVtxU6RZbvG5Zc0lDGrDm6SzldZI1LMNDm1LIVM3QnPebJksYS5ws1nOdY1neV9PGxambo5Z1JFlLJDXs4SXHPpmzOsDWsRemOnM0x0MLlNMI6XkOzjo1rGTrnCuuN8o6TCurMN5mzg7ZjLKNyaprA6+me/j08/b0dcb5+7l2xr29PP6M6ssWTeU+V+c/czpj8A+x8b0cN8t89Tvvn23GrrcbmtTz+3yb4b+n7Pn/AEfN07b4dM63vCLqUvTmLCN5KcO3EZ2hIJKGLAUudwkuS6zowtKyLrGz6Wsa1mpaWUhQAAAACSw/LNPN7rq9c6NeZcXPsufg46c/R5+m8bmt659M6zd5ll3mW40pGotkXpcyN2C2U1kjWUGeiueevM1jqTnOkrDpzSTWKzjS5xjU1mS5skuLmSzWZrGvRyXGLO14U64lsTWjlPQODpYzZdM7nazlz9PM8z15y4Z68s6uZYjtLOTr1PJvvxMTp6zw9vf36Tx+L6vkPL29Xpr5nH7Ms+I+3jN+T19dPHz+hiPn304y5aTN930Pjff4dd+jG+XTfXn6ZrXTlV6zGjUDN58zp+Q/S51j8Zn2+L0+ft6/B9HvnoOuU0McPT5Od+n7Pne7ydfb283bGukxZd6yjbns1cZNxg3ysCyGd5EoZ0M6zskCWaEQAqC1D6XTj11migLLBUKAAAsMrD8z0x18v0NJwlvHXS530YmvP8r7vh6cvJvl06c9XOs76b5amuk1c2N5Obejk6ZI1ks0JN0iU1cpbWbOvNYzUrpjnE68tZsyizGY1mZ1ixLmyZq5mbjUmsdvRx37fnfeT87372uHk+j445a1it/b8WIma7ZzN8DfWasjbU5Y6ZzeePZuOHetzLWrM46cF44v0+Ws23pmdc5rzcHs53Wo6yrNRbTMozNIxcs3n5/VMXl9r5nfydvdvh18/X0d/PrOvU5bVcQt83mPpefzdY3z3yL+R/afO68vzXfg9PD7Dh39OMS7rHHvyyfT+L9Ly9PqdPJ35b73j0ltJemc03ztyzdZrFyjclqVI1ENY3kVkq5LNQJSVCy5NFPRvnd479PJa9jy9DuxqKFAAWCwM2D87Zz8v0JzemzHbczrPm9FMz1eK5+P149u/C9OPWaaymum+Ws3vMdJonSOc65OV2JNStY1DS2EtlxWLCZuVzKlmbNsEkZsznedZzNKmOmEys1nOd5sx0m/Rxms+rUxjbTl0vXLw67Ys7Yx11Ma1z3OMnTF7XHXpm41qzG6tlEgW1Ex5uvbFvXK2sQ1nfJOXbj6Jdak6Z0sq2AgY6YiZ1uXjd2MzeY6ejy8/L2+x0+Z6/J29WvJma78CLZTHTFPR5vRg6sdJfz3y/1v5f0+fv6/H6PZx6LjeZHSX53s8rhr7vbxejz9PVrlrOumsJd649BvFhbyFxsakLKioLKEsEaJNCKIuRQzrOzuOnNrOiyyprKO/TyD3PJ0XtcaihYuQlPzWZry+/XbCa3eHaXV5bHn3xuPk9PV4fRw7XnterGs63rnZrrvlc3rrluXpM2XUaJNw56ZFzLNyZNc7myzWbGN87BUyssY6ZOa7s5TazOOmbM53zsTeLmVfVx3rj0s9OZDE7Y1N8LvcupnUz5e3DDPr8nslds9OuYKAWQWi8unCTp3wmiIvPpg6Y3z1M9eXQ3mWtWWxqWoC40jESJnXPNkszd74dyb8+vN19WufXz9t3Hlj698/pxeOfZ4zv34lx344PR8X6/j3j43bj2+j5d3OtzOpTh5ff8AO469/wBH4/1OO/bvzejlrSdJZqaluVOc7co1rFjdzausbiSiywJCxDpEIoJolDOs6O81npztzossoITUKqlzTr08yPXjhpeus7Py9dfJ9CTVmpN4NYVMZ11rn8L7/wAfpy5b4b68vR08vTO/XM9sdOb0zN87vzM9ecOnTz7jfTiXrvz6Na5jXPUszLSYssNZTO1rOOmCTpizPTJEarz6zbnnjedZZWzNl9XB1xdTtrldSa3z1LpdScN8Izz31wz69TpNQ0BLEUEtF5sdsu2tc5eO0GZ6Dli6s4dcJejnrU6sNTVyNXFLJmNSZlsms3G809HDvvSeD1ePjfT6/i/T8ff2cunp57+f7/k++vbjDGufXjqzXl9HGy+Pl4+mNdeXX2+fVjc2m65/P+h5Od5+zxdOWvt9PF7OG/Rrj0zrRRrKXWZYu8DeoibgqhjpkQCw1nfMqwKEC2VO+enPphZossFzSywopZQQudSJvFr49zfH9LaJbjWLLnWS7vE34vdwufka278M26lz25Wa9vo+X1xv6efP6Mbxz9ODzZ9ObOF1LLNZKQJC3KxrnorI3i5s1FHPeE1nWLJJLM2Z1N87Gc51NSdMX1cG+Kzumuk0zvU1y1mznnfWMdo0FsFIRBVSi46eeL6uHsyrrM3n5tY0671c3zZ1y1mc+hcerOxz21MXKrrlYszuMS6jF6Fxzuo5e3hF6+f0cU8u9+Lz7+16vlevzdtY7/Hr7t8vbOvR5u3y0+lw4fP3OvluOvL1dOXX0c6s01vnux5/Tyjw659OG+30/mds36nXz9OO+znuXozqWsaNsajYjVUgFghDVzRneTWYKzszVFD6Xm9N6c/Dr1cjlNZAKQ0ims0sQ1m5i2F+NqTyfRTfM1eekm8Q6cZ3PR5/Rwl+fr0cevPDt0l8L3YPJPZyrj3vKPdrwd869MylzN6OU6YsjPROLeLGd5qEsk1kpA1zTfLeLLGbKzLJI1MkuYl1myz08VvQ5dL13LNa645tRclKztKiqghBqBrOicdo6/S+d9nnfN5+/CPLJvT1dOXol5fP+r86Mcu3Lc1z32zefTe68r6nzUm8tTrz+z9fz7/OfK/XflLF566ze56Dy5zo3vGJb4fTnDz+v5+uG/d4saX3ej59zfT4+LWU01mU09W8b653cK6XOtSb52PmaOG+rOq+p6Pk/S4b9N5bxelxtbrFje+O5dlNGoLg1nWTWULm0udQl1DG80WC3Oj6DbpzxapjY82fbI8N9HEiUms0sKSyKRfjjyfRQSQpnQvr8yXry57N+T08rnO+fSl56XbHCPfjzDrz1ix15U3rnY6a5VdZRJz1KuemLMzVswaMSkTeBz1nUTO7nOdc0k1nUhLJV6Y6c+vP08dGo3qOs0ys1GSgupbApLAQpS51zjHXl2jr9r5f1OevD5PR4bJuZt9Po8f0MPT8718MvmWa6zn9P5X3uV8nn/U/jc397+T8/HTNb7Zx24ezLi56t5MbTW8jt4/b9HF+NPP11MzXOXn5/Z5udwsxQFlNTTUyD13N656Ytp15bpN4s83D1+Xhq9Oe5X0PBY+x18/Th09DFl10wN9OPTNus07MajQImiSwNYLUJrGyTULAus6T6mes6456RKkWwIo58vTTxPXzOE1iNSFos+NcvH9HXMpnRM90XXLaMejOl5OvNPD0xOmO2+XTOtY1ZePP02zyOqznoJvnTbCNs2tznosza1nWU1KEzswEznfOzK41m51kzNzUw1LnOk9fnk1rUzvh6jZOuRSShvI0TU1FJARQonLpyzenblo+xqcuWvJ5N53nXP0YW+jzXL6zPXF+b5/T5tzHHtmzpjnqXE66rfPpnU06+M0mpc7xzjteHorP3vg7y82bYvPeaz5+nPDOds3CyAXqx0sxFr2ROmWsbprOk6SWufi9/g56tjF6Mbs9H0Pj+/lr2dPP0576pZb381j2TPTNakOjOiSw1jULm0XIluTUmzNzob59U+oc+vPeW15ukMLBZCywAnD0w82PTY8d9HM+BNZ8v0bGydc2NYzk6WaNSblc7K8vL1eXeOtmjV56zd75aW41Tm6Zs56tOWdjKrMrKlRI1AzUIKYsuZbMmbFxmzpOcs6OPTpipv18Jc7OHrxvUlXUgJQqWllsEIUJSywxlrNvbh2j7GPNMa8S87O++PoOevXjKerwe6Xt8j3+Ozz1NThbg9/1vlfS46+J6OTvHn9PuPnc+/DLjc+ipdY1LcInk9vLN5757jz8vT5ed138/dOF3lctZHXn0rFaO2s9Omc0pZTes6sz4/b5sXlNMaxuDXTEPqdPD7OG+uuWs3vnOo6ejy9pr0ZSOlzqJA1miLDebCXOjNuTSC9/P6rPozU6YzKM0GbTDeSKJWasABNSPzCdfJ9Hl34Ums6jWc6pvl0HXmlsmjPl9nlucdI1NGJb0zTUmJejFS3GatZEubLeZCTU1OXG59U8luPROPXUxj19mfmz7vez84/U9T8t3/QyPjd/p5PL877fxumfAzj1c+nXOtTaXcWUZsLZalgtiyyUSoEqxiM9OXXNu8dK9PP0eLN3w9nmjpefQ675e/L5vqvGLj0bt8PPvx1MceyzLj1l7XDUa8/SP0PwuP1eOvlPP26zd49Do59acljy69XjzL4/f5s3j24dc3WdzcxnUzXXnuzNU675a3OrnqlZOuufSyef0co4WXlvOd6THTj1L6/LvGvob83fjrrrGpbvFl9HXz9pd6xqNY3kubRjVBDWWjJC1C+nz+qz6ObOmI0MyqiwgiZ1KyIl1KgAPy+sZ8f0NyWtZqJvnsuc6q3XGX0cpEmNc9Sb47udMaXTGpbc0smE6558rPQ8jWPRzx3ufPj6nq1n4Wv0XoT833/SaT4Xf61l+f39KOfYqWaMY6coxneKw3kz8b7Xw+uPn3vn0c89P0v5vUs1Osms2pULnUFZLGzOrmyyJbLkvLpyzNbx0WpqxLZeuNbzeXSdo9HbyzLPLtk5a100ebp0rxTrzs816cY7MDefR5idOeJdy5TWJ6c3L3fPOk59dzly7I5xqPB01jnr0Y3necY685dr0rk0Gs61NUNZ1K1049bLy6Yl5TecXGqhNZKlOvq8Pbjv3b8/bnrvkjr18/SXv08/XN3ELpC51ks1AzoQNyB7PJ7LPdK64iwrNJNQy0MrBnQ53cGUEtPysPJ9BcaFxsWQojUbrjtlJ5+3zd8/Trya3n1Xz7jtz6eg8E+567n81v8AT7Z/Oer7XU+V39mjz9HSXK6MayJq5LULFLmjWcUubk4rC8enOxw3nePF8fjw64/UfNdPRnCXpApLCazompUsKkslLCwMYrLdg1vnuyzNO/PvrGuXu8fTB7Ofnl6Tz9NyXkO3TP0Y+V5/f464cttTnLrN9fjRKlolH6z8j+m5a+p+b+fyib5Trn0XmpnpgeL2M3k59TE65TPXl0JjpxNlW749U0NR1506ZubeSXF6c0NVqM8+sjGs3N9Hp8Pfjv2649sXW+epevbz9pdVDWs7jK0ZsKQaQTWDfu8Pvs9kTriKIsKBKJQmdDKjLQxnpD8nm48n0LZDckNMLOucYTo5LOuJbPNrp6uvnen0+mXz9eklm96jO7BrImqJViLsxNQlStctw3z0GaMywsDTIzx78UzFr5nj/Qfiu3Ln05e7rPR6PP19GOU00ixIsJrvzMFBKRZZqQTWY5XO43c2qpL6fJ9GO/PrnGuXP2efLy9+Papz9viNY64ifQ+f6I632Rfg8vp/M3nk68K1cq1rCJNQmuehrFluWkxrOpda561M3eTk64jF3Dnqice3GL159F5dJU3carZdTQOOozdY3CaslbnY8muvI59/P18+vV6fB6eevTM9Jrp049JezHSLrj0NJYNQZbJZAsNfR+d9LWfRLOmQBSEKgILFALlAsPx0zPL7umcSzc589Z9E8fO59nPy3fPeM4ufR38/sO/u83ul79s6zq7tjeZYTpmtXfMakjWNwKMkLZozc7qTGiWjM1SY3g1jVM56ZOHLvwPX+N/R/N9HH4X0/N6fThZes78vR50mbCN9V8/XOYrNsAlFlgmN88s9OfSNGdN6zpJ6vL1j63Ph6Mastl8vP0+RN41Y5zr5TevNrc+0+Z9XneXh+54z4fPvnrnlPR7eevmZOkWyMZ6SJqDK0yiW7xsrN1KCLEgJ5/R583XXjY7SXQxTteXSty5smd5li2JqaL15dZccvT505Z7ccXv24Xh09nbz9sXr15Wa7657jaDWs2OmZozvNEZNS6J9T5f1tZ6DpkCENSUKIsBCywAij8Jxxvn1559fWzwb+j0PndPfuPn6+lo+R5v0fOz4HqK+h7/B9HOu3Tn0zZqdjludIjOiaxszpktzoi7rm1ABKM7yN5aGJsc90xnQRzS+X1868XD3/K6Y+dr6Hg93EOk78pJY1BqDfG7MSUmggBmLx6c4u8bi1dKmkk1m36vX53r53Wnoynn+l5ud+W1jUvj9PLpJnWa17/B1j6+OMxfn8vT5uk25+3F8GPX4rKqrnXM0yNSo5rM3V59Ktx0sY6VZKJIsnm9PlyvXnuXe8XUTULrn0s6M6tzNZklJRRvO49GZxXjNRN+jz+njvlv0c+O+uvP0zfXrltemso6uXQvTGipqJnWS6C/W+T9jeErciiVSWBLABNQlsJUAPx/T0dOfXya+l2j53f36jy9ulXlq0562PN+f/T8NT4n0fl/ST3a5dc62ti8+mS3NWVtOZoudZN5Q0ZNyi5aqa5ai3nusazsxrIzaJZhLhmt/jv1f5Ltz9HXn093LDtxqBM2xevO9DjnUhashFUJLIxi5yvXn1qwrVSyyWL9L5upfo9tY5XrrXbN+X4vsfLs88vbpOF9nHN461z06459DpPRrL5ePV59TjUypK3maMghY59cbl565j0duPHT0ZsM0RnfMeX0+bN6b56Olxuy2Ws6Q7XF0zpuTkslJTWsDryvc82NZjfSejOvTrzfU8vTw49nLOvP6sYPXedjpeejeueje+diyaLc2t/Y+R9jWMq3ECUEsIooAEQShVPDqb4ds66Zq89bjDSsVozQmOg+V5/tfK1PT28Pqy7b5pd61hapGemSVTLUCaGsQusdDObRcDeJqs9Mi4sNY1k3ETPLfM83537/xPVysr2c+uM0yqxKNMSM6SNM6tSiUJm4yznWY30zuhLNWWoCNSPodvFeevf3+LY9Hm3668N6aq64Zy6Z3z02zzj6fq8Xo53z/AC/r/O3M+L1+bUzN2Oe+nIytqY3jLHTMlTeDprn1rWZmtuvMk0s5eX0+fnbrnuXpvj23ncWyLLdbza1jXONTrxyt59A1Knfl0OOPR5o6erxenN7fS+bee/uYu/N083n98jx3Gq1efQ105dC6lglqg7/W+X9PeMjUAAFIBELFJpSVg3iaOFOHaS5NTQl1mlxYy1quSwxjpD5nr14bPo3Gs3ox1WsaLc7TMuxzdDFUxqZOmKrl1glA1TnNwzpkOmExqwxjrg+d8f7XxPbxtPVzZ1laqJBCiZ3FlQSi5siZ1mJz6c8unTn001Lmzbn1rDpyNRYm4lv0flejL28teqXxPT5Ks36+bxeb9J8rN8/Pvrcx6fL0rtPTrN+He/i6Z5dfP0l43rjF25a1NTORSGeuK59Ody2udNbxatySeX2ePFzvG4byrvvj13NZKvTFTeLFzXXLz3WTpENMyu/OzNy6YO/fxenN9f1PgfW4b9Oa474cfX5KbyHbno6XGjVgag9X0vn+/eINQUlQsgLA0IuTWZSWiWQ55muHbG98i1DebzOmYLneTWNYoQvm9Er53ac09nTz6ze0dBZk0mxEJrNLcbrDpyOvPGi53TG9ZMpohk0mkzLzJaPheGvpecOskqSwJQELJVlzolDM1IzEhz3nLXXj20FLntgms/Ujx+X1eIGzWs9T6fox5OWuvPrg8H6v53t5vN28P3M385rz8+0zlrc6dJ3jy+P3dK+Rx9HNMzWMXWc7M3Cms6jV5705N4jpMdCazK7Z59Seb0c482s3N2Wx25q63O9S7ysTUGpiXWN5gzsQrp6vF3zZyuDtzSXp9f5fv56+mzny9Oni9vjqa56N6zou86NRSps9vs8ns3zzU0sZKUFJWSyaM61kubCywRTjrLh2mpCy0uWRbAuS4aIigOfzvqZs8Pp8lPZ04dpbvmjdgslKUlzs563KTOzNyLndJiggrNJmUvj9nw+mPn6l+j52bNEqJQllLECxc7BkhLDOdYi894y315da6Xkr38enbN5uHDKZ1dyXWK315e/N+n8z6nyed9eFPteDr6+V6/menl1GOPq7zfXydY058j0evh7ud+L5vv8AxrPNO/HSZx3jztZLzI6WNLjpzJ056g1zJ147jvjV08DeOd305dNSsbs63N0amrEqoqEM3JI2infhuX0ebtzJrFV34by/Qs68fbXm9HGOOue66XNN659SWUus6Po+nz9+nMKlAsLM6M61CyAAQmkFQ423h257uBpSZsHPrCY6Qw6CY64rTGxz0Ofz/p868nX5/rT1Tn1lrOpdJU3caEujGsBpqudkOmLozlk1qEzdReTeE6/k/wBB+d9XOrn2cmbEqiAzKWWUUJKiAIM51nK43zjp0x9KXwT7W8vlfR8frr1eP6f0/Nr8dr9b+f6T40uvRnP0p7+d5cu3bLl6ZOV69/n8Dv4ca7ry3nc4ennjLp1+l9Llfm/X+b83F/Qfk/03Q/Ief6Pzu+d+XtiXXm9HJOV1g6749ak1o4N9InLWDG8WO+sa2x5vd4cr05bjY03cdLGs6q2WzOs1bLMsWyG+fSs7zZfVjXWPD0zbemOaPr+3432PL0suca8us7NayNdsUvTOjPTl0Pp9+PfpzzUq5zozrcCQuVEoRQsACw82l4drcU1jXI65tM2CWwuNZNSDWZozN4qazs8vzvs+WzGvF6o9FzqXfXz9iAu+WjWd5qR0iS2sN8zSc06crsw3DE1K+V83b38OWdZ7YqUiCkGdiWRaiLBIsWUM43jJz1mOn0vm/Xzff4emsXlwnl6T7+PHrneXh6/S1PJ9X0/Ixfs+JmPVx+Z9/LycPL6us8Po+jwPJ5/R59O/T5/SqnGv1f5z0/ofNr8z9b6vxo79vN6Tw/nPr/M6Ty+3y/oT8/y789zz56c4vTn0qXtI8u+mIxc9K4pI69uHau3k/Yfl83w2U63N3ndzqrvnutFsxnfOXrcbOday57lKsr1+jw+vN5eXrwNdeHolv3fgff4bubOW/D049a6RuN3Oi6zsWWPrdeHTrzl2qwElCUluRNwEBSVBLDlE4dtZU1iwpQuDVlOZsxdQzUKzTXPUrU1k+Xj6vx9Z9nXw+7N7cruVefUGhvkNZ6SmOuC5olzC2QmOvJHPr8/efjevj09/Lyyzplc6RKICEhUXWYLNEmdFmNImdYiY1mL25eqXl7ufrry/S8P1ud5Pr/M5W5+Py6zt9v5P2ebwdfm/X6T432/h9Y9nD6vxS+vHDTpe3KPHy9HDU747drfJ6vFI+h42Dr28fsOWfXyPLjryOfP7Px448vRwM9eeo6/pPzX1c3j4decx1561OU3mL24dD6nTwbl4eT6XzTrrl03HXj0s1cWumsbsnLrzldOXWM53zLc9IpDr7vne+XPj9fgNenFlz9n430eWvdNTh08O8dK3rCOugu8U1c9E+r1576YSKLAoJQsCUASwlQuaOGs9OHaWYGpTWEKgm4M2wzvOiazTGtYNM6NSLOWO0Ph+y+az6O+PWak1I7TFNdMh05aDfOrM2JLiunPVM47c0fD+7+Z7YtY93PlNTWc0QzolkNRITWVssRZSUJnWYmN4lion2/hd836fPl9NfX6vLx89nxvoeHtnzenz/oNPX8X2fK5sfc/PfX6vH5OnNPs4+d6JfZ5sejN7x0y4eX3+OzGdcto6aOWPZzjGuSvb083KNefpz0zHPDnw686lDrm9Sc8ajlULy7conTns6/rfyHSXr8/3+LSdeW0u8as6Q0305aq53hMazJe2bo5WTLWs017fD7pdfO9Xmrrrl2zZ6vJ3zfsS58vTxdvN3t7SajolLqC9M6T6u876c5NS0CULELAWAUlkKmgZrluTz9sWbGdZLjVGdQTpDG7TDWBOuC3IkyEaGWa18z6Ns+b7Pn9T16zZb283aLvno0aMamSWwq5rXPYnLeUn5r7XxPVy3u79OfETeBClMgWCy5hKJYNRDKM1LmJnWSb5/Qzd/X+dvNvbwe48/i7zU831Pmd6+l8X6/zcOPfnnrL24aOnLHol93TxdMP0bn8Xhr73y+n0K/MX0eLtl7vP+rxd/Oxx535uf1PzdT415a7z1ufXN8vzvterD4Pj+x8mzErTfXh3Od3k451nLpw7cS2Uu8jrnV08us6y3TTorUppGOmKxnWZemsai41TFlHfj6pXn+j84no83eNWcs6/Scevn8vTyduPY7a56l3rNOmaN6zpPq6jpi3FrSCwAJaJWSxozqwkQLo88Xh26YkN3nSzfM1rArGhGzXJYM7rKwuNQuNUxrNLi2zn8n7Hj1M9vF6s3veJfTeXeMFLncpmioCxMSU+T8/tPfw3NY2801npiLAUkoyoioiwhCy5hNZlk1kzNZifS+Xrnf1XzHdfLjr9A18P1crPP9/536jF6/O+D+u538NPd4fTjq689Oaai9PPZf2HX8d15X9S/Od5fNz6umZ+o/LXN/Vb/Kd8X9L+f5+OyefvjtOnTh2NfU8GOV7fK/R/Hw+M68+snTG6s3zOWdSOnHrxhefWFFvXlrUzy9PmN6xTtrGtTWsrNSU556YlvTn0GOnOtMbjXfh1l9Ph+l80a52z0YrGvrY8nTz9L149cXtqWXqUqU3rn1T62dTpiCprNNXNKgEFaBmrkhooDzWa8/a5zol59C6wHPrCpSKMNbLjNOnPeSs7OVsLKOdLJi6Pj7+l8fU+ljn2zb247XbpmJvmHSKzqVIuDOs+az4ffh6focXLt5655ud4VKSwXI0lJNZgUzNZLnUlZsiJSc94yxy68s36ns8XrX0+DV08v0/LqT9X8L6/fhrwn5ey5669GfPrv0rx95yl7Xy2r0mJO94eiXvi+nF8ePV5tTn35+yvJegnP0dsvJn2eWuvO9Yx9D43rxfm+T6Hz6WWzqZriXK8u/Ezc7lazKus1O/l7yuPTnsu8arpca1NSkzneJc9OezWs6rnvG4124d5fRw7XN+fO3Dee7El6dvP6OOu/bj14dO++XRd659IXOx24ehPpVz6Y3JaKFzDaaJpRJCy0WWkoijhz3PP2uNBYGsdCZbMW8zW89DFgAtxg65mjnpRLg1lScu+LJ5vTqz4npyPXjl2mu2uQrpTOmU1vmNc7kvyfs/m+2Md+HT2c3LVrz46c9YssqxIskNsU1ILAEWSoubmESM51I58+vLF7/Q+X9FfV4vb4ekrf6fD8x1586SXT0eT1YTj27ZOO+PevOSO/Pr6s3w+z730OV8Xv8Hrxr875vu/I6Y8Xo5Tqer0ff435X1+XxsX735P9B6q/MddcOk58+n1LPn/ABPr8M35mpdTr6fN97L8zOuazN4OayXWbTSw105b1OGtczrcbrepdSxUznWVzojVUzpDXbl0l5dN5HDpixm6l16PN6OevR15d/N06a59C9MdJZ056Hq4emz6GdOmM53CMw1QtxopS3IqUKqVk1lU4xfP3jWTGesM7vM3aJhsTfMa0MbhEmV3nUJvkjpIqXFNyUzjpLL8r6uLPnb4eiPTfPtrskOksJrI1y1kx+e+38f1cbqX0ZmXMzy6Y3lBKqsy5yuQthassRJbJYudZTMslzneIzx68sW/S+V9CX6/zPqeXU3+u/O/Y8+vznh+p8305m5nc9XHl6jy593jjPbn2XzO+kv6n8t+l5a8nn93r5X4vb70OXl+t8Q+Px+x4+k/QfI+j6ud+H6fq8DwY9nUn5v6Xzdzp9D5bbx8/Rx1PNPZ48t9Oe19nxvf5stcizEqALYrdzTXH0+ar15bOusa1LqKzNYC5jesbLjeTXTPKX7Hi5849Pk6Z1BzXp6fL2569nfl283TXTn0h057l0mjfs8fvufVlOmRQDm6AxDqlDQM00kqsiwj/9oADAMBAAIBAwEAACEADCxAZzSSa5Dp9MMs8sNdcNscf88MONPdpDVmgmEEF3333nnH3H3z3nzyTSyTDDwBDxjTwzAwgQKLbw6kEE2EAyEEGDAAAAwjzyywTBDzxwKs/wDfrTDPXDjDDT//AAywwww0+wJJZTAQQcWYQQQQRcQVINSaQAQQcPCANAANJGJEEPioTQAZQTffSSQQSQTPOBIJPNDOONENBtjw73yyx5+4/wAs8POs8MdtdMdADRzwgEAEHUEEEEEEUUEEEQEUGkBTwgDwwDCADgAAAEEWEH3nFH320U13zAHCDzxjiyRhyzgxxeU+/tMMeesvN8fOvffe88eMvQVCikEEEEEEEGX13333UX2UW0EAHSxxDwDTwzQjwzl+83kEUl3FH33lEEGBQBwhjgRDwjigTTTxv+u+MOPfedM8MtcM/P8AT7E0BJkAAFJBNtd9519d9BBhFJBdFBB00MUsw088EBxlJxxBM8/hBBRxBJF54M4McgQUQkIgwkIoc4DDDTznXDf7DbTHP7n/AJ3xwVXfASSXbXXcdQQQYSQQQYQUdbbQRQdaENCIAE8VfXffccM9xbSRRXaYQVDLDHMJHEMHLEEBIFDNMPC8xw2w82zx5/8A+uPPe/esAHmEVXmEEEEEW0EEEEFF2sEHHU0UHU0hSQAEFGFGHFABMfHHX3mmEEWTwyTBiBSygwAARRBxCQBDxjwbxikMFsv/AP7f/wD/APtNsM8/+EEEFX20H2220EFF/I8kEH2EEHnW0hGl101200sMfsEEEFEEV30wADQTwzxgyySQQAgwggSwwRSQyDxhgOcMO+//AP8A/wCutsLP/e/33323332XEsvPOvIbkgGGX0EHHmU13nUAV+9/vMUkEFU33GExhSDRxxizCSSAwwgRwDCQAwBQDzzywKMsdObv9v8A+bDjDD7jjX95h59RBCTjDDDDD19tJRVNZBBAx59tMvHDjDb99t95xVhFMkAYsoYw00oooskYw4UgIIA4A4gU8MMMGHLzTTTXTDrDjNDCDDRzDCzDDBDXPoCDDDF88NpRwsAABAADz/7riQUhh5xhBB99U8cgYc8MMg8Mk8kgcUQIoIAAskcUw8884YkChXAAY0ATjDKjDDXzbDKHLDnvA8MjLLD3788McQxZIvPPDDTzIEElIBBBVt5pIMkEMYA00kogw8YAo8MYUYMEAAAMEY04EIEIsMIAIgE0TeDTzLDDHrfP3P8AwkMEIqz5xwRt/wD88scBP/8AnPDEME8dk89pQggAcMQEQYsgwk04cMAMIEQ4A0Y4ws0AAAkggw8cU4EQAAAM4kjDLD3v/VHCAgGA088YX3zXrnDDzbjPLDDb/VwAw0WrDDLDjEAUwgU8AgIssIQQ0kMEAQkIsgsoM4YIEIAAgUkcQwgAAEAMkgAAwD7zjDAAIQQA04QsInDnrXbfrDTz/wDzyxyDDDCGKwwwwx3PDBMBDHDEPNDDADKKDJHLCOCMMNHNGAFEAEGEPAIECIACEGaABBI4QwyhIAKGKLLACIDgxhKLAz1xww008ksKMPPIgwww1/8Au8PQyAQRABATCTwhABDCRhijCCggAiCCxQhgABDwAwxQgAgAwDDTwAMkCAAAAxzyRARxjzzyzzgxecsOYgwQwQAwBQe8v+NMMMdBAyRADSBCxzDSjQBBQDwgSgTCRDQQzSAAACABDRSxwwCCAxwSAAABACAwTzzwCAATRxzzzzzwADCBbiSACCDSyxcNuMMMd99gQBighCQwAQjxgQxizyTQwQTCATRDiAgDABAAAACRzSwwhBBCwgABCBTzyiCAQADTSDzwxTzyhwQwBxSBCSCiDSs5zz77/P8A0MIAAAEQMAgwkMsQ0sIEUE84g0Mc808oIAAAAAAQkUcsc8M8888AAQAE8sMAIAAQAAAkAIIss4888884sMMcI4044gMw4AAi8Es8sQgIso4ww0sI4M4AQU4EkwUEs0wgMQAEEUUggYs88888888sMMc880IAAAAAAAAAAAgoQooowAQgQ84888MAAAAAAAAEk4A88AAQgwgsEAI8sMgcIAAgsAAY84QAgAwAAAQgAAQU088808so8s88AgIEA0MMIAAIAAoAAAgAAAAAAAAQUAAEAAAAAEIkgEAU04I4MIcc0gAQ8MsogQAEggUM400gQIAcAAAAAAAQM0088s8884wscAAQMA8o4gwIg8IEQAQAAAUgAAAAAIUMsEAAEEs8UVAIUwos0cM0UY4Is4ws88AIg8AQQQs8IYIAAgAIAIAAQ00888M0EwA4IAAAwcY4IAAQAAwkoIAAAU4QMogAAAUMc4sAc88Y8skYQo4I0cIgMoQgIUAc8wgAIkAkwgEYwEoIIQAgEsIAAocsc44kgQYMMEAQY0EAUkc8wQAA0Mc0Q0kQAk8o8ME4088880IAZF4Y0coEI00gQ0MQEsAYogM8EIAQgAAQA00wIoAIAAAAAQAQgIIAAgAU0sw0ooIAQ0gAIEIEw8U4AIgIAgEwQkQoAwwggAAgRl1QM0IUQU8scMcAUQksc4s888oEIQ0ooIA8U4MUgAAAAIAAAAkAAQAAAAAA08Eg88soAwAAQsAAAwAAcAAAgAcEAAAAAwAA1NZgR9YYEgQ4Yg88UIsAoAYckws84gAI4gkAEMcQcAIIAAEAAAAAIQAAQwIEAUQAQowQgAAAgAAAEMIM8sMMAAoMIMoEEMM899JtNFFQI4YEgoYgc00EwAAIIUIcoAAEkggQYgUgggQMAMIAEAAAAAAAAAkMwgAAEEAMgAAAAgMoc8888888sM48k888M8889Zlh3ZMVQJIwMIkEU8UsIA4EIEEUsMAIEAIkIYYQUkgsw0kAQsAAIIAAAE88AEAgAIAAAAEMAc88888wM40ww000wwc88844j5Zt1JtV9ZAMIA4EgsU8sIAQEM888M8s4gA0kEgwgsAUss4wMEAAQEAQAAkIAAAEAAAAAAAAQ88048ggAgwAAIIAQIQwwAggfPFzXDLZxZc9lpQgMAowcggAIY4848o88oIcEg4EckAcIwwok4wAAAgAE8sgAIAkAAEEAAAMcs884AAAAgAAAEQAAwAQkAcsnfnbj7zTNt1JVYMcA0o8cwAQYEU4s88EUsoAQkEAgwAAcA0U88ggAEAQocwMAAAAIAAAAEY88884AAAAAMAcoUQIIAAAAU5ADHbPL/PPnbpBo9Yl08IUEAQMYMscIk0848oQAgAwQAE0sUo8swI8MAAck4oQAAAMMAAIc88808wIAAAAAEc888gwgMAAEMgEDDLHDDPjnHvHj510sMw884kAMAQcI8o0088wQQkQIEI8IAQIMAQQQEIQ0cokAAU8sQ0s8888YQggAAAE488w88IoIM8swAAADDDPPnP7jXHbn3kBVZYcw08ssAQswoU0c8coIQEQgAAMU888AAogAIAQA8AMAA0ss0Q088E40IAAAAM8884AoI8IQwEAEAAAnDLTXT3nvnzbHDbbh9Mg8c40UggQsQEMw88gEQcgcIU4g8s4gIIIAAAgwssAAIQ888sc8888kIAAAAU8c0wAAAUwAo4IAABALDX/AN78y90z108427+GLBNPPAFHOPGPKPLPIIABKJNPPLPPPPPKMNCAFPPPKAABCFPPPPPPAAAAAAAFPKIEAAAMBAAFDAAPBGwwz+67y6y78/4w852/bfPPHAKKKCEPPPKNAEIAFAPPNPKNPHPIAAEBEOHPIAAAEFGNPPJGIAAAAADHPOAAAAAEBAAAQBCFHGw099+w8yw012467y04RZVbCAMKCGHPMAAAABAAABLIFEKIIIAAHAAADDDPCAABABPPPPLGAIAAIHLPOAAAFCDDOAHLHHFNPBy06yzzw5/0044372//AOHD1iCBDQRzChiAAQAAAABwwDzziRQQDBiyAAATTwAAAQjzzzzzzwxCAADzzCgABRzzxzSTzzywzzzsPf8Av7fn/PX/AG17/wBeuvynF1/oDxSRzzAAA2yAwDhxzzTzyAAiDwQiAARyzCAABTzzzzzzhziAAADTziAABzzzxRwzjxzzzzh/eu8OPvvscPf98stvflV1X8997qCzxCggAxzQAxRyygDxCDDACAAAABTwwAAADRzzzzTyBSgAAADTygAADzyBQzjTzzzjzwhNv+OMN/cu98etecf9uOvveuMMfrb47yQgRAARDizxzwAAAAAAAAAAARQzhAABDzzzzxzzDwAAAABzyigAzzzzgADTTizzzyDNPv8A/PTDbnPP3jvHbbvzDjrPv/3H+uCwAQgEEsEQEE8MAAIkGoAgAAAQ8sM8AAA888488EIAAAAA844AA08kQ8QAAc8808oAHP7nPj/7rjvT7rfPXXnjHT3LLjHjf26iWQAIkokA4AAg0kCec/n/ADAAEBKHKIAAMNPPPPAGAAAAEPPACAFKKINBCAMEONPAAM8j/wBeO+8OPMOPN/u/t8et+PccfsP/APiKCIOGkgcwIIM8SMAcqKnZIQAAIUUYAAAAg88MMEQAAAAU88gAA04sAsUsAAQIQQAAijzT3z7P3H33jf8A/wAd8Mcsutcd/wD/AP8A8IILqar54QKABhqsJb7p6LpREAAADyAAAATTywxwAAAARBzzAAABzwgyCRwAAAAAABB74+M/edO9M+P+u99PMMM8OfdN/f8A/wD2ikgtrgrtBGJJqksqDmtBumBAyAAIPghgAAFPPLKCAAAFPOAAABPLCNHPICAAAAAAAAts25+29x84y/1/218/zwyx56519/8A/e8IIYILpIIJSSKqrKYGLPbTCZxAAjIIYIBDjTwRAAAABDzwAAATzxzwLjQAAAAAAQTYq6KI9/uP8sdtMO9+vuMvc9td/wD/AF+/y5x1itsgguCFDtiq8OzXiJHGCQINLggogAHNPLKAAABFHPJAABPPNPAvJAAAAAEFCNBmNhgltv248z7364ywq0c6/wBf9Pv/AP8A38wwhronkiptsLOiWdAgyLgNKGAACgggiAIOPPKACAEPPPAAAFHOHKAKBKAAAAAMAGCEvmmurm+t253yz/8AfuPNsscuvvvW9uMMOvqYII6iEBS6maCVfAs4WCyYgBYIIIIACxzziQAADzzwAAADzzwoIQCiAAABSADgSQxTwSTIIzPovN92tcc8ufKsYkZf+30tMP8AqGCCAuiY9B3zkxstEdMAdgAqCCCCAAU888gAAAU880AAU88UuOIQUAIAAU4AMMYUg0gEw8I4UU4tpB1x5bTH7/D7jb2/ZDDHfCWCouX7ipUqdvs18koEO0iiCCCCAAU88MIAAAA08MAAU44Y+2cEUIAAAUoAc44kcUAw4wY0c815t5VV9pJFDdZhXPbnXfJvjbCG2m0g7ljBbKikw5A4q8SuCCCCAAU88MUIAAU08YAAU884SqoAoAAAM0oAwQgc0YgokQoA48U8FBZ9Vdht5hZ1HjD/AP8AutEuOIrYAoTb0Q2rxou3nlzBiBYoYJIQhBTzzzyAgATSgABSwzx7ogTwBQBDygDTDgAxSjBTCwxyTjzBhUWk2H3TXV0EFO9/8MdesMLaDq39JzRztAQGuiahChYYIoIAAzTzzzj5AjRiAATxiig66gTwAAhDyBCTQRzCwgTTTjwgxxwhw2nkiRDzAhQlkUV+49d2l84rIqOQzQyLx6w4DzYhaLqIIKoAABDDzTzpT4Da4BTxigS6KgDyQgRCCAA2nHVHDCyTyTDDxADQRSgDCDzyACwwwxkNe9edslM7bxyPnl6z4vbj2CAwioZpqIoAABTDzzyhzAJawBTwiDi6qBSggAgBA1FHXUW2mUixghjDSSCARjyzRgRhxTTjwxxEPeN48tezlD6fY/7+9DnM7/Rh6pbIIIIAADzx7zzz6IL6iILaypTqqBigAAAxwNMUnFkUUHWk2iCByiRyjRzzTgjCwgiCDRRh/MP9+9+oK6L0oGyp6sTKaBjxPpaIIIAABRzzzzzr4qKyIIJ75YM88gBQjxTykMPBjVFm0Emm03DziRTDxSTCQBwCDQAxBzRATfvvfvs4LJr9G7QigW+GstJm9J4AIYIgBBzzgBrzoJ54IIL7pIpvrgRADxTR3uOSBUlU0mH0WUlmGlRySxDSzTCihzDBQhjBi2Od9vkTqRBuSXKGxYBVNqp3jYIDIIKIADzzYLoLIL7oIIb64YMfsBAzzTzD88NlhmC2l3kHXnk0Fml1BUR2hQEFEiBCzxwhgWcuW8SOCbMXZ7TED11e77YcppwgAIJALrr6754qJJa6oIb75aMc+C7IbxCzPuOHH12n0EkapFE3XVV032gmFmkFFEUWETyhTACyw44TLH4RQGgAxPc657JeuYSAAIKIIJ766756oJLZ4Jb7JIMfsADZSrw4P8MzDnXXa6YL5J6K5LKmUnU10kEU0XV0X3gTR/CXgJLFdt5qD0zShjOJLLznS7QCAoIAIjb77776oIb74L77JMENdqI7oq5Le8NYq5JaZbo65a57YJIAx1n3WXHV2FW11l3qMY9LIi+WNUnXQXrPMmK5K5Zh7AyAAJKYIJL77776ob774JL668MNPqZ4oYJf/sO6YZI65Jbpbb6Y6a4L5KI1EIYY77232n1udbfqwzYQ030jvfhEjHPL5qZHEKggAIIIKJb77776pb76oKb74sMMPJIIKJLfesML4Y4Ko7ILpIp7q7b6YII4JLraroKGG9f1JTeeOFzndiL+MhGYjts5b5pyggyQgIKKIIKJL776pb74IJL76EMNMqLaoIY9/sM44L7qaAYIYbLoDOaTDK4II6orqYLodk6AIbDEffCgKGal9Csfl3P7JYpYztDqQAIKoIII77r4oJaoIIL76EMNkI46YKL+8sP4ZYbJ56ziN/c9dsPNcvKK4lWjAIJGKrrwZgCBm1/RJeCjNbi0NiZL6Ia5SLpULoIJ4IIJL676LLb5YIP6osMPUrbsY4NXusMJKJZYpbPOPsf/ADLHzLjPD3nbbfPVAgqUs6dQDkNRg0+2OdkSKg+mvCmSigVkd5tKEWyCCW+++OC++iCD+/jPT1iCf6i/V/DDKej3tgKlR/7xFTjfdJtbFLRZJbH3TmLTiEhX0HNRKNRMASbXZ/gaayCSGwEwFHrlCCSCGe++u6Km+uCDW/DXnfjL6qC3/rLDQub/AM27PDoeuU7ntsWXwWOENHOOTawC/Ny53a0HfbJBNFgELrH8Ztlr/soknwHuFXrggkvvvqhiovrigvugx3+wh08yt/3xw6IkgB62SzfGN09FDAtgglqhMhngDDPNKSxT+URTK41nKqKQLIH5R3h7ysntqrGWYNlUhgnvvvokrvuig/wg896U013hi7/04yFNpZDHdfJlrlreFHUGBqklrLUoLC1edteSW3S0QhWLgEalB61P44vklvs2D1ijQIlSiinvvvggsuvggv8A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hUc7Gx97+i832seSOjl46qFM/TErMefvjH9QacysrNR02D6hj9No3KEj02Rwicj9NxLgS6NuTMLoaHiQgLEw8TaCjE6vdkOnbsWJokYPW3tLp4z3jCGEj/PSF+pIfWxMfqNZJGoWGSgUelaeUHQzFxNUrk1k+9ZLfbKL+r4LMLF0DtM1OqHnh8iRAiIReS8CZ0/n6Wr6F9v/2gAMAwEBAgEDAgAAEL/ff3X3/wCXW1MEASAAADzzzzwxgDDzgywCW8qJf64oIoIIIYII4IoIIZIIIIIYIaK4oKQwCAjATDygAjBAxzI7+Na4pIKZ77LDHHX330139lEQACBAjBTjxzzwgADjSzjyywD9tprf44oaoIIILa4IIaIIr4J744YKY4JTgBwQCwjDTyRzxDbIIIbbq4b7IIIhQgFDHH318UAEAQCAAAjzhzDTxwQTTxiSizC/8sNPf7845IJ57777r7767r577YCILa4LCwBywDSwQwwhywIIIoIJLpKIII52z1X2U323l300mACBACQBBwxRzTzygwghDDhxAtotfb77747775oKIIIILIJrpL44IJKIoCwADAyADAAJLII5r4oIYIIJ7773zz33333133330UUEAARARAADzzzzzzwhyQAwTsvaZv8A/wDtvvkoghigggrjnusvsvvrgisikLAAALDCAggjvswkJvjjrnvugmPPPfffbfffbbffafQVCEKHLIBIAPPOEABIAGIOPqgg+ttokogjivvrntnvvnurikkvrmgnggtrDClogogkhiwFOkvvvokhnpAQPLffffbfffbffdWUQSdCKJAEBNPHMAAFHLDGCHP7gkuohnvvvvukvvvvvrolOrjgsvrgtpgknvvvrnvnv/8AzwIIYIJr57pADSTZz3333233333W333m2UEMGGQhjRgAAQACAASiRigAB7776IJL4JJJL764AlDL74JL64IJIYpIKLIJLLTjAQ46q4b7qIIISIJwTDjX3X3333333333X32W0UEEUDSjBAAAQQACTy2wAhAIIIJIoIJILTQwQglEZf54JK4oIJpa4IIcoAAABDLb76rIIIIIIIIIrTRm3Xn333333zzlWzX2EEEFENbyQTEgiQBFjzzywhgAAIZKo4Io1yzzzywwoJLa6rLZoI8IoJLNDjwx6IIJIIIIo7pIIIJIDwnlX13m3X00W3333z2G0UkGHFHvY7QCCiAwjjTzTzXwwpBy0jwT7zjAVfzyxIMPJa4tP/8A+vfQAAEUZhhCKCC+++SCCCCSmiSy89NZ5R9RZtFV91sNp1xxpBBBBNJTw4xFxx9M889g8888Yc18884SBBBW88AEECDjjPGGzQw8sMoO94tW3ue+qWSOCCCCiGCIa3tNZhBNFBh191d99959IBNBFZBhRh11BBxp8zs88c804wgwAwgnFFlbU4w8ONAAAwU4/MAAY0+5x5BqTzC+n3r/AAiggggggggixYcTTWRSSQZfdfefYfKRaYTQYRReZaQQQRefPtvCEAACg8UU8SQQRQuBCFMDDHKFMNPPBAIDHTQbRBACHPO9ywpihgggkggn/wCskFX32HV1230H303z10XFVGG0k2UEEHFnkUElIQAgT12EE10kdNvEgRBKLbDTzwAADDTj/HHHXQxwzzzCMMO464oIIIILKINMMc/X33U122VH9mXz332n30O0E3EkEEnQE3mEZxThfl3kEEVMcOsHPwMEFEICjiwwSQy8E0ssN/zTzSAAAAQ757rq4IKIIIJINNMOMu1210n30UHVm3j3nn0mGHEnW1WkH00kH0jD13331EMNvNcOUEEEUEWGJrTznbHnHn/89/gDAAAxzzi777774IIIKIYtMMMOMf0F3nFlHVlnN33333X0kElGHHk1GGHF32kGV03HkEMNP8sc2GEEEEEH3000EEEEUIMPPMAABRRziCD77777b54oIIIIMPOMMNsuV8n0Xsn0f3X3U1z323nUEFHHWWG1FH201mkEFN8Mf/vMFUEEEEEFWHjH2Gl68N8MdMbOEEOMAgD777777r7aIIIIIIMMMNOvsNOGWGMF9F/WnXmxX1mFGFGEFEEEEH12n3kEHU+N/wDvLHVFBBBRRFBBBBBDTTzj3HLNBBBJJB+/e++e++eyCGiCCCSyDDDnnjHbJzFZB/DXz/8AfXffZYTUQQQQQQQQUccYQQSQ/wD/AP8A/wBstf8ANBNJBRBBlhJqDLDDDDj8thBhEN95+++2u++uuKCCCCCCCzLDz/DbT/bbDHv/AD3/AP8A96R5phBBJBBBJBBBBRBRFzb/AP8AvPPf/wD/APfbTVTSQXfT/v65318n+fbaXfedSbvrrjtvtuvuogggggokg0x3+1165yw6/wD/AP8A/wD7+7UkW0FEUEEFEEEEkUGFP/8Az/DXP/8A/wDs/Xn31/q/3v8A/wD/AP68u/lXn33n1EH76b677brr74oJIKIIIIIMP/NcM8NcNMP/AP8A/wD/AP8Avvf7yQQYQQQQUQQQSS1z/wA8M8ff/wDvDLJY39+//wCww81//vvv4YQcfYQQZasouvrotquvvunrihggggg058072zz253/99/8A/wD/AP8Af0sAkE0EUlEHEkFP/wDvvL3/AA04wwwwQ48864x2053w1g8vhSQQQQSdfevmvvvrutlvvvvtrlgtgkhgg08/+3/x30w8499//wD/AP8A/wD5ZgAEkEU210cdM8v8Nf8AjDDX3rzHyDjDTDTj/eKKCCfV9NNdd11dme2y++6qu++++yy+qeqiCCCCDDHL3HLTfLDjznz/AP8A/wDv7rb9+v8A8bf/AH//AP8A/wDsMfsMMOO+sNN8c9f8/wD3j/f+OOX599999N19++++q6m66+u++++e++y+CCGCCCSDHH/337LDD/jvn/8A/wCccff/APsJIfT3/wD/APv+sPMM8OMP+sd9/wD/AO894w04wvvl8ZcVeeccYfvvprrhinvuuvnvvrnnujvjkggwoh6+223z3224003/AP8A/wD/AN//AP8A/b3/AO//AP8A8wx1/wAtucN//wD/AP3814wwwwwwgkslw2QQwswQQ/utvqFrntunvuluuuhvnvvhihqggw0+xw99w95w812/8wy+/wC/f/8A/wD/AP8A/wCwww6+3/8Af/8A/f7z3DDDDDDDDCCCCCXPPLDDDDFds+++u6+e+++2+++6eiumy++m+iCDDDDTDT/PXXrjHDDHTDHP3/8A/wD/AP8A/wD/APbDHr/7/wD/AN//AP8A/wC8MMMMMMMMIIIIIP8A7DDDHCm/c8+8884+66WG+e+u6+W+mee+iCCCDDDDDH3j7P7nPnD/ANz732xz+/8A/wD/APw0y47/ANv/AP77/wD/ANOMMMMMMMMM+444Kr+9f9/8uNPzzTzzzxT67777q54777ab764oIIIIMIMMNf8AnrbLjzDTD/P7DDf/AP8A/wDv3jDDX/n/AF/z/wD/ALnDDDDDDP7Pez+iWq//AN3/AP8A/wCw0tPOPHHDPDPLvqrnqqrvqvvrtpqgggghwww0551zz/0wx061w1z9w8//AOMscOPd/wDzz7/3jDDDDDDDDfnOe7iCCS/vfz//APohmgABNLPLKLPHNPPtvvthojjvttqgggggwwwwz7z277www94z99/77/8A/wDvLjDT/wD6wk7y0wwwwwwww9//APsYMIIYKsPbMNOM567TjzzzTzzgzTzzz7boqr5boJbq4oIIIMIIIMfe9uOuMNesMMP/AP8A/wD/AP8A/wDsMM9f8sNMu8sMMMMMMMNP/MMMIIIprcIZ7rrr777zzDTxTyxzzyjywyT4Lb5a746p4YIIYIMMMNuu/OMcsMf8NMd/ff8A/wD/AP8ALLjTf3vDDDTjDDDDDDDDTfrDDHSGe+rOfDCW3+3+44888sM800c4884QQG2S++uq+qySiCCDCDDfP/7jPDDDTXDDDDXfP3/rDDDPf/73rDDDDDDDDDDDfTrDDGe+++rz/rDz2eDq4U8Uc8s8s080888M44W2+K+q2WGCqCCDCSKfPf8A61zw2w1yw4w//wD+/wDvHzDz/wDv765ywwwww4wwx384w62vvvrru/8AuP7raqJTizySyjzjxTyzzxhjx7p65pb4YIIIII5bov8Az/8A5+86wy1/33//AOP/AP8A+88wz3/+/wDMMMMMMMMMMN+NMMP/AP8Aqtsqx9o0ooqggvPNLPPOOHPLPLNOOLALHvrvnjigggglpli8/wB/ONNMeNMMdv8A7/PnTf8A/wDstff/AP73DDDDDDDjDDH/AAwwwwtqoggqyiwggksggvPPPPLOPPPPHHHEEKNNMlrvuJNqgkogjnv0hz355544+ww3/wD98Pvf/wD7jTH/AP8A+sIMMMMMMMMMN/8ALDDD++iCCCqjGGCiCCCC88880s888808ss008s2+6uQwwoACCCCW2+3P7nPDjTX/AI737z/3/wD/AP8A6ww0/wD/APLDDDDDDDDDDDv/ACwwx/8A8IIILIKYIIIYIILzzzzyTzzTzziTTzyDzzzzhzjyzAgDAJLLJosuPNMOcf8A/wD/AP8A/wD/AP8A/wD+68w11/7wwwwwwwwwww04/wCMMOv9IIIIIIaaIZIIIIbzzTzzzzjRzyTzziyTTzxzzTDTSiAADwpa57K8ueP/APn/AP7/AP8Ap/7/AP8A/wDvDTjXH/PDDDDDDDDDDPT/AAwwx/yggggnvriggiggr/LPFHOPPPPLPPHJPPLOPMPKNMEEAACBGKJtto65/wB//wD7/TXFTWTGD3//AP14w3//AM8sMMMMMMcvv+8MMN/+sIZ4L76rIsoI5b/zhzzzzyzzyzzxzwRTyzzygQDBAAAABTTzYQAq/r//AP7/AMSfSeadAZt//wDe+sP/AP8A/wB8MMMMMMN//wDrDDD/APygkknqkugkgn0gtuPPHPPPOHGOONLMEPNPOMMEIAAAAAAPHPBCOMPO/P8AsezUmEFUl1m17v8A/wDwx/8Af/ssMMMMMMe/u/MMOfv+IIbJ7rL74oLJb77n2zzRzjzzzxwBzyzzzyyABDAAAAAACTSyxiTRD77rfkw+Xe9ceFFnhzf/APfBd5//AP6wwww87/8A+sMMN/8A7CDWKmqW++qiC++qd9os8c884sMEs8Qks8owgAIIAAAAAAAQ404oEU88wHzFthpNaqvNJf8ADf8A/wDN859/vHLDDDDH/wD7www3/ugg1gvBovvvvv8A7qr33n1zjyzgzzzTzzTzwxiAgCwCAAAgQDRDCjiAzyxoWzX2nP0CQc6ImO7/APLR9tV//jLDDDDH/wC64wx3/ugglgvBkvvvnvvqgrfbeffPPdLPDNMPPPPPQDjCIIAAAAAAIBPGOMPPPKOi4cbfdbZrFl7zeU8/3ffPd+3xwwww8+7wwwwz/wCqIJZb4JJb777764L3233333nxSjzyjTxBjzwzTygAAAAJARjjRRRzzzzfwkUP5zauxvgFNW6APen3zz3/APTjDDDDDfDDDDf++CCW08OCWe+++qaGktdttd59d99s9888c8o408YNENmBAASCwMwY888sEFjrTdW6aJia7XB/WD3F8199/wD6wwwww216www0/qwglkNIgqvtvvqggvNPfXfffdbffefdfONPHJHPALANAAMIQAtOJNPPFFxcFIHUpx73yZJqV7S/SNefff8A+sMMMMMPf8sMML6oIJIBQIIL7776oI7SzTnnnX32X3313hTzzyzzTzzzSwwAAAAADKxzSwTXicVT8ZrtuunRb0nutUHX333/APrDDDDDjXvLDKC+qCCGsUCiW+++yKqa888gIl9d59Vd9Npt4804c880sY8sIgAAAEECc8s8lrO2dDkvfP5KQAYtnr2oA48t73vrDDDDDT/6LCC+qCCKgUSmC+6+uCGe480w0409pdd1l99199+++u+IsY40c0oAAAIgMcw82pgY9lmj9Jn3s0c9I03pU011v/zLDDDDADXKOua6CCC+wUeOC+++uCWOwIs8YsUse+ue1xv91p2++u+/3888008oARQgGW888/0Ub+yaRnHzjTq1+VVsAF9V/wD/AO88MsMAMDYhBKoIILpBzKILrb65pb5J7774r77577547/5//wD77/8A3w+fWdefLAAEICEPnBVPfGZ+/wCwMBZpBJPI/wB4dRd1/wD/AOs8MMNIIICgZ6oIYK5BQ4Jbb776oKZb76747j77p777577/AL+e/wC9/wCefd2O32SwgAAmDjx72mG0Te8VDt5AkwsLv3gH3z3/AP8Aww4AgwgAHAItPAAgKhFDglvvvsogAOtvvvnvtuvnmvtqvkvnqvvrpvpmv+78+fAAAAEFKJVVa68Zkv0HZsZNK0sFaINPPvv64gwwwgAAFEoDPAAAPMNMrgtgqgogNJy3vtvvvvqvvnvuurvvtrvmnvtplv5j/PRQABAMPG8fQLI/nmpGvHdlPQyBaAEOPPv74whvpAgBIIAHPAAAPJFBugvgqiggBE+6tuvvnruuvpnluuvvnqljtvqvvvisrjaYACBBMmzDxbroALIRQHwFPVawPFDPPHf/AMMIAAAABQASBzgAABThQKqIIII4AAQIdKMKLIL77Y7r7b6Jr77rb7p7Ir6JIq7UkABBi90y+/pZEeSpPH5CFXV5V2Bzzzy7wQQAAABQAShABwgAARzjQZDzgIIIAAAIIIIIJ7b33L7b6477r7Z7rr767LJaLKZws0ubW+6GFANfqs939ZzUFl2Jh3jTzzxzzyAAAAAADCwjBSAARTzhBL4AJQIAAAA8OK5r13312233VX35757ra767774J4I75s2/vnEuJQSPZ67Ne6vQEH33wWWjRzTz7zYgAAAAAATgABQAABT7ygQgATRCgAAAnVEXl33X13Fn1033/AP8ArqrugukpmvvujuObpHOZctKNgvsttBLvfeUefdV53IAELGPPLAAAAABOAABFKAAAPPKCAANPPIAABAUTbfcfSafeZfeecfbfffqvaacQampnrv76XBzEa48Dri2rGeiXfCXQWeHneNPBPGPHKAAAAAAKAACHCAAPPPLJPOPHPAAABPQeaVfeXffffefffcfffcZQRQVQXfs9aRyb2hrHG/j6wRMK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" alt="Team Member" class="w-full h-64 object-cover">
                        <div class="p-6">
                            <h4 class="text-xl font-bold text-gray-900">Anika Anower</h4>
                            <p class="text-red-600 font-medium">General Manager</p>
                            <p class="text-gray-600 mt-2">Anika ensures every event runs smoothly through her exceptional organizational skills.</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Stats Section -->
            <div class="mt-20 bg-red-700 text-white rounded-lg p-12">
                <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center">
                    <div>
                        <div class="text-4xl font-extrabold mb-2">25+</div>
                        <div class="text-lg">Years Experience</div>
                    </div>
                    <div>
                        <div class="text-4xl font-extrabold mb-2">5000+</div>
                        <div class="text-lg">Events Managed</div>
                    </div>
                    <div>
                        <div class="text-4xl font-extrabold mb-2">100+</div>
                        <div class="text-lg">Team Members</div>
                    </div>
                    <div>
                        <div class="text-4xl font-extrabold mb-2">98%</div>
                        <div class="text-lg">Client Satisfaction</div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<!-- Custom Events Service Page -->
<main id="custom-events-page">
    <!-- Page Header -->
    <header class="relative h-64 bg-cover bg-center" style="background-image: url('https://images.unsplash.com/photo-1542744095-291d1f67b221?q=80&w=2070');">
        <div class="absolute inset-0 bg-black bg-opacity-60"></div>
        <div class="relative z-10 flex flex-col items-center justify-center h-full text-center text-white px-4">
            <h1 class="text-4xl md:text-5xl font-extrabold">Custom Event Planning</h1>
            <p class="mt-2 text-lg">Home / Services / Custom Events</p>
        </div>
    </header>

    <section>
        <!-- Service Introduction Section -->
        <div class="py-20 bg-gray-50">
            <div class="container mx-auto px-4 grid md:grid-cols-2 gap-12 items-center">
                <div class="order-2 md:order-1">
                    <h2 class="text-3xl md:text-4xl font-extrabold text-gray-900">Excellence in Every Event</h2>
                    <p class="mt-4 text-gray-600 leading-relaxed">
                        We specialize in organizing professional, tailor-made events that elevate your brand's image. Whether it's a large-scale conference, an innovative product launch, or an exclusive seminar, we ensure flawless logistics and execution. Our mission is to craft experiences that drive engagement, reflect your company's excellence, and align with your strategic goals.
                    </p>
                    <p class="mt-4 text-gray-600">Let us manage the details and complexities - so you can focus on your business, your clients, and your success.</p>
                </div>
                <div class="order-1 md:order-2">
                    <img src="https://images.unsplash.com/photo-1556761175-5973dc0f32e7?q=80&w=2232" alt="Professional event setup" class="rounded-lg shadow-xl">
                </div>
            </div>
        </div>

        <!-- What's Included Section -->
        <div class="py-20 bg-white">
            <div class="container mx-auto px-4">
                <div class="text-center">
                    <h2 class="text-3xl font-extrabold text-gray-900">Our Custom Services Include</h2>
                    <p class="mt-2 max-w-2xl mx-auto text-gray-600">End-to-end solutions for any type of events you want us to create.</p>
                </div>

                <div class="mt-12 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    <div class="bg-gray-50 p-6 rounded-lg text-center">
                        <h4 class="text-xl font-bold text-gray-900">Catering & Refreshments</h4>
                    </div>
                    <div class="bg-gray-50 p-6 rounded-lg text-center">
                        <h4 class="text-xl font-bold text-gray-900">Photography</h4>
                    </div>
                    <div class="bg-gray-50 p-6 rounded-lg text-center">
                        <h4 class="text-xl font-bold text-gray-900">Entertainment Facilities</h4>
                    </div>
                    <div class="bg-gray-50 p-6 rounded-lg text-center">
                        <h4 class="text-xl font-bold text-gray-900">Venue Sourcing & Logistics</h4>
                    </div>
                    <div class="bg-gray-50 p-6 rounded-lg text-center">
                        <h4 class="text-xl font-bold text-gray-900">Audio/Visual & Tech Support</h4>
                    </div>
                    <div class="bg-gray-50 p-6 rounded-lg text-center">
                        <h4 class="text-xl font-bold text-gray-900">And many more...</h4>
                    </div>
                </div>
            </div>
        </div>

        <!-- Interactive Cost Estimator Section -->
        <div class="py-20 bg-gray-50">
            <div class="container mx-auto px-4">
                <div class="text-center mb-12">
                    <h2 class="text-3xl font-extrabold text-gray-900">Custom Event Cost Estimator</h2>
                    <p class="mt-2 max-w-2xl mx-auto text-gray-600">Select the services you need and get an instant estimated cost. All prices are customizable based on your specific requirements.</p>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
<!-- Left Column: Service Selection -->
<div class="lg:col-span-2">
    <div class="bg-white p-8 rounded-lg shadow-lg">
        <h3 class="text-2xl font-bold text-gray-900 mb-6">Select Your Services</h3>
        
<!-- Service 1: Catering -->
<div class="mb-8 p-6 border rounded-lg hover:border-red-500 transition duration-300">
    <div class="flex justify-between items-center mb-4">
        <div>
            <h4 class="text-xl font-bold text-gray-900">Catering & Refreshments</h4>
            <p class="text-gray-500 mt-1">Food & Beverage Services</p>
        </div>
        <div class="flex items-center">
            <span class="text-2xl font-bold text-gray-900 mr-4">৳50,000+</span>
            <label class="relative inline-flex items-center cursor-pointer">
                <input type="checkbox" class="sr-only peer service-checkbox" data-service="catering" data-base-price="50000">
                <div class="w-12 h-6 bg-gray-300 rounded-full peer-checked:bg-red-600 transition duration-300 relative"></div>
                <div class="absolute left-1 top-1 bg-white w-4 h-4 rounded-full transition-transform duration-300 transform peer-checked:translate-x-6 z-10"></div>
            </label>
        </div>
    </div>
    <p class="text-gray-600 mb-4">Professional catering services tailored to your event needs and guest preferences.</p>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        <!-- All boxes now have equal height and consistent styling -->
        <div class="flex items-center">
            <input type="radio" id="catering-basic" name="catering-level" value="50000" class="hidden catering-option" data-service="catering">
            <label for="catering-basic" class="catering-option-label flex items-center justify-center cursor-pointer p-4 border rounded-lg w-full hover:border-red-500 h-full min-h-[80px]">
                <div class="text-center">
                    <span class="text-green-500 mr-2">✓</span> Basic Buffet
                    <div class="text-gray-600 text-sm">(৳50,000)</div>
                </div>
            </label>
        </div>
        
        <div class="flex items-center">
            <input type="radio" id="catering-standard" name="catering-level" value="75000" class="hidden catering-option" data-service="catering" checked>
            <label for="catering-standard" class="catering-option-label flex items-center justify-center cursor-pointer p-4 border rounded-lg w-full hover:border-red-500 h-full min-h-[80px]">
                <div class="text-center">
                    <span class="text-green-500 mr-2">✓</span> Standard Buffet
                    <div class="text-gray-600 text-sm">(৳75,000)</div>
                </div>
            </label>
        </div>
        
        <div class="flex items-center">
            <input type="radio" id="catering-premium" name="catering-level" value="120000" class="hidden catering-option" data-service="catering">
            <label for="catering-premium" class="catering-option-label flex items-center justify-center cursor-pointer p-4 border rounded-lg w-full hover:border-red-500 h-full min-h-[80px]">
                <div class="text-center">
                    <span class="text-green-500 mr-2">✓</span> Premium Plated
                    <div class="text-gray-600 text-sm">(৳1,20,000)</div>
                </div>
            </label>
        </div>
    </div>
</div>

<script>
// JavaScript for Catering section functionality
document.addEventListener('DOMContentLoaded', function() {
    // Function to handle catering radio button selection
    function handleCateringSelection(event) {
        const radio = event.target;
        const name = radio.name; // "catering-level"
        
        // Find all catering radio buttons
        const allCateringRadios = document.querySelectorAll('input[name="catering-level"]');
        
        // Remove styling from ALL catering labels
        allCateringRadios.forEach(r => {
            const label = r.nextElementSibling;
            if (label) {
                label.classList.remove('bg-red-50', 'border-red-200');
            }
        });
        
        // Add styling ONLY to the selected catering label
        const selectedLabel = radio.nextElementSibling;
        if (selectedLabel) {
            // Check if catering toggle is ON
            const cateringToggle = document.querySelector('.service-checkbox[data-service="catering"]');
            if (cateringToggle && cateringToggle.checked) {
                selectedLabel.classList.add('bg-red-50', 'border-red-200');
            }
        }
        
        updateTotalPrice();
    }
    
    // Function to update total price
    function updateTotalPrice() {
        let totalPrice = 0;
        
        // Check catering toggle
        const cateringToggle = document.querySelector('.service-checkbox[data-service="catering"]');
        if (cateringToggle && cateringToggle.checked) {
            const selectedCatering = document.querySelector('input[name="catering-level"]:checked');
            if (selectedCatering) {
                totalPrice += parseInt(selectedCatering.value);
            }
        }
        
        console.log('Catering Price: ৳' + totalPrice.toLocaleString());
    }
    
    // Initialize event listeners for catering
    const cateringRadios = document.querySelectorAll('.catering-option');
    cateringRadios.forEach(radio => {
        radio.addEventListener('change', handleCateringSelection);
    });
    
    // Initialize catering toggle event
    const cateringToggle = document.querySelector('.service-checkbox[data-service="catering"]');
    if (cateringToggle) {
        cateringToggle.addEventListener('change', function() {
            const selectedCatering = document.querySelector('input[name="catering-level"]:checked');
            if (selectedCatering && this.checked) {
                const label = selectedCatering.nextElementSibling;
                if (label) {
                    label.classList.add('bg-red-50', 'border-red-200');
                }
            } else if (selectedCatering && !this.checked) {
                const label = selectedCatering.nextElementSibling;
                if (label) {
                    label.classList.remove('bg-red-50', 'border-red-200');
                }
            }
            updateTotalPrice();
        });
    }
    
    // Initialize catering styling on page load
    const defaultCatering = document.querySelector('.catering-option:checked');
    if (defaultCatering) {
        const cateringToggle = document.querySelector('.service-checkbox[data-service="catering"]');
        if (cateringToggle && cateringToggle.checked) {
            const label = defaultCatering.nextElementSibling;
            if (label) {
                label.classList.add('bg-red-50', 'border-red-200');
            }
        }
    }
    
    // Initialize total price
    updateTotalPrice();
});
</script>

<!-- Service 2: Photography -->
<div class="mb-8 p-6 border rounded-lg hover:border-red-500 transition duration-300">
    <div class="flex justify-between items-center mb-4">
        <div>
            <h4 class="text-xl font-bold text-gray-900">Photography & Videography</h4>
            <p class="text-gray-500 mt-1">Photo & Video Services</p>
        </div>
        <div class="flex items-center">
            <span class="text-2xl font-bold text-gray-900 mr-4">৳30,000+</span>
            <label class="relative inline-flex items-center cursor-pointer">
                <input type="checkbox" class="sr-only peer service-checkbox" data-service="photography" data-base-price="30000">
                <div class="w-12 h-6 bg-gray-300 rounded-full peer-checked:bg-red-600 transition duration-300"></div>
                <div class="absolute left-1 top-1 bg-white w-4 h-4 rounded-full transition-transform duration-300 peer-checked:translate-x-6"></div>
            </label>
        </div>
    </div>
    <p class="text-gray-600 mb-4">Professional photography and videography to capture every moment of your event.</p>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        <div class="flex items-center">
            <input type="radio" id="photo-basic" name="photo-level" value="30000" class="hidden photo-option" data-service="photography">
            <label for="photo-basic" class="photo-option-label flex items-center cursor-pointer p-3 border rounded-lg w-full hover:border-red-500">
                <span class="text-green-500 mr-2">✓</span> Basic Package (৳30,000)
            </label>
        </div>
        <div class="flex items-center">
            <input type="radio" id="photo-standard" name="photo-level" value="50000" class="hidden photo-option" data-service="photography" checked>
            <label for="photo-standard" class="photo-option-label flex items-center cursor-pointer p-3 border rounded-lg w-full hover:border-red-500">
                <span class="text-green-500 mr-2">✓</span> Standard Package (৳50,000)
            </label>
        </div>
        <div class="flex items-center">
            <input type="radio" id="photo-premium" name="photo-level" value="80000" class="hidden photo-option" data-service="photography">
            <label for="photo-premium" class="photo-option-label flex items-center cursor-pointer p-3 border rounded-lg w-full hover:border-red-500">
                <span class="text-green-500 mr-2">✓</span> Premium Package (৳80,000)
            </label>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Function to handle radio button selection - FIXED VERSION
    function handleRadioSelection(event) {
        const radio = event.target;
        const name = radio.name; // This will be "photo-level" for photography
        
        // Find all radio buttons in the same group
        const allRadiosInGroup = document.querySelectorAll(`input[name="${name}"]`);
        
        // First, remove styling from ALL labels in this group
        allRadiosInGroup.forEach(r => {
            const label = r.nextElementSibling;
            if (label) {
                label.classList.remove('bg-red-50', 'border-red-200');
            }
        });
        
        // Now add styling ONLY to the selected radio's label
        const selectedLabel = radio.nextElementSibling;
        if (selectedLabel) {
            selectedLabel.classList.add('bg-red-50', 'border-red-200');
        }
        
        updateTotalPrice();
    }
    
    // Function to update total price
    function updateTotalPrice() {
        let totalPrice = 0;
        
        // Check each service toggle
        document.querySelectorAll('.service-checkbox').forEach(toggle => {
            if (toggle.checked) {
                const service = toggle.dataset.service;
                let groupName = '';
                
                if (service === 'catering') groupName = 'catering-level';
                else if (service === 'photography') groupName = 'photo-level';
                else if (service === 'entertainment') groupName = 'entertainment-level';
                
                const selectedOption = document.querySelector(`input[name="${groupName}"]:checked`);
                
                if (selectedOption) {
                    totalPrice += parseInt(selectedOption.value);
                }
            }
        });
        
        // Check additional services
        document.querySelectorAll('.additional-service').forEach(service => {
            if (service.checked) {
                totalPrice += parseInt(service.dataset.price);
            }
        });
        
        // Update display if you have an element for it
        const displayElement = document.getElementById('total-price-display');
        if (displayElement) {
            displayElement.textContent = `৳${totalPrice.toLocaleString()}`;
        }
        
        console.log('Total Price: ৳' + totalPrice.toLocaleString());
    }
    
    // Function to handle toggle changes
    function handleToggleChange() {
        updateTotalPrice();
        
        // Also update radio styling when toggle changes
        const allRadios = document.querySelectorAll('input[type="radio"]');
        allRadios.forEach(radio => {
            if (radio.checked) {
                const label = radio.nextElementSibling;
                if (label) {
                    // Check if the service is toggled ON
                    const service = radio.dataset.service;
                    const toggle = document.querySelector(`.service-checkbox[data-service="${service}"]`);
                    
                    if (toggle && toggle.checked) {
                        label.classList.add('bg-red-50', 'border-red-200');
                    } else {
                        label.classList.remove('bg-red-50', 'border-red-200');
                    }
                }
            }
        });
    }
    
    // Initialize event listeners
    
    // For ALL radio buttons (catering, photography, entertainment)
    const allRadioButtons = document.querySelectorAll('input[type="radio"]');
    allRadioButtons.forEach(radio => {
        radio.addEventListener('change', handleRadioSelection);
    });
    
    // For ALL toggle buttons
    const allToggles = document.querySelectorAll('.service-checkbox, .additional-service');
    allToggles.forEach(toggle => {
        toggle.addEventListener('change', handleToggleChange);
    });
    
    // Initialize styling on page load
    allRadioButtons.forEach(radio => {
        if (radio.checked) {
            // Check if the service is toggled ON
            const service = radio.dataset.service;
            const toggle = document.querySelector(`.service-checkbox[data-service="${service}"]`);
            
            if (!toggle || (toggle && toggle.checked)) {
                const label = radio.nextElementSibling;
                if (label) {
                    label.classList.add('bg-red-50', 'border-red-200');
                }
            }
        }
    });
    
    // Initialize total price
    updateTotalPrice();
});
</script>

        <!-- Service 3: Entertainment -->
        <div class="mb-8 p-6 border rounded-lg hover:border-red-500 transition duration-300">
            <div class="flex justify-between items-center mb-4">
                <div>
                    <h4 class="text-xl font-bold text-gray-900">Entertainment Facilities</h4>
                    <p class="text-gray-500 mt-1">Music & Entertainment</p>
                </div>
                <div class="flex items-center">
                    <span class="text-2xl font-bold text-gray-900 mr-4">৳40,000+</span>
                    <label class="relative inline-flex items-center cursor-pointer">
                        <input type="checkbox" class="sr-only peer service-checkbox" data-service="entertainment" data-base-price="40000">
                        <div class="w-12 h-6 bg-gray-300 rounded-full peer-checked:bg-red-600 transition duration-300"></div>
                        <div class="absolute left-1 top-1 bg-white w-4 h-4 rounded-full transition-transform duration-300 peer-checked:translate-x-6"></div>
                    </label>
                </div>
            </div>
            <p class="text-gray-600 mb-4">Complete entertainment solutions including music, performers, and interactive activities.</p>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div class="flex items-center">
                    <input type="radio" id="entertainment-basic" name="entertainment-level" value="40000" class="hidden entertainment-option" data-service="entertainment">
                    <label for="entertainment-basic" class="entertainment-option-label flex items-center cursor-pointer p-3 border rounded-lg w-full hover:border-red-500">
                        <span class="text-green-500 mr-2">✓</span> DJ Only   (৳40,000)
                    </label>
                </div>
                <div class="flex items-center">
                    <input type="radio" id="entertainment-standard" name="entertainment-level" value="60000" class="hidden entertainment-option" data-service="entertainment" checked>
                    <label for="entertainment-standard" class="entertainment-option-label flex items-center cursor-pointer p-3 border rounded-lg w-full hover:border-red-500 bg-red-50 border-red-200">
                        <span class="text-green-500 mr-2">✓</span> DJ + Sound (৳60,000)
                    </label>
                </div>
                <div class="flex items-center">
                    <input type="radio" id="entertainment-premium" name="entertainment-level" value="100000" class="hidden entertainment-option" data-service="entertainment">
                    <label for="entertainment-premium" class="entertainment-option-label flex items-center cursor-pointer p-3 border rounded-lg w-full hover:border-red-500">
                        <span class="text-green-500 mr-2">✓</span> Full Entertainment (৳1,00,000)
                    </label>
                </div>
            </div>
        </div>

        <!-- Additional Services -->
        <div class="p-6 border rounded-lg">
            <h4 class="text-xl font-bold text-gray-900 mb-4">Additional Services</h4>
            <div class="space-y-4">
                <!-- Venue Sourcing -->
                <div class="flex justify-between items-center">
                    <div>
                        <span class="font-medium text-gray-900">Venue Sourcing & Logistics</span>
                        <p class="text-gray-500 text-sm">We find and manage the perfect venue</p>
                    </div>
                    <div class="flex items-center">
                        <span class="text-xl font-bold text-gray-900 mr-4">৳25,000</span>
                        <label class="relative inline-flex items-center cursor-pointer">
                            <input type="checkbox" class="sr-only peer additional-service" data-service="venue" data-price="25000">
                            <div class="w-12 h-6 bg-gray-300 rounded-full peer-checked:bg-red-600 transition duration-300"></div>
                            <div class="absolute left-1 top-1 bg-white w-4 h-4 rounded-full transition-transform duration-300 peer-checked:translate-x-6"></div>
                        </label>
                    </div>
                </div>
                
                <!-- Audio/Visual -->
                <div class="flex justify-between items-center">
                    <div>
                        <span class="font-medium text-gray-900">Audio/Visual & Tech Support</span>
                        <p class="text-gray-500 text-sm">Professional sound and lighting systems</p>
                    </div>
                    <div class="flex items-center">
                        <span class="text-xl font-bold text-gray-900 mr-4">৳35,000</span>
                        <label class="relative inline-flex items-center cursor-pointer">
                            <input type="checkbox" class="sr-only peer additional-service" data-service="av" data-price="35000" checked>
                            <div class="w-12 h-6 bg-gray-300 rounded-full peer-checked:bg-red-600 transition duration-300"></div>
                            <div class="absolute left-1 top-1 bg-white w-4 h-4 rounded-full transition-transform duration-300 peer-checked:translate-x-6"></div>
                        </label>
                    </div>
                </div>
                
                <!-- Event Coordination -->
                <div class="flex justify-between items-center">
                    <div>
                        <span class="font-medium text-gray-900">Event Coordination & Management</span>
                        <p class="text-gray-500 text-sm">Full event planning and day-of coordination</p>
                    </div>
                    <div class="flex items-center">
                        <span class="text-xl font-bold text-gray-900 mr-4">৳45,000</span>
                        <label class="relative inline-flex items-center cursor-pointer">
                            <input type="checkbox" class="sr-only peer additional-service" data-service="coordination" data-price="45000">
                            <div class="w-12 h-6 bg-gray-300 rounded-full peer-checked:bg-red-600 transition duration-300"></div>
                            <div class="absolute left-1 top-1 bg-white w-4 h-4 rounded-full transition-transform duration-300 peer-checked:translate-x-6"></div>
                        </label>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- JavaScript for toggle functionality -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Initialize all checkboxes and radio buttons
    const serviceCheckboxes = document.querySelectorAll('.service-checkbox');
    const additionalServices = document.querySelectorAll('.additional-service');
    
    // Handle service option changes
    function handleOptionChange(option) {
        const serviceName = option.dataset.service;
        const optionType = option.classList.contains('catering-option') ? 'catering' : 
                          option.classList.contains('photo-option') ? 'photography' : 
                          option.classList.contains('entertainment-option') ? 'entertainment' : '';
        
        if (optionType) {
            // Update visual selection for all options of this type
            const labels = document.querySelectorAll(`.${optionType}-option-label`);
            labels.forEach(label => {
                label.classList.remove('bg-red-50', 'border-red-200');
            });
            
            // Add styling to selected option
            const selectedLabel = option.nextElementSibling;
            if (selectedLabel) {
                selectedLabel.classList.add('bg-red-50', 'border-red-200');
            }
        }
    }
    
    // Initialize event listeners for all option types
    const allOptions = document.querySelectorAll('.catering-option, .photo-option, .entertainment-option');
    allOptions.forEach(option => {
        option.addEventListener('change', function() {
            handleOptionChange(this);
        });
    });
    
    // Initialize the visual state for pre-selected options
    const preSelectedOptions = document.querySelectorAll('input[type="radio"]:checked');
    preSelectedOptions.forEach(option => {
        handleOptionChange(option);
    });
});
</script>

                    <!-- Right Column: Cost Summary -->
                    <div>
                        <div class="bg-white p-8 rounded-lg shadow-lg sticky top-24">
                            <h3 class="text-2xl font-bold text-gray-900 mb-6">Estimated Cost Summary</h3>
                            
                            <!-- Selected Services List -->
                            <div class="mb-6">
                                <h4 class="font-bold text-gray-900 mb-4">Selected Services</h4>
                                <div id="selected-services" class="space-y-3">
                                    <!-- Services will be dynamically added here -->
                                    <div class="text-gray-600 text-sm italic">No services selected yet</div>
                                </div>
                            </div>
                            
                            <!-- Cost Breakdown -->
                            <div class="mb-6">
                                <h4 class="font-bold text-gray-900 mb-4">Cost Breakdown</h4>
                                <div class="space-y-2">
                                    <div class="flex justify-between">
                                        <span class="text-gray-600">Base Services</span>
                                        <span class="font-medium" id="base-cost">৳0</span>
                                    </div>
                                    <div class="flex justify-between">
                                        <span class="text-gray-600">Additional Services</span>
                                        <span class="font-medium" id="additional-cost">৳0</span>
                                    </div>
                                    <div class="border-t pt-2 mt-2">
                                        <div class="flex justify-between">
                                            <span class="font-bold text-gray-900">Subtotal</span>
                                            <span class="font-bold" id="subtotal">৳0</span>
                                        </div>
                                        <div class="flex justify-between mt-1">
                                            <span class="text-gray-600">VAT (15%)</span>
                                            <span class="font-medium" id="vat">৳0</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Total Cost -->
                            <div class="bg-red-50 p-4 rounded-lg mb-6">
                                <div class="flex justify-between items-center">
                                    <div>
                                        <h4 class="font-bold text-gray-900">Estimated Total</h4>
                                        <p class="text-gray-500 text-sm">All prices are estimates</p>
                                    </div>
                                    <div class="text-right">
                                        <div class="text-3xl font-extrabold text-red-600" id="total-cost">৳0</div>
                                        <p class="text-gray-500 text-sm">Excluding venue rental</p>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Action Buttons -->
                            <div class="space-y-3">
                                <button onclick="generateEstimate()" class="w-full bg-red-600 text-white font-bold py-3 px-6 rounded-lg hover:bg-red-700 transition duration-300 flex items-center justify-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M6 2a2 2 0 00-2 2v12a2 2 0 002 2h8a2 2 0 002-2V7.414A2 2 0 0015.414 6L12 2.586A2 2 0 0010.586 2H6zm5 6a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V8z" clip-rule="evenodd" />
                                    </svg>
                                    Generate Detailed Estimate
                                </button>
                                <button onclick="showPage('contact-page')" class="w-full bg-gray-800 text-white font-bold py-3 px-6 rounded-lg hover:bg-gray-900 transition duration-300">
                                    Request Custom Quote
                                </button>
                                <button onclick="resetEstimator()" class="w-full text-gray-600 hover:text-red-600 font-medium py-2">
                                    Reset Selection
                                </button>
                            </div>
                            
                            <!-- Disclaimer -->
                            <div class="mt-6 pt-6 border-t">
                                <p class="text-gray-500 text-xs">
                                    <strong>Note:</strong> This is an estimated cost. Final pricing will be confirmed after consultation and may vary based on specific requirements, guest count, and event duration. All prices are in Bangladeshi Taka (৳).
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Mini Gallery Section -->
        <div class="py-20 bg-white">
            <div class="container mx-auto px-4">
                <div class="text-center mb-12">
                     <h2 class="text-3xl font-extrabold text-gray-900">A Look at Our Custom Work</h2>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                    <div class="group overflow-hidden rounded-lg shadow-lg h-80">
                        <img src="https://images.unsplash.com/photo-1543269865-cbf427effbad?q=80&w=2070" alt="Custom event setup" class="w-full h-full object-cover transform transition-transform duration-300 group-hover:scale-110">
                    </div>
                    <div class="group overflow-hidden rounded-lg shadow-lg h-80">
                        <img src="https://images.unsplash.com/photo-1528605248644-14dd04022da1?q=80&w=2070" alt="Custom event catering" class="w-full h-full object-cover transform transition-transform duration-300 group-hover:scale-110">
                    </div>
                    <div class="group overflow-hidden rounded-lg shadow-lg h-80">
                         <img src="https://ae01.alicdn.com/kf/Sa5861fc7c3ee4cf897304261fdf6eff7I.png" alt="Custom event entertainment" class="w-full h-full object-cover transform transition-transform duration-300 group-hover:scale-110">
                    </div>
                </div>
            </div>
        </div>

        <!-- Call to Action Section -->
        <div class="bg-red-700 text-white">
            <div class="container mx-auto px-4 py-16 text-center">
                <h2 class="text-3xl font-bold">Let's Create Your Perfect Custom Event!</h2>
                <p class="mt-2 max-w-2xl mx-auto">Contact us to discuss your requirements and receive a detailed proposal tailored to your needs.</p>
                <a href="#" onclick="showPage('contact-page')" class="mt-6 inline-block bg-white text-red-700 font-bold py-3 px-8 rounded-full hover:bg-gray-200 transition duration-300">
                    Get a Custom Proposal
                </a>
            </div>
        </div>
    </section>
</main>

<!-- Add this JavaScript after your existing scripts -->
<script>
// Cost Estimator JavaScript
let selectedServices = {
    catering: { selected: false, price: 0 },
    photography: { selected: true, price: 30000 },
    entertainment: { selected: false, price: 0 },
    additional: {
        venue: false,
        av: true,
        coordination: false
    }
};

// Format currency in Bangladeshi Taka
function formatCurrency(amount) {
    return '৳' + amount.toLocaleString('en-IN');
}

// Update cost summary
function updateCostSummary() {
    let baseCost = 0;
    let additionalCost = 0;
    let selectedItems = [];
    
    // Calculate base services
    if (selectedServices.catering.selected) {
        baseCost += selectedServices.catering.price;
        selectedItems.push({
            name: 'Catering & Refreshments',
            price: selectedServices.catering.price
        });
    }
    
    if (selectedServices.photography.selected) {
        baseCost += selectedServices.photography.price;
        selectedItems.push({
            name: 'Photography & Videography',
            price: selectedServices.photography.price
        });
    }
    
    if (selectedServices.entertainment.selected) {
        baseCost += selectedServices.entertainment.price;
        selectedItems.push({
            name: 'Entertainment Facilities',
            price: selectedServices.entertainment.price
        });
    }
    
    // Calculate additional services
    const additionalPrices = {
        venue: 25000,
        av: 35000,
        coordination: 45000
    };
    
    for (const [service, isSelected] of Object.entries(selectedServices.additional)) {
        if (isSelected) {
            additionalCost += additionalPrices[service];
            selectedItems.push({
                name: service === 'venue' ? 'Venue Sourcing' : 
                      service === 'av' ? 'A/V Tech Support' : 'Event Coordination',
                price: additionalPrices[service]
            });
        }
    }
    
    const subtotal = baseCost + additionalCost;
    const vat = subtotal * 0.15; // 15% VAT
    const total = subtotal + vat;
    
    // Update UI
    document.getElementById('base-cost').textContent = formatCurrency(baseCost);
    document.getElementById('additional-cost').textContent = formatCurrency(additionalCost);
    document.getElementById('subtotal').textContent = formatCurrency(subtotal);
    document.getElementById('vat').textContent = formatCurrency(vat);
    document.getElementById('total-cost').textContent = formatCurrency(total);
    
    // Update selected services list
    const servicesList = document.getElementById('selected-services');
    servicesList.innerHTML = '';
    
    if (selectedItems.length === 0) {
        servicesList.innerHTML = '<div class="text-gray-600 text-sm italic">No services selected yet</div>';
    } else {
        selectedItems.forEach(item => {
            const serviceDiv = document.createElement('div');
            serviceDiv.className = 'flex justify-between items-center';
            serviceDiv.innerHTML = `
                <span class="text-gray-700">${item.name}</span>
                <span class="font-medium">${formatCurrency(item.price)}</span>
            `;
            servicesList.appendChild(serviceDiv);
        });
    }
}

// Initialize event listeners
document.addEventListener('DOMContentLoaded', function() {
    // Toggle switches for main services
    document.querySelectorAll('.service-checkbox').forEach(checkbox => {
        checkbox.addEventListener('change', function() {
            const service = this.dataset.service;
            selectedServices[service].selected = this.checked;
            
            // If turning off, reset price to base
            if (!this.checked) {
                selectedServices[service].price = parseInt(this.dataset.basePrice);
            }
            
            updateCostSummary();
        });
    });
    
    
    // Radio buttons for service levels
    document.querySelectorAll('.catering-option').forEach(radio => {
        radio.addEventListener('change', function() {
            if (this.checked) {
                selectedServices.catering.price = parseInt(this.value);
                updateCostSummary();
            }
        });
    });
    
    document.querySelectorAll('.photo-option').forEach(radio => {
        radio.addEventListener('change', function() {
            if (this.checked) {
                selectedServices.photography.price = parseInt(this.value);
                updateCostSummary();
            }
        });
    });
    
    document.querySelectorAll('.entertainment-option').forEach(radio => {
        radio.addEventListener('change', function() {
            if (this.checked) {
                selectedServices.entertainment.price = parseInt(this.value);
                updateCostSummary();
            }
        });
    });
    
    // Additional services checkboxes
    document.querySelectorAll('.additional-service').forEach(checkbox => {
        checkbox.addEventListener('change', function() {
            const service = this.dataset.service;
            selectedServices.additional[service] = this.checked;
            updateCostSummary();
        });
    });
    
    // Initialize with default values
    updateCostSummary();
});

// Generate detailed estimate
function generateEstimate() {
    const total = parseFloat(document.getElementById('total-cost').textContent.replace(/[^0-9.-]+/g, ""));
    
    if (total === 0) {
        alert('Please select at least one service to generate an estimate.');
        return;
    }
    
    // Create a summary of selected services
    let summary = "Custom Event Estimate Summary\n\n";
    summary += "Selected Services:\n";
    
    document.querySelectorAll('#selected-services > div').forEach(item => {
        if (!item.classList.contains('italic')) {
            const name = item.querySelector('span:first-child').textContent;
            const price = item.querySelector('span:last-child').textContent;
            summary += `- ${name}: ${price}\n`;
        }
    });
    
    summary += "\nCost Breakdown:\n";
    summary += `Base Services: ${document.getElementById('base-cost').textContent}\n`;
    summary += `Additional Services: ${document.getElementById('additional-cost').textContent}\n`;
    summary += `Subtotal: ${document.getElementById('subtotal').textContent}\n`;
    summary += `VAT (15%): ${document.getElementById('vat').textContent}\n`;
    summary += `Estimated Total: ${document.getElementById('total-cost').textContent}\n\n`;
    summary += "Note: This is an estimate. Final pricing will be confirmed after consultation.\n";
    summary += "Contact us for a detailed quote: info@eventplanner.com | +880 1234 56789";
    
    // Create downloadable text file
    const blob = new Blob([summary], { type: 'text/plain' });
    const url = window.URL.createObjectURL(blob);
    const a = document.createElement('a');
    a.href = url;
    a.download = 'event-estimate-' + new Date().toISOString().split('T')[0] + '.txt';
    document.body.appendChild(a);
    a.click();
    document.body.removeChild(a);
    window.URL.revokeObjectURL(url);
    
    // Show success message
    alert('Your estimate has been generated! A text file will be downloaded. We recommend contacting us for a detailed consultation.');
}

// Reset estimator
function resetEstimator() {
    if (confirm('Are you sure you want to reset all selections?')) {
        // Reset checkboxes
        document.querySelectorAll('.service-checkbox').forEach(checkbox => {
            checkbox.checked = false;
            const service = checkbox.dataset.service;
            selectedServices[service].selected = false;
            selectedServices[service].price = parseInt(checkbox.dataset.basePrice);
        });
        
        // Reset additional services
        document.querySelectorAll('.additional-service').forEach(checkbox => {
            checkbox.checked = false;
            const service = checkbox.dataset.service;
            selectedServices.additional[service] = false;
        });
        
        // Reset radio buttons to first option
        document.querySelectorAll('[name="catering-level"]')[0].checked = true;
        document.querySelectorAll('[name="photo-level"]')[0].checked = true;
        document.querySelectorAll('[name="entertainment-level"]')[0].checked = true;
        
        // Update UI
        updateCostSummary();
        
        // Reset toggle switch visuals
        document.querySelectorAll('.service-checkbox').forEach(checkbox => {
            const toggleDiv = checkbox.nextElementSibling;
            const dot = toggleDiv.nextElementSibling;
            toggleDiv.classList.remove('bg-red-600');
            toggleDiv.classList.add('bg-gray-300');
            dot.style.transform = 'translateX(0)';
        });
        
        alert('All selections have been reset.');
    }
}
</script>

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
                    <li><a href="#" onclick="showPage('custom-events-page')" class="hover:text-red-500">Custom Events</a></li>
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

<!-- Replace your existing floating chat code with this updated version -->

<!-- Floating Chat Widget -->
<div id="chat-widget" class="fixed bottom-5 right-5 z-50">
    <!-- Chat Toggle Button -->
    <button id="chat-toggle" class="bg-red-600 text-white rounded-full p-4 shadow-lg hover:bg-red-700 transition duration-300 relative">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z" />
        </svg>
        <!-- Unread badge -->
        <span id="unread-badge" class="hidden absolute -top-1 -right-1 bg-red-500 text-white text-xs rounded-full h-5 w-5 flex items-center justify-center">0</span>
    </button>

    <!-- Chat Window -->
    <div id="chat-window" class="hidden absolute bottom-16 right-0 w-80 md:w-96 bg-white rounded-lg shadow-xl border border-red-100">
        <!-- Chat Header -->
        <div class="bg-red-600 text-white p-4 rounded-t-lg flex justify-between items-center">
            <div class="flex items-center">
                <div class="bg-white text-red-600 rounded-full p-2 mr-3">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                </div>
                <div>
                    <h3 class="font-bold">Event Planner Support</h3>
                    <p class="text-xs opacity-80" id="agent-status">Checking status...</p>
                </div>
            </div>
            <button id="chat-close" class="text-white hover:text-red-200">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>

        <!-- Chat Messages Container -->
        <div id="chat-messages" class="h-80 overflow-y-auto p-4 bg-gray-50">
            <!-- Messages will be loaded here -->
            <div class="text-center py-4">
                <div class="inline-block animate-spin rounded-full h-8 w-8 border-t-2 border-b-2 border-red-600"></div>
                <p class="text-gray-500 mt-2">Loading messages...</p>
            </div>
        </div>

        <!-- Typing Indicator -->
        <div id="typing-indicator" class="hidden px-4 pb-2">
            <div class="flex items-center">
                <div class="bg-red-100 text-red-800 rounded-full p-2 mr-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                </div>
                <div class="bg-red-50 rounded-lg p-3">
                    <div class="flex space-x-1">
                        <div class="w-2 h-2 bg-red-400 rounded-full animate-pulse"></div>
                        <div class="w-2 h-2 bg-red-400 rounded-full animate-pulse delay-75"></div>
                        <div class="w-2 h-2 bg-red-400 rounded-full animate-pulse delay-150"></div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Chat Input -->
        <div class="p-4 border-t border-red-100">
            <form id="chat-form" class="flex space-x-2">
                <input 
                    type="text" 
                    id="chat-input" 
                    placeholder="Type your message..." 
                    class="flex-1 border border-red-200 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent"
                    autocomplete="off"
                    <?php if (!$is_logged_in): ?>
                        placeholder="Please login to chat..."
                        disabled
                    <?php endif; ?>
                >
                <button 
                    type="submit" 
                    class="bg-red-600 text-white rounded-lg px-4 py-2 hover:bg-red-700 transition duration-300 disabled:bg-red-300"
                    <?php if (!$is_logged_in): ?>disabled<?php endif; ?>
                >
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8" />
                    </svg>
                </button>
            </form>
            <p class="text-xs text-gray-500 mt-2 text-center">
                <?php if ($is_logged_in): ?>
                    Our agents typically reply within 5 minutes
                <?php else: ?>
                    <a href="#" onclick="showPage('login-page')" class="text-red-600 hover:underline">Login</a> to start chatting
                <?php endif; ?>
            </p>
        </div>
    </div>
</div>

<style>
    /* Custom scrollbar for chat */
    #chat-messages::-webkit-scrollbar {
        width: 6px;
    }
    
    #chat-messages::-webkit-scrollbar-track {
        background: #f1f1f1;
        border-radius: 10px;
    }
    
    #chat-messages::-webkit-scrollbar-thumb {
        background: #dc2626;
        border-radius: 10px;
    }
    
    #chat-messages::-webkit-scrollbar-thumb:hover {
        background: #b91c1c;
    }
    
    /* Smooth animations */
    .message-enter {
        animation: slideIn 0.3s ease-out;
    }
    
    @keyframes slideIn {
        from {
            opacity: 0;
            transform: translateY(10px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    
    /* Typing animation */
    @keyframes typing {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-5px); }
    }
</style>

<script>
// Chat System JavaScript with MySQL Integration
document.addEventListener('DOMContentLoaded', function() {
    const chatToggle = document.getElementById('chat-toggle');
    const chatWindow = document.getElementById('chat-window');
    const chatClose = document.getElementById('chat-close');
    const chatForm = document.getElementById('chat-form');
    const chatInput = document.getElementById('chat-input');
    const chatMessages = document.getElementById('chat-messages');
    const typingIndicator = document.getElementById('typing-indicator');
    const unreadBadge = document.getElementById('unread-badge');
    const agentStatus = document.getElementById('agent-status');
    
    let isChatOpen = false;
    let lastMessageId = 0;
    let messagePolling = null;
    let unreadCount = 0;
    
    // Check if user is logged in
    const isLoggedIn = <?php echo $is_logged_in ? 'true' : 'false'; ?>;
    
    // Initialize chat
    if (isLoggedIn) {
        checkAgentStatus();
        loadMessages();
        startPolling();
    }
    
    // Toggle chat window
    chatToggle.addEventListener('click', function() {
        isChatOpen = !isChatOpen;
        chatWindow.classList.toggle('hidden', !isChatOpen);
        chatToggle.classList.toggle('bg-red-700', isChatOpen);
        
        if (isChatOpen) {
            markMessagesAsRead();
        }
    });
    
    // Close chat window
    chatClose.addEventListener('click', function() {
        isChatOpen = false;
        chatWindow.classList.add('hidden');
        chatToggle.classList.remove('bg-red-700');
    });
    
    // Handle form submission
    chatForm.addEventListener('submit', async function(e) {
        e.preventDefault();
        const message = chatInput.value.trim();
        
        if (!message || !isLoggedIn) return;
        
        // Add user message immediately
        addMessage(message, 'user', 'You');
        chatInput.value = '';
        
        // Show typing indicator
        typingIndicator.classList.remove('hidden');
        
        try {
            // Save message to database
            const response = await fetch('chat_api.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: `action=send_message&message=${encodeURIComponent(message)}`
            });
            
            const data = await response.json();
            
            if (data.success) {
                // Hide typing indicator
                typingIndicator.classList.add('hidden');
                
                // Simulate agent response (for demo)
                // In production, you would have agents respond via admin panel
                setTimeout(() => {
                    simulateAgentResponse(message);
                }, 2000);
            }
        } catch (error) {
            console.error('Error sending message:', error);
            typingIndicator.classList.add('hidden');
        }
    });
    
    // Load messages from database
    async function loadMessages() {
        try {
            const response = await fetch(`chat_api.php?action=get_messages&last_id=${lastMessageId}`);
            const data = await response.json();
            
            if (data.success && data.messages.length > 0) {
                // Clear loading indicator
                if (chatMessages.querySelector('.text-center')) {
                    chatMessages.innerHTML = '';
                }
                
                // Add messages
                data.messages.forEach(msg => {
                    if (msg.id > lastMessageId) {
                        addMessage(msg.message, msg.message_type, msg.user_name, msg.created_at, false);
                        lastMessageId = msg.id;
                    }
                });
                
                // Scroll to bottom
                chatMessages.scrollTop = chatMessages.scrollHeight;
                
                // Update unread count
                updateUnreadCount();
            }
        } catch (error) {
            console.error('Error loading messages:', error);
        }
    }
    
    // Check agent status
    async function checkAgentStatus() {
        try {
            const response = await fetch('chat_api.php?action=get_agent_status');
            const data = await response.json();
            
            if (data.online) {
                agentStatus.innerHTML = `${data.online_count} agent(s) online`;
                agentStatus.className = "text-xs opacity-80 text-green-300";
            } else {
                agentStatus.innerHTML = 'Agents offline - email us instead';
                agentStatus.className = "text-xs opacity-80 text-yellow-300";
            }
        } catch (error) {
            console.error('Error checking agent status:', error);
        }
    }
    
    // Mark messages as read
    async function markMessagesAsRead() {
        const unreadElements = chatMessages.querySelectorAll('.message-enter:not(.read)');
        const messageIds = [];
        
        unreadElements.forEach(element => {
            if (element.dataset.messageType === 'agent') {
                messageIds.push(element.dataset.messageId);
                element.classList.add('read');
            }
        });
        
        if (messageIds.length > 0) {
            try {
                await fetch('chat_api.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded',
                    },
                    body: `action=mark_as_read&message_ids=${JSON.stringify(messageIds)}`
                });
                
                // Reset unread count
                unreadCount = 0;
                updateUnreadBadge();
            } catch (error) {
                console.error('Error marking messages as read:', error);
            }
        }
    }
    
    // Add message to chat
    function addMessage(text, sender, userName = 'Guest', timestamp = 'Just now', isNew = true) {
        const messageDiv = document.createElement('div');
        messageDiv.className = 'mb-4 message-enter';
        if (isNew && sender === 'agent') {
            messageDiv.classList.add('unread');
        }
        messageDiv.dataset.messageType = sender;
        
        const timeDisplay = timestamp || 'Just now';
        
        if (sender === 'user') {
            messageDiv.innerHTML = `
                <div class="flex items-start justify-end mb-2">
                    <div class="bg-red-600 text-white rounded-lg p-3 max-w-[80%]">
                        <p class="text-sm">${escapeHtml(text)}</p>
                        <span class="text-xs text-red-200 mt-1 block">${userName} • ${timeDisplay}</span>
                    </div>
                    <div class="bg-red-600 text-white rounded-full p-2 ml-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                    </div>
                </div>
            `;
        } else {
            messageDiv.innerHTML = `
                <div class="flex items-start mb-2">
                    <div class="bg-red-100 text-red-800 rounded-full p-2 mr-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                    </div>
                    <div class="bg-red-50 rounded-lg p-3 max-w-[80%]">
                        <p class="text-sm">${escapeHtml(text)}</p>
                        <span class="text-xs text-gray-500 mt-1 block">${userName} • ${timeDisplay}</span>
                    </div>
                </div>
            `;
            
            // Increment unread count if chat is closed
            if (!isChatOpen && isNew) {
                unreadCount++;
                updateUnreadBadge();
            }
        }
        
        chatMessages.appendChild(messageDiv);
        
        // Scroll to bottom if chat is open
        if (isChatOpen) {
            chatMessages.scrollTop = chatMessages.scrollHeight;
        }
    }
    
    // Simulate agent responses (for demo - in production, agents will respond via admin)
    function simulateAgentResponse(userMessage) {
        const lowerMessage = userMessage.toLowerCase();
        let response = '';
        let agentName = 'EventPlanner Agent';
        
        if (lowerMessage.includes('price') || lowerMessage.includes('cost') || lowerMessage.includes('৳')) {
            response = 'Our prices vary based on the event type and package. Wedding planning starts at ৳80,000, corporate events from ৳1,00,000, and birthday parties from ৳40,000. Would you like a custom quote?';
            agentName = 'Sarah (Sales Agent)';
        } else if (lowerMessage.includes('wedding')) {
            response = 'We offer comprehensive wedding planning including venue selection, decor, catering, and coordination. Our wedding packages start at ৳80,000. Would you like to see our wedding portfolio?';
            agentName = 'Aisha (Wedding Specialist)';
        } else if (lowerMessage.includes('corporate') || lowerMessage.includes('business')) {
            response = 'For corporate events, we handle conferences, product launches, and team building. Packages start at ৳1,00,000. We can schedule a consultation call to discuss your specific needs.';
            agentName = 'Michael (Corporate Events)';
        } else if (lowerMessage.includes('birthday') || lowerMessage.includes('party')) {
            response = 'Birthday parties are our specialty! We offer themed decorations, entertainment, and catering. Packages start at ৳40,000. What age group is the party for?';
            agentName = 'Sarah (Party Planner)';
        } else if (lowerMessage.includes('contact') || lowerMessage.includes('call') || lowerMessage.includes('phone')) {
            response = 'You can reach us at +880 1234 56789 or email info@eventplanner.com. Our office hours are 9 AM to 8 PM, 7 days a week. Would you like me to connect you now?';
        } else {
            response = 'Thank you for your message! One of our event specialists will get back to you shortly. In the meantime, would you like to browse our services or see our gallery?';
        }
        
        // For demo, we'll save agent response to database
        saveAgentResponse(response, agentName);
        
        // Add message to chat
        setTimeout(() => {
            addMessage(response, 'agent', agentName);
        }, 1000);
    }
    
    // Save agent response to database (for demo - in production, this comes from admin panel)
    async function saveAgentResponse(message, agentName) {
        try {
            await fetch('chat_api.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: `action=send_agent_message&message=${encodeURIComponent(message)}&agent_name=${encodeURIComponent(agentName)}`
            });
        } catch (error) {
            console.error('Error saving agent response:', error);
        }
    }
    
    // Start polling for new messages
    function startPolling() {
        messagePolling = setInterval(() => {
            loadMessages();
            checkAgentStatus();
        }, 3000); // Poll every 3 seconds
    }
    
    // Update unread badge
    function updateUnreadBadge() {
        if (unreadCount > 0) {
            unreadBadge.textContent = unreadCount > 9 ? '9+' : unreadCount;
            unreadBadge.classList.remove('hidden');
            
            // Pulse animation
            unreadBadge.classList.add('animate-pulse');
        } else {
            unreadBadge.classList.add('hidden');
            unreadBadge.classList.remove('animate-pulse');
        }
    }
    
    // Update unread count from DOM
    function updateUnreadCount() {
        const unreadElements = chatMessages.querySelectorAll('.message-enter.unread');
        unreadCount = unreadElements.length;
        updateUnreadBadge();
    }
    
    // Helper function to escape HTML
    function escapeHtml(text) {
        const div = document.createElement('div');
        div.textContent = text;
        return div.innerHTML;
    }
    
    // Add initial welcome message if no messages
    if (isLoggedIn) {
        setTimeout(() => {
            if (chatMessages.children.length === 1) { // Only loading indicator
                chatMessages.innerHTML = '';
                addMessage('Hello! 👋 Welcome to EventPlanner support. How can I help you today?', 'agent', 'EventPlanner Bot');
            }
        }, 1000);
    }
    
    // Clean up polling on page unload
    window.addEventListener('beforeunload', function() {
        if (messagePolling) {
            clearInterval(messagePolling);
        }
    });
});

// ... inside your <script> tag ...

    function fetchMessages() {
        // ... (existing code for fetchMessages) ...
    }
    // ^^^ FIND THIS CLOSING BRACKET

    // PASTE THE NEW FUNCTION HERE:
    function appendMessage(text, type) {
        const div = document.createElement('div');
        
        // Check if the message is from the User (customer) or Admin
        const isUser = (type === 'customer' || type === 'user');
        
        // User messages go to Right, Admin messages go to Left
        div.className = isUser ? 'flex justify-end mb-2' : 'flex justify-start mb-2';
        
        // Blue for User, Gray for Admin
        const bubbleColor = isUser ? 'bg-blue-600 text-white' : 'bg-gray-200 text-gray-800';
        
        div.innerHTML = `
            <div class="${bubbleColor} rounded-lg px-4 py-2 max-w-[80%] break-words shadow-sm">
                ${text}
            </div>
        `;
        chatMessages.appendChild(div);
    }

    // (The Enter key listener should be below this)
    if(chatInput) {
        chatInput.addEventListener('keypress', function(e) {
            if (e.key === 'Enter') sendMessage();
        });
    }
</script>


</body>
</html>