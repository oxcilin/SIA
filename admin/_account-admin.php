<?php
session_start();
include "../db_conn.php";

if (isset($_POST['buttonSave'])) {
  // Validate and sanitize user input
  $name = $_POST["name"];
  $email = $_POST["email"];
  $password = $_POST["password"];
  $role = $_POST["role"];

  // Check if the email already exists in the database
  $check_query = mysqli_query($conn, "SELECT * FROM admin WHERE email = '$email'");
  if (mysqli_num_rows($check_query) > 0) {
      // If the email already exists, display an error
      $_SESSION['error'] = "Email or username already exists in the database.";
      header("Location: account-admin");
      exit();
  } else {
      // Insert the data into the database
      $simpan = mysqli_query($conn, "INSERT INTO admin (name, email, password, role) 
      VALUES ('$name', '$email', '$password', '$role')");    
  
      if ($simpan) {
          $_SESSION['success'] = "Data has been added successfully.";
          header("Location: account-admin");
          exit();
      } else {
          $_SESSION['error'] = "An error occurred while processing the request. " . mysqli_error($conn);
          header("Location: account-admin");
          exit();
      }
  }
}

//edit
if (isset($_POST['buttonEdit'])) {
  $id = $_POST["editId"];
  $name = $_POST["editName"];
  $email = $_POST["editEmail"];
  $password = $_POST["editPassword"];
  $role = $_POST["editRole"];
  
  // Check if the email already exists in the database for other records except the current one being edited
  $check_query = mysqli_query($conn, "SELECT * FROM admin WHERE email = '$email' AND id != $id");
  if (mysqli_num_rows($check_query) > 0) {
      // If the email already exists for another record, display an error
      $_SESSION['error'] = "Email or username already exists for another record.";
      header("Location: account-admin");
      exit();
  } else {
      // Use prepared statements to prevent SQL injection
      $stmt = $conn->prepare("UPDATE admin SET name = ?, email = ?, password = ?, role = ? WHERE id = ?");
      $stmt->bind_param("ssssi", $name, $email, $password, $role, $id);
      
      if ($stmt->execute()) {
          $_SESSION['success'] = "Data has been updated successfully.";
          header("Location: account-admin");
          exit();
      } else {
          $_SESSION['error'] = "An error occurred while processing the request: " . $stmt->error;
          header("Location: account-admin");
          exit();
      }
  }
}


// Delete
if (isset($_POST['buttonDelete'])) {
  $hapus = mysqli_query($conn, "DELETE FROM admin WHERE id = '" . $_POST['deleteId'] . "'");
  
  if ($hapus) {
    $_SESSION['success'] = "Data has been deleted successfully.";
    header("Location: account-admin");
    exit();
  } else {
    $_SESSION['error'] = "An error occurred while processing the request. " . mysqli_error($conn);
    header("Location: account-admin");
    exit();
  }
}


?>