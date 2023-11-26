<?php
session_start();
include "../db_conn.php";

// Delete
if (isset($_POST['buttonDelete'])) {
  $hapus = mysqli_query($conn, "DELETE FROM raise_user WHERE id = '" . $_POST['deleteId'] . "'");
  
  if ($hapus) {
    $_SESSION['success'] = "Data has been deleted successfully.";
    header("Location: home");
    exit();
  } else {
    $_SESSION['error'] = "An error occurred while processing the request. " . mysqli_error($conn);
    header("Location: home");
    exit();
  }
}

?>