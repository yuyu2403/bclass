<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../common/style.css">

<body>
    <div class="contact">
        <h1 class="contact-ttl">お問い合わせフォーム</h1>
    </div>
    <div>
        <table class="contact-table">
            <tr>
                <th class="contact-exit">送信完了です。</th>
            </tr>
            <tr>
                <th class="contact-exit">ありがとうございました。</th>
            </tr>
            <div>
                <form>
                    <input type="button" onclick="location.href='form.html'" value="お問い合わせページに戻る">
                </form>
            </div>
        </table>
    </div>
    <footer class="footer">
        <a href="../index.html" class="footer__return">bclass TOPページへ</a>
        <ul class="footer__navi flex">
            <li><a href="../calc/calc.php">電卓</a></li>
            <!-- <li><a href="../form/form.html">フォーム</a></li> -->
            <li><a href="../gacha/gacha.php">ガチャ</a></li>
            <li><a href="../game/game.php">ゲーム</a></li>
        </ul>
    </footer>

</body>

</html>

<!-- # 送信先アドレス
// $mailto = "xxx@internetacademy.co.jp";
# 送信後画面からの戻り先
$toppage = "form.html"; -->