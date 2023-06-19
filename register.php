<!DOCTYPE html>
<html>

<head>
    <title>IDis</title>
    <link rel="stylesheet" href="style/style.css">
</head>

<body>
    <div class="form">
        <form class="register-form" method="POST" action="actions/register.php">
            <input type="text" name="name" placeholder="Name" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="text" name="email" placeholder="Email address" required>
            <button type="submit">Create</button>
            <p class="message">Already registered? <a href="index.html">Sign In</a></p>
        </form>
    </div>
</body>

</html>
