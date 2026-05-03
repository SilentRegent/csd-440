<html>
<body bgcolor='ffa07a'>
<center>
<?php

$lineBreak = '<br />';

$conn = new mysqli("localhost", "student1", "pass", "baseball_01");

if ($conn->connect_error) {
    die("ERROR: Unable to connect: " . $conn->connect_error);
}

echo 'Connected to the database.' . $lineBreak;

$sql = "CREATE TABLE IF NOT EXISTS Aliens_Marines (
    marine_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    first_name CHAR(20) NOT NULL,
    last_name CHAR(20) NOT NULL,
    marine_rank CHAR(20) NOT NULL,
    kills INT NOT NULL,
    deaths INT NOT NULL,
    status CHAR(10) NOT NULL
)";

if ($conn->query($sql) === TRUE) {
    echo "Table Aliens_Marines created successfully." . $lineBreak;
} else {
    echo "Error creating table: " . $conn->error . $lineBreak;
}

echo "<br><a href='http://localhost/ZacharyAssignment8/'><button>Return to Assignment 8</button></a>";
$conn->close();
?>
</center>
</body>
</html>