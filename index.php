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

<!-- Wedding Planning Service Page -->

<!-- Corporate Events Service Page -->

<!-- Birthday Parties Service Page -->

<!-- Services Page -->

<!-- About Us Page -->

<!-- Contact Us Page -->

<!-- Booking Page -->