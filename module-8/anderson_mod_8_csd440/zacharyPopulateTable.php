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

$marines = [
    ["Dwayne",   "Hicks",    "Corporal",  12, 0, "Alive"],
    ["Jenette",  "Vasquez",  "Private",   18, 0, "KIA"],
    ["William",  "Hudson",   "Private",    7, 0, "KIA"],
    ["Mark",     "Drake",    "Private",   10, 0, "KIA"],
    ["Al",       "Apone",    "Sergeant",   5, 0, "KIA"],
    ["Scott",    "Gorman",   "Lieutenant", 2, 0, "KIA"],
    ["Bishop",   "Bishop",   "Synthetic",  0, 0, "Alive"],
    ["Ellen",    "Ripley",   "Civilian",  15, 0, "Alive"],
];

$stmt = $conn->prepare("INSERT INTO Aliens_Marines 
    (first_name, last_name, marine_rank, kills, deaths, status) 
    VALUES (?, ?, ?, ?, ?, ?)");

$stmt->bind_param("sssiis", $first_name, $last_name, $marine_rank, $kills, $deaths, $status);

$count = 0;
foreach ($marines as $marine) {
    [$first_name, $last_name, $marine_rank, $kills, $deaths, $status] = $marine;
    if ($stmt->execute()) {
        echo "Inserted: $first_name $last_name" . $lineBreak;
        $count++;
    } else {
        echo "Error inserting $first_name $last_name: " . $stmt->error . $lineBreak;
    }
}

echo $lineBreak . "$count marines inserted successfully." . $lineBreak;

$stmt->close();
echo "<br><a href='http://localhost/ZacharyAssignment8/'><button>Return to Assignment 8</button></a>";
$conn->close();
?>
</center>
</body>
</html>