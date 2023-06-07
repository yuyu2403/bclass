
<?php
echo "one piese php編";
echo "<hr>";
//クラスを作ってキャラクターのテンプレートを用意
class Chara
{

    public $name;
    public $hp = 10000;
    public $at_name1;
    public $at_name2;
    public function attack1()
    {
        echo "{$this->name}は{$this->at_name1}で攻撃！！";
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
    echo "{$kurohige->name}の残りの体力は{$kurohige->hp}<br>"; //○○の残りの体力は○○と表示させる

    echo "<hr>";

    $kurohige->attack1();
    $shankusu->hp -= rand(800, 3000); //ランダムに減らす
    echo "{$shankusu->name}の残りの体力は{$shankusu->hp}<br>"; //○○の残りの体力は○○と表示させる
}

echo "<hr>";

//どちらかの体力がなくなったら勝利宣言
if ($shankusu->hp <= 0) {
    echo "本日の勝敗、、{$kurohige->name}の勝利";
} else {
    echo "本日の勝敗!、、{$shankusu->name}の勝利";
}
