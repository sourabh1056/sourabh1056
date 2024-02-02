<?php
// process_test_drive.php
// Replace the placeholders with your actual database credentials
//$con = mysqli_connect("localhost", "root", "root", "vehiclewebshowroom");
$con=mysqli_connect("localhost","root","","vehiclewebshowroom");

// Check the connection
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    // You can handle the error appropriately (e.g., display an error message)
    exit();
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Make sure to include the database connection details and establish a connection to the database
    // $con = mysqli_connect("hostname", "username", "password", "database_name");

    if (isset($_POST["name"], $_POST["email"], $_POST["phone"], $_POST["preferred_date"], $_POST["preferred_time"], $_POST["vehicle_id"])) {
        $name = $_POST["name"];
        $email = $_POST["email"];
        $phone = $_POST["phone"];
        $preferred_date = $_POST["preferred_date"];
        $preferred_time = $_POST["preferred_time"];
        $vehicle_id = $_POST["vehicle_id"];
        $message = isset($_POST["message"]) ? $_POST["message"] : "";

        // Perform any necessary validation on the form inputs here if needed

        // Insert the test drive request into the database
        $sql_insert = "INSERT INTO test_drive_request (vehicle_id, name, email, phone, preferred_date, preferred_time, message)
                       VALUES ('$vehicle_id', '$name', '$email', '$phone', '$preferred_date', '$preferred_time', '$message')";
        
        if (mysqli_query($con, $sql_insert)) {
            // Test drive request successfully saved in the database
            // You can redirect the user to a thank-you page or display a success message here
        header("Location:new.php");
            exit();
        } else {
            // Failed to save the test drive request
            // You can redirect the user to an error page or display an error message here
            echo "Error: " . mysqli_error($con);
        }
    } else {
        // Required form fields not provided
        // You can redirect the user to an error page or display an error message here
        echo "Error: Required fields not provided.";
    }
} else {
    // Invalid request method
    // You can redirect the user to an error page or display an error message here
    echo "Error: Invalid request method.";
}
?>
