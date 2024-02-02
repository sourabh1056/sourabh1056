<?php
// Database connection details
$host = "localhost";
$username = "root";
$password = "";
$dbname = "vehiclewebshowroom";

// Create connection
$conn = mysqli_connect($host, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// SQL query to retrieve reviews
$sql = "SELECT name, email, rating, review_text FROM reviews";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // Output data from each row
    while ($row = mysqli_fetch_assoc($result)) {
        echo "Name: " . $row["name"] . "<br>";
        echo "Email: " . $row["email"] . "<br>";
        echo "Rating: " . $row["rating"] . "<br>";
        echo "Review Text: " . $row["review_text"] . "<br>";
        echo "<hr>";
    }
} else {
    echo "No reviews found.";
}

// Close the database connection
mysqli_close($conn);
?>
