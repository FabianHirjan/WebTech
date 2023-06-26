<?php
// Verifică dacă utilizatorul este autentificat
// Dacă nu este autentificat, redirecționează către pagina de autentificare
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Include fișierul de configurare și fișierul de funcții
require 'scripts/config.php';
require 'scripts/functions.php';

// Obțineți informațiile despre utilizator din baza de date
$userID = $_SESSION['user_id'];
$userQuery = "SELECT * FROM users WHERE id = $userID";
$userResult = mysqli_query($connection, $userQuery);
if (!$userResult) {
    die("Error fetching user data: " . mysqli_error($connection));
}
$userData = mysqli_fetch_assoc($userResult);

// Variabile pentru afișarea mesajelor de eroare/succes
$emailChangeMessage = '';
$passwordChangeMessage = '';

// Procesează schimbarea adresei de email
if (isset($_POST['change_email'])) {
    $newEmail = trim($_POST['new_email']);
    $confirmEmail = trim($_POST['confirm_email']);

    // Validare formular
    $emailErrors = validateEmail($newEmail, $confirmEmail);

    if (empty($emailErrors)) {
        // Actualizează adresa de email în baza de date
        $updateEmailQuery = "UPDATE users SET email = '$newEmail' WHERE id = $userID";
        $updateEmailResult = mysqli_query($connection, $updateEmailQuery);
        if ($updateEmailResult) {
            $emailChangeMessage = "Adresa de email a fost actualizată cu succes.";
        } else {
            $emailChangeMessage = "A apărut o eroare la actualizarea adresei de email: " . mysqli_error($connection);
        }
    }
}

// Procesează schimbarea parolei
if (isset($_POST['change_password'])) {
    $currentPassword = trim($_POST['current_password']);
    $newPassword = trim($_POST['new_password']);
    $confirmPassword = trim($_POST['confirm_password']);

    // Validare formular
    $passwordErrors = validatePassword($currentPassword, $newPassword, $confirmPassword);

    if (empty($passwordErrors)) {
        // Verifică dacă parola curentă introdusă este corectă
        $currentPasswordHash = $userData['password'];
        if (password_verify($currentPassword, $currentPasswordHash)) {
            // Actualizează parola în baza de date
            $newPasswordHash = password_hash($newPassword, PASSWORD_DEFAULT);
            $updatePasswordQuery = "UPDATE users SET password = '$newPasswordHash' WHERE id = $userID";
            $updatePasswordResult = mysqli_query($connection, $updatePasswordQuery);
            if ($updatePasswordResult) {
                $passwordChangeMessage = "Parola a fost actualizată cu succes.";
            } else {
                $passwordChangeMessage = "A apărut o eroare la actualizarea parolei: " . mysqli_error($connection);
            }
        } else {
            $passwordChangeMessage = "Parola curentă introdusă este incorectă.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Profile</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <header>
        <nav>
            <ul>
                <li><a href="index.php">Dashboard</a></li>
                <li><a href="profile.php">Profile</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <div class="container">
            <h1>Profile</h1>

            <h2>Change Email</h2>
            <?php if (!empty($emailChangeMessage)) : ?>
                <p class="message <?php echo $updateEmailResult ? 'success' : 'error'; ?>"><?php echo $emailChangeMessage; ?></p>
            <?php endif; ?>
            <form method="post" action="">
                <div>
                    <label for="new_email">New Email:</label>
                    <input type="email" id="new_email" name="new_email" required>
                </div>
                <div>
                    <label for="confirm_email">Confirm Email:</label>
                    <input type="email" id="confirm_email" name="confirm_email" required>
                </div>
                <div>
                    <button type="submit" name="change_email">Change Email</button>
                </div>
            </form>

            <h2>Change Password</h2>
            <?php if (!empty($passwordChangeMessage)) : ?>
                <p class="message <?php echo $updatePasswordResult ? 'success' : 'error'; ?>"><?php echo $passwordChangeMessage; ?></p>
            <?php endif; ?>
            <form method="post" action="">
                <div>
                    <label for="current_password">Current Password:</label>
                    <input type="password" id="current_password" name="current_password" required>
                </div>
                <div>
                    <label for="new_password">New Password:</label>
                    <input type="password" id="new_password" name="new_password" required>
                </div>
                <div>
                    <label for="confirm_password">Confirm Password:</label>
                    <input type="password" id="confirm_password" name="confirm_password" required>
                </div>
                <div>
                    <button type="submit" name="change_password">Change Password</button>
                </div>
            </form>
        </div>
    </main>
</body>

</html>
