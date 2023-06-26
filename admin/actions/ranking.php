<?php
require '../../scripts/config.php';

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

// Create an XML document for the RSS feed
$dom = new DOMDocument('1.0', 'utf-8');

// Create the root <rss> element
$rss = $dom->createElement('rss');
$rss->setAttribute('version', '2.0');
$dom->appendChild($rss);

// Create the <channel> element
$channel = $dom->createElement('channel');
$rss->appendChild($channel);

// Add the channel metadata
$title = $dom->createElement('title', 'Inventory');
$link = $dom->createElement('link', 'http://example.com/inventory');
$description = $dom->createElement('description', 'Latest inventory items');
$channel->appendChild($title);
$channel->appendChild($link);
$channel->appendChild($description);

// Loop through each item and create <item> elements
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

    // Create the <item> element
    $item = $dom->createElement('item');

    // Add the item details as child elements of <item>
    $item->appendChild($dom->createElement('category', $category));
    $item->appendChild($dom->createElement('context_of_use', $context_of_use));
    $item->appendChild($dom->createElement('price', $price));
    $item->appendChild($dom->createElement('desirability', $is_desirable));
    $item->appendChild($dom->createElement('rating', $rating));
    $item->appendChild($dom->createElement('name', $name));
    $item->appendChild($dom->createElement('description', $description));

    // Add the <item> element to the <channel>
    $channel->appendChild($item);
}

mysqli_free_result($result); // Free the result set

// Set the appropriate HTTP headers for XML content
header('Content-Type: application/xml; charset=utf-8');
header('Content-Disposition: attachment; filename=inventory.rss');

// Output the XML document
echo $dom->saveXML();
