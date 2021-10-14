<?php
//XSS対応（ echoする場所で使用！それ以外はNG ）
function h($str)
{
    return htmlspecialchars($str, ENT_QUOTES);
}

//DB接続
function db_conn()
{
    try {
        $db_name = "HWgantt";    //データベース名
        $db_id   = "root";      //アカウント名
        $db_pw   = "root";      //パスワード：XAMPPはパスワード無しに修正してください。
        $db_host = "localhost"; //DBホスト
        $pdo = new PDO('mysql:dbname=' . $db_name . ';charset=utf8;host=' . $db_host, $db_id, $db_pw);
        return $pdo;
    } catch (PDOException $e) {
        exit('DB Connection Error:' . $e->getMessage());
    }
}

//SQLエラー
function sql_error($stmt)
{
    //execute（SQL実行時にエラーがある場合）
    $error = $stmt->errorInfo();
    exit("SQLError:" . $error[2]);
}

//リダイレクト
function redirect($file_name)
{
    header("Location: " . $file_name);
    exit();
}


// ログインチェク処理 loginCheck()
//function marumaru(){ここに関数にしたい物を書く}

// function loginCheck()
// {

//     if ($_SESSION['chk_ssid'] == session_id()) {
//         //ok session_regenerate_idは逐一更新する必要がある
//         session_regenerate_id(true);
//     } else {
//         // id持ってない or idがおかしい場合
//         exit("LOGIN ERROR");
//     }

// }

// ログインチェク処理 loginCheck()
function loginCheck()
{
    if ($_SESSION['chk_ssid'] === session_id()) {
        // ok
        session_regenerate_id(true);
        $_SESSION['chk_ssid'] = session_id();
    } else {
        // id持ってない or idがおかしい
        exit("LOGIN ERROR");
    }
}

///↑のsession === でうまくいかなかったら = にしてしまう
