   <!-- <?php
    $hostname="localhost";
    $dbuser="root";
    $dbpassword="";
    $dbname="event_planner_db";
    $conn=mysqli_connect($hostname,$dbuser,$dbpassword,$dbname);
    if(!$conn){
        die("Something went wrong!");
    }

    ?> -->

    <?php
// database.php
$host = 'localhost';
$user = 'root';
$password = ''; // Empty for XAMPP default
$database = 'event_planner'; // Your database name

$connection = mysqli_connect($hostname, $dbuser, $dbpassword, $dbname);

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}
?>

<?php
// database.php
$servername = "localhost";
$username = "root";
$password = ""; 
$dbname = "event_planner_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    // Proper error handling for production:
    error_log("Database connection failed: " . $conn->connect_error);
    
    // Show user-friendly message (only in development)
    if ($_SERVER['HTTP_HOST'] == 'localhost') {
        die("Database connection failed: " . $conn->connect_error);
    } else {
        die("Service temporarily unavailable. Please try again later.");
    }
}

// Set charset to prevent encoding issues
$conn->set_charset("utf8mb4");

// Enable error reporting for development
if ($_SERVER['HTTP_HOST'] == 'localhost') {
    $conn->report_mode = MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT;
}
?>

<?php
// database.php
$servername = "localhost";
$username = "root";
$password = ""; 
$dbname = "event_planner_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Set charset to utf8mb4 for special characters
$conn->set_charset("utf8mb4");
?>