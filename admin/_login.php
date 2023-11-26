<?php
session_start();
include "../db_conn.php";

if (isset($_POST['email']) && isset($_POST['password'])) {
    function validate($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    
    $email = validate($_POST['email']);
    $password = validate($_POST['password']);

    if (empty($email)) {
        $_SESSION['admin_error'] = "Email is required";
    } else if (empty($password)) {
        $_SESSION['admin_error'] = "Password is required";
    } else {
        $sql = "SELECT * FROM admin WHERE email='$email' AND password='$password'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);
            if ($row['email'] === $email && $row['password'] === $password) {
                $_SESSION['email'] = $row['email'];
                $_SESSION['name'] = $row['name'];
                $_SESSION['id'] = $row['id'];
                $_SESSION['role'] = $row['role'];
                header("Location: home");
                exit();
            } else {
                $_SESSION['admin_error'] = "Incorrect email or/and password";
            }
        } else {
            $_SESSION['admin_error'] = "Incorrect email or/and password";
        }
    }

    header("Location: .");
    exit();
}
?>
