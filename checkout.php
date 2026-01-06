<?php
session_start();

if (!isset($_SESSION['logged_in']) || !$_SESSION['logged_in'] || empty($_SESSION['cart'])) {
    header("Location: login.php");
    exit();
}

require_once 'header.php';
?>

<main class="py-12">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold mb-8">Checkout</h2>
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <!-- Order Summary -->
            <div class="bg-white rounded-lg shadow-md p-6">
                <h3 class="text-xl font-bold mb-4">Order Summary</h3>
                
                <?php 
                $subtotal = 0;
                foreach ($_SESSION['cart'] as $item): 
                    $item_total = $item['price'] * $item['quantity'];
                    $subtotal += $item_total;
                ?>
                    <div class="flex justify-between items-center border-b pb-4 mb-4">
                        <div>
                            <h4 class="font-medium"><?php echo htmlspecialchars($item['name']); ?></h4>
                            <p class="text-gray-600 text-sm">Qty: <?php echo $item['quantity']; ?></p>
                        </div>
                        <span class="font-medium">৳<?php echo number_format($item_total, 2); ?></span>
                    </div>
                <?php endforeach; ?>
                
                <div class="border-t pt-4 mt-4">
                    <div class="flex justify-between mb-2">
                        <span>Subtotal:</span>
                        <span>৳<?php echo number_format($subtotal, 2); ?></span>
                    </div>
                    <div class="flex justify-between mb-2">
                        <span>Service Charge:</span>
                        <span>৳<?php echo number_format(1000, 2); ?></span>
                    </div>
                    <div class="flex justify-between font-bold text-lg">
                        <span>Total:</span>
                        <span>৳<?php echo number_format($subtotal + 1000, 2); ?></span>
                    </div>
                </div>
            </div>
            
            <!-- Payment Form -->
            <div class="bg-white rounded-lg shadow-md p-6">
                <h3 class="text-xl font-bold mb-4">Payment Information</h3>
                
                <form method="post" action="process_checkout.php">
                    <div class="mb-4">
                        <label class="block text-gray-700 mb-2">Full Name</label>
                        <input type="text" name="full_name" class="w-full p-3 border border-gray-300 rounded-md" 
                               value="<?php echo htmlspecialchars($_SESSION['user_name'] ?? ''); ?>" required>
                    </div>
                    
                    <div class="mb-4">
                        <label class="block text-gray-700 mb-2">Email</label>
                        <input type="email" name="email" class="w-full p-3 border border-gray-300 rounded-md" 
                               value="<?php echo htmlspecialchars($_SESSION['user_email'] ?? ''); ?>" required>
                    </div>
                    
                    <div class="mb-4">
                        <label class="block text-gray-700 mb-2">Phone Number</label>
                        <input type="tel" name="phone" class="w-full p-3 border border-gray-300 rounded-md" required>
                    </div>
                    
                    <div class="mb-4">
                        <label class="block text-gray-700 mb-2">Payment Method</label>
                        <select name="payment_method" class="w-full p-3 border border-gray-300 rounded-md" required>
                            <option value="">Select Payment Method</option>
                            <option value="bkash">bKash</option>
                            <option value="nagad">Nagad</option>
                            <option value="card">Credit/Debit Card</option>
                            <option value="cash">Cash on Delivery</option>
                        </select>
                    </div>
                    
                    <div class="mb-4">
                        <label class="block text-gray-700 mb-2">Special Instructions</label>
                        <textarea name="instructions" rows="3" class="w-full p-3 border border-gray-300 rounded-md"></textarea>
                    </div>
                    
                    <button type="submit" class="w-full bg-red-600 text-white font-bold py-3 px-6 rounded-full hover:bg-red-700 transition duration-300">
                        Complete Order
                    </button>
                </form>
            </div>
        </div>
    </div>
</main>

<?php require_once 'footer.php'; ?>