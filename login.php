<?php
session_start(); // Start the session
require_once('database.php'); // Make sure this includes your database connection

// Check if the form is submitted
if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Use prepared statements to prevent SQL injection
    $sql = "SELECT * FROM users WHERE email = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, 's', $email); // Bind the email as a parameter
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);

        // Verify the password
        if (password_verify($password, $user['password'])) {
            // Password is correct, set session variables
            $_SESSION['logged_in'] = true;
$_SESSION['user_name'] = $user['name'];
$_SESSION['email'] = $email;
 // Assuming you have the user's name
header("Location: index.php");
exit();
        } else {
            // Set an error message for incorrect password
            $_SESSION['error'] = "Incorrect password.";
        }
    } else {
        // Set an error message if no user found
        $_SESSION['error'] = "No user found with that email.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <!-- Display error messages if any -->
    <?php if (isset($_SESSION['error'])): ?>
        <div class="error-message" style="color: red;">
            <?php echo $_SESSION['error']; ?>
            <?php unset($_SESSION['error']); ?>
        </div>
    <?php endif; ?>

    <form action="login.php" method="POST">
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit" name="submit">Login</button>
    </form>
</body>
</html>
