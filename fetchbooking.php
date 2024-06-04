<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Details</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: bisque;
            margin: 0;
            padding: 0;
        }
        header {
            background-color: #333;
            color: #fff;
            padding: 10px 0;
            text-align: center;
        }

        .booking-details-container {
            max-width: 1000px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.9);
            opacity: 0.7;
        }

        h1 {
            color: #333;
            text-align: center;
            margin-bottom: 20px;
        }

        form {
            text-align: center;
            margin-bottom: 20px;
        }

        label {
            font-weight: bold;
            margin-right: 10px;
        }

        input[type="text"] {
            padding: 8px;
            border-radius: 5px;
            border: 1px solid #ccc;
            margin-right: 10px;
        }

        button {
            padding: 8px 20px;
            background-color: #333;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #555;
        }

        p {
            margin-bottom: 10px;
        }

        .error-message {
            color: red;
            font-weight: bold;
        }
        #background-video {
            position: fixed;
            top: 0;
            left: 0;
            min-width: 100%;
            min-height: 100%;
            z-index: -1;
        }
    </style>
</head>
<body>

    <video autoplay muted loop id="background-video">
        <source src="viedo4.mp4" type="video/mp4">
        Your browser does not support the video tag.
    </video>
    
    <header>
        <h1>Booking Details</h1>
    </header>

    <div class="booking-details-container">
        <form method="GET">
            <label for="customer_id">Enter Customer ID:</label>
            <input type="text" id="customer_id" name="customer_id">
            <button type="submit">Fetch Booking Details</button>
        </form>
        
        <?php
            // Check if customer_id parameter is provided in the URL
        if(isset($_GET['customer_id'])) {
            // Database connection parameters
            $servername = "localhost";
            $username = "root"; // default username for XAMPP
            $password = ""; // default password for XAMPP
            $database = "hotel_management"; // name of your database

            // Create connection
            $conn = mysqli_connect($servername, $username, $password, $database);

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . mysqli_connect_error());
            }

            // Get customer_id from the URL
            $customer_id = $_GET['customer_id'];

            // Prepare SQL statement to fetch data based on customer ID
            $sql_query = "SELECT * FROM booking WHERE customer_id='$customer_id'";

            // Execute the SQL query
            $result = mysqli_query($conn, $sql_query);

            if (mysqli_num_rows($result) > 0) {
                // Output data of each row
                while($row = mysqli_fetch_assoc($result)) {
                    echo "<p><strong>Customer ID:</strong> " . $row["customer_id"]. "</p>";
                    echo "<p><strong>Name:</strong> " . $row["name"]. "</p>";
                    echo "<p><strong>Email:</strong> " . $row["email"]. "</p>";
                    echo "<p><strong>Check-in Date:</strong> " . $row["checkin"]. "</p>";
                    echo "<p><strong>Check-out Date:</strong> " . $row["checkout"]. "</p>";
                    if(isset($row["adults"])) {
                        echo "<p><strong>Number of Adults:</strong> " . $row["adults"]. "</p>";
                    }
                    if(isset($row["children"])) {
                        echo "<p><strong>Number of Children:</strong> " . $row["children"]. "</p>";
                    }
                    if(isset($row["rooms"])) {
                        echo "<p><strong>Number of Rooms:</strong> " . $row["rooms"]. "</p>";
                    }
                    if(isset($row["roomstype"])) {
                        echo "<p><strong>Room Type:</strong> " . $row["roomstype"]. "</p>";
                    }
                }
            } else {
                echo "<p>No booking found for customer ID: $customer_id</p>";
            }
            mysqli_close($conn);
        }
        ?>
    </div>

</body>
</html>