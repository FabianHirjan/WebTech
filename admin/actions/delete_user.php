<?php
require '../../scripts/config.php';

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve the user ID from the form submission
    $user_id = isset($_POST['user_id']) ? $_POST['user_id'] : '';

    // Delete the user from the database
    $deleteQuery = "DELETE FROM users WHERE id = '$user_id'";
    $deleteResult = mysqli_query($connection, $deleteQuery);

    if (!$deleteResult) {
        die("Error deleting user: " . mysqli_error($connection));
    }

    // Redirect back to the index page after deletion
    header("Location: ../index.php");
    exit();
} else {
    // If the form is not submitted, redirect back to the index page
    header("Location: ../index.php");
    exit();
}
