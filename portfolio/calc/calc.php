<form action="dentaku.php" method="get">
    <input type="text" name="num1" id="">

    <input type="radio" name="enzan" value="a">+
    <input type="radio" name="enzan" value="b">-
    <input type="radio" name="enzan" value="c">*
    <input type="radio" name="enzan" value="d">/

    <input type="text" name="num2" id="">
    <input type="submit" value="計算">
</form>

<?php
if ($_GET) {

    $num1 = $_GET["num1"];
    $num2 = $_GET["num2"];
    if (isset($_GET["enzan"])) {
        $value = $_GET["enzan"];

        if ($value == "a") {

            echo $num1 + $num2;
        } elseif ($value == "b") {

            echo $num1 - $num2;
        } elseif ($value == "c") {

            echo $num1 * $num2;
        } elseif ($value == "d") {

            echo $num1 / $num2;
        }
    } else {
        echo "<h1>四則演算を選択してください！！</h1>";
    }
}
