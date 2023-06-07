<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../portfolio/common/style.css">
    <title>電卓</title>
</head>

<body>
    <h1>計算できるで～、数字入れて好きに計算してみて～。。。</h1>


    <form action="calc.php" method="get">

        <input type="text" name="num1" id="">
        </div>
        <input type="radio" name="enzan" value="a">+
        <input type="radio" name="enzan" value="b">-
        <input type="radio" name="enzan" value="c">*
        <input type="radio" name="enzan" value="d">/

        <input type="text" name="num2" id="">
        <input type="submit" value="計算">
    </form>
</body>

</html>


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
        echo "<center><h1>四則演算を選択してください！！</h1></center>";
    }
}
