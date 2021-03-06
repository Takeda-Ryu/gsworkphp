<?php
//1.POSTでParamを取得
$id     = $_POST["id"];
// $name   = $_POST["name"];
// $email  = $_POST["email"];
// $naiyou = $_POST["naiyou"];
$star_rate = $_POST["star_rate"];

// //2. DB接続functionから呼び出し(エラー処理追加)

include('functions.php');

$pdo = db_con();

//3.UPDATE gs_an_table SET ....; で更新(bindValue)
//　基本的にinsert.phpの処理の流れです。
//３．データ登録SQL作成
$stmt = $pdo->prepare("UPDATE gs_an_table SET
star_rate=:star_rate WHERE id=:id");
// $stmt->bindValue(':name',   $name,   PDO::PARAM_STR);
// $stmt->bindValue(':email',  $email,  PDO::PARAM_STR);
// $stmt->bindValue(':naiyou', $naiyou, PDO::PARAM_STR);
$stmt->bindValue(':star_rate', $star_rate, PDO::PARAM_STR);
$stmt->bindValue(':id',     $id,     PDO::PARAM_INT);
$status = $stmt->execute();

if($status==false){
  //execute（SQL実行時にエラーがある場合）
  $error = $stmt->errorInfo();
  exit("ErrorQuery:".$error[2]);
}else{
  header("Location: select.php");
  exit;
}




?>
