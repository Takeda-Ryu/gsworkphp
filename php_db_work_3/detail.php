<?php





//1.GETでidを取得
$id = $_GET["id"];

// //2. DB接続functionから呼び出し(エラー処理追加)

include('functions.php');

$pdo = db_con();

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

  $result = $stmt->fetch(); //$result["id"];

  $image = $result["image"];
}


//画像解析ライブラリ





include_once("library/paletter-master/colors.inc.php");



$ex=new GetMostCommonColors();
$ex->image="images/".$image;
$colors=$ex->Get_Color();

$colors_key=array_keys($colors);

$color1 = $colors_key[0];

$color2 = $colors_key[1];

$color3 = $colors_key[3];

// session_start();
//
// $_SESSION["color1"] = $color1;
//
// $_SESSION["color1"] = $color2;
//
// $_SESSION["color1"] = $color3;










 ?>




<!-- //HTML///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<!DOCTYPE html>
<html lang="ja">
<head>

        <meta charset="UTF-8">
        <title>POSTデータ登録</title>
        <link rel="stylesheet" href="css/detail_css.php">
        <link rel="stylesheet" href="star_rate/jquery.rateyo.min.css"/>
        <script src="library/jquery-3.2.1.min.js"></script>
        <!-- rete yo本体 -->
        <script type="text/javascript" src="star_rate/jquery.rateyo.min.js"></script>
        <script type="text/javascript" src="js/detail.js"></script>
        <script src="js/index2.js"></script>

</head>


<body>


<!-- Head[Start] -->
<header>

        <div class="navbar-header"><a class="navbar-brand" href="select.php">someone said...</a></div>

</header>

<!-- <div class="color1" ><br>
<div class="color2"><br>
<div class="color3"> -->

<!-- Head[End] -->

<!-- Main[Start] -->


<div  class="form_wrap">
<form method="post" action="update.php">


               <div class="blur" id="img">
               <img class="animated bounce" src="images/<?=$image?>" alt="">
               </div>
               <div class="show_btn_wrap"><button class="show_btn" type="button" name="button">show</button></div>


               <div class="hash">This is...<input type="text" name="name" value="<?=$result["name"]?>" readonly="readonly"><br>

                 <!-- <label><input type="hidden" name="email"></label><br> -->
               <p>Reason why</p>

               <label><textArea name="naiyou" rows="4" cols="40" readonly="readonly">
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
