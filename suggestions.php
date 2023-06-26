<?php
require 'scripts/config.php';

// Preia valoarea pentru sugestie din parametrul GET
$name = $_GET['name'];

// Escapează caracterele speciale pentru a preveni SQL injection
$name = mysqli_real_escape_string($connection, $name);

// Interogare pentru a căuta numele itemelor similare în baza de date
$query = "SELECT name FROM items WHERE category = 'cars' AND name LIKE '$name%'";
$result = mysqli_query($connection, $query);

if (!$result) {
    die("Error fetching suggestions: " . mysqli_error($connection));
}

// Array pentru a stoca sugestiile
$suggestions = array();

// Preia numele itemelor și le adaugă în array-ul de sugestii
while ($row = mysqli_fetch_assoc($result)) {
    $suggestions[] = $row['name'];
}

// Returnează sugestiile ca un răspuns JSON
header('Content-Type: application/json');
echo json_encode($suggestions);
?>