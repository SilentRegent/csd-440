<!--

Zachary Anderson
4/6/26
Assignment 4.2
Palindrome Checker in PHP
!-->


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Palindrome Checker</title>
</head>
<body>
    <h1>Palindrome Checker in PHP</h1>

    <?php
    /**
     * Checks if a given string is a palindrome.
     *
     * @param string $str The input string to test.
     * @return bool Returns true if the string is a palindrome, false otherwise.
     */
    function isPalindrome($str) {
        // Remove spaces and convert to lowercase for uniformity
        $cleanStr = strtolower(str_replace(' ', '', $str));
        // Reverse the string
        $reversedStr = strrev($cleanStr);
        // Compare the cleaned string with its reversed version
        return $cleanStr === $reversedStr;
    }

    // Example strings
    $examples = [
        "Racecar",          // Palindrome
        "Level",            // Palindrome
        "Madam",            // Palindrome
        "Hello",            // Not a palindrome
        "World",            // Not a palindrome
        "PHP"               // Not a palindrome
    ];

    // Test each string
    foreach ($examples as $str) {
        $result = isPalindrome($str) ? "is a palindrome" : "is NOT a palindrome";
        echo "<p>Original: <strong>$str</strong> | Reversed: <strong>" 
             . strrev($str) . "</strong> → Result: <em>$result</em></p>";
    }
    ?>
</body>
</html>