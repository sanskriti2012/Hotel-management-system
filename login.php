<?php
// Include the database connection file
include_once 'connection.php';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Escape user inputs for security
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    // Query to check if username and password exist in the database
    $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conn, $sql);

    // Check if query returned any rows
    if (mysqli_num_rows($result) == 1) {
        // Redirect to main hotel management page on successful login
        header("Location: p1.html");
        exit();
    } else {
        // If login fails, redirect back to login page with error message
        header("Location: index.php?error=invalid_credentials");
        exit();
    }
} else {
    // If form is not submitted, redirect back to login page
    header("Location: index.php");
    exit();
}
?>
