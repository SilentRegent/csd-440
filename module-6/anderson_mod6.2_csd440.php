<?php
/**
 * _MyInteger.php
 *
 * Description: Defines the MyInteger class which holds a single integer
 *              and provides methods to test whether the value is even, odd,
 *              or prime. Includes a getter and setter. Two instances are
 *              created and all methods are tested.
 *
 * Author:      Zachary Anderson
 * Date:        4/18/26
 * 
 */
 
/**
 * Class MyInteger
 *
 * Holds a single integer and provides utility methods
 * to check if the value is even, odd, or prime.
 */
class MyInteger
{
    /** @var int $value  The integer stored in this instance. */
    private int $value;
 
    /**
     * Constructor — sets the integer value.
     * @param int $value  The integer to store.
     */
    public function __construct(int $value)
    {
        $this->value = $value;
    }
 
    /**
     * getValue() — returns the stored integer.
     * @return int
     */
    public function getValue(): int
    {
        return $this->value;
    }
 
    /**
     * setValue() — updates the stored integer.
     * @param int $value
     */
    public function setValue(int $value): void
    {
        $this->value = $value;
    }
 
    /**
     * isEven() — returns true if the given integer is even.
     * @param int $n
     * @return bool
     */
    public function isEven(int $n): bool
    {
        return ($n % 2 === 0);
    }
 
    /**
     * isOdd() — returns true if the given integer is odd.
     * @param int $n
     * @return bool
     */
    public function isOdd(int $n): bool
    {
        return !$this->isEven($n);
    }
 
    /**
     * isPrime() — returns true if the stored integer is prime.
     * Uses trial division up to the square root of the value.
     * @return bool
     */
    public function isPrime(): bool
    {
        $n = $this->value;
 
        if ($n <= 1)       return false;
        if ($n === 2)      return true;
        if ($n % 2 === 0)  return false;
 
        $limit = (int) sqrt($n);
        for ($i = 3; $i <= $limit; $i += 2) {
            if ($n % $i === 0) return false;
        }
 
        return true;
    }
}
 
// -------------------------------------------------------
// Create two instances
// -------------------------------------------------------
$intA = new MyInteger(28);  // even, not prime
$intB = new MyInteger(7);   // odd, prime
 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>MyInteger</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 600px;
            margin: 40px auto;
            padding: 0 20px;
        }
        h1 { font-size: 1.5rem; margin-bottom: 5px; }
        h2 { font-size: 1.1rem; margin-top: 25px; margin-bottom: 8px; }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 15px;
        }
        th, td {
            border: 1px solid #ccc;
            padding: 8px 12px;
            text-align: left;
        }
        th { background-color: #f0f0f0; }
    </style>
</head>
<body>
 
    <h1>MyInteger &mdash; Class Demo</h1>
    <p>Testing isEven(), isOdd(), isPrime(), getValue(), and setValue().</p>
 
    <!-- Instance A — value 28 -->
    <h2>Instance A &mdash; getValue() = <?= $intA->getValue() ?></h2>
    <table>
        <tr><th>Method</th><th>Result</th></tr>
        <tr><td>isEven(<?= $intA->getValue() ?>)</td><td><?= $intA->isEven($intA->getValue()) ? "True" : "False" ?></td></tr>
        <tr><td>isOdd(<?= $intA->getValue() ?>)</td><td><?= $intA->isOdd($intA->getValue())  ? "True" : "False" ?></td></tr>
        <tr><td>isPrime()</td><td><?= $intA->isPrime() ? "True" : "False" ?></td></tr>
    </table>
 
    <!-- Instance B — value 7 -->
    <h2>Instance B &mdash; getValue() = <?= $intB->getValue() ?></h2>
    <table>
        <tr><th>Method</th><th>Result</th></tr>
        <tr><td>isEven(<?= $intB->getValue() ?>)</td><td><?= $intB->isEven($intB->getValue()) ? "True" : "False" ?></td></tr>
        <tr><td>isOdd(<?= $intB->getValue() ?>)</td><td><?= $intB->isOdd($intB->getValue())  ? "True" : "False" ?></td></tr>
        <tr><td>isPrime()</td><td><?= $intB->isPrime() ? "True" : "False" ?></td></tr>
    </table>
 
    <!-- Setter demo — update both instances and retest -->
    <?php
        $intA->setValue(13);   // now odd and prime
        $intB->setValue(100);  // now even and not prime
    ?>
 
    <h2>After setValue() &mdash; Instance A updated to <?= $intA->getValue() ?></h2>
    <table>
        <tr><th>Method</th><th>Result</th></tr>
        <tr><td>isEven(<?= $intA->getValue() ?>)</td><td><?= $intA->isEven($intA->getValue()) ? "True" : "False" ?></td></tr>
        <tr><td>isOdd(<?= $intA->getValue() ?>)</td><td><?= $intA->isOdd($intA->getValue())  ? "True" : "False" ?></td></tr>
        <tr><td>isPrime()</td><td><?= $intA->isPrime() ? "True" : "False" ?></td></tr>
    </table>
 
    <h2>After setValue() &mdash; Instance B updated to <?= $intB->getValue() ?></h2>
    <table>
        <tr><th>Method</th><th>Result</th></tr>
        <tr><td>isEven(<?= $intB->getValue() ?>)</td><td><?= $intB->isEven($intB->getValue()) ? "True" : "False" ?></td></tr>
        <tr><td>isOdd(<?= $intB->getValue() ?>)</td><td><?= $intB->isOdd($intB->getValue())  ? "True" : "False" ?></td></tr>
        <tr><td>isPrime()</td><td><?= $intB->isPrime() ? "True" : "False" ?></td></tr>
    </table>
 
    <footer>
        <p>_MyInteger.php &mdash; PHP OOP Class Demo</p>
    </footer>
 
</body>
</html>