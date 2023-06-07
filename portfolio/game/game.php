<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../portfolio/common/style.css">
    <title>Document</title>
</head>

<body>
    <script>
        document.write('<img src="../common/image/onepiece-syankusu.jpg"class=.sample image>');
        document.write('<img src="../common/image/onepiece-kurohige.jpg">');
    </script>
    <form action="game.php">
        <input type="submit" name="gacha" value="戦闘開始">
    </form>


    <footer class="footer">
        <a href="../index.html" class="footer__return">bclass TOPページへ</a>
        <ul class="footer__navi flex">
            <li><a href="../calc/calc.php">電卓</a></li>
            <li><a href="../form/form.html">フォーム</a></li>
            <li><a href="../gacha/gacha.php">ガチャ</a></li>
            <!-- <li><a href="../game/game.php">ゲーム</a></li> -->
        </ul>
    </footer>


</body>



</html>

<?php
echo "<center>one piese php編</center>";
echo "<center><hr></center>";
//クラスを作ってキャラクターのテンプレートを用意
class Chara
{

    public $name;
    public $hp = 10000;
    public $at_name1;
    public $at_name2;
    public function attack1()
    {
        echo "<center>{$this->name}は{$this->at_name1}で攻撃！！</center>";
    }

    public function __construct($name, $at_name1)
    {
        $this->name = $name;
        $this->at_name1 = $at_name1;
    }
}

$shankusu = new Chara("赤髪のシャンクス", "覇王色の覇気");

$kurohige = new Chara("黒ひげ", "闇水(くろうず)");




//ループしてお互いを攻撃
while ($shankusu->hp > 0 && $kurohige->hp > 0) {

    $shankusu->attack1();
    $kurohige->hp -= rand(4000, 800); //ランダムに減らす
    echo "<center>{$kurohige->name}の残りの体力は{$kurohige->hp}<br></center>"; //○○の残りの体力は○○と表示させる

    echo "<hr>";

    $kurohige->attack1();
    $shankusu->hp -= rand(800, 3000); //ランダムに減らす
    echo "<center>{$shankusu->name}の残りの体力は{$shankusu->hp}<br></center>"; //○○の残りの体力は○○と表示させる
}

echo "<hr>";

//どちらかの体力がなくなったら勝利宣言
if ($shankusu->hp <= 0) {
    echo "<center>本日の勝敗、、{$kurohige->name}の勝利!!</center>";
} else {
    echo "<center>本日の勝敗、、{$shankusu->name}の勝利!!</center>";
}
