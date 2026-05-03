<html>
<body bgcolor='ffa07a'>
<center>
<?php

$lineBreak = '<br />';

$conn = new mysqli("localhost", "student1", "pass", "baseball_01");

if ($conn->connect_error) {
    die("ERROR: Unable to connect: " . $conn->connect_error);
}

echo 'Connected to the database.' . $lineBreak . $lineBreak;

$sql = "SELECT * FROM Aliens_Marines ORDER BY kills DESC";
$result = $conn->query($sql);

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
    echo "No marines found." . $lineBreak;
}
echo "<br><a href='http://localhost/ZacharyAssignment8/'><button>Return to Assignment 8</button></a>";
$conn->close();
?>
</center>
</body>
</html>