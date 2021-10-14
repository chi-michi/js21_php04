<?php
//1. POSTデータ取得
$housework   = $_POST["housework"];
$charge  = $_POST["charge"];
$jikan = $_POST["jikan"];
$id     = $_POST["id"];

//2. DB接続します
require_once("funcs.php");
$pdo = db_conn();

//３．データ登録SQL作成
$stmt = $pdo->prepare("UPDATE Items2 SET housework=:housework,charge=:charge,jikan=:jikan WHERE id=:id");
$stmt->bindValue(':housework',   $housework,   PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':charge',  $charge,  PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':jikan',    $jikan,    PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':id',     $id,     PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute(); //実行

//４．データ登録処理後
if ($status == false) {
    sql_error($stmt);
} else {
    redirect("select.php");
}
