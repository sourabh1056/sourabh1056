<?php
session_start();
include("header.php");
include("fancybox.php");

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the selected options
    $quantity = $_POST["quantity"];
    $payment_method = $_POST["payment_method"];
    
    // Fixed booking amount
    $booking_amount = 10000; // ₹10,000
    
    // Calculate the total cost
    $total_cost = $booking_amount * $quantity;
    
    // Display order confirmation message
    echo "<h2>Order Confirmation</h2>";
    echo "<p>You have selected $quantity item(s) of {$rs['vehname']}.</p>";
    echo "<p>Booking Amount: ₹ $booking_amount</p>";
    echo "<p>Total Cost: ₹ $total_cost</p>";
    echo "<p>Payment Method: $payment_method</p>";
    
    // You can further process the order (e.g., store it in a database)
}

include("footer.php");
?>
