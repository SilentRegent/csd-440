<?php
/**
 * Customers.php
 *
 * Description: Creates an array of customers and uses PHP array methods
 *              to search and display records by different data fields.
 *
 * Author:      
 * Date:        2026-04-18
 * Version:     1.0
 */

/*
 * Customer array — each entry contains:
 *   first_name, last_name, age, phone
 */
$customers = [
    ["first_name" => "Alice",   "last_name" => "Johnson",   "age" => 34, "phone" => "209-555-0101"],
    ["first_name" => "Bob",     "last_name" => "Martinez",  "age" => 27, "phone" => "209-555-0102"],
    ["first_name" => "Carol",   "last_name" => "Thompson",  "age" => 45, "phone" => "209-555-0103"],
    ["first_name" => "David",   "last_name" => "Johnson",   "age" => 52, "phone" => "209-555-0104"],
    ["first_name" => "Elena",   "last_name" => "Nguyen",    "age" => 29, "phone" => "209-555-0105"],
    ["first_name" => "Frank",   "last_name" => "Robinson",  "age" => 61, "phone" => "209-555-0106"],
    ["first_name" => "Grace",   "last_name" => "Patel",     "age" => 38, "phone" => "209-555-0107"],
    ["first_name" => "Henry",   "last_name" => "Williams",  "age" => 24, "phone" => "209-555-0108"],
    ["first_name" => "Isabel",  "last_name" => "Chen",      "age" => 33, "phone" => "209-555-0109"],
    ["first_name" => "James",   "last_name" => "Martinez",  "age" => 47, "phone" => "209-555-0110"],
    ["first_name" => "Karen",   "last_name" => "Lee",       "age" => 55, "phone" => "209-555-0111"],
    ["first_name" => "Liam",    "last_name" => "Brown",     "age" => 31, "phone" => "209-555-0112"],
];

/*
 * SEARCH 1 — Find by last name "Johnson"
 * Method: array_filter()
 */
$byLastName = array_filter($customers, function ($c) {
    return strcasecmp($c["last_name"], "Johnson") === 0;
});

/*
 * SEARCH 2 — Find customers over age 40
 * Method: array_filter()
 */
$overForty = array_filter($customers, function ($c) {
    return $c["age"] > 40;
});

/*
 * SEARCH 3 — Find by phone number
 * Method: array_column() + array_search()
 */
$searchPhone = "209-555-0107";
$phones      = array_column($customers, "phone");
$phoneIndex  = array_search($searchPhone, $phones);
$byPhone     = ($phoneIndex !== false) ? [$customers[$phoneIndex]] : [];

/*
 * SEARCH 4 — Sort all customers by age ascending
 * Method: usort()
 */
$sortedByAge = $customers;
usort($sortedByAge, function ($a, $b) {
    return $a["age"] <=> $b["age"];
});

/*
 * renderTable()
 *
 * Outputs an HTML table for the given array of customer records.
 *
 * @param array $records
 * @return void
 */
function renderTable(array $records): void
{
    if (empty($records)) {
        echo "<p>No records found.</p>";
        return;
    }

    echo "<table>";
    echo "<tr><th>#</th><th>First Name</th><th>Last Name</th><th>Age</th><th>Phone</th></tr>";

    $i = 1;
    foreach ($records as $c) {
        echo "<tr>";
        echo "<td>" . $i++ . "</td>";
        echo "<td>" . htmlspecialchars($c["first_name"]) . "</td>";
        echo "<td>" . htmlspecialchars($c["last_name"]) . "</td>";
        echo "<td>" . $c["age"] . "</td>";
        echo "<td>" . htmlspecialchars($c["phone"]) . "</td>";
        echo "</tr>";
    }

    echo "</table>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Customers</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 700px;
            margin: 40px auto;
            padding: 0 20px;
        }
        h1 { font-size: 1.5rem; margin-bottom: 5px; }
        h2 { font-size: 1.1rem; margin-top: 30px; margin-bottom: 8px; }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 10px;
        }
        th, td {
            border: 1px solid #ccc;
            padding: 8px 12px;
            text-align: left;
        }
        th { background-color: #f0f0f0; }
    </style>
</head>
<body>

    <h1>Customer Directory</h1>
    <p>Displaying <?= count($customers) ?> customers and searching records using PHP array methods.</p>

    <h2>All Customers</h2>
    <?php renderTable($customers); ?>

    <h2>Search by Last Name: "Johnson"</h2>
    <?php renderTable($byLastName); ?>

    <h2>Customers Over Age 40</h2>
    <?php renderTable($overForty); ?>

    <h2>Search by Phone: "<?= htmlspecialchars($searchPhone) ?>"</h2>
    <?php renderTable($byPhone); ?>

    <h2>All Customers Sorted by Age</h2>
    <?php renderTable($sortedByAge); ?>

    <footer>
        <p>Customers.php — PHP Array Methods Demo</p>
    </footer>

</body>
</html>