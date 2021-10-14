<?php
// 0. SESSION開始！！
session_start();

// 1. ログインチェック処理！
// 以下、セッションID持ってたら、ok
// 持ってなければ、閲覧できない処理にする。
//if (session情報を持っていれば、サーバーのIDとなら){ok} else{ログイン画面にもどす}

// if ($_SESSION['chk_ssid'] == session_id()) {
//     //ok session_regenerate_idは逐一更新する必要がある
//     session_regenerate_id(true);
// } else {
//     // id持ってない or idがおかしい場合
//     exit("LOGIN ERROR");
// }


//１．関数群の読み込み
require_once("funcs.php");
loginCheck();



//２．データ登録SQL作成
$pdo = db_conn();
$stmt = $pdo->prepare("SELECT * FROM Items2");
$status = $stmt->execute();

//３．データ表示
$view = "";
if ($status == false) {
    sql_error($stmt);
} else {
    while ($r = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $view .= '<p>';
        $view .= '<a href="detail.php?id=' . $r["id"] . '">';
        $view .= $r["id"] . " " . $r["housework"] . " " . $r["charge"];
        $view .= '</a>';
        $view .= "　";
        $view .= '<a class="btn btn-danger" href="delete.php?id=' . $r["id"] . '">';
        $view .= '[<i class="glyphicon glyphicon-remove"></i>削除]';
        $view .= '</a>';
        $view .= '</p>';
    }
}

//各担当の時間リストを得る
//$stmtm = $pdo->query("SELECT SUM(jikan) FROM Items2 WHERE charge='みさえ'");
//$stmtf = $pdo->query("SELECT SUM(jikan) FROM Items2 WHERE charge='ひろし'");

//時間データ表示
//echo($stmtm);
//echo($stmtf);
?>




<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>フリーアンケート表示</title>
    <link rel="stylesheet" href="css/range.css">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <style>
        div {
            padding: 10px;
            font-size: 16px;
        }
    </style>
</head>

<body id="main">
    <!-- Head[Start] -->
    <header>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="index.php">データ登録</a>
                </div>
            </div>
        </nav>
    </header>
    <!-- Head[End] -->

    <!-- Main[Start] -->
    <div>
        <div class="container jumbotron"><?= $view ?></div>
    </div>
    <!-- Main[End] -->

</body>

</html>
