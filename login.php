<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login Page</title>
    <link rel="stylesheet" href="style/style.css">
</head>

<body>
    <div class="container">
        <form method="POST" action="actions/login.php">
            <h1>Login</h1>
            <label for="email">Email</label>
            <input type="text" id="email" name="email" placeholder="Enter your email" required>

            <label for="password">Password</label>
            <input type="password" id="password" name="password" placeholder="Enter your password" required>

            <input type="submit" name="login" value="Login">

            <?php
            if (isset($_GET['error'])) {
                echo '<p class="error-message">Invalid password. Please try again.</p>';
            }
            ?>
        </form>
    </div>

</body>

</html>
