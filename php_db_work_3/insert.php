<?php
//入力チェック(受信確認処理追加)
if(
  !isset($_POST["name"]) || $_POST["name"]=="" ||
  // !isset($_POST["email"]) || $_POST["email"]=="" ||
  !isset($_POST["naiyou"]) || $_POST["naiyou"]==""
  // !isset($_POST["star_rate"]) || $_POST["star_rate"]==""
){
  exit('ParamError');
}

//1. POSTデータ取得
$name      = $_POST["name"];
// $email     = $_POST["email"];
$naiyou    = $_POST["naiyou"];
// $star_rate = $_POST["star_rate"];


//2. DB接続します(エラー処理追加)
try {
  $pdo = new PDO('mysql:dbname=gs＿db;charset=utf8;host=localhost','root','');
} catch (PDOException $e) {
  exit('DbConnectError:'.$e->getMessage());
}


//３．データ登録SQL作成
$stmt = $pdo->prepare("INSERT INTO gs_an_table(id, name,  naiyou,
indate )VALUES(NULL, :a1,  :a2,  sysdate())");
$stmt->bindValue(':a1', $name,   PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
// $stmt->bindValue(':a2', $email,  PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':a2', $naiyou, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
// $stmt->bindValue(':a4', $star_rate, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute();

//４．データ登録処理後
if($status==false){
  //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
  $error = $stmt->errorInfo();
  exit("QueryError:".$error[2]);
}else{
  //５．index.phpへリダイレクト
  header("Location: answer.php");
  exit;
}
?>
