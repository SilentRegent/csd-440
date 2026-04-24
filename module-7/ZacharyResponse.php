eresponse · PHP
Copy

<?php
/**
 * ZacharyResponse.php
 *
 * Description: Receives POST data from ZacharyForm.php, validates all seven
 *              fields, and either displays the submitted data in a formatted
 *              table or returns an error page listing any problems found.
 *
 * Author:      Zachary Anderson
 * Date:        4/24/26
 * 
 *
 * Validation Rules:
 *   - full_name : Required, letters and spaces only, 2–60 characters
 *   - email     : Required, must be a valid email format
 *   - age       : Required, must be a number between 1 and 120
 *   - phone     : Required, must match format 555-555-5555
 *   - season    : Required, must be one of the four allowed values
 *   - dob       : Required, must be a valid past date
 *   - bio       : Required, 10–500 characters
 */
 
// Redirect to form if accessed directly without POST data
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: ZacharyForm.php");
    exit();
}
 
// -------------------------------------------------------
// Sanitize inputs
// -------------------------------------------------------
$fullName = trim(strip_tags($_POST['full_name'] ?? ""));
$email    = trim(strip_tags($_POST['email']     ?? ""));
$age      = trim(strip_tags($_POST['age']       ?? ""));
$phone    = trim(strip_tags($_POST['phone']     ?? ""));
$season   = trim(strip_tags($_POST['season']    ?? ""));
$dob      = trim(strip_tags($_POST['dob']       ?? ""));
$bio      = trim(strip_tags($_POST['bio']       ?? ""));
 
// -------------------------------------------------------
// Validate each field and collect errors
// -------------------------------------------------------
$errors = [];
 
/* Full Name — letters and spaces only, 2–60 characters */
if (empty($fullName)) {
    $errors[] = "Full Name is required.";
} elseif (!preg_match("/^[a-zA-Z\s]{2,60}$/", $fullName)) {
    $errors[] = "Full Name must be 2–60 characters and contain only letters and spaces.";
}
 
/* Email — must pass PHP built-in email validation */
if (empty($email)) {
    $errors[] = "Email Address is required.";
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = "Email Address must be a valid format (example: john@example.com).";
}
 
/* Age — numeric, between 1 and 120 */
if (empty($age)) {
    $errors[] = "Age is required.";
} elseif (!is_numeric($age) || (int)$age < 1 || (int)$age > 120) {
    $errors[] = "Age must be a number between 1 and 120.";
}
 
/* Phone — must match 555-555-5555 format */
if (empty($phone)) {
    $errors[] = "Phone Number is required.";
} elseif (!preg_match("/^\d{3}-\d{3}-\d{4}$/", $phone)) {
    $errors[] = "Phone Number must follow the format 555-555-5555.";
}
 
/* Season — must be one of the four allowed values */
$allowedSeasons = ["Spring", "Summer", "Fall", "Winter"];
if (empty($season)) {
    $errors[] = "Favorite Season is required.";
} elseif (!in_array($season, $allowedSeasons)) {
    $errors[] = "Favorite Season must be Spring, Summer, Fall, or Winter.";
}
 
/* Date of Birth — must be a valid past date */
if (empty($dob)) {
    $errors[] = "Date of Birth is required.";
} else {
    $dobTimestamp = strtotime($dob);
    if ($dobTimestamp === false) {
        $errors[] = "Date of Birth must be a valid date.";
    } elseif ($dobTimestamp >= strtotime("today")) {
        $errors[] = "Date of Birth must be a date in the past.";
    }
}
 
/* Bio — between 10 and 500 characters */
if (empty($bio)) {
    $errors[] = "Short Bio is required.";
} elseif (strlen($bio) < 10 || strlen($bio) > 500) {
    $errors[] = "Short Bio must be between 10 and 500 characters.";
}
 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ZacharyResponse</title>
    <style>
        body { font-family: Arial, sans-serif; max-width: 480px; margin: 40px auto; padding: 0 20px; }
        table { width: 100%; border-collapse: collapse; margin-top: 15px; }
        th, td { text-align: left; padding: 8px; border-bottom: 1px solid #ccc; }
        th { background-color: #f0f0f0; }
        ul { color: red; }
    </style>
</head>
<body>
 
    <h1>ZacharyResponse</h1>
 
    <?php if (!empty($errors)): ?>
 
        <!-- Error display -->
        <p style="color: red;">Please fix the following errors:</p>
        <ul>
            <?php foreach ($errors as $error): ?>
                <li><?= htmlspecialchars($error) ?></li>
            <?php endforeach; ?>
        </ul>
        <a href="ZacharyForm.php">Go Back</a>
 
    <?php else: ?>
 
        <!-- Success display -->
        <p style="color: green;">All fields validated successfully!</p>
 
        <table>
            <tr><th>Full Name</th><td><?= htmlspecialchars($fullName) ?></td></tr>
            <tr><th>Email Address</th><td><?= htmlspecialchars($email) ?></td></tr>
            <tr><th>Age</th><td><?= htmlspecialchars($age) ?></td></tr>
            <tr><th>Phone Number</th><td><?= htmlspecialchars($phone) ?></td></tr>
            <tr><th>Favorite Season</th><td><?= htmlspecialchars($season) ?></td></tr>
            <tr><th>Date of Birth</th><td><?= htmlspecialchars(date("F j, Y", strtotime($dob))) ?></td></tr>
            <tr><th>Short Bio</th><td><?= htmlspecialchars($bio) ?></td></tr>
        </table>
 
        <br>
        <a href="ZacharyForm.php">Submit Another Response</a>
 
    <?php endif; ?>
 
    <footer>
        <p>ZacharyResponse.php &mdash; PHP Form Demo</p>
    </footer>
 
</body>
</html>