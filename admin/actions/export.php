<?php
require '../../scripts/config.php';

// Fetch items from the database
$query = "SELECT category, context_of_use, price, is_desirable FROM items";
$result = mysqli_query($connection, $query);

if (!$result) {
    die("Error fetching items: " . mysqli_error($connection));
}

// Generate unique filename based on current date and time
$filename = 'export_' . date('Ymd_His') . '.csv';

// Set headers for CSV file download
header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename="' . $filename . '"');

// Open output stream for writing CSV data
$output = fopen('php://output', 'w');

// Write headers to CSV
$headers = array('Category', 'Context of Use', 'Price', 'Is Desirable');
fputcsv($output, $headers);

// Write data rows to CSV
while ($row = mysqli_fetch_assoc($result)) {
    $data = array(
        $row['category'],
        $row['context_of_use'],
        $row['price'],
        $row['is_desirable']
    );
    fputcsv($output, $data);
}

// Close output stream
fclose($output);
exit;
?>
