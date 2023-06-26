<?php
// Validare adresa de email
function validateEmail($email, $confirmEmail)
{
    $errors = [];

    if (empty($email)) {
        $errors[] = "Email field is required.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format.";
    } elseif ($email != $confirmEmail) {
        $errors[] = "Emails do not match.";
    }

    return $errors;
}

// Validare parolă
function validatePassword($currentPassword, $newPassword, $confirmPassword)
{
    $errors = [];

    if (empty($currentPassword)) {
        $errors[] = "Current password field is required.";
    }

    if (empty($newPassword)) {
        $errors[] = "New password field is required.";
    } elseif (strlen($newPassword) < 6) {
        $errors[] = "Password must be at least 6 characters long.";
    } elseif ($newPassword != $confirmPassword) {
        $errors[] = "Passwords do not match.";
    }

    return $errors;
}
?>
