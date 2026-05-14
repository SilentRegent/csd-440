<html>
<head>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
<center>
<h2>Add a Marine</h2>
 
<?php
$lineBreak = '<br />';
 
if ($_SERVER["REQUEST_METHOD"] === "POST") {
 
    $conn = new mysqli("localhost", "student1", "pass", "baseball_01");
 
    if ($conn->connect_error) {
        die("ERROR: Unable to connect: " . $conn->connect_error);
    }
 
    $first_name  = trim($_POST['first_name']);
    $last_name   = trim($_POST['last_name']);
    $marine_rank = trim($_POST['marine_rank']);
    $kills       = (int) $_POST['kills'];
    $deaths      = (int) $_POST['deaths'];
    $status      = trim($_POST['status']);
 
    $stmt = $conn->prepare("INSERT INTO aliens_marines 
        (first_name, last_name, marine_rank, kills, deaths, status) 
        VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssiis", $first_name, $last_name, $marine_rank, $kills, $deaths, $status);
 
    if ($stmt->execute()) {
        echo "<p style='color:green;'>Marine <strong>$first_name $last_name</strong> added successfully!</p>";
    } else {
        echo "<p style='color:red;'>Error adding marine: " . $stmt->error . "</p>";
    }
 
    $stmt->close();
    $conn->close();
}
?>
 
<form method="POST">
    <table cellpadding='6'>
        <tr>
            <td><label>First Name:</label></td>
            <td><input type="text" name="first_name" required></td>
        </tr>
        <tr>
            <td><label>Last Name:</label></td>
            <td><input type="text" name="last_name" required></td>
        </tr>
        <tr>
            <td><label>Rank:</label></td>
            <td><input type="text" name="marine_rank" required></td>
        </tr>
        <tr>
            <td><label>Kills:</label></td>
            <td><input type="number" name="kills" min="0" value="0" required></td>
        </tr>
        <tr>
            <td><label>Deaths:</label></td>
            <td><input type="number" name="deaths" min="0" value="0" required></td>
        </tr>
        <tr>
            <td><label>Status:</label></td>
            <td>
                <select name="status">
                    <option value="Alive">Alive</option>
                    <option value="KIA">KIA</option>
                    <option value="MIA">MIA</option>
                </select>
            </td>
        </tr>
        <tr>
            <td colspan="2"><button type="submit">Add Marine</button></td>
        </tr>
    </table>
</form>
 
<br><a href='http://localhost/ZacharyAssignment9/'><button>Return to Assignment 9</button></a>
</center>
</body>
</html>