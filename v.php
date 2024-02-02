<?php
// Establish a database connection
$servername = "localhost";
$username = "root";
$password = "";
$database = "vehiclewebshowroom";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $transmission = $_POST["transmission"];
    $color = $_POST["color"];
    $fuel_type = $_POST["fuel_type"];
    $vehicle_id = $_POST["vid"]; // Retrieve the vehicle ID from the hidden input

    // Insert data into the database
   


$sql = "UPDATE vehicle 
        SET transmission = '$transmission', color = '$color', fuel_type = '$fuel_type'
        WHERE vehid = '$vehicle_id'";


    if ($conn->query($sql) === TRUE) {
        echo "Data saved successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the database connection
    $conn->close();
}
?>
