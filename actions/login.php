<?php
// login.php

require_once '../scripts/config.php';

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Retrieve user credentials from the database
    $query = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($connection, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);

        // Verify the password against the hashed password stored in the database
        if (password_verify($password, $user['password'])) {
            // Successful login
            // Start a session and set a session variable for authentication
            session_start();
            $_SESSION['user_id'] = $user['id'];

            // Redirect to index.php
            header('Location: ../index.php');
            exit();
        } else {
            // Invalid password
            echo 'Invalid password. Please try again.';
        }
    } else {
        // User not found
        echo 'User not found. Please try again.';
    }
}
?>
