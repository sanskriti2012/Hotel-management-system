<?php
// Include the database connection file
include 'connection.php';

// Fetch data from the database
$sql = "SELECT * FROM recordbooking";
$result = mysqli_query($conn, $sql);

$bookings = [];
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $bookings[] = $row;
    }
}

// Close connection
mysqli_close($conn);

// Output data as JSON
header('Content-Type: application/json');
echo json_encode($bookings);
?>
