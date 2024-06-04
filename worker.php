<?php
// Include the database connection file
include 'connection.php';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Escape user inputs for security
    $worker_name = mysqli_real_escape_string($conn, $_POST['worker-name']);
    $worker_id = mysqli_real_escape_string($conn, $_POST['worker-id']);
    $worker_department = mysqli_real_escape_string($conn, $_POST['worker-department']);
    $worker_email = mysqli_real_escape_string($conn, $_POST['worker-email']);
    $worker_phone = mysqli_real_escape_string($conn, $_POST['worker-phone']);
    $date_of_birth = mysqli_real_escape_string($conn, $_POST['Date-of-Birth']);
    $worker_address = mysqli_real_escape_string($conn, $_POST['worker-address']);
    $experience = mysqli_real_escape_string($conn, $_POST['Experience']);
    $training_certifications = mysqli_real_escape_string($conn, $_POST['Training/Certifications']);
    $emergency_contact = mysqli_real_escape_string($conn, $_POST['Emergency_Contact']);

    // Attempt to insert data into database
    $sql = "INSERT INTO worker (name, worker_id, department, email, phone, date_of_birth, address, experience, training_certifications, emergency_contact) 
            VALUES ('$worker_name', '$worker_id', '$worker_department', '$worker_email', '$worker_phone', '$date_of_birth', '$worker_address', '$experience', '$training_certifications', '$emergency_contact')";

    if (mysqli_query($conn, $sql)) {
        echo "Worker added successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    // Close connection
    mysqli_close($conn);
}
?>
