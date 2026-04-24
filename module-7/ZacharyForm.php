<?php
/**
 * ZacharyForm.php
 *
 * Description: A form that prompts the user to enter seven fields of data
 *              using a minimum of four different data types. On submission
 *              the data is sent to ZacharyResponse.php for validation and display.
 *
 * Author:      Zachary
 * Date:        4/24/26
 * 
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ZacharyForm</title>
    <style>
        body { font-family: Arial, sans-serif; max-width: 480px; margin: 40px auto; padding: 0 20px; }
        label { display: block; margin-top: 12px; font-weight: bold; }
        input, select, textarea { width: 100%; padding: 6px; margin-top: 4px; box-sizing: border-box; }
        small { color: #777; }
        button { margin-top: 15px; padding: 8px 16px; }
    </style>
</head>
<body>
 
    <h1>ZacharyForm</h1>
    <p>Please fill in all seven fields and click Submit.</p>
 
    <form method="POST" action="ZacharyResponse.php">
 
        <!-- Field 1: Text — Full Name -->
        <label for="full_name">Full Name</label>
        <input type="text" id="full_name" name="full_name" placeholder="John Smith">
 
        <!-- Field 2: Email — Email Address -->
        <label for="email">Email Address</label>
        <input type="email" id="email" name="email" placeholder="john@example.com">
 
        <!-- Field 3: Number — Age -->
        <label for="age">Age</label>
        <input type="number" id="age" name="age" min="1" max="120">
        <small>Must be between 1 and 120.</small>
 
        <!-- Field 4: Tel — Phone Number -->
        <label for="phone">Phone Number</label>
        <input type="tel" id="phone" name="phone" placeholder="555-555-5555">
        <small>Format: 555-555-5555</small>
 
        <!-- Field 5: Select — Favorite Season -->
        <label for="season">Favorite Season</label>
        <select id="season" name="season">
            <option value="">-- Select a Season --</option>
            <option value="Spring">Spring</option>
            <option value="Summer">Summer</option>
            <option value="Fall">Fall</option>
            <option value="Winter">Winter</option>
        </select>
 
        <!-- Field 6: Date — Date of Birth -->
        <label for="dob">Date of Birth</label>
        <input type="date" id="dob" name="dob">
 
        <!-- Field 7: Textarea — Short Bio -->
        <label for="bio">Short Bio</label>
        <textarea id="bio" name="bio" rows="4" placeholder="Tell us a little about yourself..."></textarea>
        <small>10–500 characters.</small>
 
        <br>
        <button type="submit">Submit</button>
        <button type="reset">Reset</button>
 
    </form>
 
    <footer>
        <p>ZacharyForm.php &mdash; PHP Form Demo</p>
    </footer>
 
</body>
</html>