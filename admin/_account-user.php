<?php
session_start();
include "../db_conn.php";

// add
// Add condition to check the form submission
if (isset($_POST['buttonSave'])) {
    // Validate and sanitize user input
    $name = $_POST["name"]; // Changed input name to match the form
    $login_id = $_POST["login_id"]; // Changed input name to match the form

    // Check if the login ID already exists in the database
    $check_query = mysqli_query($conn, "SELECT * FROM user WHERE login_id = '$login_id'");
    if (mysqli_num_rows($check_query) > 0) {
        // If the login ID already exists, display an error
        $_SESSION['error'] = "Login ID already exists in the database.";
        header("Location: account-user");
        exit();
    } else {
        // Insert the data into the database
        $simpan = mysqli_query($conn, "INSERT INTO user (name, login_id) 
        VALUES ('$name', '$login_id')"); // Adjusted query with only required fields
    
        if ($simpan) {
            $_SESSION['success'] = "Data has been added successfully.";
            header("Location: account-user");
            exit();
        } else {
            $_SESSION['error'] = "An error occurred while processing the request. " . mysqli_error($conn);
            header("Location: account-user");
            exit();
        }
    }
}

// Check if the edit form is submitted
if (isset($_POST['buttonEdit'])) {
    // Validate and sanitize user input
    $editId = $_POST["editId"];
    $editName = $_POST["editName"];
    $editLoginID = $_POST["editLoginID"];

    // Perform the update in the database
    $update_query = "UPDATE user SET name = '$editName', login_id = '$editLoginID' WHERE id = $editId";
    $result = mysqli_query($conn, $update_query);

    if ($result) {
        $_SESSION['success'] = "Data has been updated successfully.";
        header("Location: account-user"); // Redirect to the user account page after successful update
        exit();
    } else {
        $_SESSION['error'] = "An error occurred while updating data: " . mysqli_error($conn);
        header("Location: account-user"); // Redirect to the user account page on error
        exit();
    }
}

// Delete
if (isset($_POST['buttonDelete'])) {
    $hapus = mysqli_query($conn, "DELETE FROM user WHERE id = '" . $_POST['deleteId'] . "'");
    
    if ($hapus) {
        $_SESSION['success'] = "Data has been deleted successfully.";
        header("Location: account-user");
        exit();
    } else {
        $_SESSION['error'] = "An error occurred while processing the request. " . mysqli_error($conn);
        header("Location: account-user");
        exit();
    }
}

?>