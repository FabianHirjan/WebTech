<?php
// Include the database configuration file
require_once '../scripts/config.php';





if (isset($_POST['name']) && isset($_POST['password']) && isset($_POST['email'])) {
    $name = $_POST['name'];
    $password = $_POST['password'];
    $email = $_POST['email'];

    // Hash the password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Insert the user data into the database
    $query = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$hashedPassword')";

    if (mysqli_query($connection, $query)) {
        // Registration successful
        echo 'Registration successful! You can now log in.';
    } else {
        // Registration failed
        echo 'Registration failed. Please try again.';
    }
}
?>

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
</head>

