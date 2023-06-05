<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>アーティストガチャ＆曲一覧</title>
</head>

<body>
    <h1>アーティストガチャ</h1>
    <form action="gacha-jisho.php">
        <input type="submit" name="gacha" value="ガチャを回す">
    </form>
</body>

</html>

<?php

$database = "artist";
$dsn = 'mysql:host=localhost; dbname=artist; charset=utf8';
$user = 'testuser';
$pass = 'testpass';

$number = rand(0, 4);
$gacha = array("ONE OK ROCK", "Mrs.GREEN APPLE", "Saucy Dog", "RAD WIMPS", "クジラ夜の街");


echo "引いた<a href='artist.php?id=$row[id]'>「 $gacha[$number] 」</a>の情報を見る";


try {
    $dbh = new PDO($dsn, $user, $pass);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    if ($dbh == null) {
        echo "接続に失敗しました。";
    } else {

        # SQL文を定める
        $SQL = <<<_SQL_
INSERT INTO user(
	id,
    name
)
VALUES (
	'$gacha[$number]',
)

_SQL_;

        # SQL文の実行
        $dbh->query($SQL);
        echo ("gachaテーブルにデータを追加しました。");
    }
} catch (PDOException $e) {
    echo "エラー内容：" . $e->getMessage();
    die();
}
$dbh = null;
