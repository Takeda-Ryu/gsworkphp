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

  <link rel="stylesheet" href="css/font-awesome.min.css">



  <script src="library/jquery-3.2.1.min.js"></script>
  <script type="text/javascript" src="js/index.js"></script>
<!--  <script src="library/jquery-emojiarea-master/jquery.emojiarea.js"></script>-->


 <!-- jQuery UI-->
  <!-- <link type="text/css" rel="stylesheet"
  href="http://code.jquery.com/ui/1.10.3/themes/cupertino/jquery-ui.min.css" />
<script type="text/javascript"
  src="http://code.jquery.com/ui/1.10.3/jquery-ui.min.js"></script> -->
 <!--  jQuery UI -->





 </head>
<body>


<div class="content-wrap">


<!-- Head[Start] -->
<header>

    <div class="header-inner">

        <p>Hills Like White Elephant</p>

        <div class="bar_wrapo">
            <i class="fa fa-bars fa-3x" aria-hidden="true"></i>
        </div>

    </div>




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



</div>

<!-- naviモーダル//////////////////////////////////////////////////////// -->

<div id="navi_modal" class="off drag">

    <div class="navi-inner">

        <ul>

            <li>
                <p id="about"><a href="#">About</a></p>
            </li>

            <li>
                <p id="sign_up"><a href="start.php">sign up</a></p>
            </li>

            <li>
                <p id="sign_in"><a href="login.php">sign in</a></p>
            </li>

            <li>
                <p id="logout"><a href="logout.php">logout</a></p>
            </li>

            <li>
                <p id="list"><a href="select.php">someone said...</a></p>
            </li>

        </ul>

    </div>



<div class="content-wrap">



</body>
</html>
