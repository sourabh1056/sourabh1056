<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Database connection details
    $host = "localhost";
    $username = "root";
    $password = "";
    $dbname = "vehiclewebshowroom";

    // Create connection
    $conn=mysqli_connect("localhost","root","","vehiclewebshowroom");


    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Get user input from the form

    $name = $_POST["name"];
    $email = $_POST["email"];
    $rating = $_POST["rating"];
    $review_text = $_POST["review_text"];
   
    

    // Prepare and execute the SQL query

    $review_date = date("Y-m-d H:i:s");
    $r_time = date("H:i:s");
$stmt = $conn->prepare("INSERT INTO reviews (name, email, rating, review_text, review_date, r_time) VALUES (?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssisss", $name, $email, $rating, $review_text, $review_date, $r_time);

    
    if ($stmt->execute()) {
        echo "Thank you for your review! It has been submitted successfully.!";
    } else {
        echo "Error: " . $stmt->error;
    }

// ... (your existing review submission code)


    $stmt->close();
    $conn->close();
}
?>
