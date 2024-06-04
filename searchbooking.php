<?php
// Include the database connection file
require_once 'connection.php';

// Check if customer_id parameter is provided in the URL
if(isset($_GET['customer_id'])) {
    // Get customer_id from the URL
    $customer_id = $_GET['customer_id'];

    // Prepare SQL statement to fetch data based on customer ID
    $sql_query = "SELECT * FROM booking WHERE customer_id='$customer_id'";

    // Execute the SQL query
    $result = mysqli_query($conn, $sql_query);

    if (mysqli_num_rows($result) > 0) {
        // Output data of each row
        while($row = mysqli_fetch_assoc($result)) {
            // Apply some design elements to the output
            echo "<div style='background-color: #f8f9fa; padding: 20px; margin: 20px auto; border-radius: 10px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); text-align: center; width: 600px;'>";

            // Embed the video as background
            echo "<video autoplay muted loop id='background-video' style='position: fixed; top: 0; left: 0; min-width: 100%; min-height: 100%; z-index: -1;'>";
            echo "<source src='viedo4.mp4' type='video/mp4'>";
            echo "Your browser does not support the video tag.";
            echo "</video>";

            echo "<p style='margin-bottom: 10px;'><strong>Customer ID:</strong> " . $row["customer_id"]. "</p>";
            echo "<p style='margin-bottom: 10px;'><strong>Name:</strong> " . $row["name"]. "</p>";
            echo "<p style='margin-bottom: 10px;'><strong>Email:</strong> " . $row["email"]. "</p>";
            echo "<p style='margin-bottom: 10px;'><strong>Check-in Date:</strong> " . $row["checkin"]. "</p>";
            echo "<p style='margin-bottom: 10px;'><strong>Check-out Date:</strong> " . $row["checkout"]. "</p>";
            if(isset($row["adult"])) {
                echo "<p style='margin-bottom: 10px;'><strong>Number of Adults:</strong> " . $row["adult"]. "</p>";
            }
            if(isset($row["children"])) {
                echo "<p style='margin-bottom: 10px;'><strong>Number of Children:</strong> " . $row["children"]. "</p>";
            }
            if(isset($row["rooms"])) {
                echo "<p style='margin-bottom: 10px;'><strong>Number of Rooms:</strong> " . $row["rooms"]. "</p>";
            }
            if(isset($row["roomstype"])) {
                echo "<p style='margin-bottom: 10px;'><strong>Room Type:</strong> " . $row["roomstype"]. "</p>";
            }
            echo "</div>"; // Close the styled div
        }
    } else {
        // Apply some design elements to the output
        echo "<div style='background-color: #f8f9fa; padding: 20px; margin: 20px auto; border-radius: 10px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); text-align: center; width: 600px;'>";

        // Embed the video as background
        echo "<video autoplay muted loop id='background-video' style='position: fixed; top: 0; left: 0; min-width: 100%; min-height: 100%; z-index: -1;'>";
        echo "<source src='viedo4.mp4' type='video/mp4'>";
        echo "Your browser does not support the video tag.";
        echo "</video>";

        echo "<p>No booking found for customer ID: $customer_id</p>";
        echo "</div>"; // Close the styled div
    }
}

// Close connection
mysqli_close($conn);
?>
