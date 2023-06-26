<?php
require '../scripts/config.php';

// Fetch users from the database
$query = "SELECT * FROM users";
$result = mysqli_query($connection, $query);

if (!$result) {
    die("Error fetching users: " . mysqli_error($connection));
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Inventory</title>
    <link rel="stylesheet" href="../styleindex.css">
</head>

<body>
    <?php include 'actions/header.php'; ?>

    <main>
        <h1>Inventory</h1>

        <div class="users">
            <h2>Users</h2>

            <table>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>

                <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td>
                            <form method="post" action="actions/delete_user.php">
                                <input type="hidden" name="user_id" value="<?php echo $row['id']; ?>">
                                <input type="submit" value="Delete">
                            </form>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </table>
        </div>

        <div class="items">
            <!-- Your item listing code goes here -->
        </div>
    </main>
</body>

</html>
