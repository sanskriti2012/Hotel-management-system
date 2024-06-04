<?php
// Include the database connection file
include 'connection.php';

// Fetch data from the database
$sql = "SELECT * FROM worker";
$result = mysqli_query($conn, $sql);

$workers = [];
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $workers[] = $row;
    }
}

// Close connection
mysqli_close($conn);

// Output data as JSON
header('Content-Type: application/json');
echo json_encode($workers);
?>
