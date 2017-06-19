<?php

//1.GETでidを取得
$id = $_GET["id"];

//2.DB接続など
try {
  $pdo = new PDO('mysql:dbname=gs＿db;charset=utf8;host=localhost','root','');
} catch (PDOException $e) {
  exit('データベースに接続できませんでした。'.$e->getMessage());
}

//3.SELECT * FROM gs_an_table WHERE id=***; を取得（bindValueを使用！）
$stmt = $pdo->prepare("SELECT * FROM gs_an_table WHERE id=:id");
$stmt->bindValue(":id", $id, PDO::PARAM_INT);
$status = $stmt->execute();


//4.select.phpと同じようにデータを取得（以下はイチ例）
if($status==false){
  //execute（SQL実行時にエラーがある場合）
  $error = $stmt->errorInfo();
  exit("ErrorQuery:".$error[2]);
}else{
  //Selectデータの数だけ自動でループしてくれる
  $result = $stmt->fetch(); //$result["id"];
}


?>


<!-- //HTML///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<!DOCTYPE html>
<html lang="ja">
<head>

        <meta charset="UTF-8">
        <title>POSTデータ登録</title>
        <link rel="stylesheet" href="css/detail.css">
        <link rel="stylesheet" href="star_rate/jquery.rateyo.min.css"/>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
        <!-- rete yo本体 -->
        <script type="text/javascript" src="star_rate/jquery.rateyo.min.js"></script>
        <script src="js/index.js"></script>

</head>


<body>
<!-- Head[Start] -->
<header>

        <div class="navbar-header"><a class="navbar-brand" href="select.php">someone said...</a></div>

</header>
<!-- Head[End] -->

<!-- Main[Start] -->


<div  class="form_wrap">
<form method="post" action="update.php">


               <div id="img">
               <img class="animated bounce" src="images/Turtle_Emoji.png" alt="">
               </div>


               <div class="hash">This is...<input type="text" name="name" value="<?=$result["name"]?>"><br>

                 <!-- <label><input type="hidden" name="email"></label><br> -->
               <p>Reason why</p>

               <label><textArea name="naiyou" rows="4" cols="40">
               <?=$result["naiyou"]?>
               </textArea></label><br>
               <input type="hidden" name="id" value="<?=$id?>">
               <input id="star_rate" type="hidden" name="star_rate" value="">
               <div id="rateYo1"></div><br>
               <input type="submit" value="コメントを評価">

               </div>

</form>
</div>
<!-- Main[End] -->


</body>
</html>
