<!DOCTYPE html>
<html lang="en">
<div style="text-align: center">
    <h1>ONE PIECE GitHub編</h1>
</div>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../portfolio/common/style.css">
    <title>Document</title>
</head>

<body>
    <br>
    <div class="sampleimg">
        <div style="position:absolute; top:90px; left:250px">
            <img src="../common/image/syankusu.jpg" width="320px" height="auto" alt="シャンクス">
        </div>
        <div style="position:absolute; top:90px; right:50px">
            <img src="../common/image/kurohige.jpg" width="478px" height="auto" alt="黒ひげ">
        </div>
        </br>
        <br>
        <div style="text-align: center;position:absolute; top:400px">
            <h2>赤髪海賊団大頭：赤髪のシャンクス 　　VS　　 最悪の世代、提督：マーシャル・D・ティーチ</h2>

            </br>
            <br>
            <form action="game.php">
                <input type="submit" name="gacha" value="戦闘開始">
            </form>
            </br>

            <?php
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
            ?>
        </div>
</body>

</html>