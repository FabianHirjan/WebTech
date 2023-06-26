<?php
require_once '../scripts/config.php'; // Adjust the path to your config file

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $rating = $_POST['rating'];
    $review = $_POST['review'];

    // Prepare the SQL statement
    $sql = "INSERT INTO reviews (name, email, rating, review) VALUES ('$name', '$email', $rating, '$review')";

    // Execute the SQL statement
    if (mysqli_query($connection, $sql)) {
        echo "Review submitted successfully!";
        header('Location: ../vreviews.php');
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($connection);
    }
}

// Close the database connection
mysqli_close($connection);
?>
