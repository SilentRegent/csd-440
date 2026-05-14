<html>
<head>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
<center>
<h2>Search Marines</h2>
 
<form method="POST">
    <label>Search by:</label>
    <br><br>
    <select name="field">
        <option value="first_name">First Name</option>
        <option value="last_name">Last Name</option>
        <option value="marine_rank">Rank</option>
        <option value="status">Status</option>
    </select>
    <input type="text" name="search" placeholder="Enter search term" required>
    <button type="submit">Search</button>
</form>
 
<br>
 
<?php
$lineBreak = '<br />';
 
if ($_SERVER["REQUEST_METHOD"] === "POST" && !empty($_POST['search'])) {
 
    $conn = new mysqli("localhost", "student1", "pass", "baseball_01");
 
    if ($conn->connect_error) {
        die("ERROR: Unable to connect: " . $conn->connect_error);
    }
 
    $allowed_fields = ['first_name', 'last_name', 'marine_rank', 'status'];
    $field = in_array($_POST['field'], $allowed_fields) ? $_POST['field'] : 'last_name';
    $search = "%" . $_POST['search'] . "%";
 
    $stmt = $conn->prepare("SELECT * FROM aliens_marines WHERE $field LIKE ? ORDER BY kills DESC");
    $stmt->bind_param("s", $search);
    $stmt->execute();
    $result = $stmt->get_result();
 
    if ($result->num_rows > 0) {
        echo "<table border='1' cellpadding='8' cellspacing='0' bgcolor='white'>
            <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Rank</th>
                <th>Kills</th>
                <th>Deaths</th>
                <th>Status</th>
            </tr>";
 
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                <td>{$row['marine_id']}</td>
                <td>{$row['first_name']}</td>
                <td>{$row['last_name']}</td>
                <td>{$row['marine_rank']}</td>
                <td>{$row['kills']}</td>
                <td>{$row['deaths']}</td>
                <td>{$row['status']}</td>
            </tr>";
        }
 
        echo "</table>";
    } else {
        echo "No marines found matching your search." . $lineBreak;
    }
 
    $stmt->close();
    $conn->close();
}
?>
 
<br><a href='http://localhost/ZacharyAssignment9/'><button>Return to Assignment 9</button></a>
</center>
</body>
</html>