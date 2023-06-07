<?php

# 送信先アドレス
// $mailto = "xxx@internetacademy.co.jp";
# 送信後画面からの戻り先
$toppage = "./form.html";

#===========================================================
#  入力情報の受け取りと加工
#===========================================================
$name = $_POST["name"];
$gen = $_POST["gender"];
$email = $_POST["email"];
$job = $_POST["job"];
$comment = $_POST["comment"];

# 無効化
$name  = htmlentities($name, ENT_QUOTES, "UTF-8");
$gen = htmlentities($gen, ENT_QUOTES, "UTF-8");
$email = htmlentities($email, ENT_QUOTES, "UTF-8");
$job = htmlentities($job, ENT_QUOTES, "UTF-8");
$comment = htmlentities($comment, ENT_QUOTES, "UTF-8");

# 改行処理
$name = str_replace("\r\n", "", $name);
$email = str_replace("\r\n", "", $email);
$comment = str_replace("\r\n", "\t", $comment);
$comment = str_replace("\r", "\t", $comment);
$comment = str_replace("\n", "\t", $comment);

# 入力チェック
if ($name == "") {
    error("名前が未入力です");
}
if ($gen == ""){
    error("性別が未選択です");
}
if (!preg_match("/\w+@\w+/", $email)) {
    error("メールアドレスが不正です");
}
if ($job == ""){
    error("職業が未選択です")
}
if ($comment == "") {
    error("コメントが未入力です");
}

# 分岐チェック
if ($_POST["mode"] == "post") {
    conf_form();
} else if ($_POST["mode"] == "send") {
    send_form();
}

#-----------------------------------------------------------
#  確認画面
#-----------------------------------------------------------
function conf_form()
{
    global $name;
    global $gen;
    global $email;
    global $job;
    global $comment;

    # テンプレート読み込み
    // $conf = fopen("tmpl/conf.tmpl", "r") or die;
    // $size = filesize("tmpl/conf.tmpl");
    // $data = fread($conf, $size); //ファイルサイズを指定することで、全部読み込む
    // fclose($conf);

    # 文字置き換え　//ここにある！はうっかりほかのとこで使ってた場合を考慮してより区別化するための文字列
    $data = str_replace("!name!", $name, $data); //$data の中に !name! があったら "$name に置き換え
    $data = str_replace("!email!", $email, $data); //$data の中に !email! があったら $email に置き換える
    $data = str_replace("!comment!", $comment, $data);
    $data = str_replace("--hohohooi--", "サンバのリズムが聞こえるかい", $data);

    # 表示
    echo $data;
    exit;
}

#-----------------------------------------------------------
#  エラー画面
#-----------------------------------------------------------
function error($msg)
{
    $error = fopen("tmpl/error.tmpl", "r");
    $size = filesize("tmpl/error.tmpl");
    $data =  fread($error, $size);
    fclose($error);

    #文字置き換え
    $data = str_replace("!message!", $msg, $data);

    #表示
    echo $data;
    exit;
}

#-----------------------------------------------------------
#  CSV書込
#-----------------------------------------------------------
// function send_form()
// {
//     global $name;
//     global $email;
//     global $comment;

//     $user_input = array($name, $email, $comment); //配列を用意
//     mb_convert_variables("SJIS", "UTF-8", $user_input); //配列データをまとめて文字コード変換
//     $fh = fopen("user.csv", "a"); //追記書き込みモードでオープン
//     flock($fh, LOCK_EX);
//     fputcsv($fh, $user_input); //配列データをカンマ区切りで保存する命令
//     flock($fh, LOCK_UN); //ロックを解除して
//     fclose($fh); //ファイルを閉じる。書き込み完了

//     # テンプレート読み込み
//     $conf = fopen("tmpl/send.tmpl", "r") or die;
//     $size = filesize("tmpl/send.tmpl");
//     $data = fread($conf, $size);
//     fclose($conf);

//     #文字置き換え
//     global $toppage;
//     $data = str_replace("!top!", $toppage, $data);
//     #表示
//     echo $data;
//     exit;
// }
