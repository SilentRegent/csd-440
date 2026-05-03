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

$sql = "DROP TABLE IF EXISTS Aliens_Marines";

if ($conn->query($sql) === TRUE) {
    echo "Table Aliens_Marines dropped successfully." . $lineBreak;
} else {
    echo "Error dropping table: " . $conn->error . $lineBreak;
}
echo "<br><a href='http://localhost/ZacharyAssignment8/'><button>Return to Assignment 8</button></a>";
$conn->close();
?>
</center>
</body>
</html>