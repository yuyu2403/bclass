<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../common/style.css">
    <title>ガチャ</title>
</head>

<body>
    <h1>ブルーロックガチャ</h1>
    <form action="gacha.php">
        <input type="submit" name=gacha value="ガチャを回す">
    </form>
</body>

<footer class="footer">
    <a href="../index.html" class="footer__return">bclass TOPページへ</a>
    <ul class="footer__navi flex">
        <li><a href="../calc/calc.php">電卓</a></li>
        <li><a href="../form/form.html">フォーム</a></li>
        <!-- <li><a href="../gacha/gacha.php">ガチャ</a></li> -->
        <li><a href="../game/game.php">ゲーム</a></li>
    </ul>
</footer>

</html>


<?php
error_reporting(E_ALL & ~E_NOTICE);

#データベースに接続
$dsn = 'mysql:host=localhost; dbname=booksample; charset=utf8';
$user = 'testuser';
$pass = 'testpass';

$datebase = "booksample";

#データベース情報
$testuser = "testuser";
$testpass = "testpass";
$host = "localhost";

// try {
//     $dbh = new PDO($dsn, $user, $pass);
//     $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//     if ($dbh == null) {
//         # エラーが起きたとき、ここは実行されずにcatch内が実行
//     } else {

//         $SQL = <<<_SQL_
//             CREATE TABLE gacha
//           (id int primary key auto_increment,
//           name varchar(255),
//           rarity varchar(255),
//         created_at timestamp  default current_timestamp
//             )
//         _SQL_;

//         $dbh->query($SQL);
//         echo "itemテーブルを作成しました。";
//     }
// } catch (PDOException $e) {
//     echo "エラー内容：" . $e->getMessage();
//     die();
// }
// $dbh = null;

try {
    $dbh = new PDO($dsn, $user, $pass);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    if ($dbh == null) {
        //         # エラーが起きたとき、ここは実行されずにcatch内が実行
    } else {
        if ($_GET) {
            $_GET["gacha"];
            gacha_insert();
            gacha_search();
        }
    }
} catch (PDOException $e) {
    echo "エラー内容：" . $e->getMessage();
    die();
}
$dbh = null;
function gacha_insert()
{
    global $dbh;
    $sql_gacha = <<<_sql_gacha
    INSERT INTO gacha
    (name,rarity,created_at)
     VALUE(?,?,default)
_sql_gacha;

    $stmt = $dbh->prepare($sql_gacha);
    $raritys = ["SSR" => 3, "SR" => 12, "R" => 85];
    $chara["SSR"] = ["rin", "noa"];
    $chara["SR"] = ["nagi", "barou", "isagi", "bachira",];
    $chara["R"] = ["kunigami", "aryu", "niko", "wani", "aik", "okawa"];

    $gacha = mt_rand(0, 100);

    $pb = 0;
    foreach ($raritys as $rarity => $rpb) {
        $pb += $rpb;
        if ($gacha <= $pb) {
            $rand_re_key = array_rand($chara[$rarity], 1);
            $rand_re_value = $chara[$rarity][$rand_re_key];

            break;
        }
    }

    $stmt->bindParam(1, $rand_re_value);
    $stmt->bindParam(2, $rarity);
    $stmt->execute();
    // $lineup2 = array("isagi" => "R", "nagi" => "SR", "batira" => "SSR");
    // $gacha3 = array_rand($lineup2, 1);
    // $v = $lineup2[$gacha3];

    // $stmt->bindParam(1, $gacha3);
    // $stmt->bindParam(2, $v);
    // $stmt->execute();
}

function  gacha_search()
{
    global $dbh;
    $SQL = <<<_SQL_
           select * from gacha 
        _SQL_;

    echo "<h2>一覧を表示しました</h2>";
    echo "<br>";
    $stmt = $dbh->prepare($SQL);
    $stmt->execute();
    echo <<<_b
 <table border = 1>
 <tr>

            <th>"name"</th>
            <th>"rarity"</th>
            <th>"created_at timestamp"</th>
            </tr>
_b;
    while ($row = $stmt->fetch()) {

        $name = $row["name"];
        $rarity = $row["rarity"];
        $created_at_timestamp = $row["created_at"];
        echo <<<_C
        
            <tr>

           
            <td>$name</td>
            <td>$rarity</td>
            <td>$created_at_timestamp</td>
        
            </tr>
    
            _C;
    }
    echo " </table>";
};
