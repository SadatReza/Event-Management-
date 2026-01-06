<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['logged_in']) || !$_SESSION['logged_in']) {
    header("Location: login.php");
    exit();
}

// Check if form was submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $item_key = $_POST['item_key'] ?? null;
    $action = $_POST['action'] ?? '';
    
    // Validate inputs
    if (!isset($item_key) || !isset($_SESSION['cart'][$item_key])) {
        $_SESSION['error_message'] = "Invalid cart item";
        header("Location: cart.php");
        exit();
    }
    
    // Perform the requested action
    switch ($action) {
        case 'increase':
            $_SESSION['cart'][$item_key]['quantity'] += 1;
            break;
        case 'decrease':
            if ($_SESSION['cart'][$item_key]['quantity'] > 1) {
                $_SESSION['cart'][$item_key]['quantity'] -= 1;
            } else {
                unset($_SESSION['cart'][$item_key]);
            }
            break;
        case 'remove':
            unset($_SESSION['cart'][$item_key]);
            break;
        default:
            $_SESSION['error_message'] = "Invalid action";
            header("Location: cart.php");
            exit();
    }
    
    // Re-index array if items were removed
    $_SESSION['cart'] = array_values($_SESSION['cart']);
    
    $_SESSION['success_message'] = "Cart updated successfully";
    header("Location: cart.php");
    exit();
}

// If not POST request, redirect to cart
header("Location: cart.php");
exit();
?>