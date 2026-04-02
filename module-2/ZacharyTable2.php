<?php
/**
 * File:    ZacharyTable2.php
 * Author:  Zachary Anderson
 * Date:    April 1, 2026
 * Module:  2.2 Assignment
 *
 * Purpose: Displays a 5x5 HTML table populated with PHP-generated
 *          random numbers using a nested loop structure.
 *          The actual HTML table tags are written outside of PHP tags
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>John's Random Number Table</title>
    <style>
        /* Style the table for readability */
        table {
            border-collapse: collapse;
            margin: 30px auto;
            font-family: Arial, sans-serif;
        }
        th, td {
            border: 1px solid #333;
            padding: 12px 20px;
            text-align: center;
            font-size: 16px;
        }
        th {
            background-color: #4a6fa5;
            color: white;
        }
        tr:nth-child(even) td {
            background-color: #f2f2f2;
        }
        h1 {
            text-align: center;
            font-family: Arial, sans-serif;
        }
        footer {
            text-align: center;
            margin-top: 20px;
            font-family: Arial, sans-serif;
            color: #555;
        }
    </style>
</head>
<body>

    <h1>My First Random Number Table in PHP</h1>

    <!-- Table tags are written in HTML, NOT inside PHP -->
    <table>
        <tr>
            <th>Column 1</th>
            <th>Column 2</th>
            <th>Column 3</th>
            <th>Column 4</th>
            <th>Column 5</th>
        </tr>

        <?php
        /* Outer loop: controls the number of ROWS (5 rows) */
        for ($row = 0; $row < 5; $row++) {
        ?>
            <!-- HTML row tag is OUTSIDE the PHP tag -->
            <tr>

            <?php
            /* Inner loop: controls the number of COLUMNS (5 columns) */
            for ($col = 0; $col < 5; $col++) {
            ?>

                <!-- HTML cell tag is OUTSIDE the PHP tag -->
                <td>
                    <?php
                    /* Generate and display a random number between 1 and 100 */
                    echo rand(1, 100);
                    ?>
                </td>

            <?php
            } /* End inner loop (columns) */
            ?>

            </tr>

        <?php
        } /* End outer loop (rows) */
        ?>

    </table>
    <footer>
        Author : Zachary Anderson
        <!--
        I added this date function because I thought it would be a nice touch to show when the page was generated.
         -->
         <p>Page generated on: <?php echo date("l, F j, Y \a\\t g:i:s A"); ?></p>
    </footer>
</body>
</html>