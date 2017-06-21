<?php

//0.外部ファイル読み込み
include("functions.php");

session_start();

$view = $_SESSION["id"];


$pdo = db_con();



$stmt = $pdo->prepare("SELECT * FROM gs_image_table ORDER BY RAND() LIMIT 1 ");  //ランダムにランダムに一つだけ

$status = $stmt->execute();

if($status==false){

    qerror($stmt);

}else{


  $result = $stmt->fetch();

  $rslt   = $result["image"];

  $_SESSION["known_img"] = $result["id"];

  $_SESSION["image_name"] = $result["image"];


  // $test = $_SESSION["image_name"];


}



 ?>







<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>Hills Like White Elephants</title>
<!--  <link rel="stylesheet" href="library/jquery-emojiarea-master/jquery.emojiarea.css">-->
  <link rel="stylesheet" href="css/index.css">



  <script src="library/jquery-3.2.1.min.js"></script>
<!--  <script src="library/jquery-emojiarea-master/jquery.emojiarea.js"></script>-->


 <!-- jQuery UI-->
  <!-- <link type="text/css" rel="stylesheet"
  href="http://code.jquery.com/ui/1.10.3/themes/cupertino/jquery-ui.min.css" />
<script type="text/javascript"
  src="http://code.jquery.com/ui/1.10.3/jquery-ui.min.js"></script> -->
 <!--  jQuery UI -->





 </head>
<body>

<!-- Head[Start] -->
<header>




</header>
<!-- Head[End] -->



<!-- Main[Start] -->
<div id="img" >
<img class="animated bounce" src="images/<?=$rslt?>" alt="">
</div>




  <!-- <div id="rateYo1"></div> -->

  <div class="Q_title">What is this？</div>



<!-- フォーム部分 ------------------------------------------------------------------------------------------->

<div id="drag" class="form_wrap">
<form method="post" action="insert.php">


     <div class="hash">This is...<input type="text" name="name"><br>

     <!-- <label><input type="hidden" name="email"></label><br> -->
     <p>Reason why</p>
     <label><textArea name="naiyou" rows="4" cols="40"></textArea></label><br>
     <!-- <input id="star_rate" type="hidden" name="star_rate" value="3"> -->
     <input type="hidden" name="uniId" value="<?=$view?>">
     <input type="submit" value="answer">

     </div>

</form>
</div>



<div class="data_list"><a href="logout.php">logout</a></div>
<!-- Main[End] -->


</body>
</html>
