<?php
require 'scripts/config.php';

// Verifică dacă formularul a fost trimis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Preia valorile din formular
    $category = $_POST['category'];
    $context_of_use = $_POST['context_of_use'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $is_desirable = isset($_POST['is_desirable']) ? 1 : 0;
    $description = $_POST['description'];

    // Verifică dacă există deja un item cu același nume și categorie în baza de date
    $existingItemQuery = "SELECT * FROM items WHERE category = '$category' AND name = '$name' LIMIT 1";
    $existingItemResult = mysqli_query($connection, $existingItemQuery);

    if (!$existingItemResult) {
        die("Error checking existing item: " . mysqli_error($connection));
    }

    if (mysqli_num_rows($existingItemResult) > 0) {
        // Dacă există deja un item cu același nume și categorie, actualizează popularitatea
        $existingItem = mysqli_fetch_assoc($existingItemResult);
        $existingPopularity = $existingItem['popularity'] ?? 0;
        $newPopularity = $existingPopularity + 1;

        $updateQuery = "UPDATE items SET popularity = '$newPopularity' WHERE id = " . $existingItem['id'];
        $updateResult = mysqli_query($connection, $updateQuery);

        if (!$updateResult) {
            die("Error updating item: " . mysqli_error($connection));
        }

        // Redirecționează către pagina de succes
        header('Location: success.php');
        exit;
    } else {
        // Inserează un nou item în baza de date
        $insertQuery = "INSERT INTO items (category, context_of_use, name, price, is_desirable, description) 
                        VALUES ('$category', '$context_of_use', '$name', '$price', '$is_desirable', '$description')";
        $insertResult = mysqli_query($connection, $insertQuery);

        if ($insertResult) {
            // Redirecționează către pagina de succes
            header('Location: success.php');
            exit;
        } else {
            die("Error adding item: " . mysqli_error($connection));
        }
    }
}

// Fetch categories from the database
$categoryQuery = "SELECT * FROM categories";
$categoryResult = mysqli_query($connection, $categoryQuery);

if (!$categoryResult) {
    die("Error fetching categories: " . mysqli_error($connection));
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Add Item</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <header>
        <nav>
            <ul>
                <li><a href="index.php">Dashboard</a></li>
                <li><a href="#">Profile</a></li>
                <li><a href="add_item.php">Add Item</a></li>
                <li><a href="export.php">Export</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <div class="container">
            <h1>Add Item</h1>

            <form method="POST" action="add_item.php">
                <div>
                    <label for="category">Category:</label>
                    <select id="category" name="category" required>
                        <?php while ($row = mysqli_fetch_assoc($categoryResult)) { ?>
                            <option value="<?php echo $row['category']; ?>"><?php echo $row['category']; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div>
                    <label for="context_of_use">Context of Use:</label>
                    <input type="text" id="context_of_use" name="context_of_use" required>
                </div>
                <div>
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name" required>
                    <div id="suggestions"></div>
                </div>
                <div>
                    <label for="price">Price:</label>
                    <input type="number" id="price" name="price" step="0.01" required>
                </div>
                <div>
                    <label for="is_desirable">Is Desirable:</label>
                    <input type="checkbox" id="is_desirable" name="is_desirable">
                </div>
                <div>
                    <label for="description">Description:</label>
                    <textarea id="description" name="description" rows="4" required></textarea>
                </div>
                <div>
                    <button type="submit">Add Item</button>
                </div>
            </form>
        </div>
    </main>

    <script>
        const nameInput = document.getElementById('name');
        const suggestionsDiv = document.getElementById('suggestions');

        nameInput.addEventListener('input', () => {
            const name = nameInput.value.trim();

            if (name !== '') {
                fetch(`suggestions.php?name=${name}`)
                    .then(response => response.json())
                    .then(data => {
                        suggestionsDiv.innerHTML = '';
                        data.forEach(item => {
                            const suggestion = document.createElement('div');
                            suggestion.textContent = item;
                            suggestion.classList.add('suggestion');
                            suggestionsDiv.appendChild(suggestion);
                        });
                    })
                    .catch(error => console.error(error));
            } else {
                suggestionsDiv.innerHTML = '';
            }
        });

        // Handle suggestion click event
        suggestionsDiv.addEventListener('click', (event) => {
            const clickedSuggestion = event.target;
            if (clickedSuggestion.classList.contains('suggestion')) {
                nameInput.value = clickedSuggestion.textContent;
                suggestionsDiv.innerHTML = '';
            }
        });
    </script>
</body>

</html>
