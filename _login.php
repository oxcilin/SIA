<?php
session_start();

// Include the database connection file (db_conn.php)
include "db_conn.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sanitize and validate input
    $user_id = $_POST['user_id']; // This fetches the user_id from the form

    // Check credentials
    $sql = "SELECT id, name, login_id FROM user WHERE login_id = ?"; // Adjust query based on your database schema
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $user_id);
    $stmt->execute();
    $stmt->bind_result($id, $name, $login_id); // Bind variables to store the result

    if ($stmt->fetch()) {
        // User exists, proceed with login
        $_SESSION['user_id'] = $id; // Assuming $id holds the user ID
        $_SESSION['name'] = $name; // Assuming $name holds the user's name
        $_SESSION['login_id'] = $login_id; // Store login_id in session
        // Redirect to user's page or perform further actions
        header("Location: home");
        exit();
    } else {
        // User does not exist or login failed
        $_SESSION['error'] = "Invalid ID. Please try again."; // Set an error message
        header("Location: ."); // Redirect back to login page
        exit();
    }
}
?>
