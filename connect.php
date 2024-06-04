<?php
// Include the database connection file
require_once 'connection.php';

// Check if form is submitted
if (isset($_POST['save'])) {
    // Collect form data
    $customer_id = $_POST['customer_id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $checkin = $_POST['checkin'];
    $checkout = $_POST['checkout'];
    $adults = $_POST['adults'];
    $children = $_POST['child'];
    $rooms = $_POST['rooms'];
    $roomstype = $_POST['type'];

    // Prepare SQL statements to insert data into each table
    $sql_booking = "INSERT INTO booking (customer_id, name, email, checkin, checkout, adult, children, rooms, roomstype)
                    VALUES ('$customer_id', '$name', '$email', '$checkin', '$checkout', '$adults', '$children', '$rooms', '$roomstype')";

    $sql_recordbooking = "INSERT INTO recordbooking (customer_id, name, email, checkin, checkout, adult, children, rooms, roomstype)
                          VALUES ('$customer_id', '$name', '$email', '$checkin', '$checkout', '$adults', '$children', '$rooms', '$roomstype')";
    
    // Execute the SQL queries
    if (mysqli_query($conn, $sql_booking) && mysqli_query($conn, $sql_recordbooking)) {
        echo "Booking Success";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}


mysqli_close($conn);
?>
