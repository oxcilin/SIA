<?php
session_start();

// Include the database connection file (db_conn.php)
include "db_conn.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve session data
    $id_user = $_SESSION['login_id']; // Get the logged-in user's ID
    $name_user = $_SESSION['name']; // Get the logged-in user's name

    date_default_timezone_set('Asia/Jakarta'); // Set the desired timezone

    // Get the timestamp with milliseconds
    $microtime = microtime(true); // Get current time with microseconds
    $milliseconds = sprintf('%03d', ($microtime - floor($microtime)) * 1000); // Calculate milliseconds

    $timestamp = date('d-m-Y H:i:s.') . $milliseconds; // Format the timestamp with milliseconds

    // Check credentials
    $sql = "INSERT INTO raise_user (id_user, name_user, timestamp) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $id_user, $name_user, $timestamp);

    if ($stmt->execute()) {
        header("Location: home");
        exit();
    } else {
        // User does not exist or login failed
        $_SESSION['error'] = "An error occurred while processing the request: " . $stmt->error;
        header("Location: ."); // Redirect back to login page
        exit();
    }
}
?>
