<?php
// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$database = "hotel_management";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if form is submitted
if (isset($_POST['delete'])) {
    // Collect form data
    $customer_id = $_POST['customer_id'];

    // Prepare SQL statement to delete data from the database
    $sql_query = "DELETE FROM booking WHERE customer_id='$customer_id'";

    // Execute the SQL query
    if (mysqli_query($conn, $sql_query)) {
        if (mysqli_affected_rows($conn) > 0) {
            echo "<p>Record with customer ID $customer_id successfully deleted!</p>";
        } else {
            echo "<p>Data not found for customer ID $customer_id.</p>";
        }
    } else {
        echo "<p>Error deleting record: " . mysqli_error($conn) . "</p>";
    }
}

// Close connection
mysqli_close($conn);
?>
