<?php
#===========================================================
#  入力情報の受け取りと加工
#===========================================================

$name = $_POST["名前"];
$email = $_POST["メール"];
$job = $_POST["職業"];
$comment = $_POST["お問い合わせ"];

# 入力チェック
if ($name == "") {
    error("名前が未入力です");
}
if (!empty($_POST)) {
    if (!isset($_POST["性別"])) {
        error("性別が未選択です");
    }
    $gen = $_POST["性別"];
    if (!preg_match("/\w+@\w+/", $email)) {
        error("メールアドレスが不正です");
    }
    if ($job == "選択") {
        error("職業が未選択です");
    }
    if (!empty($_POST)) {
        if (!isset($_POST["スキル"])) {
            error("スキルが未選択です");
        }
        $skill = $_POST["スキル"];
    }
    if ($comment == "") {
        error("コメントが未入力です");
    }


    # 無効化
    $name  = htmlentities($name, ENT_QUOTES, "UTF-8");
    $gen = htmlentities($gen, ENT_QUOTES, "UTF-8");
    $email = htmlentities($email, ENT_QUOTES, "UTF-8");
    $job = htmlentities($job, ENT_QUOTES, "UTF-8");
    $skill = htmlentities($skill, ENT_QUOTES, "UTF-8");
    $comment = htmlentities($comment, ENT_QUOTES, "UTF-8");

    # 改行処理
    $name = str_replace("\r\n", "", $name);
    $email = str_replace("\r\n", "", $email);
    $comment = str_replace("\r\n", "\t", $comment);
    $comment = str_replace("\r", "\t", $comment);
    $comment = str_replace("\n", "\t", $comment);
}


# 分岐チェック
// if ($_POST["mode"] == "post") {
//     conf_form();
// } else if ($_POST["mode"] == "send") {
//     send_form();
// }

#-----------------------------------------------------------
#  確認画面
#-----------------------------------------------------------
// function conf_form()
// {
//     global $name;
//     global $gen;
//     global $email;
//     global $job;
//     global $comment;

//     # テンプレート読み込み
//     // $conf = fopen("tmpl/conf.tmpl", "r") or die;
//     // $size = filesize("tmpl/conf.tmpl");
//     // $data = fread($conf, $size); //ファイルサイズを指定することで、全部読み込む
//     // fclose($conf);

# 文字置き換え　//ここにある！はうっかりほかのとこで使ってた場合を考慮してより区別化するための文字列
//     $data = str_replace("!name!", $name, $data); //$data の中に !name! があったら "$name に置き換え
//     $data = str_replace("!email!", $email, $data); //$data の中に !email! があったら $email に置き換える
//     $data = str_replace("!comment!", $comment, $data);
//     // $data = str_replace("--hohohooi--", "サンバのリズムが聞こえるかい", $data);
//     $data = str_replace("!gen!", $gen, $data);
//     $data = str_replace("!job!", $job, $data);
//     # 表示
//     echo $data;
//     exit;
// }

#-----------------------------------------------------------
#  エラー画面
#-----------------------------------------------------------
function error($msg)
{
    $error = fopen("error.tmpl", "r");
    $size = filesize("error.tmpl");
    $data =  fread($error, $size);
    fclose($error);

    #文字置き換え
    $data = str_replace("!message!", $msg, $data);

    #表示
    echo $data;
    exit;
}
