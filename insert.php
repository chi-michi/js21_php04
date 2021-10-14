<?php
//1. POSTデータ取得
$name   = $_POST["housework"];
$email  = $_POST["charge"];
$jikan = $_POST["jikan"];

//2. DB接続します
require_once("funcs.php");
$pdo = db_conn();

//３．データ登録SQL作成
$stmt = $pdo->prepare("INSERT INTO Items2(housework,charge,jikan,indate)VALUES(:housework,:charge,:jikan,sysdate())");
$stmt->bindValue(':housework', $name, PDO::PARAM_STR);      //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':charge', $email, PDO::PARAM_STR);    //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':jikan', $jikan, PDO::PARAM_INT);        //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute(); //実行

//４．データ登録処理後
if ($status == false) {
    sql_error($stmt);
} else {
    redirect("index.php");
}
