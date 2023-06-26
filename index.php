<?php
require 'scripts/config.php';

// Fetch categories from the database
$categoryQuery = "SELECT DISTINCT category FROM items";
$categoryResult = mysqli_query($connection, $categoryQuery);

if (!$categoryResult) {
    die("Error fetching categories: " . mysqli_error($connection));
}

// Initialize filters
$categoryFilter = isset($_GET['category']) ? $_GET['category'] : '';
$priceFilter = isset($_GET['price']) ? $_GET['price'] : '';

// Build the WHERE clause for filtering
$whereClause = '';
if (!empty($categoryFilter)) {
    $whereClause .= "WHERE category = '$categoryFilter'";
}
if (!empty($priceFilter)) {
    $priceFilter = floatval($priceFilter);
    $whereClause .= (!empty($whereClause) ? ' AND ' : 'WHERE ') . "price <= $priceFilter";
}

// Build the ORDER BY clause for sorting
$orderByClause = "ORDER BY category, price ASC";

// Fetch items from the database with filters and sorting
$query = "SELECT category, context_of_use, price, is_desirable, popularity, name, description FROM items $whereClause $orderByClause";
$result = mysqli_query($connection, $query);

if (!$result) {
    die("Error fetching items: " . mysqli_error($connection));
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Inventory</title>
    <link rel="stylesheet" href="styleindex.css">
</head>

<body>
<?php include 'components/header.php'; ?>

    <main>
        <h1>Inventory</h1>

        <div class="filters">
            <form method="get" action="">
                <label for="category">Category:</label>
                <select id="category" name="category">
                    <option value="">All</option>
                    <?php
                    // Loop through each category and display it as an option
                    while ($row = mysqli_fetch_assoc($categoryResult)) {
                        $category = $row['category'];
                        echo "<option value=\"$category\"" . ($categoryFilter === $category ? ' selected' : '') . ">$category</option>";
                    }
                    ?>
                </select>

                <label for="price">Price:</label>
                <input type="text" id="price" name="price" value="<?php echo $priceFilter; ?>" placeholder="Max Price">

                <input type="submit" value="Apply">
            </form>
        </div>

        <div class="items">
            <?php
            // Loop through each item and display it
            while ($row = mysqli_fetch_assoc($result)) {
                $category = $row['category'];
                $context_of_use = $row['context_of_use'];
                $price = $row['price'];
                $is_desirable = $row['is_desirable'] ? 'Desirable' : 'Undesirable';
                $popularity = $row['popularity'];
                $name = $row['name'];
                $description = $row['description'];

                // Calculate the rating based on popularity
                $rating = $popularity >= 0 ? '+' : '-';
                $rating .= abs($popularity);

                // Display the item details
                echo '<div class="item">';
                echo "<span class='category'>Category: $category</span>";
                echo "<span class='context'>Context of Use: $context_of_use</span>";
                echo "<span class='price'>Price: $price</span>";
                echo "<span class='desirability'>Desirability: $is_desirable</span>";
                echo "<span class='rating'>Rating: $rating</span>";
                echo "<span class='name'>Name: $name</span>";
                echo "<span class='description'>Description: $description</span>";
                echo '</div>';
            }
            mysqli_free_result($result); // Free the result set
            ?>
        </div>

    </main>
</body>

</html>
