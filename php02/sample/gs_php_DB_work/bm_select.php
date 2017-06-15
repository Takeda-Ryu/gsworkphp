<?php

//echo $_POST["search"];


if(!isset($_POST["search"]) || $_POST["search"]==""){
    $s = 0;
}else{
    $s = 1;
}



//1.  DB接続します
try {
  $pdo = new PDO('mysql:dbname=*********;charset=utf8;host=************','********','*************');
} catch (PDOException $e) {
  exit('DbConnectError:'.$e->getMessage());
}

//２．データ登録SQL作成
if($s == 1){
    $stmt = $pdo->prepare("SELECT * FROM gs_bm_table WHERE title LIKE :title");
    $stmt->bindValue(":title", '%'.$_POST["search"].'%');
}else{
    $stmt = $pdo->prepare("SELECT * FROM gs_an_table");
}
$status = $stmt->execute();

//３．データ表示
$view="";
if($status==false){
  //execute（SQL実行時にエラーがある場合）
  $error = $stmt->errorInfo();
  exit("ErrorQuery:".$error[2]);

}else{
  //Selectデータの数だけ自動でループしてくれる
  while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){
    $view .= "<p id='book'>".$result["title"].",".$result["comment"]."</p>";
  }

}



// 連想配列($array)をJSONに変換(エンコード)する
$json = json_encode( $view );
//
//var_dump($json);
//
echo $json;




?>




